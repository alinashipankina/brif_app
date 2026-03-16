@props(['history'])

<details class="mb-3">
    <summary class="cursor-pointer text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-2">
        История статусов ({{ $history->count() }})
    </summary>
    <div class="mt-2 space-y-3 max-h-96 overflow-y-auto p-3 bg-[#F5F5F5] border border-[#E8E8E8] rounded-none">
        @forelse ($history->sortByDesc('created_at') as $statusHistory)
            <div class="p-3 bg-white border border-[#E8E8E8] rounded-md">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs font-medium text-[#1A1A1A]">
                        {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$statusHistory->status]['label'] ?? $statusHistory->status }}
                    </span>
                    <span class="text-[10px] text-[#6B6B6B]">
                        {{ $statusHistory->created_at->format('d.m.Y H:i') }}
                    </span>
                </div>

                @if ($statusHistory->comment)
                    <p class="text-xs text-[#6B6B6B] mb-2">{{ $statusHistory->comment }}</p>
                @endif

                @if ($statusHistory->files && $statusHistory->files->count() > 0)
                    <div class="mt-2 pt-2 border-t border-[#E8E8E8]">
                        <p class="text-[10px] font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">
                            Прикрепленные файлы ({{ $statusHistory->files->count() }})
                        </p>
                        <div class="space-y-1">
                            @foreach ($statusHistory->files as $file)
                                <div
                                    class="flex items-center justify-between p-1.5 bg-[#F9F9F9] border border-[#E8E8E8] rounded-sm text-xs">
                                    <div class="flex items-center gap-1.5 flex-1 min-w-0">
                                        <svg class="w-3.5 h-3.5 flex-shrink-0 text-[#6B6B6B]" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs text-[#1A1A1A] truncate"
                                                title="{{ $file->original_name }}">
                                                {{ $file->original_name }}
                                            </p>
                                            <p class="text-[9px] text-[#6B6B6B]">
                                                {{ $file->formatted_size }} • загрузил
                                                {{ $file->user->name ?? 'Неизвестно' }}
                                            </p>
                                        </div>
                                    </div>
                                    <button wire:click="downloadFile({{ $file->id }})"
                                        class="p-1 text-[#6B6B6B] hover:text-[#1A1A1A] transition-colors"
                                        title="Скачать файл">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @empty
            <div class="text-xs text-[#9A9A9A] italic">Нет истории статусов</div>
        @endforelse
    </div>
</details>
