<div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 md:gap-x-6 gap-y-3 md:gap-y-4">
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Сайты для GEO-продвижения:</span>
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
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Частые вопросы клиентов:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal">
            {{ $data['client_questions'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Наличие экспертного контента:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['has_expert_content'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Необходимость в специальном
            контенте:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['needs_geo_content'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Бюджет:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['monthly_budget'] ?? 'Не указано' }}
        </p>
    </div>
</div>
