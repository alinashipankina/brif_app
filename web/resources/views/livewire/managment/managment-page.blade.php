<div class="min-h-screen bg-base-200">
    <div class="transition-opacity duration-300 {{ $showDetails ? 'opacity-50' : 'opacity-100' }}">
        <x-app.managment.header :user="auth()->user()" />
        <div class="container mx-auto px-4 py-6 md:px-6 lg:px-8">
            <x-app.managment.statistics :statistics="$statistics" />
            <x-app.managment.filters.index :search="$search" :status-filter="$statusFilter" :temp-status-filter="$tempStatusFilter" :users="$users"
                :responsible-filter="$responsibleFilter" :temp-responsible-filter="$tempResponsibleFilter" :is-admin="$isAdmin" :per-page="$perPage" />
            <x-app.managment.table.index :questionares="$this->questionares" :sort-field="$sortField" :sort-direction="$sortDirection" />
        </div>
    </div>

    @if ($showDetails && $selectedQuestionare)
        <x-app.managment.modals.details :selected-questionare="$selectedQuestionare" :is-admin="$isAdmin" :users="$users" :temp-files="$tempFiles"
            :show-set-status="$showSetStatus" :selected-status="$selectedStatus" :selected-comment="$selectedComment" :is-save-disabled="$this->isSaveDisabled" :show-reassign-modal="$showReassignModal"
            :selected-manager-id="$selectedManagerId" />
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                Livewire.emit('closeDetails');
            }
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.fixed.inset-y-0.right-0')) {
                e.stopPropagation();
            }
        });
    </script>
@endpush
