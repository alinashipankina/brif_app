<?php

namespace App\Livewire\Managment;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Questionare;
use App\Helpers\QuestionareStatus;

#[Layout('components.layouts.managment')]
class ManagmentPage extends Component
{

    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $responsibleFilter = '';
    public $perPage = 5;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    // Для модального окна
    public $selectedQuestionare = null;
    public $showDetails = false;

    public $showSetStatus = false;

    public string $selectedStatus = "";

    public string $selectedComment = "";

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

    }

    public function closeDetails() {
        $this->showDetails = false;
        $this->selectedQuestionare = null;
    }

    public function setShowSetStatus() {
        $this->showSetStatus = true;
    }

    public function changeStatus() {
        $this->selectedQuestionare->status = $this->selectedStatus;
        $this->selectedQuestionare->comment = $this->selectedComment;
        $this->selectedQuestionare->save();
        $this->closeDetails();
    }

    public function getQuestionaresProperty()
    {
        $query = Questionare::query();

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('company_name', 'like', '%' . $this->search . '%')
                ->orWhere('usluga', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%');
            });
        }

        $query->orderBy($this->sortField, $this->sortDirection);

        return $query->paginate($this->perPage);
    }

    public function getStatisticsProperty()
    {
        return [
            'total' => Questionare::count(),
            'in_progress' => Questionare::whereIn('status', ['Qualified', 'SentProposal'])->count(),
            'waiting' => Questionare::where('status', 'Negotiations')->count(),
            'completed' => Questionare::whereIn('status', ['ClosedIntoADeal', 'ClosedInRefusal'])->count(),
            'new' => Questionare::where('status', 'NewLead')->count(),
        ];
    }

    public function render()
    {

        return view('livewire.managment.managment-page');
    }
}
