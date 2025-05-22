<?php

use Illuminate\Support\Facades\Route;

Route::get(config('db_copy.url_path'), fn () => view('dbcopy::home'))
    ->middleware(config('db_copy.middlewares'))
    ->name(config('db_copy.route_name'));
