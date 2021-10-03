<?php

namespace App\Models;

class NumerosPrimos
{
    const INICIO = 1;
    const FIM = 100;
    private $numeros;

    public function __construct()
    {
        $this->carregandoNumeros();
    }

    public function substituiNumeros()
    {
        foreach ($this->numeros as &$numero) {
            $ehPrimoDeTres = $this->ehPrimoDeTres($numero);
            $ehPrimoDeCinco = $this->ehPrimoDeCinco($numero);

            $textoDeSubstituicao = $this->executaSubstituicao(
                $ehPrimoDeTres, 
                $ehPrimoDeCinco
            );
            
            if (!is_null($textoDeSubstituicao)) {
                $numero = $textoDeSubstituicao;
            }
        }

        return $this->numeros;
    }

    private function carregandoNumeros()
    {
        $this->numeros = [];

        for ($numero = self::INICIO; $numero <= self::FIM; $numero++) {
            array_push($this->numeros, $numero);
        }   
    }

    private function ehPrimoDeTres($numero)
    {
        if ($numero % 3 === 0) {
            return true;
        }

        return false;
    }

    private function ehPrimoDeCinco($numero)
    {
        if ($numero % 5 === 0) {
            return true;
        }
        
        return false;
    }

    private function executaSubstituicao($ehPrimoDeTres, $ehPrimoDeCinco)
    {
        if ($ehPrimoDeTres === true && $ehPrimoDeCinco === true) {
            return 'Coblue';
        }
        
        if ($ehPrimoDeTres === true) {
            return 'Co';
        }

        if ($ehPrimoDeCinco === true) {
            return 'Blue';
        }

        return null;
    }

}
