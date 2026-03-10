<div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 md:gap-x-6 gap-y-3 md:gap-y-4">
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Продукция для
            продвижения:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['production'] ?? '' }}</p>
    </div>
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Сегмент
            потребителей:</span>
        <div class="flex flex-wrap gap-1.5 md:gap-2 mt-0.5 md:mt-1">
            @foreach ($data['segments'] ?? [] as $segment)
                <span
                    class="px-2 md:px-3 py-1 md:py-1.5 text-[10px] md:text-xs bg-[#F5F5F5] text-[#1A1A1A] border border-[#E8E8E8]">
                    {{ $segment }}
                </span>
            @endforeach
        </div>
    </div>
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Основные
            конкуренты:</span>
        <div class="space-y-1 md:space-y-1.5 mt-0.5 md:mt-1">
            @foreach ($data['concurents'] ?? [] as $concurent)
                <div class="flex items-center gap-1.5 md:gap-2">
                    <svg class="w-3 h-3 md:w-3.5 md:h-3.5 text-[#6B6B6B]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z">
                        </path>
                    </svg>
                    <span class="text-xs md:text-sm text-[#1A1A1A] break-words">{{ $concurent['name'] ?? '' }}</span>
                    <a href="{{ $concurent['url'] ?? '#' }}"
                        class="text-[10px] md:text-xs text-[#6B6B6B] hover:text-[#1A1A1A] underline underline-offset-2"
                        target="_blank">(сайт)</a>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Источник
            информации:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['marketing'] ?? '' }}</p>
    </div>
</div>
