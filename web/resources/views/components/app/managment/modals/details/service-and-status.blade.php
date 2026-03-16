@props(['serviceType', 'status'])

<div class="mb-6">
    <h3 class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">Услуга</h3>
    <p class="text-sm text-[#1A1A1A] font-normal break-words">{{ $serviceType }}</p>
</div>

<div class="mb-6">
    <h3 class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-2">Статус</h3>
    <span
        class="badge {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$status]['badge'] ?? 'badge-neutral' }} text-sm py-3 px-4 rounded-md font-normal">
        {{ \App\Helpers\QuestionareStatus::$questionaresLabels[$status]['label'] ?? $status }}
    </span>
</div>
