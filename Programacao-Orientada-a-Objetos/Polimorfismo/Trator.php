<?php // phpcs:disable PSR1.Files.SideEffects.FoundWithSymbols

namespace Trator;

use MaquinaAgricola\MaquinaAgricola;

require_once('MaquinaAgricola.php');

class Trator extends MaquinaAgricola
{

    public function imprimir()
    {
        parent::imprimir();
        echo "imprimindo 2";
    }
}
