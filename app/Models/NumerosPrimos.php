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

    /**
     * Executa a regra de verificação dos números primos de 3, números primos
     * de 5 e números primos de 3 e 5.
     *
     * @return array
     */
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

    /**
     * Inicializa um array com números de 1 a 100.
     *
     * @return void
     */
    private function carregandoNumeros()
    {
        $this->numeros = [];

        for ($numero = self::INICIO; $numero <= self::FIM; $numero++) {
            array_push($this->numeros, $numero);
        }   
    }

    /**
     * Verifica se o número é primo de 3.
     *
     * @param int $numero
     * @return boolean
     */
    private function ehPrimoDeTres($numero)
    {
        if ($numero % 3 === 0) {
            return true;
        }

        return false;
    }

    /**
     * Verifica se o número é primo de 5.
     *
     * @param int $numero
     * @return boolean
     */
    private function ehPrimoDeCinco($numero)
    {
        if ($numero % 5 === 0) {
            return true;
        }
        
        return false;
    }

    /**
     * Verifica se o número é primo de 3 e de 5.
     *
     * @param boolean $ehPrimoDeTres
     * @param boolean $ehPrimoDeCinco
     * @return string|null
     */
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
