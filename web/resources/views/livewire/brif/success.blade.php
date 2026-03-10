<div class="min-h-screen flex items-center justify-center p-3 sm:p-4 bg-white">
    <div class="bg-white border border-[#E8E8E8] p-5 sm:p-8 md:p-12 w-full max-w-[800px]">
        <!-- Отладочная информация (внутри основного контейнера) -->
        {{-- @if (isset($brifData) && $brifData)
            <div class="mb-4 p-3 bg-green-100 border border-green-500 text-green-700 text-xs">
                ✅ Данные найдены
            </div>
        @elseif(session('error'))
            <div class="mb-4 p-3 bg-red-100 border border-red-500 text-red-700 text-xs">
                ❌ {{ session('error') }}
            </div>
        @else
            <div class="mb-4 p-3 bg-yellow-100 border border-yellow-500 text-yellow-700 text-xs">
                ⚠️ Данные не найдены в сессии
            </div>
        @endif --}}

        <div class="mb-5 sm:mb-6 md:mb-8 flex justify-center">
            <div
                class="w-16 h-16 sm:w-18 sm:h-18 md:w-20 md:h-20 border border-[#1A1A1A] flex items-center justify-center">
                <svg class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 text-[#1A1A1A]" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <h1 class="text-2xl sm:text-2xl md:text-3xl font-light text-center text-[#1A1A1A] mb-3 sm:mb-4 tracking-tight">
            Бриф успешно отправлен
        </h1>

        <p
            class="text-[#6B6B6B] text-center text-xs sm:text-sm mb-6 sm:mb-8 md:mb-10 max-w-xl mx-auto leading-relaxed px-2 sm:px-4">
            Спасибо за предоставленную информацию. Наш специалист свяжется с вами в ближайшее рабочее время.
        </p>

        <div class="mb-6 sm:mb-8 md:mb-10 flex justify-center">
            <div
                class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5 bg-[#F5F5F5] border border-[#E8E8E8]">
                <span class="w-1.5 h-1.5 bg-[#1A1A1A]"></span>
                <span class="text-[10px] sm:text-xs font-medium text-[#1A1A1A] uppercase tracking-wider">Заявка
                    принята</span>
            </div>
        </div>

        <div class="mb-8 sm:mb-10 md:mb-12 max-w-md mx-auto px-2 sm:px-0">
            <div class="flex justify-between mb-2 sm:mb-3">
                <span class="text-[10px] sm:text-xs text-[#8A8D94] uppercase tracking-wider">Отправка</span>
                <span
                    class="text-[10px] sm:text-xs text-[#1A1A1A] uppercase tracking-wider font-medium">Обработка</span>
                <span class="text-[10px] sm:text-xs text-[#8A8D94] uppercase tracking-wider">Ответ</span>
            </div>
            <div class="flex h-1 bg-[#E8E8E8]">
                <div class="w-1/3 bg-[#1A1A1A]"></div>
                <div class="w-1/3 bg-[#1A1A1A]"></div>
                <div class="w-1/3 bg-[#E8E8E8]"></div>
            </div>
        </div>

        <div
            class="mb-8 sm:mb-10 md:mb-12 flex flex-col sm:flex-row justify-center items-center gap-3 sm:gap-6 text-xs sm:text-sm">
            <div class="flex items-center gap-2 text-[#4A4A4A]">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#1A1A1A]" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                    </path>
                </svg>
                8 (863) 270-09-40
            </div>
            <span class="hidden sm:inline text-[#D0D0D0]">|</span>
            <div class="flex items-center gap-2 text-[#4A4A4A]">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#1A1A1A]" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
                m@rbru.ru
            </div>
        </div>

        @if ($brifData)
            <div class="flex justify-center gap-3 md:gap-4 mb-2 md:mb-4">
                <button wire:click="downloadBrif"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 text-xs md:text-sm font-medium bg-white border border-[#1A1A1A] text-[#1A1A1A] hover:bg-[#F5F5F5] transition-colors duration-200 rounded-none uppercase tracking-wider cursor-pointer w-full sm:w-auto">
                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Скачать бриф (PDF)
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-3 bg-[#FEF2F2] border border-[#8B0000] text-[#8B0000] text-xs text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="max-w-sm mx-auto mb-6 sm:mb-10 md:mb-12 px-3 sm:px-0">
            <button wire:click="goBack"
                class="block w-full bg-[#1A1A1A] hover:bg-[#2A2A2A] text-white text-xs sm:text-sm font-medium py-3 sm:py-4 text-center transition-colors duration-200 tracking-wider uppercase">
                Новая заявка
            </button>
        </div>

        <div class="text-center">
            <p class="text-[#8A8D94] text-[10px] sm:text-xs uppercase tracking-wider">
                С уважением, команда Rocket Business
            </p>
            <p class="text-[#8A8D94] text-[10px] sm:text-xs mt-1 uppercase tracking-wider">
                Пн-Пт, 9:00-18:00
            </p>
        </div>
    </div>
</div>
