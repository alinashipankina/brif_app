@props(['files'])

<div class="mt-6">
    <h3 class="text-sm md:text-base font-medium text-[#1A1A1A] uppercase tracking-wider mb-3">
        Все файлы ({{ $files->count() }})
    </h3>
    <div class="space-y-2">
        @foreach ($files->sortByDesc('created_at') as $file)
            <div
                class="flex items-center justify-between p-2 bg-[#F5F5F5] border border-[#E8E8E8] rounded-none text-sm hover:bg-white transition-colors duration-200">
                <div class="flex items-center gap-2 flex-1 min-w-0">
                    <svg class="w-4 h-4 flex-shrink-0 text-[#6B6B6B]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-[#1A1A1A] truncate font-medium">{{ $file->original_name }}</p>
                        <p class="text-xs text-[#6B6B6B]">
                            {{ $file->formatted_size }} • загрузил {{ $file->user->name }}
                            • {{ $file->created_at->format('d.m.Y H:i') }}
                        </p>
                    </div>
                </div>
                <button wire:click="downloadFile({{ $file->id }})"
                    class="p-2 text-[#6B6B6B] hover:text-[#1A1A1A] hover:bg-[#E8E8E8] transition-colors duration-200 rounded-none"
                    title="Скачать">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </button>
            </div>
        @endforeach
    </div>
</div>
