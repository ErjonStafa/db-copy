<?php

namespace Erjon\DbCopy\Http\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TableData extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $columns = [];

    public $table = null;

    public $show = false;

    public $showArray = true;

    public $showJson = false;

    public $perPage;

    protected $rowLimitForPerformance;

    public function __construct()
    {
        $this->rowLimitForPerformance = config('db_copy.paginate_if_there_are_more_than');
        $this->perPage = config('db_copy.per_page');
    }

    #[On('change-table-and-columns')]
    public function changeTableAndColumns(string $table, array $columns = []): void
    {
        $this->table = $table;
        $this->columns = $columns;
        $this->show = true;
    }

    protected function onlyQuery()
    {
        return \DB::table($this->table)
            ->select($this->columns);
    }

    protected function queryData(): LengthAwarePaginator|Collection
    {
        if (empty($this->table) || empty($this->columns)) {
            return collect([]);
        }

        if ($this->onlyQuery()->count() <= $this->rowLimitForPerformance) {
            return $this->onlyQuery()->get();
        }

        return $this->perPage ? $this->onlyQuery()->paginate($this->perPage) : $this->onlyQuery()->get();
    }

    protected function makeItAsArray(LengthAwarePaginator|Collection $data): array
    {
        return $data->map(function ($item) {
            return (array) $item;
        })->toArray();
    }

    protected function makeItAsJson(LengthAwarePaginator|Collection $data): string
    {
        if ($data instanceof LengthAwarePaginator) {
            return $data->getCollection()->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

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

//    public function downloadPhpArray()
//    {
//        $data = $this->makeItAsArray($this->onlyQuery()->get());
//        $filename = $this->table.'.php';
//        return response()->streamDownload(function () use ($data) {
//            echo '<?php'.PHP_EOL.PHP_EOL.'return '.array_export($data).';';
//        }, $filename);
//    }
//
//    public function downloadJsonFile()
//    {
//        $data = $this->makeItAsJson($this->onlyQuery()->get());
//        $filename = $this->table.'.json';
//
//        return response()->streamDownload(function () use ($data) {
//            echo $data;
//        }, $filename);
//    }

    public function render()
    {
        $tableData = $this->queryData();
        $dataAsArray = $this->makeItAsArray($tableData);
        $dataAsJson = $this->makeItAsJson($tableData);

        return view('dbcopy::tables-list.__livewire.table-data', compact('tableData', 'dataAsArray', 'dataAsJson'));
    }
}
