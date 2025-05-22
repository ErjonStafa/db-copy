<?php

namespace Erjon\DbCopy\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class TableData extends Component
{
    public $data;

    public $columns = [];

    public $table = null;

    public $show = false;

    public $showArray = true;

    public $showJson = false;

    #[On('change-table-and-columns')]
    public function changeTableAndColumns(string $table, array $columns = []): void
    {
        $this->table = $table;
        $this->columns = $columns;
        $this->show = true;
    }

    protected function queryData(): Collection
    {
        if (empty($this->table) || empty($this->columns)) {
            return collect([]);
        }

        return $this->data = \DB::table($this->table)->select($this->columns)->get();
    }

    protected function makeItAsArray(Collection $data): array
    {
        return $data->map(function ($item) {
            return (array) $item;
        })->toArray();
    }

    protected function makeItAsJson(Collection $data): string
    {
        return $data->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Triggered by selecting the Array tab
     */
    public function showDataAsArray(): void
    {
        $this->showArray = true;
        $this->showJson = false;
    }

    /**
     * Triggered by selecting the JSON tab
     */
    public function showDataAsJson(): void
    {
        $this->showJson = true;
        $this->showArray = false;
    }

    public function render()
    {
        $data = $this->queryData();
        $dataAsArray = $this->makeItAsArray($data);
        $dataAsJson = $this->makeItAsJson($data);

        return view('dbcopy::tables-list.__livewire.table-data', compact('data', 'dataAsArray', 'dataAsJson'));
    }
}
