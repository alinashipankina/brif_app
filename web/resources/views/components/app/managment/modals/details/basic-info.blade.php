@props(['questionare'])

<!-- Наименование -->
<div>
    <h3 class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">ФИО, компания</h3>
    <p class="text-sm text-[#1A1A1A] font-normal break-words">{{ $questionare->name }}</p>
</div>

<!-- Должность -->
<div>
    <h3 class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">Должность</h3>
    <p class="text-sm text-[#1A1A1A] font-normal break-words">{{ $questionare->role }}</p>
</div>

<!-- Номер телефона -->
<div>
    <h3 class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">Номер телефона</h3>
    <p class="text-sm text-[#1A1A1A] font-normal break-words">{{ $questionare->phone }}</p>
</div>

<!-- Электронная почта -->
<div>
    <h3 class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">Электронная почта</h3>
    <p class="text-sm text-[#1A1A1A] font-normal break-words">{{ $questionare->email }}</p>
</div>

<!-- Дата создания -->
<div class="grid grid-cols-2 gap-4 mt-4">
    <div>
        <h3 class="text-xs font-medium text-[#6B6B6B] uppercase tracking-wider mb-1">Дата создания</h3>
        <p class="text-sm text-[#1A1A1A] font-normal">{{ $questionare->created_at->format('d.m.Y H:i') }}</p>
    </div>
</div>
