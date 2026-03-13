<div
    class="card w-full bg-white shadow-[0_4px_12px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.06)] transition-all duration-300 rounded-none border border-[#E8E8E8]">

    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 mx-6 mt-6">
            {{ session('message') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 mx-6 mt-6">
            {{ session('error') }}
        </div>
    @endif

    @php
        if (app()->environment('local')) {
            \Illuminate\Support\Facades\Log::info('Step4 компонент загружен');
        }
    @endphp
    <div class="card-body p-6 md:p-10">
        @include('livewire.brif.partials.logo-summary', [
            'stepNumber' => $stepNumber,
            'totalSteps' => $totalSteps,
        ])

        <div class="mb-6 md:mb-8 p-4 md:p-6 bg-[#F9F9F9] border border-[#E8E8E8]">
            <div class="flex items-start">
                <svg class="w-4 h-4 md:w-5 md:h-5 mt-0.5 mr-2 md:mr-3 text-[#6B6B6B]" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h3 class="font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">Проверьте
                        введенную информацию</h3>
                    <div class="text-[10px] md:text-xs mt-1 text-[#6B6B6B]">
                        Пожалуйста, проверьте введенную Вами информацию ниже и при необходимости вернитесь на предыдущие
                        шаги для редактирования
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-4 md:space-y-6 mb-6 md:mb-8">
            <div class="border border-[#E8E8E8] bg-white">
                <div class="p-4 md:p-6">
                    <div class="flex justify-between items-start mb-4 md:mb-5">
                        <div class="flex items-center">
                            <div
                                class="w-7 h-7 md:w-8 md:h-8 bg-[#F5F5F5] text-[#1A1A1A] flex items-center justify-center mr-2 md:mr-3">
                                <span class="font-medium text-xs md:text-sm">1</span>
                            </div>
                            <h3 class="text-sm md:text-base font-medium text-[#1A1A1A] uppercase tracking-wider">
                                Основная информация</h3>
                        </div>
                        <a href="{{ route('brif.step1') }}"
                            class="inline-flex items-center gap-1 md:gap-1.5 px-2 md:px-3 py-1 md:py-1.5 text-[10px] md:text-xs font-medium text-[#1A1A1A] hover:text-[#4A4A4A] border border-[#D0D0D0] hover:bg-[#F5F5F5] transition-colors duration-200 rounded-none">
                            <svg class="w-3 h-3 md:w-3.5 md:h-3.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Изменить
                        </a>
                    </div>
                    @include('livewire.brif.partials.step1-summary', ['data' => $form])
                </div>
            </div>

            <div class="border border-[#E8E8E8] bg-white">
                <div class="p-4 md:p-6">
                    <div class="flex justify-between items-start mb-4 md:mb-5">
                        <div class="flex items-center">
                            <div
                                class="w-7 h-7 md:w-8 md:h-8 bg-[#F5F5F5] text-[#1A1A1A] flex items-center justify-center mr-2 md:mr-3">
                                <span class="font-medium text-xs md:text-sm">2</span>
                            </div>
                            <h3 class="text-sm md:text-base font-medium text-[#1A1A1A] uppercase tracking-wider">
                                @switch($serviceType)
                                    @case('SEO-продвижение')
                                        Детали SEO
                                    @break

                                    @case('Зарубежное SEO')
                                        Детали зарубежного SEO
                                    @break

                                    @case('GEO-продвижение')
                                        Детали GEO
                                    @break

                                    @case('Перформанс-маркетинг')
                                        Детали перформанс-маркетинга
                                    @break

                                    @case('SERM (управление репутацией)')
                                        Детали управления репутацией
                                    @break

                                    @case('Контент-поддержка')
                                        Детали контент-поддержки
                                    @break

                                    @case('Контекстная реклама')
                                        Детали контекстной рекламы
                                    @break

                                    @case('Веб-аналитика')
                                        Детали веб-аналитики
                                    @break

                                    @case('Аутстафф')
                                        Детали аутстаффа
                                    @break

                                    @default
                                        Детали проекта
                                @endswitch
                            </h3>
                        </div>
                        <a href="{{ route('brif.step2.' . $step2Route) }}"
                            class="inline-flex items-center gap-1 md:gap-1.5 px-2 md:px-3 py-1 md:py-1.5 text-[10px] md:text-xs font-medium text-[#1A1A1A] hover:text-[#4A4A4A] border border-[#D0D0D0] hover:bg-[#F5F5F5] transition-colors duration-200 rounded-none">
                            <svg class="w-3 h-3 md:w-3.5 md:h-3.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Изменить
                        </a>
                    </div>

                    @switch($serviceType)
                        @case('SEO-продвижение')
                            @include('livewire.brif.partials.seo-summary', ['data' => $form])
                        @break

                        @case('Зарубежное SEO')
                            @include('livewire.brif.partials.seo-foreign-summary', ['data' => $form])
                        @break

                        @case('GEO-продвижение')
                            @include('livewire.brif.partials.geo-summary', ['data' => $form])
                        @break

                        @case('Комплексное продвижение')
                            @include('livewire.brif.partials.performance-summary', ['data' => $form])
                        @break

                        @case('Контекстная реклама')
                            @include('livewire.brif.partials.context-summary', ['data' => $form])
                        @break

                        @case('SERM (управление репутацией)')
                            @include('livewire.brif.partials.serm-summary', ['data' => $form])
                        @break

                        @case('Контент-поддержка')
                            @include('livewire.brif.partials.content-summary', ['data' => $form])
                        @break

                        @case('Веб-аналитика')
                            @include('livewire.brif.partials.analytics-summary', ['data' => $form])
                        @break

                        @case('Аутстафф')
                            @include('livewire.brif.partials.outstaff-summary', ['data' => $form])
                        @break

                        @default
                            @include('livewire.brif.partials.seo-summary', ['data' => $form])
                    @endswitch
                </div>
            </div>

            <div class="border border-[#E8E8E8] bg-white">
                <div class="p-4 md:p-6">
                    <div class="flex justify-between items-start mb-4 md:mb-5">
                        <div class="flex items-center">
                            <div
                                class="w-7 h-7 md:w-8 md:h-8 bg-[#F5F5F5] text-[#1A1A1A] flex items-center justify-center mr-2 md:mr-3">
                                <span class="font-medium text-xs md:text-sm">3</span>
                            </div>
                            <h3 class="text-sm md:text-base font-medium text-[#1A1A1A] uppercase tracking-wider">
                                Дополнительная информация</h3>
                        </div>
                        <a href="{{ route('brif.step3') }}"
                            class="inline-flex items-center gap-1 md:gap-1.5 px-2 md:px-3 py-1 md:py-1.5 text-[10px] md:text-xs font-medium text-[#1A1A1A] hover:text-[#4A4A4A] border border-[#D0D0D0] hover:bg-[#F5F5F5] transition-colors duration-200 rounded-none">
                            <svg class="w-3 h-3 md:w-3.5 md:h-3.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Изменить
                        </a>
                    </div>

                    @include('livewire.brif.partials.step3-summary', ['data' => $form])
                </div>
            </div>
        </div>

        <div class="mb-6 md:mb-8 bg-[#F9F9F9] p-4 md:p-6 border border-[#E8E8E8]">
            <div class="flex justify-between mb-2 md:mb-3">
                <span class="text-xs font-medium text-[#4A4A4A] uppercase tracking-wider">Прогресс заполнения</span>
                <span class="text-xs font-medium text-[#1A1A1A]">100%</span>
            </div>
            <div class="w-full bg-[#E8E8E8] h-1">
                <div class="bg-[#1A1A1A] h-1" style="width: 100%"></div>
            </div>
            <div class="flex justify-center mt-2 md:mt-3">
                <div
                    class="inline-flex items-center gap-1.5 md:gap-2 px-2 md:px-3 py-1 md:py-1.5 text-[10px] md:text-xs font-medium text-[#1A1A1A] bg-[#F5F5F5] border border-[#E8E8E8]">
                    <svg class="w-3 h-3 md:w-3.5 md:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    Все данные заполнены
                </div>
            </div>
        </div>

        <div class="flex justify-between pt-2 md:pt-4 gap-3 md:gap-4">
            <button wire:click='save' type="button"
                class="btn w-full h-12 md:h-14 text-xs md:text-sm font-medium bg-[#1A1A1A] hover:bg-[#2A2A2A] text-white border-0 transition-colors duration-200 rounded-none uppercase tracking-wider shadow-none hover:shadow-none"
                id="submit-btn">
                <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1.5 md:mr-2" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M6 12L3.269 3.125A59.769 59.769 0 0121.485 12 59.768 59.768 0 013.27 20.875L5.999 12zm0 0h7.5" />
                </svg>
                Отправить бриф
            </button>
        </div>

        <div class="text-center mt-6 md:mt-8">
            <div class="bg-[#F9F9F9] p-4 md:p-5 border border-[#E8E8E8]">
                <div class="flex items-start">
                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mt-0.5 mr-2 md:mr-3 text-[#6B6B6B]" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                    <div class="text-left">
                        <h4 class="text-[10px] md:text-xs font-medium text-[#1A1A1A] uppercase tracking-wider">Ваши
                            данные защищены</h4>
                        <p class="text-[10px] md:text-xs text-[#6B6B6B] mt-1">
                            Отправляя эту форму, вы соглашаетесь с нашей
                            <a href="https://rbru.ru/privacy"
                                class="text-[#1A1A1A] hover:text-[#4A4A4A] underline underline-offset-2 transition-colors"
                                target="_blank">политикой конфиденциальности</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
