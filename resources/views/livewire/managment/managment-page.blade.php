<div class="min-h-screen bg-base-200">
    <div class="transition-opacity duration-300 {{ $showDetails ? 'opacity-50' : 'opacity-100' }}">
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
                        <div class="mb-2 p-2">
                            <p class="font-medium">{{ auth()->user()->name }}</p>
                            <p class="text-sm text-gray-500">{{ auth()->user()->email }}
                            </p>
                        </div>
                        <li>
                            <button wire:click='logout' type="button" class="text-error">
                                Выйти
                            </button>
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
                <div class="stats shadow flex-1 bg-base-100">
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
                <div class="stats shadow flex-1 bg-base-100">
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
                <div class="stats shadow flex-1 bg-base-100">
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
                <div class="stats shadow flex-1 bg-base-100">
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
                <div class="stats shadow flex-1 bg-base-100">
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
                                    placeholder="Поиск по ID, названию, статусу"
                                    class="w-full pr-10 input input-bordered">
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
                            <select wire:model.live="responsibleFilter" class="select select-bordered">
                                <option value="">Все сотрудники</option>
                                @foreach ($this->users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                        @if ($user->id == Auth::id())
                                            (Вы)
                                        @endif
                                    </option>
                                @endforeach
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
                                <option value="25">15</option>
                                <option value="50">20</option>
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
                                    {{-- ID --}}
                                    <th class="cursor-pointer" wire:click="sortBy('id')">
                                        <div class="flex items-center justify-between p-3">
                                            <span>Заявка №</span>
                                            <div class="flex flex-col">
                                                @if ($sortField === 'id')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    </th>

                                    {{-- Наименование компании --}}
                                    <th class="cursor-pointer hover:bg-base-300" wire:click="sortBy('company_name')">
                                        <div class="flex items-center justify-between p-3">
                                            <span>Наименование</span>
                                            <div class="flex flex-col">
                                                @if ($sortField === 'company_name')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    </th>

                                    {{-- Услуга --}}
                                    <th class="cursor-pointer hover:bg-base-300" wire:click="sortBy('usluga')">
                                        <div class="flex items-center justify-between p-3">
                                            <span>Услуга</span>
                                            <div class="flex flex-col">
                                                @if ($sortField === 'usluga')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01 -1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    </th>

                                    {{-- Менеджер --}}
                                    <th class="cursor-pointer hover:bg-base-300" wire:click="sortBy('user_id')">
                                        <div class="flex items-center justify-between p-3">
                                            <span>Менеджер</span>
                                            <div class="flex flex-col">
                                                @if ($sortField === 'user_id')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    </th>

                                    {{-- Статус --}}
                                    <th class="cursor-pointer hover:bg-base-300" wire:click="sortBy('status')">
                                        <div class="flex items-center justify-between p-3">
                                            <span>Статус</span>
                                            <div class="flex flex-col">
                                                @if ($sortField === 'status')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    </th>

                                    {{-- Дата создания --}}
                                    <th class="cursor-pointer hover:bg-base-300" wire:click="sortBy('created_at')">
                                        <div class="flex items-center justify-between p-3">
                                            <span>Дата <br>создания</span>
                                            <div class="flex flex-col">
                                                @if ($sortField === 'created_at')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    </th>

                                    {{-- Дата обновления --}}
                                    <th class="cursor-pointer hover:bg-base-300" wire:click="sortBy('created_at')">
                                        <div class="flex items-center justify-between p-3">
                                            <span>Дата последнего <br>обновления</span>
                                            <div class="flex flex-col">
                                                @if ($sortField === 'updated_at')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    </th>

                                    {{-- Дата завершения --}}
                                    {{-- <th class="cursor-pointer hover:bg-base-300" wire:click="sortBy('updated_at')">
                                        <div class="flex items-center justify-between p-3">
                                            <span>Дата <br>завершения</span>
                                            <div class="flex flex-col">
                                                @if ($sortField === 'updated_at')
                                                    @if ($sortDirection === 'asc')
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <svg class="w-3 h-3 text-primary" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                @else
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class="w-3 h-3 opacity-30" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                    </th> --}}

                                    {{-- Действия (без сортировки) --}}
                                    <th></th>
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
                                            @if ($questionare->user_id)
                                                <span>{{ $questionare->user->name }}</span>
                                            @else
                                                <span>-</span>
                                            @endif
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
                                            <div class="text-sm">
                                                {{ $questionare->updated_at->format('d.m.Y') }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                {{ $questionare->updated_at->format('H:i') }}
                                            </div>
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
                                                <button wire:click="selectQuestionare({{ $questionare->id }})"
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
                    <div class="mt-6 w-full">
                        <div class="mb-6 flex justify-between items-center gap-1 px-6">
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
                                <button wire:click="nextPage" @disabled($this->questionares->onLastPage())
                                    class="join-item btn btn-sm">
                                    →
                                </button>
                            </div>
                            <div class="text-sm text-gray-600">
                                Страница {{ $this->questionares->currentPage() }} из
                                {{ $this->questionares->lastPage() }}
                                ({{ $this->questionares->total() }} заявок)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно с деталями заявки (правая панель) -->
    @if ($showDetails && $selectedQuestionare)
        <div class="fixed inset-0 bg-opacity-50 z-40" wire:click="closeDetails"></div>

        <!-- Панель с деталями -->
        <div class="fixed inset-y-0 right-0 w-full md:w-1/2 lg:w-1/3 bg-base-100 shadow-2xl z-50 overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">
                        Заявка #{{ $selectedQuestionare->id }}
                    </h2>
                    <button wire:click="closeDetails" class="btn btn-sm btn-circle btn-ghost">
                        ✕
                    </button>
                </div>

                <!-- Статус и кнопки действий -->
                <div class="mb-6 flex flex-col gap-5">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Статус</h3>
                        <span
                            class="badge {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$selectedQuestionare->status]['badge'] }}">
                            {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$selectedQuestionare->status]['label'] }}
                        </span>
                    </div>
                    @if ($selectedQuestionare->comment)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">Последний комментарий</h3>
                            <span class="text">
                                {{ $selectedQuestionare->comment }}
                            </span>
                        </div>
                    @endif
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

                    {{-- Ответственный --}}
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Ответственный менеджер</h3>
                        @if ($selectedQuestionare->user)
                            <div class="flex items-center p-3 bg-base-200 rounded-lg">
                                <div class="avatar mr-3">
                                    <div class="w-12 rounded-full">
                                        <img
                                            src="https://ui-avatars.com/api/?name={{ urlencode($selectedQuestionare->user->name) }}&background=4f46e5&color=fff" />
                                    </div>
                                </div>
                                <div>
                                    <p class="font-medium">{{ $selectedQuestionare->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $selectedQuestionare->user->email }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning mb-3">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="stroke-current flex-shrink-0 h-6 w-6 mr-2" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                    <span>Ответственный не назначен</span>
                                </div>
                            </div>
                        @endif

                        <!-- Детали -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 mb-1">Дата создания</h3>
                                <p class="text-base font-semibold">
                                    {{ $selectedQuestionare->created_at->format('d.m.Y H:i') }}
                                </p>
                            </div>
                        </div>

                        <!-- Дополнительные поля -->
                        @if ($selectedQuestionare->fields() && $selectedQuestionare->fields()->count() > 0)
                            <div class="mt-6">
                                <h3 class="text-lg font-semibold mb-3">Дополнительная информация</h3>
                                <div class="space-y-3">
                                    @foreach ($selectedQuestionare->fields as $field)
                                        <div class="collapse collapse-arrow border border-base-300">
                                            <input type="checkbox" class="peer" />

                                            <div class="collapse-title font-medium flex items-center justify-between">
                                                <div class="flex items-center gap-3">
                                                    <svg class="w-5 h-5 {{ \App\Helpers\QuestionareStatus::getIconColor($field->field_name) }}"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="{{ \App\Helpers\QuestionareStatus::getIcon($field->field_name) }}" />
                                                    </svg>
                                                    <span>{{ \App\Helpers\QuestionareStatus::getTitle($field->field_name) }}</span>
                                                </div>

                                                @php
                                                    // Для concurents считаем количество конкурентов
                                                    if (
                                                        $field->field_name === 'concurents' &&
                                                        is_array($field->field_value)
                                                    ) {
                                                        $count = count($field->field_value);
                                                    } elseif (is_array($field->field_value)) {
                                                        $count = count($field->field_value);
                                                    } else {
                                                        $count = null;
                                                    }
                                                @endphp

                                                @if ($count)
                                                    <span
                                                        class="badge badge-sm badge-neutral">{{ $count }}</span>
                                                @endif
                                            </div>

                                            <div class="collapse-content">
                                                <div class="space-y-2">
                                                    @if (is_array($field->field_value))
                                                        {{-- Для concurents: массив конкурентов --}}
                                                        @if ($field->field_name === 'concurents')
                                                            @foreach ($field->field_value as $index => $competitor)
                                                                @if (is_array($competitor) && !empty($competitor['name']))
                                                                    <div class="p-4 rounded-lg border mb-3 last:mb-0">
                                                                        <div class="space-y-3">
                                                                            @if (!empty($competitor['name']))
                                                                                <div>
                                                                                    <p
                                                                                        class="text-xs font-semibold text-gray-500 uppercase tracking-wide">
                                                                                        Название конкурента
                                                                                        {{ $index + 1 }}
                                                                                    </p>
                                                                                    <p
                                                                                        class="font-medium text-sm text-gray-900 mt-1">
                                                                                        {{ $competitor['name'] }}
                                                                                    </p>
                                                                                </div>
                                                                            @endif

                                                                            @if (!empty($competitor['url']))
                                                                                <div>
                                                                                    <p
                                                                                        class="text-xs font-semibold text-gray-500 uppercase tracking-wide">
                                                                                        Сайт
                                                                                    </p>
                                                                                    <p
                                                                                        class="text-sm text-gray-700 mt-1">
                                                                                        @if (filter_var($competitor['url'], FILTER_VALIDATE_URL))
                                                                                            <a href="{{ $competitor['url'] }}"
                                                                                                target="_blank"
                                                                                                class="text-sm font-normal text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-1">
                                                                                                <svg class="w-4 h-4"
                                                                                                    fill="none"
                                                                                                    stroke="currentColor"
                                                                                                    viewBox="0 0 24 24">
                                                                                                    <path
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round"
                                                                                                        stroke-width="2"
                                                                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                                                                </svg>
                                                                                                {{ $competitor['url'] }}
                                                                                            </a>
                                                                                        @else
                                                                                            {{ $competitor['url'] }}
                                                                                        @endif
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                            @if (count($field->field_value) === 0 ||
                                                                    (count($field->field_value) === 1 &&
                                                                        empty($field->field_value[0]['name']) &&
                                                                        empty($field->field_value[0]['url'])))
                                                                <div class="p-3 text-gray-500 text-sm italic">
                                                                    Конкуренты не указаны
                                                                </div>
                                                            @endif
                                                        @elseif ($field->field_name === 'urls')
                                                            @foreach ($field->field_value as $url)
                                                                <div class="p-3 rounded-lg border">
                                                                    @if (is_array($url))
                                                                        @foreach ($url as $item)
                                                                            @if (filter_var($item, FILTER_VALIDATE_URL))
                                                                                <a href="{{ $item }}"
                                                                                    target="_blank"
                                                                                    class="text-sm font-normal text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-2 mb-2 last:mb-0">
                                                                                    <svg class="w-5 h-5"
                                                                                        fill="none"
                                                                                        stroke="currentColor"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                                                    </svg>
                                                                                    <span
                                                                                        class="break-all">{{ $item }}</span>
                                                                                </a>
                                                                            @else
                                                                                <p class="text-sm text-gray-900">
                                                                                    {{ $item }}</p>
                                                                            @endif
                                                                        @endforeach
                                                                    @elseif (filter_var($url, FILTER_VALIDATE_URL))
                                                                        <a href="{{ $url }}" target="_blank"
                                                                            class="text-sm font-normal text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-2">
                                                                            <svg class="w-5 h-5" fill="none"
                                                                                stroke="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                                            </svg>
                                                                            <span
                                                                                class="break-all">{{ $url }}</span>
                                                                        </a>
                                                                    @else
                                                                        <p class="text-sm text-gray-900">
                                                                            {{ $url }}</p>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            {{-- Для других массивов --}}
                                                            @foreach ($field->field_value as $value)
                                                                <div class="p-3 rounded-lg border">
                                                                    @if (is_array($value))
                                                                        <div class="flex flex-wrap gap-1">
                                                                            @foreach ($value as $item)
                                                                                <span
                                                                                    class="badge badge-outline">{{ $item }}</span>
                                                                            @endforeach
                                                                        </div>
                                                                    @else
                                                                        <p class="text-sm text-gray-900">
                                                                            {{ $value }}</p>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        {{-- Для не-массивов --}}
                                                        <div class="p-3 rounded-lg border">
                                                            @if ($field->field_name === 'urls' && filter_var($field->field_value, FILTER_VALIDATE_URL))
                                                                <a href="{{ $field->field_value }}" target="_blank"
                                                                    class="text-sm font-normal text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-2">
                                                                    <svg class="w-5 h-5" fill="none"
                                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                                    </svg>
                                                                    <span
                                                                        class="break-all">{{ $field->field_value }}</span>
                                                                </a>
                                                            @else
                                                                <p class="text-sm text-gray-900">
                                                                    {{ $field->field_value }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Кнопки внизу панели -->
                    <div class="mt-8 pt-6 border-t border-gray-200 flex-col">
                        <details class="mb-3">
                            <summary class="cursor-pointer font-medium text-sm text-gray-700 mb-2">
                                История статусов ({{ $selectedQuestionare->statusHistory->count() }})
                            </summary>
                            <div class="mt-2 space-y-3 max-h-60 overflow-y-auto p-3 bg-base-100 rounded">
                                @forelse ($selectedQuestionare->statusHistory as $statusHistory)
                                    <div class="chat chat-start w-full">
                                        <div class="chat-bubble bg-base-300 text-gray-800">
                                            <div class="flex items-center gap-2">
                                                <span class="font-medium">
                                                    {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$selectedQuestionare->status]['label'] }}
                                                </span>
                                                <span class="text-xs opacity-75">
                                                    {{ $statusHistory->created_at->format('d.m.Y H:i') }}
                                                </span>
                                            </div>
                                            @if ($statusHistory->comment)
                                                <div class="mt-1 text-sm">{{ $statusHistory->comment }}</div>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-gray-400 text-sm italic">Нет истории статусов</div>
                                @endforelse
                            </div>
                        </details>

                        @if ($this->canEditStatus($selectedQuestionare))
                            <div class="flex flex-col justify-between gap-5 w-full">
                                <button type="button" wire:click='setShowSetStatus()'
                                    class="btn btn-outline w-full">Изменить
                                    статус</button>
                                @if ($showSetStatus)
                                    <select class="select w-full" wire:model='selectedStatus'>
                                        <option disabled selected>Выберите статус</option>
                                        @foreach (\App\Helpers\QuestionareStatus::$questionaresLabels as $status => $label)
                                            <option value="{{ $status }}">
                                                {{ $label['label'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <textarea class="textarea w-full" wire:model='selectedComment' type="text" placeholder="Комментарий"></textarea>

                                    <button wire:click='changeStatus()' type="button"
                                        class="btn btn-accent">Сохранить</button>
                                @endif
                            </div>
                        @endif
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
