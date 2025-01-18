<?php

use App\ENUM\SupportStatusEnum;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;

//HOME
Route::get('/', function () {
    return redirect()->route('supports.index');
});

//CONTATO
Route::get('/contact', [SiteController::class, 'contact']);

//ROTAS SUPORTE
//Index
Route::get('/supports', [SupportController::class, 'index']) -> name('supports.index');
//Criar
Route::get('/supports/create', [SupportController::class, 'create']) -> name('supports.create');
Route::post('/supports', [SupportController::class, 'store']) -> name('supports.store');
//Atualizar
Route::get('/supports/{id}', [SupportController::class, 'show']) -> name('supports.show');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit']) -> name('supports.edit');
Route::put('/supports/{id}', [SupportController::class, 'update']) -> name('supports.update');
//Deletar
Route::delete('/supports/{id}', [SupportController::class, 'destroy']) -> name('supports.destroy');


//TESTE
Route::get('/test', function (){
    dd();
});
