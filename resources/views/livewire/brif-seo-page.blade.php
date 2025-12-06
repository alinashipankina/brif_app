<x-layouts.app>
<div class="card w-full max-w-3xl bg-base-100 shadow-xl flex justify-center">
        <div class="card-body p-8">
            <!-- Логотип и заголовок -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">Л</span>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Бриф на оказание услуг</h1>
                <div class="flex items-center justify-center">
                    <div class="badge badge-lg badge-primary px-4 py-3 font-semibold">
                        Шаг 2 из 4
                    </div>
                </div>
            </div>

            <!-- Форма -->
            <form class="space-y-6">
                <!-- Ссылка на сайт -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold text-gray-700">
                            Ссылка на сайт, который нужно продвигать (если их несколько, укажите все сайты)*
                        </span>
                    </label>
                    <div class="relative">
                        <input type="url" placeholder="https://example.com"
                               class="input input-bordered w-full focus:input-primary focus:outline-none h-12" />
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                            <i class="fas fa-link"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-ghost btn-sm text-primary gap-1">
                            <i class="fas fa-plus"></i>
                            Добавить еще сайт
                        </button>
                    </div>
                </div>

                <!-- Основная сфера деятельности компании -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold text-gray-700">
                            Основная сфера деятельности компании
                        </span>
                    </label>
                    <select class="select select-bordered w-full focus:select-primary focus:outline-none h-12">
                        <option disabled selected>Выберите сферу деятельности</option>
                        <option>Интернет-магазин</option>
                        <option>Услуги для бизнеса (B2B)</option>
                        <option>Услуги для населения (B2C)</option>
                        <option>Производство</option>
                        <option>Образование</option>
                        <option>Медицина</option>
                        <option>Недвижимость</option>
                        <option>Строительство</option>
                        <option>Туризм и гостиницы</option>
                        <option>Другое</option>
                    </select>
                </div>

                <!-- Как давно компания на рынке -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold text-gray-700">
                            Как давно компания на рынке
                        </span>
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                        <label class="cursor-pointer label justify-start gap-3 p-4 border rounded-lg hover:border-primary">
                            <input type="radio" name="experience" class="radio radio-primary" />
                            <span class="label-text">Менее года</span>
                        </label>
                        <label class="cursor-pointer label justify-start gap-3 p-4 border rounded-lg hover:border-primary">
                            <input type="radio" name="experience" class="radio radio-primary" />
                            <span class="label-text">1-3 года</span>
                        </label>
                        <label class="cursor-pointer label justify-start gap-3 p-4 border rounded-lg hover:border-primary">
                            <input type="radio" name="experience" class="radio radio-primary" />
                            <span class="label-text">3-5 лет</span>
                        </label>
                        <label class="cursor-pointer label justify-start gap-3 p-4 border rounded-lg hover:border-primary">
                            <input type="radio" name="experience" class="radio radio-primary" />
                            <span class="label-text">Более 5 лет</span>
                        </label>
                    </div>
                </div>

                <!-- По каким городам/странам нужно продвижение -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold text-gray-700">
                            По каким городам/странам нужно продвижение *
                        </span>
                    </label>
                    <input type="text" placeholder="Москва, Санкт-Петербург, Россия"
                           class="input input-bordered w-full focus:input-primary focus:outline-none h-12" />
                </div>

                <!-- Комфортная сумма расходов на SEO-продвижение -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold text-gray-700">
                            Комфортная сумма расходов на SEO-продвижение в месяц *
                        </span>
                    </label>

                    <div class="space-y-3">
                        <!-- Вариант 1 -->
                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary">
                            <input type="radio" name="budget" class="radio radio-primary mr-3" />
                            <div>
                                <span class="font-medium">от 40к до 100к рублей в месяц</span>
                                <div class="mt-1">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-chart-line mr-1"></i>
                                        <span>Базовое продвижение, до 50 ключевых слов</span>
                                    </div>
                                </div>
                            </div>
                        </label>

                        <!-- Вариант 2 -->
                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary">
                            <input type="radio" name="budget" class="radio radio-primary mr-3" />
                            <div>
                                <span class="font-medium">от 100к до 250к рублей в месяц</span>
                                <div class="mt-1">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        <span>Комплексное продвижение, до 200 ключевых слов</span>
                                    </div>
                                </div>
                            </div>
                        </label>

                        <!-- Другие варианты -->
                        {{-- <div class="collapse collapse-arrow border rounded-lg">
                            <input type="checkbox" class="peer" />
                            <div class="collapse-title font-medium text-gray-700">
                                <i class="fas fa-ellipsis-h mr-2"></i>
                                и другие варианты...
                            </div>
                            <div class="collapse-content">
                                <div class="space-y-3 pt-3">
                                    <label class="flex items-center p-3 cursor-pointer hover:bg-gray-50 rounded">
                                        <input type="radio" name="budget" class="radio radio-primary mr-3" />
                                        <span>до 40к рублей в месяц</span>
                                    </label>
                                    <label class="flex items-center p-3 cursor-pointer hover:bg-gray-50 rounded">
                                        <input type="radio" name="budget" class="radio radio-primary mr-3" />
                                        <span>от 250к до 500к рублей в месяц</span>
                                    </label>
                                    <label class="flex items-center p-3 cursor-pointer hover:bg-gray-50 rounded">
                                        <input type="radio" name="budget" class="radio radio-primary mr-3" />
                                        <span>более 500к рублей в месяц</span>
                                    </label>
                                    <label class="flex items-center p-3 cursor-pointer hover:bg-gray-50 rounded">
                                        <input type="radio" name="budget" class="radio radio-primary mr-3" />
                                        <span>Не определились с бюджетом</span>
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- Прогресс-бар -->
                <div class="mt-10">
                    <div class="flex justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700">Прогресс заполнения</span>
                        <span class="text-sm font-medium text-gray-700">50%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-primary h-2.5 rounded-full" style="width: 50%"></div>
                    </div>
                </div>

                <!-- Кнопки навигации -->
                <div class="flex justify-between pt-6 gap-4">
                    <a type="button" href="/" class="btn btn-outline btn-ghost w-1/2 h-14 text-lg font-semibold">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Назад
                    </a>
                    <a type="button" href="/brif-step-third" class="btn btn-primary w-1/2 h-14 text-lg font-semibold">
                        Далее
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Вспомогательный текст -->
                <div class="text-center mt-6">
                    <p class="text-gray-500 text-sm">
                        * Поля, обязательные для заполнения
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
