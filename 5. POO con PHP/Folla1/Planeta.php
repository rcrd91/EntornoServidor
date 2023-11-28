<?php

class Planeta {

    //PROPIEDADES
    public string $nome;
    public string $tamano;
    public bool $accesible;
    public float $distancia;
    public static $numPlanetasAccesibles = 0;


    //GETTERS
    public function getNome(){
        return $this->nome;
    }

    public function getTamano() {
        return $this->tamano;
    }

    public function getAccesible() {
        return $this->accesible;
    }

    public function getDistancia() {
        return $this->distancia;
    }


    //SETTERS
    public function setNome($nomeIndicado){
        $this->nome = $nomeIndicado;
    }

    public function setTamano($tamanoIndicado){
        $this->idade = $tamanoIndicado;
    }

    public function setAccesible($accesibleIndicado) {
        $this->accesible = $accesibleIndicado;
    }

    public function setDistancia($distanciaIndicada) {
        $this->distancia = $distanciaIndicada;
    }

   


    //FUNCIÓNS
    public function __construct($nome, $tamano, $accesible, $distancia) {

        $this->nome = $nome;
        $this->tamano = $tamano;
        $this->accesible = $accesible;
        $this->distancia = $distancia;
        self::$numPlanetasAccesibles++; 
    }

    public function explotou() { //restamos 1 planeta accesible

        $accesibleIndicado = self::$numPlanetasAccesibles--;
        
        return $accesibleIndicado;
    }


    public function __destruct() {
        echo "<br>Planeta de nome ".$this->nome." foi destruído.<br>";
    }

    function getTodo() {
        $todo = "
            Nome: {$this->getNome()}
            Tamaño: {$this->getTamano()} 
            Accesible: {$this->getAccesible()}
            Distancia: {$this->getDistancia()}
            <hr> 
        ";
        
        echo $todo;

        return $todo;
    }

    
}

//!
class PlanetaHabitable extends Planeta {

    //PROPIEDADES
    public string $numeroPersoas;
    public string $temperaturaMinima;
    public string $temperaturaMaxima;
    public static $numPlanetasHabitables = 0;


    //GETTERS
    public function getNumeroPersoas(){
        return $this->numeroPersoas;
    }

    public function getTemperaturaMinima(){
        return $this->temperaturaMinima;
    }

    public function getTemperaturaMaxima(){
        return $this->temperaturaMaxima;
    }

    //SETTERS
    public function setNumeroPersoas($numeroPersoasEnviado){
        $this->numeroPersoas = $numeroPersoasEnviado;
    }

    public function setTemperaturaMinima($temperaturaMinimaEnviada){
        $this->temperaturaMinima = $temperaturaMinimaEnviada;
    }

    public function setTemperaturaMaxima($temperaturaMaximaEnviada){
        $this->temperaturaMaxima = $temperaturaMaximaEnviada;
    }

    //FUNCIÓNS
    public function __construct($nome, $tamano, $accesible, $distancia, $numeroPersoas, $temperaturaMinima, $temperaturaMaxima) {
        
        parent::__construct($nome, $tamano, $accesible, $distancia ); //Parent Planeta

        $this->numeroPersoas = $numeroPersoas;
        $this->temperaturaMinima = $temperaturaMinima;
        $this->temperaturaMaxima = $temperaturaMaxima;

        self::$numPlanetasHabitables++; 
    }

    public function __destruct(){
        parent::__destruct(); //Planeta destruct
    }

    function getTodo() {
        $todo = "
            Nome: {$this->getNome()}
            Tamaño: {$this->getTamano()} 
            Accesible: {$this->getAccesible()}
            Distancia: {$this->getDistancia()}
            Número de Persoas : {$this->getNumeroPersoas()}
            Temperatura mínima : {$this->getTemperaturaMinima()}
            Temperatura máxima : {$this->getTemperaturaMaxima()}
            <hr> 
        ";
        
        echo $todo;

        return $todo;
    }

}

