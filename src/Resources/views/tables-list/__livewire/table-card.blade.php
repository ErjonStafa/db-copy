<x-dbcopy::card
    class="hover:bg-slate-200 hover:scale-105 transition-all ease-in cursor-pointer col-span-1"
    style="{{ $selected?'border-color: var(--color-green-600);':'' }}"
    wire:click="selectThisTable('{{ $tableName }}')"
    onclick="document.querySelector('#scroll-position').scrollIntoView({ behavior: 'smooth' })"
> <!-- Card start -->
    <div> <!-- Title start -->
        <h3 class="text-lg break-all text-light-cyan-900 font-semibold text-center">
            {{ $tableName }}
        </h3>
    </div><!-- Title end -->

    <hr class="bg-light-cyan-700 text-light-cyan-700 mb-2"> <!-- Divider -->

    <!-- Card body start -->
    <div class="flex flex-col text-center bg-light-cyan-100 text-light-cyan-800 rounded-lg mb-3 p-2 font-[550]">
        <span class="text-lg">Columns</span>
        <span class="text-2xl">{{ $columnCount }}</span>
    </div>
    <div class="flex flex-col text-center bg-emerald-100 text-emerald-600 rounded-lg mb-3 p-3 font-[550]">
        <span class="text-xl">Rows</span>
        <span class="text-2xl">{{ $rowCount }}</span>
    </div>
    <!-- Card body end -->
</x-dbcopy::card><!-- Card end -->
