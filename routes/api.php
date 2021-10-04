<?php

use App\Http\Controllers\DesafiosLogicaController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TarefasController;
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

Route::prefix('/v1/tarefas')->group(function() {
    Route::get('/', [TarefasController::class, 'index'])
        ->name('tarefas.listar');

    Route::get('/diasanteriores', [TarefasController::class, 'diasanteriores'])
        ->name('tarefas.listar.diasanteriores');
        
    Route::get('/arquivadas', [TarefasController::class, 'arquivadas'])
        ->name('tarefas.listar.arquivadas');

});

Route::prefix('/v1/tarefa')->group(function() {
    Route::post('/', [TarefasController::class, 'store'])
        ->name('tarefa.inserir');

    Route::patch('/{id}', [TarefasController::class, 'update'])
        ->name('tarefa.editar');

    Route::put('/arquivar/{id}', [TarefasController::class, 'arquivar'])
        ->name('tarefa.arquivar');

    Route::put('/concluir/{id}', [TarefasController::class, 'concluir'])
        ->name('tarefa.concluir');
});

Route::prefix('/v1/tags')->group(function() {
    Route::get('/', [TagsController::class, 'index'])
        ->name('tag.listar');
});

Route::prefix('/v1/tag')->group(function() {
    Route::post('/', [TagsController::class, 'store'])
        ->name('tag.inserir');
    
    Route::patch('/{id}', [TagsController::class, 'update'])
        ->name('tag.editar');

    Route::delete('/{id}', [TagsController::class, 'destroy'])
        ->name('tag.excluir');
});

Route::prefix('/v1/desafio-logica')->group(function() {
    Route::get('/', [DesafiosLogicaController::class, 'index'])
        ->name('desafio.logica');

    Route::get('/bonus/{palavra}', [DesafiosLogicaController::class, 'bonus'])
        ->name('desafio.logica.bonus');
});
