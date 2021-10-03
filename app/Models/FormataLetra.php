<?php

namespace App\Models;

class FormataLetra
{
    private $palavra;

    public function __construct($palavra)
    {
        $this->palavra = $palavra;
    }

    public function alternaMaiusculasMinusculas()
    {
        $comecaComMaiuscula = $this->ehMaiscula($this->palavra[0]);
        
        for ($posicao = 0; $posicao < mb_strlen($this->palavra); $posicao++) {
            $letra = $this->palavra[$posicao];
            $this->palavra[$posicao] = $this->alternar(
                $comecaComMaiuscula,
                $letra,
                $posicao
            );
        }

        return $this->palavra;
    }

    private function alternar($comecaComMaiuscula, $letra, $posicao)
    {
        if ($comecaComMaiuscula === true && $posicao % 2 === 0) {
            return mb_strtoupper($letra);
        } 
        
        if ($comecaComMaiuscula === true && $posicao % 2 !== 0) {
            return mb_strtolower($letra);
        }
        
        if ($comecaComMaiuscula === false && $posicao % 2 === 0) {
            return mb_strtolower($letra);
        }

        if ($comecaComMaiuscula === false && $posicao % 2 !== 0) {
            return mb_strtoupper($letra);
        }
    }

    private function ehMaiscula($letra)
    {
        if (ctype_upper($letra) === false) {
            return false;
        }

        return true;
    }
}
