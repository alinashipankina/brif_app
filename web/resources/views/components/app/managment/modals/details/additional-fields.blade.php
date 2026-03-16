@props(['fields', 'serviceType'])

<div class="mt-6">
    <h3 class="text-sm md:text-base font-medium text-[#1A1A1A] uppercase tracking-wider mb-3">
        Дополнительная информация
    </h3>
    <div class="space-y-3">
        @foreach ($fields as $field)
            @php
                // Пропускаем поля с прогнозом
                $skipFields = ['day_of_week', 'time_of_day', 'form_completion_time', 'segments_count'];
                if (in_array($field->field_name, $skipFields)) {
                    continue;
                }

                // Для аутстаффа скрываем поле конкурентов
                if ($serviceType === 'Аутстафф' && $field->field_name === 'concurents') {
                    continue;
                }
            @endphp

            <div class="collapse collapse-arrow border border-[#E8E8E8] rounded-md">
                <input type="checkbox" class="peer" />

                <div class="collapse-title font-medium text-sm text-[#1A1A1A] flex items-center px-4 py-3 min-h-0">
                    <div class="flex items-center gap-3 flex-1">
                        <svg class="w-5 h-5 {{ \App\Helpers\QuestionareStatus::getIconColor($field->field_name) }} flex-shrink-0"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="{{ \App\Helpers\QuestionareStatus::getIcon($field->field_name) }}" />
                        </svg>
                        <span class="truncate">{{ \App\Helpers\QuestionareStatus::getTitle($field->field_name) }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                        @php
                            if ($field->field_name === 'concurents' && is_array($field->field_value)) {
                                $count = count($field->field_value);
                            } elseif (is_array($field->field_value)) {
                                $count = count($field->field_value);
                            } else {
                                $count = null;
                            }
                        @endphp

                        @if ($count)
                            <span
                                class="badge badge-sm badge-neutral rounded-none text-xs ml-2">{{ $count }}</span>
                        @endif
                        <div class="w-4"></div>
                    </div>
                </div>

                <div class="collapse-content border-t border-[#E8E8E8]">
                    <div class="space-y-2 pt-4">
                        @if (is_array($field->field_value))
                            @if ($field->field_name === 'concurents')
                                {{-- Конкуренты --}}
                                @foreach ($field->field_value as $index => $competitor)
                                    @if (is_array($competitor) && (!empty($competitor['name']) || !empty($competitor['url'])))
                                        <div
                                            class="p-4 border border-[#E8E8E8] mb-3 last:mb-0 rounded-md {{ $loop->first ? 'mt-0' : '' }}">
                                            <div class="space-y-3">
                                                @if (!empty($competitor['name']))
                                                    <div>
                                                        <p
                                                            class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">
                                                            Название конкурента {{ $index + 1 }}
                                                        </p>
                                                        <p class="text-sm text-[#1A1A1A] break-words">
                                                            {{ $competitor['name'] }}</p>
                                                    </div>
                                                @endif

                                                @if (!empty($competitor['url']))
                                                    <div>
                                                        <p
                                                            class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">
                                                            Сайт
                                                        </p>
                                                        <p class="text-sm text-[#1A1A1A] break-words">
                                                            @if (filter_var($competitor['url'], FILTER_VALIDATE_URL))
                                                                <a href="{{ $competitor['url'] }}" target="_blank"
                                                                    class="text-sm text-[#1A1A1A] hover:text-[#4A4A4A] underline underline-offset-2 flex items-center gap-1 break-all">
                                                                    <svg class="w-4 h-4 flex-shrink-0" fill="none"
                                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="1.5"
                                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                                    </svg>
                                                                    <span>{{ $competitor['url'] }}</span>
                                                                </a>
                                                            @else
                                                                {{ $competitor['url'] }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @elseif ($field->field_name === 'urls' || $field->field_name === 'social_links')
                                {{-- Ссылки --}}
                                @foreach ($field->field_value as $url)
                                    @if (!empty($url))
                                        <div
                                            class="p-3 border border-[#E8E8E8] rounded-md {{ $loop->first ? 'mt-0' : '' }}">
                                            @if (is_array($url))
                                                @foreach ($url as $item)
                                                    @if (!empty($item))
                                                        @if (filter_var($item, FILTER_VALIDATE_URL))
                                                            <a href="{{ $item }}" target="_blank"
                                                                class="text-sm text-[#1A1A1A] hover:text-[#4A4A4A] underline underline-offset-2 flex items-center gap-2 mb-2 last:mb-0 break-all">
                                                                <svg class="w-4 h-4 flex-shrink-0" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="1.5"
                                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                                </svg>
                                                                <span>{{ $item }}</span>
                                                            </a>
                                                        @else
                                                            <p class="text-sm text-[#1A1A1A] break-words">
                                                                {{ $item }}</p>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @elseif (filter_var($url, FILTER_VALIDATE_URL))
                                                <a href="{{ $url }}" target="_blank"
                                                    class="text-sm text-[#1A1A1A] hover:text-[#4A4A4A] underline underline-offset-2 flex items-center gap-2 break-all">
                                                    <svg class="w-4 h-4 flex-shrink-0" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                    </svg>
                                                    <span>{{ $url }}</span>
                                                </a>
                                            @else
                                                <p class="text-sm text-[#1A1A1A] break-words">{{ $url }}</p>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                {{-- Для других массивов --}}
                                @foreach ($field->field_value as $value)
                                    @if (!empty($value))
                                        <div
                                            class="p-3 border border-[#E8E8E8] rounded-md {{ $loop->first ? 'mt-0' : '' }}">
                                            @if (is_array($value))
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach ($value as $item)
                                                        @if (!empty($item))
                                                            <span
                                                                class="px-2 py-1 text-xs bg-[#F5F5F5] text-[#1A1A1A] border border-[#E8E8E8] rounded-none">{{ $item }}</span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @else
                                                <p class="text-sm text-[#1A1A1A] break-words">{{ $value }}</p>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @else
                            {{-- Для не-массивов --}}
                            @if (!empty($field->field_value))
                                <div class="p-3 border border-[#E8E8E8] rounded-md">
                                    @if (
                                        ($field->field_name === 'urls' || $field->field_name === 'social_links') &&
                                            filter_var($field->field_value, FILTER_VALIDATE_URL))
                                        <a href="{{ $field->field_value }}" target="_blank"
                                            class="text-sm text-[#1A1A1A] hover:text-[#4A4A4A] underline underline-offset-2 flex items-center gap-2 break-all">
                                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                            <span>{{ $field->field_value }}</span>
                                        </a>
                                    @else
                                        <p class="text-sm text-[#1A1A1A] break-words">{{ $field->field_value }}</p>
                                    @endif
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