//!
class PlanetaHostil extends Planeta {

    //PROPIEDADES
    public bool $vida;
    public bool $fontesDeEnerxia;
    public static $numPlanetasHostiles = 0;

    //GETTERS
    public function getVida(){
        return $this->vida;
    }

    public function getFontesDeEnerxia() {
        return $this->fontesDeEnerxia;
    }

    //SETTERS
    public function setVida($vidaEnviada){
        $this->vida = $vidaEnviada;
    }

    public function setFontesDeEnerxia($fontesDeEnerxiaEnviada){
        $this->fontesDeEnerxia = $fontesDeEnerxiaEnviada;
    }


    //FUNCIÓNS
    public function __construct($nome, $tamano, $accesible, $distancia, $vida, $fontesDeEnerxia) {
        
        parent::__construct($nome, $tamano, $accesible, $distancia); //Parent Planeta

        $this->vida = $vida;
        $this->fontesDeEnerxia = $fontesDeEnerxia;

        self::$numPlanetasHostiles++; 
    }

    public function __destruct(){
        parent::__destruct();
    }

    function getTodo() {
        $todo = "
            Nome: {$this->getNome()}
            Tamaño: {$this->getTamano()} 
            Accesible: {$this->getAccesible()}
            Distancia: {$this->getDistancia()}
            Vida: {$this->getVida()}
            Fontes de enerxía: {$this->getFontesDeEnerxia()}
            <hr> 
        ";
        
        echo $todo;
    }
}


//OBJETOS

//PLANETA HABITABLE($nome, $tamano, $accesible, $distancia, $numeroPersoas, $temperaturaMinima, $temperaturaMaxima)
$fion = new PlanetaHabitable("Fion", 24, true, 1.5, 1000000, 0, 10 );

echo "O planeta ". $fion->nome." ten unha distancia de ".$fion->distancia." soles <hr>";

//Cambiamos a distancia, cambiámoslle o nombre, temperatura máxima e mínima.
$fion->setDistancia(1.6);
$fion->setNome("Fion2000");
$fion->setTemperaturaMinima(1);
$fion->setTemperaturaMaxima(1000100);

echo "O planeta $fion->nome ten unha distancia de $fion->distancia soles, unha temperatura máxima de $fion->temperaturaMaxima Centígrados<hr>";

//PLANETA HOSTIL ($nome, $tamano, $accesible, $distancia, $vida, $fontesDeEnerxia)
$kaleva = new PlanetaHostil("Kaleva", 50, true, 0.4, true, true);
echo "O planeta $kaleva->nome ten unha distancia de $kaleva->distancia soles <hr>";
echo "O planeta {$kaleva->getNome()} ten unha distancia de {$kaleva->getDistancia()} soles. Planetas accesibles: " . Planeta::$numPlanetasAccesibles . "<hr>";
 

//* --------------------------


//PLANETA ($nome, $tamano, $accesible, $distancia)
$kruin = new Planeta("Kruin", 33, true, 0.5);
$kruin->getTodo();

//PLANETA HOSTIL 2 ($nome, $tamano, $accesible, $distancia, $vida, $fontesDeEnerxia)
$terus = new PlanetaHostil("Terus", 55, true, 0.3, true, true);
$terus->getTodo();

//PLANETA HABITABLE 2($nome, $tamano, $accesible, $distancia, $numeroPersoas, $temperaturaMinima, $temperaturaMaxima)
$deia = new PlanetaHabitable("Deia", 23, true, 1.6, 2000000, 0, 20 );
$deia->getTodo();

//Explotar planeta
echo"Planetas accesibles totales: ". Planeta::$numPlanetasAccesibles ."<hr>";
$terus->explotou();
echo" O planeta {$terus->getNome()} explotou. Planetas accesibles agora: ". Planeta::$numPlanetasAccesibles ."<hr>";


?>

