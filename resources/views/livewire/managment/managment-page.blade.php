<div class="min-h-screen bg-base-200">
    <!-- Шапка с аккаунтом -->
    <div class="navbar bg-base-100 shadow-lg">
        <div class="flex-1">
            <a href="/" class="btn btn-ghost normal-case text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Система заявок
            </a>
        </div>
        <div class="flex-none gap-2">
            <!-- Аккаунт пользователя -->
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff" />
                    </div>
                </label>
                <ul tabindex="0"
                    class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            Профиль
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-error">
                            Выйти
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Основной контент -->
    <div class="container mx-auto p-4">
        <!-- Заголовок -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Страница заявок</h1>
            <p class="text-gray-600">Управление заявками и отслеживание статусов</p>
        </div>

        <!-- Карточки статистики -->
        <div class="flex gap-2 mb-6">
            {{-- Всего заявок --}}
            <div class="stats shadow flex-1">
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Всего заявок</div>
                    <div class="stat-value text-primary">{{ $this->statistics['total'] }}</div>
                </div>
            </div>

            {{-- Новые --}}
            <div class="stats shadow flex-1">
                <div class="stat">
                    <div class="stat-figure text-info">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <div class="stat-title">Новые</div>
                    <div class="stat-value text-info">{{ $this->statistics['new'] }}</div>
                </div>
            </div>

            {{-- В работе --}}
            <div class="stats shadow flex-1">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">В работе</div>
                    <div class="stat-value text-secondary">
                        {{ $this->statistics['in_progress'] }}</div>
                </div>
            </div>

            {{-- Ожидание --}}
            <div class="stats shadow flex-1">
                <div class="stat">
                    <div class="stat-figure text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>

                    <div class="stat-title">Переговоры</div>
                    <div class="stat-value text-warning">
                        {{ $this->statistics['waiting'] }}
                    </div>
                </div>
            </div>

            {{-- Завершено --}}
            <div class="stats shadow flex-1">
                <div class="stat">
                    <div class="stat-figure text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Завершено</div>
                    <div class="stat-value text-success">
                        {{ $this->statistics['completed'] }}
                    </div>
                </div>
            </div>
        </div>


        <!-- Панель фильтров -->
        <div class="card bg-base-100 shadow-xl mb-6">
            <div class="card-body">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Поиск -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Поиск заявок</span>
                        </label>
                        <div class="relative">
                            <input type="text" wire:model.live.debounce.300ms="search"
                                placeholder="Поиск по ID, названию, статусу" class="w-full pr-10 input input-bordered">
                            <button class="absolute right-3 top-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Фильтр по статусу -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Статус</span>
                        </label>
                        <select wire:model.live="statusFilter" class="select select-bordered">
                            <option value="">Все статусы</option>
                            @foreach (\App\Helpers\QuestionareStatus::$questionaresLabels as $status => $label)
                                <option value="{{ $status }}">
                                    {{ $label['label'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Фильтр по ответственному -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Ответственный</span>
                        </label>
                        <select wire:model="responsibleFilter" class="select select-bordered">
                            <option value="">Все сотрудники</option>
                            {{-- @foreach ($responsibles as $responsible)
                                <option value="{{ $responsible->id }}">
                                    {{ $responsible->name }}
                                </option>
                            @endforeach --}}
                        </select>
                    </div>

                    <!-- Количество на странице -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">На странице</span>
                        </label>
                        <select wire:model.live="perPage" class="select select-bordered">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Таблица заявок -->
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body p-0">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full mb-4">
                        <thead>
                            <tr class="bg-base-200">
                                <th class="cursor-pointer" wire:click="$set('sortField', 'id')">
                                    <div class="flex items-center">
                                        Заявка №
                                        @if ($sortField === 'id')
                                            @if ($sortDirection === 'asc')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th>
                                <th class="cursor-pointer" wire:click="$set('sortField', 'name')">
                                    <div class="flex items-center">
                                        Наименование
                                        @if ($sortField === 'name')
                                            @if ($sortDirection === 'asc')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th>
                                <th>Услуга</th>
                                <th>Ответственный</th>
                                <th>Статус</th>
                                <th class="cursor-pointer" wire:click="$set('sortField', 'created_at')">
                                    <div class="flex items-center">
                                        Дата создания
                                        @if ($sortField === 'created_at')
                                            @if ($sortDirection === 'asc')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        @endif
                                    </div>
                                </th>
                                <th>Дата завершения</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($this->questionares as $questionare)
                                <tr>
                                    <td class="font-bold">#{{ $questionare->id }}</td>
                                    <td>
                                        <div class="font-medium">{{ $questionare->company_name }}</div>
                                    </td>
                                    <td>
                                        <div class="font-medium">{{ $questionare->usluga }}</div>
                                    </td>
                                    <td>
                                        {{-- @if ($application->responsible) --}}
                                        {{-- <div class="flex items-center"> --}}
                                        {{-- <div class="avatar mr-2">
                                                <div class="w-8 rounded-full">
                                                    <img
                                                        src="https://ui-avatars.com/api/?name={{ urlencode($application->responsible->name) }}&background=4f46e5&color=fff" />
                                                </div>
                                            </div>
                                            <span>{{ $application->responsible->name }}</span>
                                        </div>
                                    @else
                                        <span class="text-gray-400">Не назначен</span>
                                    @endif --}}
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$questionare->status]['badge'] ?? 'badge-neutral' }}">
                                            {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$questionare->status]['label'] }}
                                        </span>

                                    </td>
                                    <td>
                                        <div class="text-sm">
                                            {{ $questionare->created_at->format('d.m.Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $questionare->created_at->format('H:i') }}
                                        </div>
                                    </td>
                                    <td>
                                        {{-- @if ($application->completed_at) --}}
                                        {{-- <div class="text-sm"> --}}
                                        {{-- {{ $application->completed_at->format('d.m.Y') }} --}}
                                        {{-- </div> --}}
                                        {{-- <div class="text-xs text-gray-500"> --}}
                                        {{-- {{ $application->completed_at->format('H:i') }} --}}
                                        {{-- </div> --}}
                                        {{-- @else --}}
                                        {{-- <span class="text-gray-400">—</span> --}}
                                        {{-- @endif --}}
                                    </td>
                                    <td>
                                        <div class="flex gap-1">
                                            {{-- @if ($application->status === 'new')
                                        <button wire:click="takeToWork({{ $application->id }})"
                                            wire:loading.attr="disabled" class="btn btn-xs btn-success"
                                            onclick="event.stopPropagation()">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                            Взять в работу
                                        </button>
                                    @elseif($application->status === 'in_progress')
                                        <button wire:click="completeApplication({{ $application->id }})"
                                            wire:loading.attr="disabled" class="btn btn-xs btn-primary"
                                            onclick="event.stopPropagation()">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            Завершить
                                        </button>
                                    @endif --}}

                                            {{-- <a href="{{ route('applications.edit', $application->id) }}" --}}
                                            <button wire:click='selectQuestionare({{ $questionare->id }})'
                                                class="btn btn-xs btn-ghost" onclick="event.stopPropagation()">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-8">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-12 w-12 mx-auto text-gray-400 mb-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p class="text-gray-500">Заявки не найдены</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Пагинация -->
                <div class="mt-6 w-full">
                    <div class="mb-6 flex justify-between items-center gap-1 px-6">
                        <!-- Навигация с номерами страниц -->
                        <div class="join">
                            {{-- Кнопка "назад" --}}
                            <button wire:click="previousPage" @disabled($this->questionares->onFirstPage())
                                class="join-item btn btn-sm">
                                ←
                            </button>

                            {{-- Номера страниц --}}
                            @php
                                $current = $this->questionares->currentPage();
                                $last = $this->questionares->lastPage();
                                $start = max(1, $current - 2);
                                $end = min($last, $current + 2);
                            @endphp

                            @for ($i = $start; $i <= $end; $i++)
                                <button wire:click="gotoPage({{ $i }})"
                                    class="join-item btn btn-sm {{ $i == $current ? 'btn-active' : '' }}">
                                    {{ $i }}
                                </button>
                            @endfor

                            {{-- Кнопка "вперед" --}}
                            <button wire:click="nextPage" @disabled($this->questionares->onLastPage()) class="join-item btn btn-sm">
                                →
                            </button>
                        </div>
                        <!-- Информация -->
                        <div class="text-sm text-gray-600">
                            Страница {{ $this->questionares->currentPage() }} из {{ $this->questionares->lastPage() }}
                            ({{ $this->questionares->total() }} записей)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно с деталями заявки (правая панель) -->
    @if ($showDetails && $selectedQuestionare)
        <!-- Затемнение фона -->
        <div class="fixed inset-0 bg-opacity-50 z-40" wire:click="closeDetails"></div>

        <!-- Панель с деталями -->
        <div class="fixed inset-y-0 right-0 w-full md:w-1/2 lg:w-1/3 bg-base-100 shadow-2xl z-50 overflow-y-auto">
            <div class="p-6">
                <!-- Заголовок панели -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">
                        Заявка #{{ $selectedQuestionare->id }}
                    </h2>
                    <button wire:click="closeDetails" class="btn btn-sm btn-circle btn-ghost">
                        ✕
                    </button>
                </div>

                <!-- Статус и кнопки действий -->
                <div class="mb-6 flex flex-col gap-1">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Статус</h3>
                    <span
                        class="badge {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$selectedQuestionare->status]['badge'] }}">
                        {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$selectedQuestionare->status]['label'] }}
                    </span>
                </div>

                <!-- Основная информация -->
                <div class="space-y-6">
                    <!-- Наименование -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Наименование</h3>
                        <p class="text-base font-semibold">{{ $selectedQuestionare->company_name }}</p>
                    </div>

                    {{-- Номер телефона --}}
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Номер телефона</h3>
                        <p class="text-base font-semibold">{{ $selectedQuestionare->phone }}</p>
                    </div>

                    {{-- Электронная почта --}}
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Электронная почта</h3>
                        <p class="text-base font-semibold">{{ $selectedQuestionare->email }}</p>
                    </div>

                    <!-- Ответственный -->
                    {{-- <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Ответственный</h3>
                        @if ($selectedQuestionare->responsible)
                            <div class="flex items-center p-3 bg-base-200 rounded-lg">
                                <div class="avatar mr-3">
                                    <div class="w-12 rounded-full">
                                        <img
                                            src="https://ui-avatars.com/api/?name={{ urlencode($selectedQuestionare->responsible->name) }}&background=4f46e5&color=fff" />
                                    </div>
                                </div>
                                <div>
                                    <p class="font-medium">{{ $selectedQuestionare->responsible->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $selectedQuestionare->responsible->email }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                    <span>Ответственный не назначен</span>
                                </div>
                            </div>
                        @endif
                    </div> --}}

                    <!-- Детали -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">Дата создания</h3>
                            <p class="text-base font-semibold">
                                {{ $selectedQuestionare->created_at->format('d.m.Y H:i') }}
                            </p>
                        </div>

                        {{-- @if ($selectedQuestionare->taken_at)
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 mb-1">Взята в работу</h3>
                                <p class="font-medium">
                                    {{ $selectedQuestionare->taken_at->format('d.m.Y H:i') }}
                                </p>
                            </div>
                        @endif

                        @if ($selectedQuestionare->completed_at)
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 mb-1">Дата завершения</h3>
                                <p class="font-medium">
                                    {{ $selectedQuestionare->completed_at->format('d.m.Y H:i') }}
                                </p>
                            </div>
                        @endif --}}
                    </div>

                    <!-- Дополнительные поля -->
                    @if ($selectedQuestionare->fields() && $selectedQuestionare->fields()->count() > 0)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-3">Дополнительная информация</h3>
                            <div class="space-y-2">
                                @foreach ($selectedQuestionare->fields as $field)
                                    <div class="flex justify-between py-2 border-b border-gray-200 last:border-0">
                                        <span class="text-gray-600">{{ $field->field_name }}:</span>
                                        <span class="text-base font-semibold">
                                            @if (is_array($field->field_value))
                                                {{ implode(', ', $field->field_value) }}
                                            @else
                                                {{ $field->field_value }}
                                            @endif
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Комментарии (если есть) -->
                    @if ($selectedQuestionare->comments && $selectedQuestionare->comments->count() > 0)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-3">Комментарии</h3>
                            <div class="space-y-3">
                                @foreach ($selectedQuestionare->comments->take(3) as $comment)
                                    <div class="chat chat-start">
                                        <div class="chat-image avatar">
                                            <div class="w-8 rounded-full">
                                                <img
                                                    src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}" />
                                            </div>
                                        </div>
                                        <div class="chat-bubble bg-base-200 text-gray-800">
                                            {{ $comment->content }}
                                        </div>
                                        <div class="chat-footer text-xs opacity-50">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Кнопки внизу панели -->
                <div class="mt-8 pt-6 border-t border-gray-200 flex justify-between">
                    {{-- <a href="" class="btn btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Редактировать
                    </a>

                    <div class="flex gap-2">
                        <button class="btn btn-error btn-outline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Удалить
                        </button> --}}
                    {{-- </div> --}}
                    <div class="flex flex-col justify-between gap-5 w-full">
                        <button type="button" wire:click='setShowSetStatus()'
                            class="btn btn-outline w-full">Изменить
                            статус</button>
                        @if ($showSetStatus)
                            <select wire:model='selectedStatus'>
                                <option value="">Выберите статус</option>
                                <option value="NewLead">Новый лид</option>
                                <option value="Qualified">Квалифицирован</option>
                                <option value="SentProposal">Выслано КП</option>
                                <option value="Negotiations">Переговоры</option>
                                <option value="ClosedIntoADeal">Закрыт в сделку</option>
                                <option value="ClosedInRefusal"">Закрыт в отказ</option>
                            </select>
                            <input wire:model='selectedComment' type="text" placeholder="Комментарий" />

                            <button wire:click='changeStatus()' type="button"
                                class="btn btn-accent">Сохранить</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        // Закрытие модального окна по ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                Livewire.emit('closeDetails');
            }
        });

        // Предотвращение закрытия при клике внутри модального окна
        document.addEventListener('click', function(e) {
            if (e.target.closest('.fixed.inset-y-0.right-0')) {
                e.stopPropagation();
            }
        });
    </script>
@endpush
