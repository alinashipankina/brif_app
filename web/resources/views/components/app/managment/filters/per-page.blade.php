@props(['perPage'])

<div class="form-control" x-data="{ open: false }">
    <label class="label">
        <span class="label-text text-xs md:text-sm">На странице</span>
    </label>

    <div class="relative">
        <button type="button" @click="open = !open"
            class="w-full h-10 px-3 border border-[#D0D0D0] focus:border-[#1A1A1A] bg-white text-left flex items-center justify-between text-sm">
            <span class="text-[#1A1A1A]">{{ $perPage }}</span>
            <svg class="w-4 h-4 text-[#6B6B6B] transition-transform" :class="{ 'rotate-180': open }" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div x-show="open" x-cloak x-transition @click.away="open = false"
            class="absolute z-50 mt-1 w-full bg-white border border-[#E8E8E8] shadow-lg overflow-y-auto">
            <div class="p-1">
                <button wire:click="$set('perPage', 5)" @click="open = false"
                    class="w-full text-left px-3 py-2 text-sm hover:bg-[#F5F5F5] text-[#1A1A1A] transition-colors {{ $perPage == 5 ? 'bg-[#F5F5F5] font-medium' : '' }}">
                    5
                </button>
                <button wire:click="$set('perPage', 10)" @click="open = false"
                    class="w-full text-left px-3 py-2 text-sm hover:bg-[#F5F5F5] text-[#1A1A1A] transition-colors {{ $perPage == 10 ? 'bg-[#F5F5F5] font-medium' : '' }}">
                    10
                </button>
                <button wire:click="$set('perPage', 25)" @click="open = false"
                    class="w-full text-left px-3 py-2 text-sm hover:bg-[#F5F5F5] text-[#1A1A1A] transition-colors {{ $perPage == 25 ? 'bg-[#F5F5F5] font-medium' : '' }}">
                    25
                </button>
                <button wire:click="$set('perPage', 50)" @click="open = false"
                    class="w-full text-left px-3 py-2 text-sm hover:bg-[#F5F5F5] text-[#1A1A1A] transition-colors {{ $perPage == 50 ? 'bg-[#F5F5F5] font-medium' : '' }}">
                    50
                </button>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>
