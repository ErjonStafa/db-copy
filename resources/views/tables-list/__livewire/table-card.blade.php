<x-dbcopy::card
    class="hover:bg-slate-200 cursor-pointer col-span-1"
    style="{{ $selected?'border-color: var(--color-green-600);':'' }}"
    wire:click="selectThisTable('{{ $tableName }}')"
> <!-- Card start -->
    <div class="flex justify-between align-middle items-stretch"> <!-- Title start -->
        <h3 class="text-lg text-slate-600 font-semibold">
            {{ $tableName }}
        </h3>
    </div><!-- Title end -->

    <hr class="bg-slate-500 text-slate-500 mb-2"> <!-- Divider -->

    <!-- Card body start -->
    <p class="text-slate-600">
        <span>Columns</span>
        {{ $columnCount }}
    </p>
    <p class="text-slate-600">
        <span>Rows</span>
        {{ $rowCount }}
    </p>
    <!-- Card body end -->
</x-dbcopy::card><!-- Card end -->
