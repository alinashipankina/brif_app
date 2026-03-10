<div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 md:gap-x-6 gap-y-3 md:gap-y-4">
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Сайты для аналитики:</span>
        @forelse ($data['urls'] ?? [] as $url)
            <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
                {{ $url }}
            </p>
        @empty
            <p class="text-xs md:text-sm text-[#9A9A9A] mt-0.5 md:mt-1 font-normal italic">Не указано</p>
        @endforelse
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Сфера деятельности:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['business_sphere'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Системы аналитики:</span>
        @forelse ($data['analytics_systems'] ?? [] as $analytics_system)
            <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
                {{ $analytics_system }}
            </p>
        @empty
            <p class="text-xs md:text-sm text-[#9A9A9A] mt-0.5 md:mt-1 font-normal italic">Не указано</p>
        @endforelse
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Цели:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['tracking_goals'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Наличие ecommerce:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['ecommerce_setup'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Итог работы:</span>
        <div class="flex flex-wrap gap-1.5 md:gap-2 mt-0.5 md:mt-1">
            @foreach ($data['desired_outcomes'] ?? [] as $desired_outcome)
                <span
                    class="px-2 md:px-3 py-1 md:py-1.5 text-[10px] md:text-xs bg-[#F5F5F5] text-[#1A1A1A] border border-[#E8E8E8]">
                    {{ $desired_outcome }}
                </span>
            @endforeach
        </div>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Бюджет:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['monthly_budget'] ?? 'Не указано' }}
        </p>
    </div>
</div>
