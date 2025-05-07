<div class="mt-5">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
        @foreach($tables as $table)
            <livewire:dbcopy::table-card
                wire:key="{{ $table.'-'.$selectedTable }}"
                :name="$table"
                :selected="$selectedTable == $table"
            /> <!-- Select table -->
        @endforeach
    </div>

    @if($selectedTable)
        <div class="mt-5">
            <h3 class="text-lg font-bold text-slate-700">{{ strtoupper($selectedTable.' Columns') }}</h3>
        </div>

        <div class="chip-set mt-3"> <!-- Column selector start -->
            @foreach($tableColumns as $column)
                <x-dbcopy::chip
                    id="chip-{{ $column }}"
                    class="inline-flex relative {{ (in_array($column, $selectedColumns) ? 'active' : '') }}"
                    wire:click="toggleSelectedColumns('{{ $column }}')"
                    wire:loading.attr="disabled"
                    wire:target="toggleSelectedColumns('{{ $column }}')"
                ><!-- Single column start -->
                    <x-dbcopy::spinner
                        class="hidden absolute mx-auto left-0 right-0 text-center"
                        wire:loading.class.remove="hidden"
                        wire:target="toggleSelectedColumns('{{ $column }}')"
                    /> <!-- Spinner -->
                    <span>{{ $column }}</span>
                </x-dbcopy::chip> <!-- Single column end -->
            @endforeach
        </div> <!-- Column selector end -->
    @endif

    <div class="mt-5">
        <livewire:dbcopy::table-data/>
    </div>
</div>
