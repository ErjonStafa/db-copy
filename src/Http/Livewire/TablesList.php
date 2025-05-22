<?php

namespace Erjon\DbCopy\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class TablesList extends Component
{
    public $selectedTable;

    public array $selectedColumns = [];

    public $needToGenerateData = false;

    protected function getTableNames(): array
    {
        return DB::connection()
            ->getSchemaBuilder()
            ->getTableListing();
    }

    /**
     * Handles table clicking
     */
    #[On('changeSelectedTable')]
    public function changeSelectedTable($tableName): void
    {
        if ($this->selectedTable === $tableName) {
            // Unselect if selected
            $this->selectedTable = null;

            return;
        }

        $this->selectedTable = $tableName;
        $this->selectedColumns = $this->getSelectedTableColumns(); // At first display all columns

        $this->generateData();
    }

    /**
     * Handles column filtering
     *
     * @param $column
     * @return void
     */
    public function toggleSelectedColumns($column): void
    {
        if (in_array($column, $this->selectedColumns)) {
            $this->selectedColumns = array_diff($this->selectedColumns, [$column]);
        } else {
            $this->selectedColumns[] = $column;
        }

        $this->generateData();
    }

    public function getSelectedTableColumns(): array
    {
        return \DB::connection()
            ->getSchemaBuilder()
            ->getColumnListing($this->selectedTable);
    }

    /**
     * Dispatch an event to the component that displays the table data to change the information
     *
     * @see TableData::changeTableAndColumns()
     */
    protected function generateData(): void
    {
        $this->dispatch('change-table-and-columns', table: $this->selectedTable, columns: array_values($this->selectedColumns))
            ->to(TableData::class);
    }

    public function render()
    {
        $tables = $this->getTableNames();
        $selectedTableColumns = $this->getSelectedTableColumns();

        return view('dbcopy::tables-list.__livewire.tables-list', compact('tables', 'selectedTableColumns'));
    }

    /**
     * Shows on the first load
     */
    public function placeholder()
    {
        return view('dbcopy::tables-list.__skeleton.tables-list');
    }
}
