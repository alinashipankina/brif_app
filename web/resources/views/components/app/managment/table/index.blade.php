@props(['questionares', 'sortField', 'sortDirection'])

<div class="bg-base-100 border border-[#E8E8E8] shadow-sm mb-6">
    <div class="overflow-x-auto -mx-4">
        <table class="table table-zebra min-w-full">

            {{-- Заголовок таблицы --}}
            <x-app.managment.table.header :sort-field="$sortField" :sort-direction="$sortDirection" />

            <tbody>
                @forelse($questionares as $questionare)
                    <x-app.managment.table.row :questionare="$questionare" />
                @empty
                    <x-app.managment.table.empty-state />
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Пагинация --}}
    <x-app.managment.table.pagination :paginator="$questionares" />
</div>
