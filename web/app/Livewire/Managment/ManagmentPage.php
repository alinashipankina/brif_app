<?php

namespace App\Livewire\Managment;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Questionare;
use App\Models\User;
use App\Models\QuestionareStatusHistory;
use App\Models\QuestionareFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

#[Layout('components.layouts.managment')]
class ManagmentPage extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $statusFilter = [];
    public $tempStatusFilter = [];
    public $showStatusDropdown = false;
    public $responsibleFilter = [];
    public $tempResponsibleFilter = [];
    public $showResponsibleDropdown = false;
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public $selectedQuestionare = null;
    public $showDetails = false;
    public $showSetStatus = false;
    public string $selectedStatus = "";
    public $showAdditionalFields = false;
    public string $selectedComment = "";

    public $isCommentRequired = true;
    public $hasAttemptedSubmit = false;

    public $uploadedFiles = [];
    public $tempFiles = [];

    public $showReassignModal = false;
    public $selectedManagerId = null;

    public function openReassignModal()
    {
        if (!$this->selectedQuestionare) {
            session()->flash('error', 'Заявка не выбрана');
            return;
        }

        $this->showReassignModal = true;
        $this->selectedManagerId = $this->selectedQuestionare->user_id;
    }

    public function closeReassignModal()
    {
        $this->showReassignModal = false;
        $this->selectedManagerId = null;
    }

    public function reassignManager()
    {
        if (!Auth::user()->isAdmin()) {
            session()->flash('error', 'Только администратор может переназначать ответственных');
            return;
        }

        $this->validate([
            'selectedManagerId' => 'required|exists:users,id',
        ]);

        // Получаем менеджера
        $manager = User::find($this->selectedManagerId);

        if (!$manager) {
            session()->flash('error', 'Менеджер не найден');
            return;
        }

        $oldStatus = $this->selectedQuestionare->status;
        $oldManagerName = $this->selectedQuestionare->user?->name ?? 'не назначен';

        // Создаем запись в истории
        $history = QuestionareStatusHistory::create([
            "status" => $oldStatus,
            "comment" => "Переназначение: {$oldManagerName} → {$manager->name}",
            "questionare_id" => $this->selectedQuestionare->id
        ]);

        // Обновляем заявку
        $this->selectedQuestionare->user_id = $manager->id;
        $this->selectedQuestionare->status = 'Qualified';
        $this->selectedQuestionare->save();

        // Перезагружаем заявку с отношениями
        $this->selectedQuestionare = Questionare::with(['files.user', 'statusHistory.files.user', 'user'])
            ->find($this->selectedQuestionare->id);

        // Закрываем модалку
        $this->showReassignModal = false;
        $this->selectedManagerId = null; // Сбрасываем выбор

        $this->dispatch('manager-reassigned');
        session()->flash('message', "Ответственный изменен на {$manager->name}, статус обновлен на 'Квалификация'");
    }

    public function downloadBrifPdf(int $id)
    {
        $questionare = Questionare::with('fields')->findOrFail($id);

        $formData = [
            'name' => $questionare->name,
            'role' => $questionare->role,
            'phone' => $questionare->phone,
            'email' => $questionare->email,
            'service_type' => $questionare->service_type,
        ];

        foreach ($questionare->fields as $field) {
            $value = $field->field_value;

            if ($this->isJson($value)) {
                $value = json_decode($value, true);
            }

            $formData[$field->field_name] = $value;
        }

        $pdf = Pdf::loadView('pdf.brif', ['form' => $formData]);

        $pdf->setOptions([
            'defaultFont' => 'DejaVu Sans',
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true
        ]);

        $fileName = 'brif-' . $questionare->id . '-' . now()->format('Y-m-d') . '.pdf';

        return response()->streamDownload(
            function () use ($pdf) {
                echo $pdf->output();
            },
            $fileName
        );
    }

    private function isJson($string)
    {
        if (!is_string($string)) {
            return false;
        }

        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function logout()
        {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('/login');
        }

    public function updatedSearch() {
        $this->resetPage();
    }

    public function updateStatusFilter() {
        $this->resetPage();
    }

    public function updatedResponsibleFilter() {
        $this->resetPage();
    }

    public function updatedPerPage() {
        $this->resetPage();
    }

    public function selectQuestionare(int $id) {
        $questionare = Questionare::with(['files.user', 'statusHistory.files.user', 'user'])->find($id);

        $user = Auth::user();

        if (!$user->isAdmin()) {
            $canAccess = is_null($questionare->user_id) || $questionare->user_id == $user->id;

            if (!$canAccess) {
                session()->flash('error', 'У вас нет доступа к этой заявке');
                return;
            }
        }

        $this->selectedQuestionare = $questionare;
        $this->showDetails = true;
        $this->reset(['selectedStatus', 'selectedComment', 'showSetStatus', 'tempFiles']);

        // Инициализируем selectedManagerId для модалки
        $this->selectedManagerId = $questionare->user_id;
    }

    public function closeDetails() {
        $this->showDetails = false;
        $this->selectedQuestionare = null;
        $this->reset(['selectedStatus', 'selectedComment', 'showSetStatus', 'tempFiles']);
    }

    public function setShowSetStatus() {
        $this->showSetStatus = true;
        $this->reset(['selectedStatus', 'selectedComment', 'hasAttemptedSubmit', 'tempFiles']);
        $this->dispatch('status-section-opened');
    }
    public function toggleHistory() {
        $this->dispatch('history-section-opened');
    }

    public function cancelStatusChange() {
        $this->showSetStatus = false;
        $this->reset(['selectedStatus', 'selectedComment', 'hasAttemptedSubmit', 'tempFiles']);
    }

    public function updatedUploadedFiles()
    {
        try {
            $this->validate([
                'uploadedFiles.*' => 'file|max:20480|mimes:png,jpg,jpeg,gif,doc,docx,pdf,xls,xlsx,txt',
            ]);

            foreach ($this->uploadedFiles as $file) {
            $exists = collect($this->tempFiles)->contains('name', $file->getClientOriginalName());

            if (!$exists) {
                $this->tempFiles[] = [
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'type' => $file->getMimeType(),
                    'tmp_path' => $file->getRealPath(),
                    'file' => $file,
                ];
            }
        }

        $this->uploadedFiles = [];
        $this->dispatch('files-added');

        } catch (\Exception $e) {
            session()->flash('error', 'Ошибка при загрузке файла: ' . $e->getMessage());
        }
    }

    public function addFile()
    {
        $this->validate([
            'uploadedFiles' => 'required|array|min:1',
            'uploadedFiles.*' => 'file|max:10240',
        ]);

        foreach ($this->uploadedFiles as $file) {
            $this->tempFiles[] = [
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'type' => $file->getMimeType(),
                'tmp_path' => $file->getRealPath(),
                'file' => $file,
            ];
        }

        $this->uploadedFiles = [];
        $this->dispatch('files-added');
    }

    public function removeTempFile($index)
    {
        unset($this->tempFiles[$index]);
        $this->tempFiles = array_values($this->tempFiles);
    }

    public function getIsSaveDisabledProperty()
    {
        return !$this->selectedStatus || ($this->isCommentRequired && !$this->selectedComment);
    }

    public function changeStatus()
    {
        $this->hasAttemptedSubmit = true;

        $rules = [
            'selectedStatus' => 'required|string',
            'selectedComment' => 'required|string|min:3',
        ];

        $messages = [
            'selectedStatus.required' => 'Выберите новый статус',
            'selectedComment.required' => 'Комментарий обязателен для изменения статуса',
            'selectedComment.min' => 'Комментарий должен содержать минимум 3 символа',
        ];

        $this->validate($rules, $messages);

        try {
            $oldStatus = $this->selectedQuestionare->status;
            $oldComment = $this->selectedQuestionare->comment ?? '';

            $history = QuestionareStatusHistory::create([
                "status" => $oldStatus,
                "comment" => $oldComment,
                "questionare_id" => $this->selectedQuestionare->id
            ]);

            if (!empty($this->tempFiles)) {
                foreach ($this->tempFiles as $tempFile) {
                    $path = $tempFile['file']->store('questionare-files/' . $this->selectedQuestionare->id, 'public');

                    QuestionareFile::create([
                        'questionare_id' => $this->selectedQuestionare->id,
                        'status_history_id' => $history->id,
                        'user_id' => Auth::id(),
                        'status' => $this->selectedStatus,
                        'original_name' => $tempFile['name'],
                        'file_path' => $path,
                        'file_type' => $tempFile['type'],
                        'file_size' => $tempFile['size'],
                    ]);
                }
            }

            $this->selectedQuestionare->status = $this->selectedStatus;
            $this->selectedQuestionare->comment = $this->selectedComment;
            $this->selectedQuestionare->user_id = Auth::id();
            $this->selectedQuestionare->save();

            $this->selectedQuestionare = Questionare::with(['files', 'statusHistory.files'])->find($this->selectedQuestionare->id);

            $this->reset(['selectedStatus', 'selectedComment', 'showSetStatus', 'tempFiles']);
            $this->dispatch('status-changed');
            session()->flash('message', 'Статус успешно изменен');

        } catch (\Exception $e) {
            session()->flash('error', 'Ошибка при изменении статуса: ' . $e->getMessage());
        }
    }

    public function downloadFile($fileId)
    {
        $file = QuestionareFile::findOrFail($fileId);

        if (!Storage::disk('public')->exists($file->file_path)) {
            session()->flash('error', 'Файл не найден');
            return;
        }

        return Storage::disk('public')->download($file->file_path, $file->original_name);
    }

    public function deleteFile($fileId)
    {
        $file = QuestionareFile::findOrFail($fileId);

        if ($file->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            session()->flash('error', 'У вас нет прав на удаление этого файла');
            return;
        }

        if (Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        $this->selectedQuestionare = Questionare::with('files')->find($this->selectedQuestionare->id);

        session()->flash('message', 'Файл удален');
    }

    public function canEditStatus(Questionare $questionare) : bool {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return true;
        }

        if (is_null($questionare->user_id)) {
            return true;
        }

        if ($questionare->user_id == $user->id) {
            if (in_array($questionare->status, [
                'ClosedIntoADeal',
                'ClosedInRefusal',
                'TransferredToPartner'
            ])) {
                return false;
            }
            return true;
        }

        return false;
    }

    public function applyStatusFilter()
    {
        $this->statusFilter = $this->tempStatusFilter;
        $this->showStatusDropdown = false;
        $this->resetPage();
    }

    public function resetTempStatusFilter()
    {
        $this->tempStatusFilter = $this->statusFilter;
    }

    public function clearStatusFilter()
    {
        $this->statusFilter = [];
        $this->tempStatusFilter = [];
        $this->resetPage();
    }

    public function removeStatus($status)
    {
        $this->statusFilter = array_filter($this->statusFilter, function($s) use ($status) {
            return $s != $status;
        });
        $this->tempStatusFilter = $this->statusFilter;
        $this->resetPage();
    }
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function applyResponsibleFilter()
    {
        $this->responsibleFilter = $this->tempResponsibleFilter;
        $this->showResponsibleDropdown = false;
        $this->resetPage();
    }

    public function resetTempResponsibleFilter()
    {
        $this->tempResponsibleFilter = $this->responsibleFilter;
    }

    public function clearResponsibleFilter()
    {
        $this->responsibleFilter = [];
        $this->tempResponsibleFilter = [];
        $this->resetPage();
    }

    public function removeResponsible($userId)
    {
        $this->responsibleFilter = array_filter($this->responsibleFilter, function($id) use ($userId) {
            return $id != $userId;
        });
        $this->tempResponsibleFilter = $this->responsibleFilter;
        $this->resetPage();
    }

    public function clearSort($field = null)
    {
        if ($field && $this->sortField === $field) {
            $this->sortField = 'created_at';
            $this->sortDirection = 'desc';
            $this->resetPage();
        }
    }

    public function toggleAdditionalFields()
    {
        $this->showAdditionalFields = !$this->showAdditionalFields;
    }

    public function getQuestionaresProperty()
    {
        $query = Questionare::query();
        $user = Auth::user();

        if (!$user->isAdmin()) {
        $query->where(function($q) use ($user) {
            $q->where('status', 'NewLead')
            ->orWhere('user_id', $user->id);
        });
    }

        if (!empty($this->statusFilter)) {
            $query->whereIn('status', $this->statusFilter);
        }

        if (!empty($this->responsibleFilter)) {
            $query->whereIn('user_id', $this->responsibleFilter);
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('service_type', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%');
            });
        }

        $query->orderBy($this->sortField, $this->sortDirection);

        return $query->paginate($this->perPage);
    }

    public function getUsersProperty()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return User::all();
        } else {
            return User::where('id', $user->id)->get();
        }
    }

    public function getStatisticsProperty()
    {
        $user = Auth::user();

        $baseQuery = Questionare::query();

        if (!$user->isAdmin()) {
            $baseQuery->where(function($q) use ($user) {
                $q->whereNull('user_id')
                ->orWhere('user_id', $user->id);
            });
        }

        $total = (clone $baseQuery)->count();

        $byStatus = [];
        foreach (array_keys(\App\Helpers\QuestionareStatus::$questionaresLabels) as $statusKey) {
            $byStatus[$statusKey] = (clone $baseQuery)
                ->where('status', $statusKey)
                ->count();
        }

        $new = $byStatus['NewLead'] ?? 0;

        $inProgress = (clone $baseQuery)
        ->whereIn('status', [
            'Qualified',
            'SentProposal',
            'ProposalPresented',
            'Negotiations',
            'ContractSigning'
        ])->count();

        $completed = (clone $baseQuery)
            ->whereIn('status', [
                'ClosedIntoADeal',
                'ClosedInRefusal',
                'TransferredToPartner'
            ])->count();

        return [
            'total' => $total,
            'new' => $new,
            'in_progress' => $inProgress,
            'completed' => $completed,
            'by_status' => $byStatus,
        ];
    }

    public function getQuestionareFilesProperty()
    {
        if (!$this->selectedQuestionare) {
            return collect();
        }

        return $this->selectedQuestionare->files()->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.managment.managment-page', [
            'questionares' => $this->questionares,
            'users' => $this->users,
            'statistics' => $this->statistics,
            'isAdmin' => Auth::user()->isAdmin(),
            'showReassignModal' => $this->showReassignModal,
            'selectedManagerId' => $this->selectedManagerId,
        ]);
    }


}
