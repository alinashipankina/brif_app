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
                    Шаг 3 из 4
                </div>
            </div>
        </div>

        <!-- Форма -->
        <form wire:submit='save' class="space-y-6">
            <!-- Какую продукцию нужно продвигать в первую очередь -->
            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">
                        Какую продукцию нужно продвигать в первую очередь
                    </span>
                </label>
                <textarea wire:model.live='form.production'
                    placeholder="Опишите основные товары или услуги, которые требуют продвижения. Например: 'Строительные материалы для частных домов, акцент на кровельные материалы'"
                    class="textarea textarea-bordered w-full focus:textarea-primary focus:outline-none h-32" rows="4"></textarea>
                <label class="label mb-1">
                    <span class="label-text-alt text-gray-500">Опишите подробно для более точного анализа</span>
                </label>
            </div>

            <!-- Основные конкуренты в сети Интернет -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">
                        Основные конкуренты в сети Интернет (название, ссылка на сайт) *
                    </span>
                </label>
                @error('form.concurents')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror

                <div class="space-y-3">
                    <!-- Конкуренты -->
                    @foreach ($form->concurents as $index => $concurent)
                        <div wire:key='concurent-{{ $index }}' class="flex gap-3 mb-3">
                            <div class="flex-1">
                                <input wire:model.live='form.concurents.{{ $index }}.name' type="text"
                                    placeholder="Название конкурента"
                                    class="input input-bordered w-full focus:input-primary focus:outline-none h-12
                                           @error('form.concurents.' . $index . '.name') input-error @enderror" />
                                @error('form.concurents.' . $index . '.name')
                                    <label class="label">
                                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <div class="flex-1">
                                <div class="relative">
                                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 z-10">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                            </path>
                                        </svg>
                                    </div>
                                    <input wire:model.live='form.concurents.{{ $index }}.url' type="url"
                                        placeholder="https://конкурент1.com"
                                        class="input input-bordered w-full focus:input-primary focus:outline-none h-12 pl-10
                   @error('form.concurents.' . $index . '.url') input-error @enderror" />
                                </div>
                                @error('form.concurents.' . $index . '.url')
                                    <label class="label">
                                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            @if (count($form->concurents) > 1)
                                <button wire:click='removeConcurent({{ $index }})' type="button"
                                    class="btn btn-square btn-outline btn-error h-12 w-12 group relative overflow-hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 transition-transform duration-300 group-hover:scale-110"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span
                                        class="absolute inset-0 bg-error opacity-0 group-hover:opacity-10 transition-opacity duration-300"></span>
                                </button>
                            @endif
                        </div>
                    @endforeach

                    <div class="mt-3">
                        <button wire:click='addConcurent' type="button"
                            class="btn btn-outline btn-primary btn-sm gap-2 mb-6">
                            <i class="fas fa-plus"></i>
                            Добавить конкурента
                        </button>
                    </div>
                </div>
            </div>

            <!-- Сегмент потребителей компании -->
            <div class="form-control mb-6">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">
                        Сегмент потребителей компании*
                    </span>
                </label>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all
                                  @error('form.segments') border-red-300 @enderror">
                        <div class="flex items-center w-full">
                            <input wire:model.live='form.segments' type="checkbox" value="B2C"
                                class="checkbox checkbox-primary mr-3" />
                            <div>
                                <div class="font-medium">B2C</div>
                                <div class="text-sm text-gray-500 mt-1">Business to Consumer</div>
                            </div>
                        </div>
                    </label>

                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all
                                  @error('form.segments') border-red-300 @enderror">
                        <div class="flex items-center w-full">
                            <input wire:model.live='form.segments' type="checkbox" value="B2B"
                                class="checkbox checkbox-primary mr-3" />
                            <div>
                                <div class="font-medium">B2B</div>
                                <div class="text-sm text-gray-500 mt-1">Business to Business</div>
                            </div>
                        </div>
                    </label>

                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all
                                  @error('form.segments') border-red-300 @enderror">
                        <div class="flex items-center w-full">
                            <input wire:model.live='form.segments' type="checkbox" value="B2G"
                                class="checkbox checkbox-primary mr-3" />
                            <div>
                                <div class="font-medium">B2G</div>
                                <div class="text-sm text-gray-500 mt-1">Business to Government</div>
                            </div>
                        </div>
                    </label>
                </div>
                @error('form.segments')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Где узнали о нас? -->
            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">
                        Где узнали о нас?
                    </span>
                </label>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
                        <input wire:model.live='form.marketing' type="radio" value="Поиск в Google/Yandex"
                            name="source" class="radio radio-primary mr-3" />
                        <div>
                            <div class="font-medium">Поиск в Google/Yandex</div>
                            <div class="text-sm text-gray-500 mt-1">Нашли через поисковую систему</div>
                        </div>
                    </label>

                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
                        <input wire:model.live='form.marketing' type="radio" value="Рекомендация" name="source"
                            class="radio radio-primary mr-3" />
                        <div>
                            <div class="font-medium">Рекомендация</div>
                            <div class="text-sm text-gray-500 mt-1">Посоветовали коллеги или партнеры</div>
                        </div>
                    </label>

                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
                        <input wire:model.live='form.marketing' type="radio" value="Социальные сети"
                            name="source" class="radio radio-primary mr-3" />
                        <div>
                            <div class="font-medium">Социальные сети</div>
                            <div class="text-sm text-gray-500 mt-1">ВКонтакте, Telegram, Instagram</div>
                        </div>
                    </label>

                    <label
                        class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
                        <input wire:model.live='form.marketing' type="radio"
                            value="Контекстная или таргетированная реклама" name="source"
                            class="radio radio-primary mr-3" />
                        <div>
                            <div class="font-medium">Реклама</div>
                            <div class="text-sm text-gray-500 mt-1">Контекстная или таргетированная реклама</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Прогресс-бар -->
            <div class="mt-10">
                <div class="flex justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Прогресс заполнения</span>
                    <span class="text-sm font-medium text-gray-700">75%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-primary h-2.5 rounded-full" style="width: 75%"></div>
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
