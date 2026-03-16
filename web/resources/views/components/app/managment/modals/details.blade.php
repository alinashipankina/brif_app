@props([
    'selectedQuestionare',
    'isAdmin',
    'users',
    'tempFiles',
    'showSetStatus',
    'selectedStatus',
    'selectedComment',
    'isSaveDisabled',
    'showReassignModal',
    'selectedManagerId',
])

<div class="fixed inset-0 bg-opacity-50 z-40" wire:click="closeDetails"></div>

<div class="fixed inset-y-0 right-0 w-full md:w-1/2 lg:w-1/3 bg-base-100 shadow-2xl z-50 overflow-y-auto" x-data
    x-on:status-section-opened.window="
        setTimeout(() => {
            document.getElementById('status-section')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 200);">

    <div class="p-6">
        {{-- Заголовок модального окна --}}
        <x-app.managment.modals.details.header :id="$selectedQuestionare->id" />

        {{-- Услуга и статус --}}
        <x-app.managment.modals.details.service-and-status :service-type="$selectedQuestionare->service_type" :status="$selectedQuestionare->status" />

        {{-- Последний комментарий --}}
        @if ($selectedQuestionare->comment)
            <div class="mb-6">
                <h3 class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-2">Последний комментарий</h3>
                <p class="p-3 bg-[#F5F5F5] text-sm text-[#1A1A1A] rounded-md">{{ $selectedQuestionare->comment }}</p>
            </div>
        @endif

        {{-- Основная информация --}}
        <div class="space-y-6">
            <x-app.managment.modals.details.basic-info :questionare="$selectedQuestionare" />

            {{-- Ответственный --}}
            <x-app.managment.modals.details.responsible :user="$selectedQuestionare->user" :is-admin="$isAdmin" :questionare-id="$selectedQuestionare->id"
                :questionare-name="$selectedQuestionare->name" />

            {{-- Дополнительные поля --}}
            @if ($selectedQuestionare->fields() && $selectedQuestionare->fields()->count() > 0)
                <x-app.managment.modals.details.additional-fields :fields="$selectedQuestionare->fields" :service-type="$selectedQuestionare->service_type" />
            @endif

            {{-- Все файлы заявки --}}
            @if ($selectedQuestionare->files && $selectedQuestionare->files->count() > 0)
                <x-app.managment.modals.details.all-files :files="$selectedQuestionare->files" />
            @endif
        </div>

        {{-- Кнопки внизу панели --}}
        <div class="mt-8 pt-6 border-t border-[#E8E8E8] flex-col" id="status-section">

            {{-- История статусов --}}
            <x-app.managment.modals.details.status-history :history="$selectedQuestionare->statusHistory" />

            {{-- Кнопка скачивания PDF --}}
            <x-app.managment.modals.details.pdf-download :id="$selectedQuestionare->id" />

            {{-- Изменение статуса --}}
            @if ($this->canEditStatus($selectedQuestionare))
                <x-app.managment.modals.details.status-change :show-set-status="$showSetStatus" :selected-status="$selectedStatus" :selected-comment="$selectedComment"
                    :temp-files="$tempFiles" :is-save-disabled="$isSaveDisabled" />
            @endif
        </div>
    </div>
</div>

{{-- Модальное окно переназначения --}}
@if ($showReassignModal)
    <x-app.managment.modals.reassign-modal :questionare="$selectedQuestionare" :users="$users" :selected-manager-id="$selectedManagerId" />
@endif
