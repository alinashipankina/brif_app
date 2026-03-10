<div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 md:gap-x-6 gap-y-3 md:gap-y-4">
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Название компании/бренда:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['company_name'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Сайты:</span>
        @forelse ($data['urls'] ?? [] as $url)
            <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
                {{ $url }}
            </p>
        @empty
            <p class="text-xs md:text-sm text-[#9A9A9A] mt-0.5 md:mt-1 font-normal italic">Не указано</p>
        @endforelse
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Соцсети:</span>
        @forelse ($data['social_links'] ?? [] as $social_link)
            <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
                {{ $social_link }}
            </p>
        @empty
            <p class="text-xs md:text-sm text-[#9A9A9A] mt-0.5 md:mt-1 font-normal italic">Не указано</p>
        @endforelse
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Проблемы:</span>
        @forelse ($data['problems'] ?? [] as $problem)
            <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
                {{ $problem }}
            </p>
        @empty
            <p class="text-xs md:text-sm text-[#9A9A9A] mt-0.5 md:mt-1 font-normal italic">Не указано</p>
        @endforelse
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Имеются отзывы:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['review_platforms'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Наличие готовых отзывов:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['has_positive_reviews'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Приоритетные платформы:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['priority_platforms'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Ранее был опыт:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['has_experience'] ?? 'Не указано' }}
        </p>
    </div>

    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Бюджет:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['monthly_budget'] ?? 'Не указано' }}
        </p>
    </div>
</div>
