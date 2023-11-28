<?php

abstract class Calculo {

    //PROPIEDADES
    public int $operando1;
    public int $operando2;
    public int $resultado;

    //GETTERS
    public function getResultado(){
        return $this->resultado;
    }

    //SETTERS
    public function setOperando1($operando1Indicado){
        $this->operando1 = $operando1Indicado;
    }

    public function setOperando2($operando2Indicado){
        $this->operando2 = $operando2Indicado;
    }


    //*FUNCIÓNS

    //Constructor
    public function __construct($operando1, $operando2) {
        $this->operando1 = $operando1;
        $this->operando2 = $operando2;
    }

    //Calcular
    abstract public function calcular();

}
