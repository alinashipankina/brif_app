<div class="card w-full bg-base-100">
    <div class="card-body p-8">
        <!-- Логотип и заголовок -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center">
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
        <form wire:submit='save' class="space-y-6" wire:ignore.self>
            <!-- Ссылка на сайт -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">
                        Ссылка на сайт, который нужно продвигать (если их несколько, укажите все сайты)*
                    </span>
                </label>

                @foreach ($form->urls as $index => $url)
                    <div wire:key='url-{{ $index }}' class="mt-2 flex items-start">
                        <div class="relative flex-1">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                    </path>
                                </svg>
                            </div>
                            <input type="text" wire:model.live='form.urls.{{ $index }}'
                                placeholder="https://example.com"
                                class="w-full py-3 pl-10 pr-4 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                          @error('form.urls.' . $index) border-red-500 focus:ring-red-500 focus:border-red-500 @enderror
                          bg-white text-gray-900 placeholder-gray-500" />
                            @error('form.urls.' . $index)
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        @if (count($form->urls) > 1)
                            <button type="button" wire:click='removeUrl({{ $index }})'
                                class="ml-2 p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-full transition-colors duration-200 cursor-pointer"
                                title="Удалить URL">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        @endif
                    </div>
                @endforeach

                @error('form.urls')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror

                <div class="mt-2">
                    <button type="button" wire:click='addUrl' class="btn btn-ghost btn-sm text-primary gap-1">
                        <i class="fas fa-plus"></i>
                        Добавить еще сайт
                    </button>
                </div>
            </div>

            <!-- Основная сфера деятельности компании -->
            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">
                        Основная сфера деятельности компании
                    </span>
                </label>
                <select wire:model.live='form.sfera'
                    class="select select-bordered w-full focus:select-primary focus:outline-none h-12">
                    <option disabled selected value="">Выберите сферу деятельности</option>
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

            <!-- Как давно компания на рынке -->
            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">
                        Как давно компания на рынке
                    </span>
                </label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                    <label class="cursor-pointer label justify-start gap-3 p-4 border rounded-lg hover:border-primary">
                        <input wire:model.live='form.year' type="radio" value="Менее года" name="experience"
                            class="radio radio-primary" />
                        <span class="label-text">Менее года</span>
                    </label>
                    <label class="cursor-pointer label justify-start gap-3 p-4 border rounded-lg hover:border-primary">
                        <input wire:model.live='form.year' type="radio" value="1-3 года" name="experience"
                            class="radio radio-primary" />
                        <span class="label-text">1-3 года</span>
                    </label>
                    <label class="cursor-pointer label justify-start gap-3 p-4 border rounded-lg hover:border-primary">
                        <input wire:model.live='form.year' type="radio" value="3-5 лет" name="experience"
                            class="radio radio-primary" />
                        <span class="label-text">3-5 лет</span>
                    </label>
                    <label class="cursor-pointer label justify-start gap-3 p-4 border rounded-lg hover:border-primary">
                        <input wire:model.live='form.year' type="radio" value="Более 5 лет" name="experience"
                            class="radio radio-primary" />
                        <span class="label-text">Более 5 лет</span>
                    </label>
                </div>
            </div>

            <!-- По каким городам/странам нужно продвижение -->
            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">
                        По каким городам/странам нужно продвижение *
                    </span>
                </label>
                <input wire:model.live='form.geography' type="text" placeholder="Москва, Санкт-Петербург, Россия"
                    class="input input-bordered w-full focus:input-primary focus:outline-none h-12
                           @error('form.geography') input-error @enderror" />
                @error('form.geography')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Комфортная сумма расходов на SEO-продвижение -->
            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">
                        Комфортная сумма расходов на SEO-продвижение в месяц *
                    </span>
                </label>

                @error('form.summa')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror

                <div class="space-y-3">
                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary
                                  @error('form.summa') border-red-300 @enderror">
                        <input wire:model.live='form.summa' type="radio" name="budget"
                            value="от 40к до 100к рублей в месяц" class="radio radio-primary mr-3" />
                        <div>
                            <span class="font-medium">от 40 000 до 100 000 рублей в месяц</span>
                        </div>
                    </label>
                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary
                                  @error('form.summa') border-red-300 @enderror">
                        <input wire:model.live='form.summa' type="radio" name="budget"
                            value="от 100к до 250к рублей в месяц" class="radio radio-primary mr-3" />
                        <div>
                            <span class="font-medium">от 100 000 до 250 000 рублей в месяц</span>
                        </div>
                    </label>
                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary
                                  @error('form.summa') border-red-300 @enderror">
                        <input wire:model.live='form.summa' type="radio" name="budget"
                            value="от 250к до 500к рублей в месяц" class="radio radio-primary mr-3" />
                        <div>
                            <span class="font-medium">от 250 000 до 500 000 рублей в месяц</span>
                        </div>
                    </label>
                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary
                                  @error('form.summa') border-red-300 @enderror">
                        <input wire:model.live='form.summa' type="radio" name="budget"
                            value="от 500к до 1 млн рублей в месяц" class="radio radio-primary mr-3" />
                        <div>
                            <span class="font-medium">от 500 000 до 1 000 000 рублей в месяц</span>
                        </div>
                    </label>
                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary
                                  @error('form.summa') border-red-300 @enderror">
                        <input wire:model.live='form.summa' type="radio" name="budget"
                            value="от 1 млн рублей в месяц" class="radio radio-primary mr-3" />
                        <div>
                            <span class="font-medium">от 1 000 000 рублей в месяц</span>
                        </div>
                    </label>
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
                <button type="button" wire:click="goBack"
                    class="btn btn-outline btn-ghost w-1/2 h-14 text-lg font-semibold">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Назад
                </button>
                <button type="submit" class="btn btn-primary w-1/2 h-14 text-lg font-semibold">
                    Далее
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
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
