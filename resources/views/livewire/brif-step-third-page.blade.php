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
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">
                        Какую продукцию нужно продвигать в первую очередь
                    </span>
                </label>
                <textarea wire:model='form.production'
                    placeholder="Опишите основные товары или услуги, которые требуют продвижения. Например: 'Строительные материалы для частных домов, акцент на кровельные материалы'"
                    class="textarea textarea-bordered w-full focus:textarea-primary focus:outline-none h-32" rows="4"></textarea>
                <label class="label">
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
                <div class="space-y-3">
                    <!-- Конкурент 1 -->

                    @foreach ($form->concurents as $index => $concurent)
                        @if (is_array($concurent))
                            {{-- Проверка структуры --}}
                            <div wire:key='concurent-{{ $index }}' class="flex gap-3 mb-3">
                                <div class="flex-1">
                                    <input wire:model.live='form.concurents.{{ $index }}.name' type="text"
                                        placeholder="Название конкурента"
                                        class="input input-bordered w-full focus:input-primary focus:outline-none h-12" />
                                </div>

                                <div class="flex-1">
                                    <div class="relative">
                                        <input wire:model.live='form.concurents.{{ $index }}.url' type="url"
                                            placeholder="https://конкурент1.com"
                                            class="input input-bordered w-full focus:input-primary focus:outline-none h-12 pl-12" />
                                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                                            <i class="fas fa-link"></i>
                                        </div>
                                    </div>
                                </div>

                                <button wire:click='removeConcurent({{ $index }})' type="button"
                                    class="btn btn-square btn-outline btn-error h-12 w-12">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        @endif
                    @endforeach

                    <div class="mt-3">
                        <button wire:click='addConcurent' type="button"
                            class="btn btn-outline btn-primary btn-sm gap-2">
                            <i class="fas fa-plus"></i>
                            Добавить конкурента
                        </button>
                    </div>
                </div>

                <!-- Сегмент потребителей компании -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold text-gray-700">
                            Сегмент потребителей компании*
                        </span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <label
                            class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
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
                            class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
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
                            class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
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
                    <div class="mt-2">
                        <label class="cursor-pointer label justify-start gap-3">
                            <input wire:model.live='form.segments' type="checkbox" value="Не знаю"
                                class="checkbox checkbox-sm checkbox-primary" />
                            <span class="label-text text-gray-600">Не знаю / Затрудняюсь ответить</span>
                        </label>
                    </div>
                </div>

                <!-- Где узнали о нас? -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold text-gray-700">
                            Где узнали о нас?
                        </span>
                    </label>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                        <label
                            class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
                            <input wire:model='form.marketing' type="radio" value="Поиск в Google/Yandex"
                                name="source" class="radio radio-primary mr-3" />
                            <div>
                                <div class="font-medium">Поиск в Google/Yandex</div>
                                <div class="text-sm text-gray-500 mt-1">Нашли через поисковую систему</div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
                            <input wire:model='form.marketing' type="radio" value="Рекомендация" name="source"
                                class="radio radio-primary mr-3" />
                            <div>
                                <div class="font-medium">Рекомендация</div>
                                <div class="text-sm text-gray-500 mt-1">Посоветовали коллеги или партнеры</div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
                            <input wire:model='form.marketing' type="radio" value="Социальные сети" name="source"
                                class="radio radio-primary mr-3" />
                            <div>
                                <div class="font-medium">Социальные сети</div>
                                <div class="text-sm text-gray-500 mt-1">ВКонтакте, Telegram, Instagram</div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary transition-all">
                            <input wire:model='form.marketing' type="radio"
                                value="Контекстная или таргетированная реклама" name="source"
                                class="radio radio-primary mr-3" />
                            <div>
                                <div class="font-medium">Реклама</div>
                                <div class="text-sm text-gray-500 mt-1">Контекстная или таргетированная реклама</div>
                            </div>
                        </label>
                    </div>
                    {{--
                    <!-- Другое -->
                    <div class="mt-2">
                        <label class="cursor-pointer label justify-start gap-3 mb-2">
                            <input type="radio" name="source" class="radio radio-primary"
                                id="other-source-radio" />
                            <span class="label-text font-medium">Другое</span>
                        </label>
                        <div id="other-source-input" class="hidden">
                            <input type="text" placeholder="Укажите, пожалуйста, где именно"
                                class="input input-bordered w-full focus:input-primary focus:outline-none h-12" />
                        </div>
                    </div> --}}
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
                    <a type="button" href="/brif-seo-step"
                        class="btn btn-outline btn-ghost w-1/2 h-14 text-lg font-semibold">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Назад
                    </a>
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
