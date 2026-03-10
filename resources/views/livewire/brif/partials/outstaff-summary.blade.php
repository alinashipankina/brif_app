<div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 md:gap-x-6 gap-y-3 md:gap-y-4">
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Специалисты:</span>
        @forelse ($data['specialists'] ?? [] as $specialist)
            <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
                {{ $specialist }}
            </p>
        @empty
            <p class="text-xs md:text-sm text-[#9A9A9A] mt-0.5 md:mt-1 font-normal italic">Не указано</p>
        @endforelse
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Количество:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['specialist_count'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Срок сотрудничества:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['work_period'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Формат работы:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['work_format'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Бюджет:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['project_budget'] ?? 'Не указано' }}
        </p>
    </div>
</div>
