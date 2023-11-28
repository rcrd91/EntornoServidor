<?php

class Suma extends Calculo {

    //Propiedades
    //operando1, operando2, resultado

    //*FUNCIÓNS

    //Constructor
    public function __construct($operando1, $operando2) {
        
        parent::__construct($operando1, $operando2);
    }

    //Suma
    public function calcular() {
        $operando1 = $this->operando1;
        $operando2 = $this->operando2;
        $suma = $operando1 + $operando2;
        return $suma;
    }
}