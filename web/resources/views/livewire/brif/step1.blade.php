<div
    class="card w-full bg-white shadow-[0_4px_12px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.06)] transition-all duration-300 rounded-none border border-[#E8E8E8]">
    <div class="card-body p-6 md:p-10">
        @include('livewire.brif.partials.logo-summary')

        <form wire:submit.prevent='save' class="space-y-5 md:space-y-7" wire:ignore.self>
            <div class="form-control">
                <label class="label mb-1 md:mb-1.5">
                    <span
                        class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                        ФИО, название компании <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                <input type="text" wire:model='form.name' placeholder="Иванов Иван Иванович, ООО 'Ромашка'"
                    class="input input-bordered w-full border-[#D0D0D0] focus:border-[#1A1A1A] bg-white h-11 md:h-12 px-4 text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm @error('form.name') border-[#8B0000] @enderror" />
                @error('form.name')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label mb-1 md:mb-1.5">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        Должность
                    </span>
                </label>
                <input type="text" wire:model='form.role' placeholder="Директор по развитию"
                    class="input input-bordered w-full border-[#D0D0D0] focus:border-[#1A1A1A] bg-white h-11 md:h-12 px-4 text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm" />
            </div>

            <div class="form-control">
                <label class="label mb-1 md:mb-1.5">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        Номер телефона <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                <div class="relative">
                    <input type="tel" wire:model.live.debounce.500ms='form.phone' x-data="phoneInput()"
                        x-init="init()" @input="formatPhone($event)" @keydown="handleKeydown($event)"
                        placeholder="+7 (999) 999-99-99"
                        class="input input-bordered w-full border-[#D0D0D0] focus:border-[#1A1A1A] bg-white h-11 md:h-12 px-4 pl-10 md:pl-11 text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm @error('form.phone') border-[#8B0000] @enderror" />
                    <div class="absolute left-3 md:left-4 top-1/2 transform -translate-y-1/2 text-[#6B6B6B]">
                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                </div>
                @error('form.phone')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label mb-1 md:mb-1.5">
                    <span class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider">
                        Электронная почта <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                <div class="relative">
                    <input type="email" wire:model='form.email' placeholder="example@domain.ru"
                        class="input input-bordered w-full border-[#D0D0D0] focus:border-[#1A1A1A] bg-white h-11 md:h-12 px-4 pl-10 md:pl-11 text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm @error('form.email') border-[#8B0000] @enderror" />
                    <div class="absolute left-3 md:left-4 top-1/2 transform -translate-y-1/2 text-[#6B6B6B]">
                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                @error('form.email')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label mb-1 md:mb-1.5">
                    <span
                        class="label-text font-medium text-[#1A1A1A] text-xs md:text-sm uppercase tracking-wider break-words">
                        Наименование необходимой услуги <span class="text-[#6B6B6B]">*</span>
                    </span>
                </label>
                <select wire:model='form.service_type'
                    class="select select-bordered w-full border-[#D0D0D0] focus:border-[#1A1A1A] bg-white h-11 md:h-12 px-4 text-[#1A1A1A] rounded-none text-sm @error('form.service_type') border-[#8B0000] @enderror">
                    <option disabled selected value="" class="text-[#9A9A9A]">Выберите услугу</option>
                    <option value="SEO-продвижение">SEO-продвижение</option>
                    <option value="Зарубежное SEO">Зарубежное SEO</option>
                    <option value="GEO-продвижение">GEO-продвижение (продвижение в ИИ)</option>
                    <option value="Перформанс-маркетинг">Перформанс-маркетинг</option>
                    <option value="Контекстная реклама">Контекстная реклама</option>
                    <option value="SERM (управление репутацией)">SERM (управление репутацией)</option>
                    <option value="Контент-поддержка">Контент-поддержка</option>
                    <option value="Веб-аналитика">Веб-аналитика</option>
                    <option value="Аутстафф">Аутстафф</option>
                </select>
                @error('form.service_type')
                    <label class="label">
                        <span class="label-text-alt text-[#8B0000] text-xs mt-1">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="mt-8 md:mt-10 bg-[#F9F9F9] p-4 md:p-6 border border-[#E8E8E8]">
                <div class="flex justify-between mb-2 md:mb-3">
                    <span class="text-xs font-medium text-[#4A4A4A] uppercase tracking-wider">Прогресс
                        заполнения</span>
                    <span class="text-xs font-medium text-[#1A1A1A]">25%</span>
                </div>
                <div class="w-full bg-[#E8E8E8] h-1">
                    <div class="bg-[#1A1A1A] h-1" style="width: 25%"></div>
                </div>
            </div>

            <div class="pt-4 md:pt-6">
                <button type="submit"
                    class="btn w-full h-12 md:h-14 text-xs md:text-sm font-medium bg-[#1A1A1A] hover:bg-[#2A2A2A] text-white border-0 rounded-none transition-colors duration-200 uppercase tracking-wider">
                    Далее
                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 ml-1.5 md:ml-2" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <div class="text-center mt-6 md:mt-8">
                <p class="text-[#6B6B6B] text-xs">
                    <span class="text-[#4A4A4A]">*</span> Поля, обязательные для заполнения
                </p>
                <p class="text-[#6B6B6B] text-xs mt-1.5 md:mt-2">
                    Нажимая "Далее", вы соглашаетесь с
                    <a href="https://rbru.ru/privacy"
                        class="text-[#1A1A1A] hover:text-[#4A4A4A] underline underline-offset-2 transition-colors"
                        target="_blank">политикой конфиденциальности</a>
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
