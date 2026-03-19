@props(['user', 'isAdmin', 'questionareId', 'questionareName'])

<div>
    <h3 class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-2">Ответственный менеджер</h3>

    @if ($user)
        <div class="flex items-center justify-between p-3 bg-[#F5F5F5] rounded-md">
            <div class="flex items-center gap-3">
                <div class="avatar">
                    <div class="w-10 h-10 bg-[#E8E8E8] flex items-center justify-center rounded-none">
                        <span class="text-sm font-medium text-[#1A1A1A]">{{ mb_substr($user->name, 0, 1) }}</span>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-medium text-[#1A1A1A]">{{ $user->name }}</p>
                    <p class="text-xs text-[#6B6B6B]">{{ $user->email }}</p>
                </div>
            </div>

            @if ($isAdmin)
                <button wire:click="openReassignModal"
                    class="p-2 text-[#6B6B6B] hover:text-[#1A1A1A] hover:bg-[#E8E8E8] transition-colors rounded-none"
                    title="Переназначить ответственного">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </button>
            @endif
        </div>
    @else
        <div class="flex items-center justify-between p-3 bg-[#F5F5F5] border border-[#E8E8E8] rounded-md">
            <div class="flex items-center text-sm text-[#6B6B6B]">
                <svg class="w-4 h-4 mr-2 text-[#6B6B6B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
                <span>Ответственный не назначен</span>
            </div>

            @if ($isAdmin)
                <button wire:click="openReassignModal"
                    class="p-2 text-[#6B6B6B] hover:text-[#1A1A1A] hover:bg-[#E8E8E8] transition-colors rounded-none"
                    title="Назначить ответственного">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </button>
            @endif
        </div>
    @endif
</div>
