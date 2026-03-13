<?php

namespace App\Livewire\Managment;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Questionare;
use App\Models\User;
use App\Models\QuestionareStatusHistory;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

#[Layout('components.layouts.managment')]
class ManagmentPage extends Component
{

    use WithPagination;

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

    /**
     * Скачать PDF с брифом для выбранной заявки
     */
    public function downloadBrifPdf(int $id)
    {
        $questionare = Questionare::with('fields')->findOrFail($id);

        // Собираем данные для PDF
        $formData = [
            'name' => $questionare->name,
            'role' => $questionare->role,
            'phone' => $questionare->phone,
            'email' => $questionare->email,
            'service_type' => $questionare->service_type,
        ];

        // Добавляем все поля из связанной таблицы
        foreach ($questionare->fields as $field) {
            $value = $field->field_value;

            // Декодируем JSON, если это массив
            if ($this->isJson($value)) {
                $value = json_decode($value, true);
            }

            $formData[$field->field_name] = $value;
        }

        // Генерируем PDF
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

    /**
     * Проверка, является ли строка JSON
     */
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
        $this->selectedQuestionare = Questionare::find($id);
        $this->showDetails = true;
        $this->reset(['selectedStatus', 'selectedComment', 'showSetStatus']);
    }

    public function closeDetails() {
        $this->showDetails = false;
        $this->selectedQuestionare = null;
        $this->reset(['selectedStatus', 'selectedComment', 'showSetStatus']);
    }

    public function setShowSetStatus() {
        $this->showSetStatus = true;
        $this->reset(['selectedStatus', 'selectedComment', 'hasAttemptedSubmit']);
        $this->dispatch('status-section-opened');
    }
    public function toggleHistory() {
        $this->dispatch('history-section-opened');
    }

    public function cancelStatusChange() {
        $this->showSetStatus = false;
        $this->reset(['selectedStatus', 'selectedComment', 'hasAttemptedSubmit']);
    }

    public function getIsSaveDisabledProperty()
    {
        return !$this->selectedStatus || ($this->isCommentRequired && !$this->selectedComment);
    }

    public function changeStatus() {
        $this->validate([
            'selectedStatus' => 'required|string',
            'selectedComment' => 'required|string|min:3',
        ], [
            'selectedStatus.required' => 'Выберите новый статус',
            'selectedComment.required' => 'Комментарий обязателен для изменения статуса',
            'selectedComment.min' => 'Комментарий должен содержать минимум 3 символа',
        ]);

        try {
            $oldStatus = $this->selectedQuestionare->status;
            $oldComment = $this->selectedQuestionare->comment ?? '';

            $history = QuestionareStatusHistory::create([
                "status" => $oldStatus,
                "comment" => $oldComment,
                "questionare_id" => $this->selectedQuestionare->id
            ]);

            $this->selectedQuestionare->status = $this->selectedStatus;
            $this->selectedQuestionare->comment = $this->selectedComment;
            $this->selectedQuestionare->user_id = Auth::id();
            $this->selectedQuestionare->save();

            $this->reset(['selectedStatus', 'selectedComment', 'showSetStatus']);
            $this->closeDetails();

            session()->flash('message', 'Статус успешно изменен');

        } catch (\Exception $e) {
            session()->flash('error', 'Ошибка при изменении статуса');
        }
    }

    public function canEditStatus(Questionare $questionare) : bool {
        if ($questionare->status == 'NewLead') {
            return true;
        }

        if (in_array($questionare->status, [
            'ClosedIntoADeal',
            'ClosedInRefusal',
            'TransferredToPartner'
        ])) {
            return false;
        }
        return $questionare->user_id == Auth::id();
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
        return User::all();
    }

    public function getStatisticsProperty()
    {
        return [
            'total' => Questionare::count(),
            'new' => Questionare::where('status', 'NewLead')->count(),
            'in_progress' => Questionare::whereIn('status', [
                'Qualified',
                'SentProposal',
                'ProposalPresented',
                'Negotiations',
                'ContractSigning'
            ])->count(),
            'completed' => Questionare::whereIn('status', [
                'ClosedIntoADeal',
                'ClosedInRefusal',
                'TransferredToPartner'
            ])->count(),

        ];
    }


    public function render()
    {

        return view('livewire.managment.managment-page', [
            'questionares' => $this->questionares,
            'users' => $this->users,
            'statistics' => $this->statistics
        ]);
    }
}
