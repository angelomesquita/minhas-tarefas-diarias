<?php

namespace App\Http\Controllers;

use App\Models\FormataLetra;
use App\Models\NumerosPrimos;
use Illuminate\Http\Request;

class DesafiosLogicaController extends Controller
{
    public function index()
    {
        $numerosPrimos = new NumerosPrimos();

        return response($numerosPrimos->substituiNumeros(), 200);
    }

    public function bonus($palavra)
    {
        filter_var($palavra, FILTER_SANITIZE_STRING);
        $formataLetra = new FormataLetra($palavra);
    
        return response($formataLetra->alternaMaiusculasMinusculas(), 200);
    }
}
