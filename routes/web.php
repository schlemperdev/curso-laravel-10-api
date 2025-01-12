<?php

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [SiteController::class, 'contact']);
Route::get('/supports', [SupportController::class, 'index']) -> name('supports.index');
