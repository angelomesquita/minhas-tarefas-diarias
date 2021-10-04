<?php

namespace App\Models;

class FormataLetra
{
    private $palavra;

    public function __construct($palavra)
    {
        $this->palavra = $palavra;
    }

    /**
     * Executa a alternância entre maiúsculas e minúsculas em cada letra
     * da palavra de acordo com a primeira letra.
     *
     * @return string $palavra
     */
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

    /**
     * Com base na primeira letra altera o CASE da letra para maiúscula ou
     * minúscula
     *
     * @param boolean $comecaComMaiuscula
     * @param string $letra
     * @param int $posicao
     * @return string
     */
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

    /**
     * Verifica se determinada letra é maíscula.
     *
     * @param string $letra
     * @return boolean
     */
    private function ehMaiscula($letra)
    {
        if (ctype_upper($letra) === false) {
            return false;
        }

        return true;
    }
}
