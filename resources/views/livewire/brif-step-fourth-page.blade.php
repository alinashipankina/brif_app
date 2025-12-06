<x-layouts.app>
<div class="card w-full max-w-4xl bg-base-100 shadow-xl">
        <div class="card-body p-8">
            <!-- Логотип и заголовок -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-blue-600 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-check text-white text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Бриф на оказание услуг</h1>
                <div class="flex items-center justify-center">
                    <div class="badge badge-lg badge-success px-4 py-3 font-semibold">
                        <i class="fas fa-check-circle mr-2"></i>
                        Шаг 4 из 4
                    </div>
                </div>
            </div>

            <!-- Информационное сообщение -->
            <div class="alert alert-info mb-8">
                <div class="flex items-start">
                    <i class="fas fa-info-circle text-xl mt-0.5 mr-3"></i>
                    <div>
                        <h3 class="font-bold">Проверьте введенную информацию</h3>
                        <div class="text-sm mt-1">
                            Пожалуйста, проверьте введенную Вами информацию ниже и при необходимости вернитесь на предыдущие шаги для редактирования
                        </div>
                    </div>
                </div>
            </div>

            <!-- Сводка данных -->
            <div class="space-y-6 mb-8">
                <!-- Шаг 1: Основная информация -->
                <div class="card info-card bg-base-100 border shadow-sm">
                    <div class="card-body p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mr-3">
                                    <span class="font-bold">1</span>
                                </div>
                                <h3 class="card-title text-lg font-bold text-gray-800">Основная информация</h3>
                            </div>
                            <a type="button" class="btn btn-sm btn-outline btn-primary edit-btn" data-step="1">
                                <i class="fas fa-edit mr-2"></i>Изменить
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">ФИО, компания:</span>
                                    <p class="font-medium">Иванов Иван Иванович, ООО "Ромашка"</p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Должность:</span>
                                    <p class="font-medium">Директор по развитию</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Телефон:</span>
                                    <p class="font-medium">+7 (999) 123-45-67</p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Email:</span>
                                    <p class="font-medium">ivanov@romashka.ru</p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Услуга:</span>
                                    <p class="font-medium">SEO-продвижение</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Шаг 2: Детали проекта -->
                <div class="card info-card bg-base-100 border shadow-sm">
                    <div class="card-body p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3">
                                    <span class="font-bold">2</span>
                                </div>
                                <h3 class="card-title text-lg font-bold text-gray-800">Детали проекта</h3>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline btn-primary edit-btn" data-step="2">
                                <i class="fas fa-edit mr-2"></i>Изменить
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Сайты для продвижения:</span>
                                    <p class="font-medium">https://romashka.ru</p>
                                    <p class="font-medium">https://shop.romashka.ru</p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Сфера деятельности:</span>
                                    <p class="font-medium">Интернет-магазин</p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Опыт на рынке:</span>
                                    <p class="font-medium">3-5 лет</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">География продвижения:</span>
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        <span class="badge badge-outline">Москва</span>
                                        <span class="badge badge-outline">Санкт-Петербург</span>
                                        <span class="badge badge-outline">Вся Россия</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Бюджет на SEO:</span>
                                    <p class="font-medium">от 100к до 250к рублей в месяц</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Шаг 3: Дополнительная информация -->
                <div class="card info-card bg-base-100 border shadow-sm">
                    <div class="card-body p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center mr-3">
                                    <span class="font-bold">3</span>
                                </div>
                                <h3 class="card-title text-lg font-bold text-gray-800">Дополнительная информация</h3>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline btn-primary edit-btn" data-step="3">
                                <i class="fas fa-edit mr-2"></i>Изменить
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Продукция для продвижения:</span>
                                    <p class="font-medium">Строительные материалы для частных домов, акцент на кровельные материалы и фасадные системы</p>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Основные конкуренты:</span>
                                    <div class="space-y-1 mt-1">
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-building text-gray-400"></i>
                                            <span class="font-medium">СтройМаркет</span>
                                            <a href="#" class="text-primary text-sm hover:underline">(сайт)</a>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-building text-gray-400"></i>
                                            <span class="font-medium">ДомСтрой</span>
                                            <a href="#" class="text-primary text-sm hover:underline">(сайт)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Сегмент потребителей:</span>
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        <span class="badge badge-primary">B2C</span>
                                        <span class="badge badge-secondary">B2B</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Источник информации о нас:</span>
                                    <p class="font-medium">Рекомендация коллег</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Прогресс-бар -->
            <div class="mb-8">
                <div class="flex justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Прогресс заполнения</span>
                    <span class="text-sm font-medium text-gray-700">100%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-success h-2.5 rounded-full" style="width: 100%"></div>
                </div>
                <div class="text-center mt-2">
                    <div class="badge badge-success gap-2">
                        <i class="fas fa-check"></i>
                        Все данные заполнены
                    </div>
                </div>
            </div>

            <!-- Кнопки навигации -->
            <div class="flex justify-between pt-4 gap-4">
                <button type="button" class="btn btn-success w-full h-14 text-lg font-semibold" id="submit-btn">
                    Отправить
                    <i class="fas fa-paper-plane ml-2"></i>
                </button>
            </div>

            <!-- Дополнительная информация -->
            <div class="text-center mt-8">
                <div class="alert alert-success">
                    <div class="flex items-start">
                        <i class="fas fa-shield-alt text-xl mt-0.5 mr-3"></i>
                        <div class="text-left">
                            <h4 class="font-bold">Ваши данные защищены</h4>
                            <p class="text-sm mt-1">
                                Отправляя эту форму, вы соглашаетесь с нашей
                                <a href="#" class="link link-primary">политикой конфиденциальности</a>.
                                Мы свяжемся с вами в течение 24 часов.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
