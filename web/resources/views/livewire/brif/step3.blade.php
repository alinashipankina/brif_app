<div
    class="card w-full bg-white shadow-[0_4px_12px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.06)] transition-all duration-300 rounded-none border border-[#E8E8E8]">
    <div class="card-body p-6 md:p-10">
        @include('livewire.brif.partials.logo-summary', [
            'stepNumber' => $stepNumber,
            'totalSteps' => $totalSteps,
        ])

        <form wire:submit='save' class="space-y-6 md:space-y-8">
            @if (!in_array($serviceType, ['Аутстафф']))
                <div class="form-control">
                    <label class="label mb-1.5 md:mb-2">
                        <span
                            class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                            Какую продукцию нужно продвигать в первую очередь
                        </span>
                    </label>
                    <textarea wire:model.live='form.production'
                        placeholder="Опишите основные товары или услуги, которые требуют продвижения. Например: 'Строительные материалы для частных домов, акцент на кровельные материалы'"
                        class="textarea w-full border border-[#D0D0D0] focus:border-[#1A1A1A] bg-white text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm h-28 md:h-32 p-3 md:p-4"
                        rows="4"></textarea>
                    <label class="label mt-0.5 md:mt-1">
                        <span class="label-text-alt text-[#6B6B6B] text-xs">Опишите подробно для более точного
                            анализа</span>
                    </label>
                </div>

                <div class="form-control">
                    <div class="flex flex-col md:flex-row md:items-baseline md:gap-2 mb-1.5 md:mb-2">
                        <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                            Основные конкуренты в сети Интернет
                        </span>
                        <span class="label-text text-xs text-[#6B6B6B] italic md:italic">*название, ссылка на
                            сайт</span>
                    </div>
                    @error('form.concurents')
                        <label class="label">
                            <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                        </label>
                    @enderror

                    <div class="space-y-3 md:space-y-4">
                        @foreach ($form->concurents as $index => $concurent)
                            <div wire:key='concurent-{{ $index }}'
                                class="flex flex-col md:flex-row gap-2 md:gap-3">
                                <div class="flex-1">
                                    <input wire:model.live='form.concurents.{{ $index }}.name' type="text"
                                        placeholder="Название конкурента"
                                        class="w-full h-11 md:h-12 px-4 border border-[#D0D0D0] focus:border-[#1A1A1A] bg-white text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm
                                        @error('form.concurents.' . $index . '.name') border-[#8B0000] @enderror" />
                                    @error('form.concurents.' . $index . '.name')
                                        <label class="label">
                                            <span
                                                class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>

                                <div class="flex-1">
                                    <div class="relative">
                                        <div
                                            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-[#6B6B6B] z-10">
                                            <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                                </path>
                                            </svg>
                                        </div>
                                        <input wire:model.live='form.concurents.{{ $index }}.url' type="url"
                                            placeholder="https://конкурент1.com"
                                            class="w-full h-11 md:h-12 pl-9 md:pl-10 pr-4 border border-[#D0D0D0] focus:border-[#1A1A1A] bg-white text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm
                                            @error('form.concurents.' . $index . '.url') border-[#8B0000] @enderror" />
                                    </div>
                                    @error('form.concurents.' . $index . '.url')
                                        <label class="label">
                                            <span
                                                class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>

                                @if (count($form->concurents) > 1)
                                    <button wire:click='removeConcurent({{ $index }})' type="button"
                                        class="w-11 h-11 md:w-12 md:h-12 flex items-center justify-center text-[#6B6B6B] hover:text-[#8B0000] hover:bg-[#F5F5F5] transition-colors duration-200 rounded-none cursor-pointer">
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        @endforeach

                        <div class="mt-1 md:mt-2">
                            <button wire:click='addConcurent' type="button"
                                class="inline-flex items-center gap-1.5 md:gap-2 px-0 py-1.5 md:py-2 text-xs md:text-sm font-medium text-[#1A1A1A] hover:text-[#4A4A4A] border-b border-[#1A1A1A] hover:border-[#4A4A4A] transition-colors duration-200 cursor-pointer">
                                <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                Добавить конкурента
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @if ($serviceType === 'Аутстафф')
                <div class="form-control">
                    <label class="label mb-1.5 md:mb-2">
                        <span
                            class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                            Описание задач и требований</span>
                        <span class="label-text text-xs text-[#6B6B6B] italic">
                            *опишите подробнее для более точного подбора специалистов
                        </span>
                    </label>
                    <textarea wire:model.live='form.tasks_description'
                        placeholder="Опишите, какие задачи будут стоять перед специалистами. Например: 'Разработка интернет-магазина на Laravel, интеграция с 1С, поддержка существующих проектов'"
                        class="textarea w-full border border-[#D0D0D0] focus:border-[#1A1A1A] bg-white text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm h-28 md:h-32 p-3 md:p-4"
                        rows="4"></textarea>
                    @error('form.tasks_description')
                        <label class="label">
                            <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control">
                    <label class="label mb-1.5 md:mb-2">
                        <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                            Требуемый уровень специалистов
                        </span>
                        <span class="label-text text-xs text-[#6B6B6B] italic md:italic">*</span>
                    </label>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 md:gap-3">
                        @php
                            $levelOptions = [
                                'Junior' => 'Начальный уровень (опыт до 1 года)',
                                'Middle' => 'Средний уровень (опыт 2-4 года)',
                                'Senior' => 'Высокий уровень (опыт 5+ лет)',
                            ];
                        @endphp

                        @foreach ($levelOptions as $value => $description)
                            <label
                                class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                        @error('form.specialist_level') border-[#8B0000] @enderror">
                                <input wire:model.live='form.specialist_level' type="radio"
                                    value="{{ $value }}" name="specialist_level"
                                    class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                                <div class="ml-2 md:ml-3">
                                    <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">{{ $value }}</div>
                                    <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">{{ $description }}</div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('form.specialist_level')
                        <label class="label">
                            <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                {{-- Технологический стек --}}
                <div class="form-control">
                    <label class="label mb-1.5 md:mb-2">
                        <span
                            class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                            Технологический стек / Инструменты
                        </span>
                        <span class="label-text text-xs text-[#6B6B6B] italic">
                            *перечислите через запятую
                        </span>
                    </label>
                    <input type="text" wire:model.live='form.tech_stack'
                        placeholder="Например: PHP, Laravel, Vue.js, MySQL, Docker, Git"
                        class="input input-bordered w-full border-[#D0D0D0] focus:border-[#1A1A1A] bg-white h-11 md:h-12 px-4 text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm
                        @error('form.tech_stack') border-[#8B0000] @enderror" />
                    @error('form.tech_stack')
                        <label class="label">
                            <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                {{-- Наличие ТЗ и документации --}}
                <div class="form-control">
                    <label class="label mb-1.5 md:mb-2">
                        <span
                            class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                            Наличие технического задания (ТЗ)
                        </span>
                        <span class="label-text text-xs text-[#6B6B6B] italic md:italic">*</span>
                    </label>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 md:gap-3">
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                @error('form.has_tz') border-[#8B0000] @enderror">
                            <input wire:model.live='form.has_tz' type="radio" value="Есть полное ТЗ"
                                name="has_tz"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <div class="ml-2 md:ml-3">
                                <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">Есть полное ТЗ</div>
                                <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">Четкие требования и сроки
                                </div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                @error('form.has_tz') border-[#8B0000] @enderror">
                            <input wire:model.live='form.has_tz' type="radio" value="Есть общее описание"
                                name="has_tz"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <div class="ml-2 md:ml-3">
                                <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">Есть общее описание</div>
                                <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">Требуется детализация</div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                @error('form.has_tz') border-[#8B0000] @enderror">
                            <input wire:model.live='form.has_tz' type="radio" value="Нет ТЗ" name="has_tz"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <div class="ml-2 md:ml-3">
                                <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">Нет ТЗ</div>
                                <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">Нужна помощь в составлении
                                </div>
                            </div>
                        </label>
                    </div>
                    @error('form.has_tz')
                        <label class="label">
                            <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                {{-- Интеграция с командой --}}
                <div class="form-control">
                    <label class="label mb-1.5 md:mb-2">
                        <span
                            class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                            Требуется ли интеграция с вашей командой?
                        </span>
                        <span class="label-text text-xs text-[#6B6B6B] italic md:italic">*</span>
                    </label>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 md:gap-3">
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                @error('form.team_integration') border-[#8B0000] @enderror">
                            <input wire:model.live='form.team_integration' type="radio"
                                value="Да, полная интеграция" name="team_integration"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <div class="ml-2 md:ml-3">
                                <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">Полная интеграция</div>
                                <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">В наших каналах (Slack,
                                    Trello)
                                </div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                @error('form.team_integration') border-[#8B0000] @enderror">
                            <input wire:model.live='form.team_integration' type="radio"
                                value="Работа через выделенного PM" name="team_integration"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <div class="ml-2 md:ml-3">
                                <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">Через выделенного PM</div>
                                <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">Управление через Rocket
                                    Business
                                </div>
                            </div>
                        </label>
                    </div>
                    @error('form.team_integration')
                        <label class="label">
                            <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                {{-- Дополнительная информация --}}
                <div class="form-control">
                    <label class="label mb-1.5 md:mb-2">
                        <span
                            class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                            Дополнительная информация
                        </span>
                    </label>
                    <textarea wire:model.live='form.additional_info'
                        placeholder="Любая дополнительная информация, которую вы считаете важной (особенности проекта, пожелания к специалистам и т.д.)"
                        class="textarea w-full border border-[#D0D0D0] focus:border-[#1A1A1A] bg-white text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm h-24 md:h-28 p-3 md:p-4"
                        rows="3"></textarea>
                </div>
            @endif

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span
                        class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                        Сегмент потребителей компании
                    </span>
                    <span class="label-text text-xs text-[#6B6B6B] italic">
                        *можно выбрать несколько
                    </span>
                </label>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">
                    @foreach ([
        'B2C' => 'Business to Consumer',
        'B2B' => 'Business to Business',
        'B2G' => 'Business to Government',
    ] as $value => $description)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                    @error('form.segments') border-[#8B0000] @enderror">
                            <input wire:model.live='form.segments' type="checkbox" value="{{ $value }}"
                                class="checkbox checkbox-sm border-[#D0D0D0] [--chkbg:#1A1A1A] [--chkfg:white] rounded-none" />
                            <div class="ml-2 md:ml-3">
                                <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">{{ $value }}</div>
                                <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">{{ $description }}</div>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('form.segments')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        Где узнали о нас?
                    </span>
                </label>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 md:gap-3">
                    <label
                        class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white">
                        <input wire:model.live='form.marketing' type="radio" value="Поиск в Google/Yandex"
                            name="source"
                            class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                        <div class="ml-2 md:ml-3">
                            <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">Поиск в Google/Yandex</div>
                            <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">Нашли через поисковую систему
                            </div>
                        </div>
                    </label>

                    <label
                        class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white">
                        <input wire:model.live='form.marketing' type="radio" value="Рекомендация" name="source"
                            class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                        <div class="ml-2 md:ml-3">
                            <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">Рекомендация</div>
                            <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">Посоветовали коллеги или партнеры
                            </div>
                        </div>
                    </label>

                    <label
                        class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white">
                        <input wire:model.live='form.marketing' type="radio" value="Социальные сети"
                            name="source"
                            class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                        <div class="ml-2 md:ml-3">
                            <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">Социальные сети</div>
                            <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">ВКонтакте, Telegram</div>
                        </div>
                    </label>

                    <label
                        class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white">
                        <input wire:model.live='form.marketing' type="radio"
                            value="Контекстная или таргетированная реклама" name="source"
                            class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                        <div class="ml-2 md:ml-3">
                            <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">Реклама</div>
                            <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">Контекстная или таргет</div>
                        </div>
                    </label>
                </div>
            </div>

            <div class="mt-8 md:mt-10 bg-[#F9F9F9] p-4 md:p-6 border border-[#E8E8E8]">
                <div class="flex justify-between mb-2 md:mb-3">
                    <span class="text-xs font-medium text-[#4A4A4A] uppercase tracking-wider">Прогресс
                        заполнения</span>
                    <span class="text-xs font-medium text-[#1A1A1A]">75%</span>
                </div>
                <div class="w-full bg-[#E8E8E8] h-1">
                    <div class="bg-[#1A1A1A] h-1" style="width: 75%"></div>
                </div>
            </div>

            <div class="flex justify-between pt-4 md:pt-6 gap-3 md:gap-4">
                <button type="button" wire:click="goBack"
                    class="btn w-1/2 h-12 md:h-14 text-xs md:text-sm font-medium bg-white border border-[#D0D0D0] text-[#1A1A1A] hover:bg-[#F5F5F5] transition-colors duration-200 rounded-none uppercase tracking-wider">
                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1 md:mr-2" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Назад
                </button>
                <button type="submit"
                    class="btn w-1/2 h-12 md:h-14 text-xs md:text-sm font-medium bg-[#1A1A1A] hover:bg-[#2A2A2A] text-white border-0 transition-colors duration-200 rounded-none uppercase tracking-wider">
                    Далее
                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 ml-1 md:ml-2" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="text-center mt-6 md:mt-8">
                <p class="text-[#6B6B6B] text-xs">
                    <span class="text-[#4A4A4A]">*</span> Поля, обязательные для заполнения
                </p>
            </div>
        </form>
    </div>
</div>
