<?php

namespace App\Http\Controllers;

use App\Models\FormataLetra;
use App\Models\NumerosPrimos;
use Illuminate\Http\Request;

class DesafiosLogicaController extends Controller
{
    /**
     * Lista números de 1 a 100 mas no múltiplos de 3, 5 e 3 e 5
     * faz substituições dos primos por palavras.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numerosPrimos = new NumerosPrimos();

        return response($numerosPrimos->substituiNumeros(), 200);
    }

    /**
     * Alterna entre maiúsculas e minúsculas uma determinada palavra de
     * acordo com o status da primeira letra.
     *
     * @param string $palavra
     * @return \Illuminate\Http\Response
     */
    public function bonus($palavra)
    {
        filter_var($palavra, FILTER_SANITIZE_STRING);
        $formataLetra = new FormataLetra($palavra);
    
        return response($formataLetra->alternaMaiusculasMinusculas(), 200);
    }
}
