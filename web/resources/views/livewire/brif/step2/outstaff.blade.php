<div
    class="card w-full bg-white shadow-[0_4px_12px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.06)] transition-all duration-300 rounded-none border border-[#E8E8E8]">
    <div class="card-body p-8 md:p-10">
        @include('livewire.brif.partials.logo-summary', [
            'stepNumber' => $stepNumber,
            'totalSteps' => $totalSteps,
        ])

        <form wire:submit='save' class="space-y-8" wire:ignore.self>
            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span
                        class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                        Какой специалист требуется
                    </span>
                    <span class="label-text text-xs text-[#6B6B6B] italic">
                        *можно выбрать несколько
                    </span>
                </label>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">
                    @foreach ([
        'SEO-специалист' => 'SEO-специалист',
        'Директолог' => 'Директолог',
        'Копирайтер' => 'Копирайтер',
        'UX/UI-дизайнер' => 'UX/UI-дизайнер',
        'Frontend-программист' => 'Frontend-программист',
        'Backend-программист' => 'Backend-программист',
        'Тестировщик' => 'Тестировщик',
        'Project Manager' => 'Project Manager',
    ] as $value => $description)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                    @error('form.specialists') border-[#8B0000] @enderror">
                            <input wire:model.live='form.specialists' type="checkbox" value="{{ $value }}"
                                class="checkbox checkbox-sm border-[#D0D0D0] [--chkbg:#1A1A1A] [--chkfg:white] rounded-none" />
                            <div class="ml-2 md:ml-3">
                                <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">{{ $value }}</div>
                                <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">{{ $description }}</div>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('form.specialists')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span
                        class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                        Количество специалистов <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                @error('form.specialist_count')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
                <input wire:model.live='form.specialist_count' type="text" placeholder="1"
                    class="input input-bordered w-full border-[#D0D0D0] focus:border-[#1A1A1A] bg-white h-11 md:h-12 px-4 text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm
                        @error('form.specialist_count') border-[#8B0000] @enderror" />
            </div>


            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        На какой срок требуются специалисты <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                @error('form.work_period')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
                <div class="grid grid-cols-1 gap-2 md:grid-cols-3 md:gap-3">
                    @foreach (['Разовая задача', 'Проект', 'Постоянно'] as $value)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white @error('form.work_period') border-[#8B0000] @enderror">
                            <input wire:model.live='form.work_period' type="radio" value="{{ $value }}"
                                name="work_period"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <span class="ml-2 md:ml-3 text-xs md:text-sm text-[#1A1A1A]">{{ $value }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        Какой формат работы предпочтителен <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                @error('form.work_format')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
                <div class="grid grid-cols-1 gap-2 md:grid-cols-3 md:gap-3">
                    @foreach (['Удаленно', 'В офисе', 'Гибрид'] as $value)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white @error('form.work_format') border-[#8B0000] @enderror">
                            <input wire:model.live='form.work_format' type="radio" value="{{ $value }}"
                                name="work_format"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <span class="ml-2 md:ml-3 text-xs md:text-sm text-[#1A1A1A]">{{ $value }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        Был ли опыт аутстаффа ранее <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                @error('form.has_experience')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
                <div class="grid grid-cols-2 gap-2 md:grid-cols-2 md:gap-3">
                    @foreach (['Да', 'Нет'] as $value)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white @error('form.has_experience') border-[#8B0000] @enderror">
                            <input wire:model.live='form.has_experience' type="radio" value="{{ $value }}"
                                name="has_experience"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <span class="ml-2 md:ml-3 text-xs md:text-sm text-[#1A1A1A]">{{ $value }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span
                        class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                        Бюджет на аутстафф
                    </span>
                    <span class="label-text text-xs text-[#6B6B6B] italic">*в месяц или на проект</span>
                </label>

                @error('form.project_budget')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror

                <div class="space-y-2">
                    @foreach ([
        'от 50к до 100к рублей' => 'от 50 000 до 100 000 ₽',
        'от 100к до 200к рублей' => 'от 100 000 до 200 000 ₽',
        'от 200к до 400к рублей' => 'от 200 000 до 400 000 ₽',
        'от 400к рублей' => 'от 400 000 ₽',
    ] as $value => $label)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                    @error('form.project_budget') border-[#8B0000] @enderror">
                            <input wire:model.live='form.project_budget' type="radio" name="project_budget"
                                value="{{ $value }}"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <span class="ml-2 md:ml-3 text-xs md:text-sm text-[#1A1A1A]">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 md:mt-10 bg-[#F9F9F9] p-4 md:p-6 border border-[#E8E8E8]">
                <div class="flex justify-between mb-2 md:mb-3">
                    <span class="text-xs font-medium text-[#4A4A4A] uppercase tracking-wider">Прогресс
                        заполнения</span>
                    <span class="text-xs font-medium text-[#1A1A1A]">50%</span>
                </div>
                <div class="w-full bg-[#E8E8E8] h-1">
                    <div class="bg-[#1A1A1A] h-1" style="width: 50%"></div>
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
