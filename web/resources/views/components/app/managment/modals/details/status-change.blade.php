@props(['showSetStatus', 'selectedStatus', 'selectedComment', 'tempFiles', 'isSaveDisabled'])

<div class="flex flex-col justify-between gap-3 w-full">
    @if (!$showSetStatus)
        <button type="button" wire:click='setShowSetStatus'
            class="btn w-full h-10 text-xs font-medium bg-white border border-[#D0D0D0] text-[#1A1A1A] hover:bg-[#F5F5F5] transition-colors duration-200 rounded-none uppercase tracking-wider">
            Изменить статус
        </button>
    @endif

    @if ($showSetStatus)
        <div class="space-y-3">
            <select class="select w-full h-10 border border-[#D0D0D0] rounded-none text-sm" wire:model='selectedStatus'>
                <option value="" class="text-[#9A9A9A]">Выберите статус</option>
                @foreach (\App\Helpers\QuestionareStatus::$questionaresLabels as $status => $label)
                    <option value="{{ $status }}" class="text-[#1A1A1A]">
                        {{ $label['label'] }}
                    </option>
                @endforeach
            </select>

            <textarea class="textarea w-full border border-[#D0D0D0] rounded-none text-sm p-3" wire:model='selectedComment'
                placeholder="Комментарий (обязательно)" rows="3"></textarea>

            {{-- Загрузка файлов --}}
            <x-app.managment.modals.details.file-upload :temp-files="$tempFiles" />

            @error('selectedComment')
                <p class="text-xs text-[#8B0000] mt-1">{{ $message }}</p>
            @enderror

            @error('selectedStatus')
                <p class="text-xs text-[#8B0000] mt-1">{{ $message }}</p>
            @enderror

            <div class="flex gap-2">
                <button wire:click='changeStatus' type="button"
                    class="btn flex-1 h-10 text-xs font-medium bg-[#1A1A1A] hover:bg-[#2A2A2A] text-white border-0 transition-colors duration-200 rounded-none uppercase tracking-wider disabled:opacity-50 disabled:cursor-not-allowed"
                    wire:disabled="{{ $isSaveDisabled }}">
                    Сохранить
                </button>

                <button wire:click='cancelStatusChange' type="button"
                    class="btn flex-1 h-10 text-xs font-medium bg-white border border-[#D0D0D0] text-[#6B6B6B] hover:bg-[#F5F5F5] hover:text-[#1A1A1A] transition-colors duration-200 rounded-none uppercase tracking-wider">
                    Отменить
                </button>
            </div>
        </div>
    @endif
</div>
