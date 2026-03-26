@props(['questionare', 'users', 'selectedManagerId'])

<div x-data="{ open: true }" x-show="open" x-cloak
    class="fixed inset-0 bg-black/5 backdrop-blur-[1px] z-[100] flex items-center justify-center"
    @click.away="$wire.set('showReassignModal', false)">

    <div class="bg-white w-full max-w-md p-6 border border-[#E8E8E8] shadow-xl" @click.stop>

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-base font-medium text-[#1A1A1A] uppercase tracking-wider">
                {{ $questionare->user ? 'Переназначить' : 'Назначить' }} ответственного
            </h3>
            <button wire:click="$set('showReassignModal', false)" class="btn btn-sm btn-ghost rounded-none">
                ✕
            </button>
        </div>

        <p class="text-sm text-[#6B6B6B] mb-4">
            Заявка #{{ $questionare->id }} • {{ $questionare->name }}
        </p>

        <select wire:model.live="selectedManagerId"
            class="select w-full h-10 border border-[#D0D0D0] rounded-none text-sm mb-4">
            <option value="">Выберите менеджера</option>
            @foreach ($users as $manager)
                @if ($manager->role === 'manager')
                    <option value="{{ $manager->id }}">{{ $manager->name }} ({{ $manager->email }})</option>
                @endif
            @endforeach
        </select>

        <div class="flex justify-end gap-2">
            <button wire:click="$set('showReassignModal', false)"
                class="btn h-10 px-4 text-xs font-medium bg-white border border-[#D0D0D0] text-[#6B6B6B] hover:bg-[#F5F5F5] rounded-none uppercase tracking-wider">
                Отмена
            </button>
            <button wire:click="reassignManager" wire:loading.attr="disabled" :disabled="!$wire.selectedManagerId"
                class="btn h-10 px-4 text-xs font-medium bg-[#1A1A1A] hover:bg-[#2A2A2A] text-white border-0 rounded-none uppercase tracking-wider">
                <span wire:loading.remove wire:target="reassignManager">Сохранить</span>
                <span wire:loading wire:target="reassignManager">Сохранение...</span>
            </button>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
