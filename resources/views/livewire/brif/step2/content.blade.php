<div
    class="card w-full bg-white shadow-[0_4px_12px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.06)] transition-all duration-300 rounded-none border border-[#E8E8E8]">
    <div class="card-body p-8 md:p-10">
        @include('livewire.brif.partials.logo-summary')

        <form wire:submit='save' class="space-y-8" wire:ignore.self>
            <div class="form-control">
                <div class="flex flex-col md:flex-row md:items-baseline md:gap-2 mb-2">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        Ссылка на сайт
                    </span>
                    <span class="label-text text-xs text-[#6B6B6B] italic">
                        *если их несколько, укажите все сайты
                    </span>
                </div>

                @foreach ($form->urls as $index => $url)
                    <div wire:key='url-{{ $index }}' class="mt-2 md:mt-3 flex items-start">
                        <div class="relative flex-1">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-[#6B6B6B]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                    </path>
                                </svg>
                            </div>
                            <input type="text" wire:model.live='form.urls.{{ $index }}'
                                placeholder="https://example.com"
                                class="w-full h-11 md:h-12 pl-10 pr-4 border border-[#D0D0D0] focus:border-[#1A1A1A] bg-white text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm
                                    @error('form.urls.' . $index) border-[#8B0000] @enderror" />
                            @error('form.urls.' . $index)
                                <p class="mt-1 text-xs text-[#8B0000]">{{ $message }}</p>
                            @enderror
                        </div>
                        @if (count($form->urls) > 1)
                            <button type="button" wire:click='removeUrl({{ $index }})'
                                class="ml-2 w-11 h-11 md:w-12 md:h-12 flex items-center justify-center text-[#6B6B6B] hover:text-[#8B0000] hover:bg-[#F5F5F5] transition-colors duration-200 rounded-none cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        @endif
                    </div>
                @endforeach

                @error('form.urls')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror

                <div class="mt-2 md:mt-3">
                    <button type="button" wire:click='addUrl'
                        class="inline-flex items-center gap-2 px-0 py-2 text-xs md:text-sm font-medium text-[#1A1A1A] hover:text-[#4A4A4A] border-b border-[#1A1A1A] hover:border-[#4A4A4A] transition-colors duration-200 cursor-pointer">
                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Добавить еще сайт
                    </button>
                </div>
            </div>

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span
                        class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                        Основная сфера деятельности компании <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                @error('form.business_sphere')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
                <select wire:model.live='form.business_sphere'
                    class="select select-bordered w-full border-[#D0D0D0] focus:border-[#1A1A1A] bg-white h-11 md:h-12 px-4 text-[#1A1A1A] rounded-none text-sm">
                    <option disabled selected value="" class="text-[#9A9A9A]">Выберите сферу деятельности</option>
                    <option value="Интернет-магазин">Интернет-магазин</option>
                    <option value="Услуги для бизнеса (B2B)">Услуги для бизнеса (B2B)</option>
                    <option value="Услуги для населения (B2C)">Услуги для населения (B2C)</option>
                    <option value="Производство">Производство</option>
                    <option value="Образование">Образование</option>
                    <option value="Медицина">Медицина</option>
                    <option value="Недвижимость">Недвижимость</option>
                    <option value="Строительство">Строительство</option>
                    <option value="Туризм и гостиницы">Туризм и гостиницы</option>
                    <option value="Другое">Другое</option>
                </select>
            </div>

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span
                        class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                        Какой контент требуется?
                    </span>
                    <span class="label-text text-xs text-[#6B6B6B] italic">
                        *можно выбрать несколько
                    </span>
                </label>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">
                    @foreach ([
        'Тексты для страниц сайта' => 'Тексты для страниц сайта',
        'Статьи в блог' => 'Статьи в блог',
        'Новости' => 'Новости',
        'Посты для соцсетей' => 'Посты для соцсетей',
        'Email-рассылки' => 'Email-рассылки',
        'Другое' => 'Другое',
    ] as $value => $description)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                    @error('form.content_types') border-[#8B0000] @enderror">
                            <input wire:model.live='form.content_types' type="checkbox" value="{{ $value }}"
                                class="checkbox checkbox-sm border-[#D0D0D0] [--chkbg:#1A1A1A] [--chkfg:white] rounded-none" />
                            <div class="ml-2 md:ml-3">
                                <div class="font-medium text-[#1A1A1A] text-xs md:text-sm">{{ $value }}</div>
                                <div class="text-[10px] md:text-xs text-[#6B6B6B] mt-0.5">{{ $description }}</div>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('form.content_types')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span
                        class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                        Примерный объем контента в месяц
                    </span>
                    <span class="label-text text-xs text-[#6B6B6B] italic">
                        *количество страниц/постов/статей
                    </span>
                </label>
                @error('form.content_volume')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
                <input wire:model.live='form.content_volume' type="text" placeholder="5 статей"
                    class="input input-bordered w-full border-[#D0D0D0] focus:border-[#1A1A1A] bg-white h-11 md:h-12 px-4 text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm
                        @error('form.content_volume') border-[#8B0000] @enderror" />
            </div>


            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        Есть ли у вас готовый контент-план <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                @error('form.has_content_plan')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
                <div class="grid grid-cols-1 gap-2 md:grid-cols-3 md:gap-3">
                    @foreach (['Да', 'Нет', 'Требуется разработка'] as $value)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white @error('form.has_content_plan') border-[#8B0000] @enderror">
                            <input wire:model.live='form.has_content_plan' type="radio"
                                value="{{ $value }}" name="has_content_plan"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <span class="ml-2 md:ml-3 text-xs md:text-sm text-[#1A1A1A]">{{ $value }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-control">
                <label class="label mb-1.5 md:mb-2">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        Нужна ли публикация контента на сайте <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                @error('form.needs_publishing')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
                <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-3">
                    @foreach (['Да', 'Нет'] as $value)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white @error('form.needs_publishing') border-[#8B0000] @enderror">
                            <input wire:model.live='form.needs_publishing' type="radio"
                                value="{{ $value }}" name="needs_publishing"
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
                        Бюджет на управление репутацией в месяц
                    </span>
                    <span class="text-[#6B6B6B]">*</span>
                </label>

                @error('form.monthly_budget')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror

                <div class="space-y-2">
                    @foreach ([
        'от 30к до 50к рублей в месяц' => 'от 30 000 до 50 000 ₽',
        'от 50к до 100к рублей в месяц' => 'от 50 000 до 100 000 ₽',
        'от 100к до 200к рублей в месяц' => 'от 100 000 до 200 000 ₽',
        'от 200к рублей в месяц' => 'от 200 000 ₽',
    ] as $value => $label)
                        <label
                            class="flex items-center p-3 md:p-4 border border-[#D0D0D0] hover:border-[#1A1A1A] cursor-pointer transition-colors duration-200 bg-white
                                    @error('form.monthly_budget') border-[#8B0000] @enderror">
                            <input wire:model.live='form.monthly_budget' type="radio" name="monthly_budget"
                                value="{{ $value }}"
                                class="radio radio-xs border-[#D0D0D0] checked:bg-[#1A1A1A] checked:border-[#1A1A1A] bg-white" />
                            <span class="ml-2 md:ml-3 text-xs md:text-sm text-[#1A1A1A]">{{ $label }}</span>
                        </label>
                    @endforeach
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 19l-7-7 7-7">
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
