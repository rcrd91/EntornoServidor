<?php

class Bombilla {

    //PROPIEDADES
    private $potencia;

    //VARIABLES
    public static $numBombillas = 0;

    //GETTERS
    public function getPotencia(){
        return $this->potencia;
    }

    //SETTERS
    public function setPotencia($potencia) {

        if($potencia >=2 && $potencia <=35) {
            $this->potencia = $potencia;  
        } else 
            echo"O valor ten que estar entre 2 e 35";
    }

    //CONSTRUCTOR: Potencia por defecto = 10 //Aumentamos en 1 numBombillas
    public function __construct(){
        $this->potencia = 10;
        self::$numBombillas++;
    }

    //FUNCIONS
    function aumentaPotencia($val) {
        $this->setPotencia($this->potencia + $val);
    }

    function baixaPotencia($val) {
        $this->setPotencia($this->potencia - $val);
    }

    //Destructor //Destruímos bombilla de 1 en 1
    public function __destruct(){
        self::$numBombillas--;
        echo "<br> Obxecto coa potencia ".$this->potencia." foi destruído. <br>";
    }
}

//* Outro documento:

//Objeto
$bombilla = new Bombilla();

$bombilla->setPotencia(20);

$bombilla->aumentaPotencia(10);

echo"{$bombilla->getPotencia()}";

//Apartado 4
$bombilla1 = new Bombilla();
$bombilla1->setPotencia(0);
$bombilla1->aumentaPotencia(20);
echo"{$bombilla1->getPotencia()}";

//Eliminar bombilla1
unset($bombilla1);
echo"Hay ".Bombilla::$numBombillas." bombillas"; // Hay 1 bombillas

//Eliminar bombilla
unset($bombilla);
echo"Hay ".Bombilla::$numBombillas." bombillas"; // Hay 0 bombillas


?>

