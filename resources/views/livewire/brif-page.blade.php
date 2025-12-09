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

        <form wire:submit.prevent='save' class="space-y-6" wire:ignore.self>
            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">ФИО, название компании *</span>
                </label>
                <input type="text" wire:model='form.name' placeholder="Иванов Иван Иванович, ООО 'Ромашка'"
                    class="input input-bordered w-full focus:input-primary focus:outline-none h-12 @error('form.name') input-error @enderror" />
                @error('form.name')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">Должность</span>
                </label>
                <input type="text" wire:model='form.role' placeholder="Директор по развитию"
                    class="input input-bordered w-full focus:input-primary focus:outline-none h-12" />
            </div>

            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">Номер телефона *</span>
                </label>
                <div class="relative">
                    <input type="tel" wire:model.live.debounce.500ms='form.phone' x-data="phoneInput()"
                        x-init="init()" @input="formatPhone($event)" @keydown="handleKeydown($event)"
                        placeholder="+7 (999) 999-99-99"
                        class="input input-bordered w-full focus:input-primary focus:outline-none h-12 @error('form.phone') input-error @enderror" />
                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                @error('form.phone')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">Электронная почта *</span>
                </label>
                <div class="relative">
                    <input type="email" wire:model='form.email' placeholder="example@domain.ru"
                        class="input input-bordered w-full focus:input-primary focus:outline-none h-12 @error('form.email') input-error @enderror" />
                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                @error('form.email')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label mb-1">
                    <span class="label-text font-semibold text-gray-700">Наименование необходимой услуги *</span>
                </label>
                <select wire:model='form.usluga'
                    class="select select-bordered w-full focus:select-primary focus:outline-none h-12 @error('form.usluga') select-error @enderror">
                    <option disabled selected value="">Выберите услугу</option>
                    <option value="Разработка сайта">SEO-продвижение</option>
                    <option value="Дизайн логотипа">SEO-продвижение сайтов за рубежом</option>
                    <option value="SEO-оптимизация">Комплексное продвижение</option>
                    <option value="Контекстная реклама">GEO-продвижение</option>
                </select>
                @error('form.usluga')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="mt-10">
                <div class="flex justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Прогресс заполнения</span>
                    <span class="text-sm font-medium text-gray-700">25%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-primary h-2.5 rounded-full" style="width: 25%"></div>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="btn btn-primary w-full h-14 text-lg font-semibold">
                    Далее
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>

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

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('phoneInput', () => ({
            init() {
                this.$nextTick(() => {
                    const input = this.$el;
                    if (input.value && input.value.trim() !== '') {
                        this.formatPhone({
                            target: input
                        });
                    }
                });
            },

            formatPhone(event) {
                let input = event.target;
                let originalValue = input.value;
                let value = originalValue.replace(/\D/g, '');

                if (value === '' && originalValue.trim() === '') {
                    return;
                }

                if (value.length > 0) {
                    if (value.startsWith('7') || value.startsWith('8')) {
                        value = value.substring(1);
                    }

                    if (value.length > 10) {
                        value = value.substring(0, 10);
                    }

                    let formatted = '+7 ';

                    if (value.length > 0) {
                        formatted += '(' + value.substring(0, 3);
                    }
                    if (value.length > 3) {
                        formatted += ') ' + value.substring(3, 6);
                    }
                    if (value.length > 6) {
                        formatted += '-' + value.substring(6, 8);
                    }
                    if (value.length > 8) {
                        formatted += '-' + value.substring(8, 10);
                    }

                    if (input.value !== formatted) {
                        input.value = formatted;

                        setTimeout(() => {
                            input.setSelectionRange(formatted.length, formatted.length);
                        }, 0);
                    }
                }
            },

            handleKeydown(event) {
                if (event.key === 'Backspace' && event.target.value.length <= 4) {
                    event.preventDefault();
                    event.target.value = '+7 ';
                }
            }
        }));
    });
</script>
