<?php

use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tarefas', [TarefasController::class, 'index'])
    ->name('tarefas.listar');

Route::prefix('/tarefa')->group(function() {
    Route::post('/', [TarefasController::class, 'store'])
        ->name('tarefa.inserir');

    Route::put('/{id}', [TarefasController::class, 'update'])
        ->name('tarefa.editar');

    Route::put('/arquivar/{id}', [TarefasController::class, 'arquivar'])
        ->name('tarefa.arquivar');

    Route::put('/concluir/{id}', [TarefasController::class, 'concluir'])
        ->name('tarefa.concluir');
});
