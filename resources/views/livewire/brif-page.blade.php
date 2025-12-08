<div class="card w-full bg-base-100">
    <div class="card-body p-8">
        <!-- Логотип и заголовок -->
        <div class="text-center mb-10">
            <div class="flex justify-center mb-4">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center">
                    <span class="text-white text-2xl font-bold">Л</span>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Бриф на оказание услуг</h1>
            <div class="flex items-center justify-center">
                <div class="badge badge-lg badge-primary px-4 py-3 font-semibold">
                    Шаг 1 из 4
                </div>
            </div>
        </div>

        <!-- Форма -->
        <form wire:submit='save' class="space-y-6">
            <!-- ФИО, название компании -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">ФИО, название компании *</span>
                </label>
                <input type="text" wire:model='form.name' placeholder="Иванов Иван Иванович, ООО 'Ромашка'"
                    class="input input-bordered w-full focus:input-primary focus:outline-none h-12" />
            </div>

            <!-- Должность -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">Должность</span>
                </label>
                <input type="text" wire:model='form.role' placeholder="Директор по развитию"
                    class="input input-bordered w-full focus:input-primary focus:outline-none h-12" />
            </div>

            <!-- Номер телефона с маской -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">Номер телефона*</span>
                </label>
                <div class="relative">
                    <input type="tel" wire:model='form.phone' placeholder="+7 (999) 999-99-99"
                        class="input input-bordered w-full focus:input-primary focus:outline-none h-12" />
                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
            </div>

            <!-- Почта с маской -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">Электронная почта*</span>
                </label>
                <div class="relative">
                    <input type="email" wire:model='form.email' placeholder="example@domain.ru"
                        class="input input-bordered w-full focus:input-primary focus:outline-none h-12" />
                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>

            <!-- Наименование необходимой услуги -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">Наименование необходимой услуги *</span>
                </label>
                <select wire:model='form.usluga'
                    class="select select-bordered w-full focus:select-primary focus:outline-none h-12">
                    <option disabled selected>Выберите услугу</option>
                    <option value="Разработка сайта">Разработка сайта</option>
                    <option value="Дизайн логотипа">Дизайн логотипа</option>
                    <option value="SEO-оптимизация">SEO-оптимизация</option>
                    <option value="Контекстная реклама">Контекстная реклама</option>
                    <option value="Копирайтинг">Копирайтинг</option>
                    <option value="Другое">Другое</option>
                </select>
            </div>

            <!-- Прогресс-бар -->
            <div class="mt-10">
                <div class="flex justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Прогресс заполнения</span>
                    <span class="text-sm font-medium text-gray-700">25%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-primary h-2.5 rounded-full" style="width: 25%"></div>
                </div>
            </div>

            <!-- Кнопка "Далее" -->
            <div class="pt-6">
                <button type="submit" class="btn btn-primary w-full h-14 text-lg font-semibold">
                    Далее
                    <i class="fas fa-arrow-right ml-2"></i>
                    </a>
            </div>

            <!-- Вспомогательный текст -->
            <div class="text-center mt-6">
                <p class="text-gray-500 text-sm">
                    * Поля, обязательные для заполнения
                </p>
                <p class="text-gray-500 text-sm mt-1">
                    Нажимая "Далее", вы соглашаетесь с
                    <a href="#" class="text-primary hover:underline">политикой конфиденциальности</a>
                </p>
            </div>
        </form>
    </div>
</div>
