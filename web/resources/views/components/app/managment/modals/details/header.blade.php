@props(['id'])

<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl md:text-2xl font-light text-[#1A1A1A] tracking-tight uppercase">
        Заявка #{{ $id }}
    </h2>
    <button wire:click="closeDetails" class="btn btn-sm btn-ghost rounded-none">
        ✕
    </button>
</div>
