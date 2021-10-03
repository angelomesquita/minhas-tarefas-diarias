<?php

namespace App\Http\Controllers;

use App\Models\NumerosPrimos;
use Illuminate\Http\Request;

class DesafiosLogicaController extends Controller
{
    public function index()
    {
        $numerosPrimos = new NumerosPrimos();

        return response($numerosPrimos->substituiNumeros(), 200);
    }

    public function bonus(Request $request)
    {

    }
}
