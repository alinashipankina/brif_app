@props(['tempFiles'])

<div class="space-y-2">
    <label class="block text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">
        Прикрепить файлы (до 10 МБ)
    </label>

    {{-- Список временных файлов --}}
    @if (!empty($tempFiles))
        <div class="space-y-2 mb-3">
            @foreach ($tempFiles as $index => $tempFile)
                <div
                    class="flex items-center justify-between p-2 bg-[#F5F5F5] border border-[#E8E8E8] rounded-none text-sm">
                    <div class="flex items-center gap-2 flex-1 min-w-0">
                        <svg class="w-4 h-4 flex-shrink-0 text-[#6B6B6B]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs text-[#1A1A1A] truncate">{{ $tempFile['name'] }}</p>
                            <p class="text-[10px] text-[#6B6B6B]">{{ round($tempFile['size'] / 1024, 1) }} KB</p>
                        </div>
                    </div>
                    <button wire:click="removeTempFile({{ $index }})"
                        class="p-1 text-[#6B6B6B] hover:text-[#8B0000] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Поле для загрузки --}}
    <div class="flex items-center justify-center w-full">
        <label for="file-upload"
            class="flex flex-col items-center justify-center w-full h-24 border-1 border-dashed border-[#E8E8E8] hover:border-[#1A1A1A] hover:bg-[#F5F5F5] transition-all duration-200 cursor-pointer p-3 relative z-10"
            style="border-width: 1px !important; border-style: dashed !important; border-color: #E8E8E8 !important;"
            onmouseover="this.style.borderColor='#6B6B6B'" onmouseout="this.style.borderColor='#E8E8E8'">

            <div class="flex flex-col items-center justify-center pt-5 pb-6 pointer-events-none">
                <svg class="w-8 h-8 mb-2 text-[#6B6B6B] group-hover:text-[#1A1A1A]" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <p class="mb-1 text-sm text-[#1A1A1A]">
                    <span class="font-medium underline underline-offset-2">Нажмите для выбора</span> или перетащите
                    файлы
                </p>
                <p class="text-xs text-[#6B6B6B]">Любые файлы до 10 МБ</p>
            </div>
            <input id="file-upload" type="file" wire:model.live="uploadedFiles" multiple class="hidden" />
        </label>
    </div>

    <div wire:loading wire:target="uploadedFiles" class="text-xs text-[#6B6B6B] flex items-center gap-2">
        <svg class="animate-spin w-4 h-4 text-[#1A1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
        Загрузка...
    </div>

    @error('uploadedFiles.*')
        <p class="text-xs text-[#8B0000] mt-1">{{ $message }}</p>
    @enderror

    @if (session('error'))
        <p class="text-xs text-[#8B0000] mt-1">{{ session('error') }}</p>
    @endif
</div>
