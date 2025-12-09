<div class="min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-lg p-12 w-full max-w-[800px]">
        <!-- Иконка -->
        <div class="mb-8">
            <div
                class="w-24 h-24 mx-auto bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center shadow-md">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Заголовок -->
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-3">
            Бриф успешно отправлен!
        </h1>

        <!-- Описание -->
        <p class="text-gray-600 text-center text-sm mb-5 max-w-xl mx-auto leading-relaxed">
            Спасибо за предоставленную информацию. Ваша заявка принята в обработку. Наш специалист свяжется с вами в
            ближайшее рабочее время для обсуждения деталей проекта.
        </p>

        <!-- Детали заявки -->
        <div class="mb-8">
            <div class="w-full mx-auto">
                <!-- Статус -->
                <div class="bg-blue-50 rounded-xl p-4">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                        <div>
                            <p class="text-xs text-gray-500">Статус</p>
                            <p class="font-medium text-sm text-gray-800">Заявка принята</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Таймлайн -->
        <div class="mb-10 max-w-2xl mx-auto">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs text-gray-500">Заявка отправлена</span>
                <span class="text-xs text-gray-500">Обработка</span>
                <span class="text-xs text-gray-500">Ответ</span>
            </div>
            <div class="flex h-2 bg-gray-200 rounded-full overflow-hidden">
                <div class="w-1/3 bg-green-500"></div>
                <div class="w-1/3 bg-blue-400 animate-pulse"></div>
                <div class="w-1/3 bg-gray-300"></div>
            </div>
        </div>

        <!-- Контактная информация -->
        <div class="mb-8 max-w-2xl mx-auto">
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 text-sm">
                <div class="flex items-center text-gray-600">
                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"
                            clip-rule="evenodd" />
                    </svg>
                    8 (800) 123-45-67
                </div>
                <div class="hidden sm:block text-gray-300">•</div>
                <div class="flex items-center text-gray-600">
                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    info@lalala.ru
                </div>
            </div>
        </div>

        <!-- Кнопки -->
        <div class="space-y-4 max-w-md mx-auto mb-8">
            <a href="/"
                class="block w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold py-3 rounded-xl text-center hover:shadow-md transition-shadow text-sm">
                Заполнить новую заявку
            </a>
        </div>

        <!-- Подпись -->
        <div class="pt-6 border-t border-gray-200 text-center max-w-xl mx-auto">
            <p class="text-gray-400 text-xs">
                С уважением, команда компании Лалалала
            </p>
            <p class="text-gray-400 text-xs mt-1">
                Рабочие дни: Пн-Пт, 9:00-18:00
            </p>
        </div>
    </div>
</div>
