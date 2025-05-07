<?php

namespace Erjon\DbCopy\Providers;

use Erjon\DbCopy\Http\Livewire\TableCard;
use Erjon\DbCopy\Http\Livewire\TableData;
use Erjon\DbCopy\Http\Livewire\TablesList;
use Erjon\DbCopy\Views\ArrayHighlight;
use Erjon\DbCopy\Views\JsonHighlight;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DbCopyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->handleConfig();
        $this->handleViews();
        $this->bootRoutes();
        $this->livewireComponents();
        $this->publishAssets();
    }

    public function register(): void
    {
        //
    }

    protected function handleConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/db_copy.php', 'db_copy'
        );

        $this->publishes([
            __DIR__.__DIR__.'/../../config/db_copy.php', config_path('db_copy.php'),
        ]);
    }

    protected function bootRoutes(): void
    {
        Route::group([
            'prefix'     => config('db_copy.route_path'),
            'middleware' => 'web',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        });
    }

    protected function handleViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'dbcopy');

        \Blade::component('array-highlight', ArrayHighlight::class);
        \Blade::component('json-highlight', JsonHighlight::class);
    }

    protected function livewireComponents(): void
    {
        Livewire::component('dbcopy::tables-list', TablesList::class);

        Livewire::component('dbcopy::table-card', TableCard::class);

        Livewire::component('dbcopy::table-data', TableData::class);
    }

    public function publishAssets(): void
    {
        $this->publishes([
            __DIR__.'/../../public' => public_path('vendor/erjon'),
        ], 'db-copy');
    }
}
