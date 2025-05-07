<?php

namespace Erjon\DbCopy\Http\Livewire;

use Livewire\Component;

class TableCard extends Component
{
    public $tableName;

    public bool $selected = false;

    public function mount($name, $selected = false)
    {
        $this->tableName = $name;
        $this->selected = $selected;
    }

    public function selectThisTable($tableName): void
    {
        $this->dispatch('changeSelectedTable', tableName: $tableName)
            ->to(TablesList::class);
    }

    public function columnCount(): int
    {
        return count(\DB::connection()->getSchemaBuilder()->getColumnListing($this->tableName));
    }

    public function rowCount(): int
    {
        return \DB::table($this->tableName)->count();
    }

    public function render()
    {
        return view('dbcopy::tables-list.__livewire.table-card', [
            'columnCount' => $this->columnCount(),
            'rowCount'    => $this->rowCount(),
        ]);
    }
}
