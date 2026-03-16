@props([
    'search',
    'statusFilter',
    'tempStatusFilter',
    'users',
    'responsibleFilter',
    'tempResponsibleFilter',
    'isAdmin',
    'perPage',
])

<div class="border border-[#E8E8E8] bg-white p-6 shadow-sm">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        {{-- Поиск --}}
        <x-app.managment.filters.search :search="$search" />

        {{-- Фильтр статусов --}}
        <x-app.managment.filters.status-filter :status-filter="$statusFilter" :temp-status-filter="$tempStatusFilter" />

        {{-- Фильтр сотрудников (только если есть пользователи или админ) --}}
        @if (count($users) > 1 || $isAdmin)
            <x-app.managment.filters.responsible-filter :users="$users" :responsible-filter="$responsibleFilter" :temp-responsible-filter="$tempResponsibleFilter"
                :is-admin="$isAdmin" />
        @endif

        {{-- Количество на странице --}}
        <x-app.managment.filters.per-page :per-page="$perPage" />

    </div>
</div>
