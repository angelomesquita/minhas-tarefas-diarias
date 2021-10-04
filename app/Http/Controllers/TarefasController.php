<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    /**
     * Exibe uma lista das tarefas cadastradas no dia e não arquivadas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dadosTarefas = Tarefa::where([
            ['created_at',
            'like', 
            Carbon::now()->format('Y-m-d%')],
            ['arquivada', '=', '0']
        ])->get();

        return response($dadosTarefas, 200);
    }

    /**
     * Exibe uma lista das tarefas cadastradas em dias anteriores
     *
     * @return \Illuminate\Http\Response
     */
    public function diasanteriores()
    {
        $dadosTarefas = Tarefa::where([
            ['created_at',
            '', 
            Carbon::now()->format('Y-m-d%')],
            ['arquivada', '=', '0']
        ])->get();

        return response($dadosTarefas, 200);
    }

    /**
     * Exibe uma lista das tarefas arquivadas
     *
     * @return \Illuminate\Http\Response
     */
    public function arquivadas()
    {
        $dadosTarefas = Tarefa::where('arquivada', '=', '1')->get();

        return response($dadosTarefas, 200);
    }

    /**
     * Vincula um id de tag a uma determinada tarefa
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function vinculartag(Request $request, $id)
    {
        $request->validate(['tag_id' => 'required|integer']);
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false) {
            return response('Bad Request', 400);
        }

        $dadosTarefa = Tarefa::findOrFail($id);
        $resultado = $dadosTarefa->update($request->all());
        if (!$resultado === true) {
            return response('Bad Request', 400);
        }

        return response('No Content', 204);

    }

    /**
     * Filtra tarefas por uma tag específica
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function portags($id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false) {
            return response('Bad Request', 400);
        }

        $dadosTarefas = Tarefa::with('tag')->where([
            ['tag_id', 
            '=',
            $id]
        ])->get();

        return response($dadosTarefas, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Insere uma nova tarefa no banco de dadoss
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['titulo' => 'required']);

        $retorno = Tarefa::create([
            'tag_id' => $request->input('tag_id'),
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
        ]);

        return response($retorno, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Atualiza dados de uma tarefa específica
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'arquivada' => 'boolean',
            'concluida' => 'boolean'
        ]);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id === false) {
            return response('Bad Request', 400);
        }

        $tarefaEditada = Tarefa::findOrFail($id);
        $resultado = $tarefaEditada->update($request->all());
        if (!$resultado === true) {
            return response('Bad Request', 400);
        }

        return response('No Content', 204);
    }

    /**
     * Atualiza o status da tarefa para Arquivada
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function arquivar($id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id === false) {
            return response('Bad Request', 400);
        }

        $tarefaArquivada = Tarefa::findOrFail($id);
        $resultado = $tarefaArquivada->update(['arquivada' => 1]);
        if (!$resultado === true) {
            return response('Bad Request', 400);
        }

        return response('No Content', 204);
    }

    /**
     * Atualiza o status da tarefa para Concluida
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function concluir($id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id === false) {
            return response('Bad Request', 400);
        }

        $tarefaConcluida = Tarefa::findOrFail($id);
        $resultado = $tarefaConcluida->update(['concluida' => 1]);
        if (!$resultado === true) {
            return response('Bad Request', 400);
        }

        return response('No Content', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
