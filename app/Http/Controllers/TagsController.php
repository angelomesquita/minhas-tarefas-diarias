<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Tag::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response('Bad Request', 400);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['titulo' => 'required']);

        $retorno = Tag::create([
            'titulo' => $request->input('titulo')
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
        return response('Bad Request', 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response('Bad Request', 400);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false) {
            return response('Bad Request', 400);
        }

        $tagEditada = Tag::findOrFail($id);
        $resultado = $tagEditada->update($request->all());
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
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false) {
            return response('Bad Request', 400);
        }

        $tagsExcluida = Tag::findOrFail($id);
        if ($id != $tagsExcluida->id) {
            return response('Forbidden', 403);
        }

        Tag::destroy($id);

        return response('No Content', 204);
    }
}
