@props(['questionare'])

<tr>
    <td class="px-4 py-3 text-sm font-medium text-[#1A1A1A] w-[80px]">
        #{{ $questionare->id }}
    </td>
    <td class="px-4 py-3 text-sm text-[#1A1A1A] break-words whitespace-normal w-[130px]">
        {{ $questionare->name }}
    </td>
    <td class="px-4 py-3 text-sm text-[#6B6B6B] break-words whitespace-normal w-[130px]">
        {{ $questionare->service_type }}
    </td>
    <td class="px-4 py-3 text-sm text-[#6B6B6B] break-words whitespace-normal w-[100px]">
        @if ($questionare->user_id)
            <span>{{ $questionare->user->name }}</span>
        @else
            <span>-</span>
        @endif
    </td>
    <td class="px-4 py-3 w-[120px]">
        <span
            class="badge {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$questionare->status]['badge'] ?? 'badge-neutral' }} text-sm whitespace-nowrap inline-block rounded-md">
            {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$questionare->status]['label'] }}
        </span>
    </td>
    <td class="px-4 py-3 text-sm text-[#6B6B6B] w-[100px]">
        {{ $questionare->created_at->format('d.m.Y') }}
        <span class="text-xs">{{ $questionare->created_at->format('H:i') }}</span>
    </td>
    <td class="px-4 py-3 text-sm text-[#6B6B6B] w-[120px]">
        {{ $questionare->updated_at->format('d.m.Y') }}
        <span class="text-xs">{{ $questionare->updated_at->format('H:i') }}</span>
    </td>
    <td class="px-4 py-3 text-sm text-[#1A1A1A] w-[100px]">
        @if ($questionare->prediction_probability)
            <div class="flex flex-col space-y-1">
                <div class="flex items-center gap-2">
                    <div class="w-20 bg-gray-200 rounded-full h-2">
                        <div class="h-2 rounded-full"
                            style="width: {{ $questionare->prediction_probability * 100 }}%;
                            background-color: {{ $questionare->prediction_probability > 0.7 ? '#10b981' : ($questionare->prediction_probability > 0.4 ? '#f59e0b' : '#ef4444') }};">
                        </div>
                    </div>
                    <span class="text-xs font-medium">{{ round($questionare->prediction_probability * 100) }}%</span>
                </div>
                <div class="flex items-center gap-1">
                    @if ($questionare->prediction_will_buy)
                        <svg class="w-4 h-4 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span class="text-xs text-[#10b981]">Скорее купит</span>
                    @else
                        <svg class="w-4 h-4 text-[#ef4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span class="text-xs text-[#ef4444]">Скорее нет</span>
                    @endif
                </div>
                <span class="text-[10px] text-gray-500">Уверенность: {{ $questionare->prediction_confidence }}</span>
            </div>
        @else
            <span class="text-gray-400">—</span>
        @endif
    </td>
    <td class="w-[50px]">
        <div class="flex gap-1">
            <button wire:click="selectQuestionare({{ $questionare->id }})" class="btn btn-xs btn-ghost"
                onclick="event.stopPropagation()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>
        </div>
    </td>
</tr>
