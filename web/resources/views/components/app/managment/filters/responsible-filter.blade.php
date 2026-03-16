@props(['users', 'responsibleFilter', 'tempResponsibleFilter', 'isAdmin'])

<div class="form-control" x-data="{
    open: false,
    init() {
        this.$watch('open', value => {
            if (value) {
                $wire.resetTempResponsibleFilter();
            }
        });
    }
}">
    <label class="label">
        <span class="label-text text-xs md:text-sm">Сотрудники</span>
    </label>

    <div class="relative">
        <button type="button" @click="open = !open"
            class="w-full h-10 px-3 border border-[#D0D0D0] focus:border-[#1A1A1A] bg-white text-left flex items-center justify-between text-sm">
            <span>
                @if (count($responsibleFilter) > 0)
                    <span class="text-[#1A1A1A]">Выбрано: {{ count($responsibleFilter) }}</span>
                @elseif ($isAdmin)
                    <span class="text-[#9A9A9A]">Все сотрудники</span>
                @else
                    <span class="text-[#9A9A9A]">Только мои заявки</span>
                @endif
            </span>
            <svg class="w-4 h-4 text-[#6B6B6B] transition-transform" :class="{ 'rotate-180': open }" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        @if ($isAdmin)
            <div x-show="open" x-cloak x-transition @click.away="open = false"
                class="absolute z-50 mt-1 w-full bg-white border border-[#E8E8E8] shadow-lg max-h-60 overflow-y-auto">
                <div class="p-2">
                    @foreach ($users as $user)
                        <label class="flex items-center gap-2 px-3 py-2 hover:bg-[#F5F5F5] cursor-pointer">
                            <input type="checkbox" wire:model="tempResponsibleFilter" value="{{ $user->id }}"
                                class="checkbox checkbox-sm border-[#D0D0D0] [--chkbg:#1A1A1A] [--chkfg:white] rounded">
                            <span class="text-sm text-[#1A1A1A]">{{ $user->name }}</span>
                            @if ($user->id == Auth::id())
                                <span class="text-[10px] text-[#6B6B6B] ml-1">(Вы)</span>
                            @endif
                        </label>
                    @endforeach
                </div>

                <div class="border-t border-[#E8E8E8] p-2 flex justify-between bg-[#F9F9F9]">
                    <button type="button" wire:click="clearResponsibleFilter" @click="open = false"
                        class="text-xs text-[#8B0000] hover:underline px-2 py-1">
                        Сбросить
                    </button>
                    <button type="button" wire:click="applyResponsibleFilter" @click="open = false"
                        class="text-xs text-white bg-[#1A1A1A] px-4 py-1 hover:bg-[#2A2A2A] transition-colors">
                        Применить
                    </button>
                </div>
            </div>
        @endif
    </div>

    @if (count($responsibleFilter) > 0)
        <div class="mt-2 flex flex-wrap gap-1">
            @foreach ($responsibleFilter as $selectedUserId)
                @php $selectedUser = $users->firstWhere('id', $selectedUserId); @endphp
                @if ($selectedUser)
                    <span
                        class="inline-flex items-center gap-1 px-2 py-1 bg-[#F5F5F5] text-[10px] text-[#1A1A1A] border border-[#E8E8E8]">
                        {{ $selectedUser->name }}
                        @if ($selectedUser->id == Auth::id())
                            <span class="text-[8px] text-[#6B6B6B]">(Вы)</span>
                        @endif
                        <button wire:click="removeResponsible({{ $selectedUserId }})" class="hover:text-[#8B0000]">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>
                @endif
            @endforeach
        </div>
    @endif

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>
