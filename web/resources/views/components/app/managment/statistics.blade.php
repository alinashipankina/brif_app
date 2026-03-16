@props(['statistics'])

<div class="mb-6 md:mb-8">
    <div class="border border-[#E8E8E8] bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg md:text-xl font-light text-[#1A1A1A] tracking-tight uppercase">Статистика заявок</h2>
                <p class="text-xs text-[#6B6B6B] mt-1">Распределение по статусам</p>
            </div>
            <div class="text-right">
                <span class="text-3xl md:text-4xl font-bold text-[#4A4A4A]">{{ $statistics['total'] }}</span>
                <span class="text-sm text-[#6B6B6B] ml-1">всего</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Левая колонка --}}
            <div class="space-y-4">
                @foreach (array_slice(\App\Helpers\QuestionareStatus::$questionaresLabels, 0, 5) as $key => $status)
                    @php
                        $count = $statistics['by_status'][$key] ?? 0;
                        $percent = $statistics['total'] > 0 ? round(($count / $statistics['total']) * 100) : 0;
                    @endphp
                    <div>
                        <div class="flex justify-between items-center text-sm mb-1">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full"
                                    style="background-color: {{ $status['color'] }}"></span>
                                <span class="text-[#1A1A1A] font-normal">{{ $status['label'] }}</span>
                            </div>
                            <span class="font-normal text-[#1A1A1A]">{{ $count }}
                                <span class="text-xs text-[#6B6B6B] font-normal">({{ $percent }}%)</span>
                            </span>
                        </div>
                        <div class="w-full bg-gray-100 h-2.5">
                            <div class="h-2.5"
                                style="width: {{ $percent }}%; background-color: {{ $status['color'] }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Правая колонка --}}
            <div class="space-y-4">
                @foreach (array_slice(\App\Helpers\QuestionareStatus::$questionaresLabels, 5) as $key => $status)
                    @php
                        $count = $statistics['by_status'][$key] ?? 0;
                        $percent = $statistics['total'] > 0 ? round(($count / $statistics['total']) * 100) : 0;
                    @endphp
                    <div>
                        <div class="flex justify-between items-center text-sm mb-1">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full"
                                    style="background-color: {{ $status['color'] }}"></span>
                                <span class="text-[#1A1A1A] font-normal">{{ $status['label'] }}</span>
                            </div>
                            <span class="font-normal text-[#1A1A1A]">{{ $count }}
                                <span class="text-xs text-[#6B6B6B] font-normal">({{ $percent }}%)</span>
                            </span>
                        </div>
                        <div class="w-full bg-gray-100 h-2.5">
                            <div class="h-2.5"
                                style="width: {{ $percent }}%; background-color: {{ $status['color'] }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-[#E8E8E8] flex justify-between items-center text-xs text-[#6B6B6B]">
            <span>Обновлено {{ now()->format('d.m.Y H:i') }}</span>
        </div>
    </div>
</div>
