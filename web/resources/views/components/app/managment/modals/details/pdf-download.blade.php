@props(['id'])

<div class="mb-4">
    <button wire:click="downloadBrifPdf({{ $id }})"
        class="btn w-full h-10 text-xs font-medium bg-white border border-[#D0D0D0] text-[#1A1A1A] hover:bg-[#F5F5F5] transition-colors duration-200 rounded-none uppercase tracking-wider flex items-center justify-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        Скачать бриф (PDF)
    </button>
</div>
