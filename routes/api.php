<?php

use App\Http\Controllers\TarefasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/v1/tarefas', [TarefasController::class, 'index'])
    ->name('tarefas.listar');

Route::prefix('/v1/tarefa')->group(function() {
    Route::post('/', [TarefasController::class, 'store'])
        ->name('tarefa.inserir');

    Route::put('/{id}', [TarefasController::class, 'update'])
        ->name('tarefa.editar');

    Route::put('/arquivar/{id}', [TarefasController::class, 'arquivar'])
        ->name('tarefa.arquivar');

    Route::put('/concluir/{id}', [TarefasController::class, 'concluir'])
        ->name('tarefa.concluir');
});
