@props(['search'])

<div class="form-control">
    <label class="label">
        <span class="label-text text-xs md:text-sm">Поиск заявок</span>
    </label>
    <div class="relative">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Поиск по ID, названию, статусу"
            class="w-full h-10 px-3 pl-9 border border-[#D0D0D0] focus:border-[#1A1A1A] bg-white text-[#1A1A1A] placeholder:text-[#9A9A9A] rounded-none text-sm transition-colors">
        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-[#6B6B6B]" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        @if ($search)
            <button wire:click="$set('search', '')"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-[#6B6B6B] hover:text-[#8B0000] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
    </div>
</div>
