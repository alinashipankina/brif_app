@props(['questionares', 'sortField', 'sortDirection'])

<div class="bg-base-100 border border-[#E8E8E8] shadow-sm mb-6 overflow-x-auto">
    <table class="table table-zebra w-full table-fixed min-w-[1300px]">
        <colgroup>
            <col class="w-[80px]">
            <col class="w-[130px]">
            <col class="w-[130px]">
            <col class="w-[100px]">
            <col class="w-[120px]">
            <col class="w-[100px]">
            <col class="w-[120px]">
            <col class="w-[100px]">
            <col class="w-[50px]">
        </colgroup>

        <x-app.managment.table.header :sort-field="$sortField" :sort-direction="$sortDirection" />

        <tbody>
            @forelse($questionares as $questionare)
                <x-app.managment.table.row :questionare="$questionare" />
            @empty
                <x-app.managment.table.empty-state />
            @endforelse
        </tbody>
    </table>

    {{-- Пагинация --}}
    <x-app.managment.table.pagination :paginator="$questionares" />
</div>
