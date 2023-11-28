<?php

class Vehiculo {

    //PROPIEDADES
    public string $matricula;
    public string $modelo;
    public string $kms;
   
    //!
    //public static $contador = 0;

    //GETTERS
    public function getMatricula(){
        return $this->matricula;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getKms() {
        return $this->kms;
    }

    //SETTERS
    public function setMatricula($matriculaIndicada){
        $this->matricula = $matriculaIndicada;
    }

    public function setModelo($modeloIndicado){
        $this->modelo = $modeloIndicado;
    }

    public function setKms($kmsIndicado) {
        $this->kms = $kmsIndicado;
    }


    //FUNCIÓNS
    public function __construct($matricula, $modelo, $kms) {

        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->kms = $kms;
    }

    public function mostraTr() { 

        echo"
            <tr> <td>{$this->getMatricula()}</td> <td>{$this->getModelo()}</td> <td>{$this->getKms()}</td> </tr>
        ";

    }

   /*  public function __destruct() {
        echo "<br>Planeta de nome ".$this->nome." foi destruído.<br>";
    } */  
}
