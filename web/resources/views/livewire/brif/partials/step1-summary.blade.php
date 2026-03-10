<div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 md:gap-x-6 gap-y-3 md:gap-y-4">
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">ФИО,
            компания:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['name'] ?? '' }}</p>
    </div>
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Телефон:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal">
            {{ $data['phone'] ?? '' }}</p>
    </div>
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Должность:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['role'] ?? '' }}</p>
    </div>
    <div>
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Email:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['email'] ?? '' }}</p>
    </div>
    <div class="sm:col-span-2">
        <span class="text-[10px] md:text-xs text-[#6B6B6B] uppercase tracking-wider">Услуга:</span>
        <p class="text-xs md:text-sm text-[#1A1A1A] mt-0.5 md:mt-1 font-normal break-words">
            {{ $data['service_type'] ?? '' }}</p>
    </div>
</div>
