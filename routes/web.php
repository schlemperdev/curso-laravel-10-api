<?php

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('supports.index');
});

Route::get('/contact', [SiteController::class, 'contact']);

Route::get('/supports', [SupportController::class, 'index']) -> name('supports.index');
Route::get('/supports/create', [SupportController::class, 'create']) -> name('supports.create');
Route::post('/supports', [SupportController::class, 'store']) -> name('supports.store');

Route::get('/supports/{id}', [SupportController::class, 'show']) -> name('supports.show');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit']) -> name('supports.edit');
Route::put('/supports/{id}', [SupportController::class, 'update']) -> name('supports.update');
