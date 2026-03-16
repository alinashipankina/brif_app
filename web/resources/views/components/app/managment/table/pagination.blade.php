@props(['paginator'])

@php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();
@endphp

<div class="mt-8 mb-6 px-4 border-t border-[#E8E8E8] pt-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <button wire:click="previousPage" @disabled($paginator->onFirstPage())
                class="w-8 h-8 flex items-center justify-center border border-[#E8E8E8] hover:border-[#1A1A1A] disabled:opacity-30 disabled:pointer-events-none transition-colors cursor-pointer">
                <svg class="w-4 h-4 text-[#1A1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            @if ($current > 2)
                <button wire:click="gotoPage(1)"
                    class="w-8 h-8 flex items-center justify-center text-sm hover:bg-[#F5F5F5] text-[#1A1A1A] transition-colors cursor-pointer">
                    1
                </button>
            @endif

            @if ($current > 3)
                <span class="w-8 h-8 flex items-center justify-center text-sm text-[#6B6B6B]">...</span>
            @endif

            @for ($i = max(1, $current - 1); $i <= min($last, $current + 1); $i++)
                <button wire:click="gotoPage({{ $i }})"
                    class="w-8 h-8 flex items-center justify-center text-sm {{ $i == $current ? 'bg-[#1A1A1A] text-white' : 'hover:bg-[#F5F5F5] text-[#1A1A1A]' }} transition-colors cursor-pointer">
                    {{ $i }}
                </button>
            @endfor

            @if ($current < $last - 2)
                <span class="w-8 h-8 flex items-center justify-center text-sm text-[#6B6B6B]">...</span>
            @endif

            @if ($current < $last - 1)
                <button wire:click="gotoPage({{ $last }})"
                    class="w-8 h-8 flex items-center justify-center text-sm hover:bg-[#F5F5F5] text-[#1A1A1A] transition-colors cursor-pointer">
                    {{ $last }}
                </button>
            @endif

            <button wire:click="nextPage" @disabled($paginator->onLastPage())
                class="w-8 h-8 flex items-center justify-center border border-[#E8E8E8] hover:border-[#1A1A1A] disabled:opacity-30 disabled:pointer-events-none transition-colors cursor-pointer">
                <svg class="w-4 h-4 text-[#1A1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <div class="text-sm text-[#6B6B6B]">
            Показано {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}
            из {{ $paginator->total() }} заявок
        </div>
    </div>
</div>
