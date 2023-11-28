<?php

class Participante {

    //PROPIEDADES
    public $nome;
    public $idade;

    //VARIABLES
    public static $numParticipantes=0;

    //GETTERS
    public function getNome(){
        return $this->nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    //SETTERS
    public function setNome($nomeIndicado){
        $this->nome = $nomeIndicado;
    }

    public function setIdade($idadeIndicada){
        $this->idade = $idadeIndicada;
    }

    //FUNCIÓNS
    public function __construct($nome, $idade) {

        $this->nome = $nome;
        $this->idade = $idade;
        self::$numParticipantes++; 
    }

    public function __destruct() {
        echo "<br>Participante de nome ".$this->nome." foi destruído<br>";
    }
}

// CLASE OPERARIO FILLA DE EMPREGADO:
class Xogador extends Participante {

    //PROPIEDADES
    private $posto;

    //VARIABLES
    public static $numXogador=0;

    //GETTERS
    public function getPosto(){
        return $this->posto;
    }

    //SETTERS
    public function setPosto($postoEnviado){
        $this->posto = $postoEnviado;
    }


    //FUNCIÓNS
    public function __construct($nome, $idade, $posto) {
        
        parent::__construct($nome, $idade); //Parent Participante

        $this->nome = $nome;
        $this->idade = $idade;
        $this->posto = $posto;

        self::$numXogador++; 
    }

    public function __destruct(){
        parent::__destruct();
    }
}

// CLASE OPERARIO FILLA DE EMPREGADO:
class Arbitro extends Participante {

    //PROPIEDADES
    private $anosArbitraxe;

    //VARIABLES
    public static $numArbitro=0;

    //GETTERS
    public function getAnos(){
        return $this->anosArbitraxe;
    }

    //SETTERS
    public function setTurno($anosEnviado){
        $this->anosArbitraxe = $anosEnviado;
    }

    //FUNCIÓNS
    public function __construct($nome, $idade, $anosArbitraxe) {
        
        parent::__construct($nome, $idade); //Parent Participante

        $this->nome = $nome;
        $this->salario = $idade;
        $this->anos = $anosArbitraxe;

        self::$numArbitro++; 
    }

    public function __destruct(){
        parent::__destruct(); //EXECÚTASE O CONSTRUTOR DE EMPREGADO
    }
    
}

//OBJETOS


//PARTICIPANTE
$xan = new Participante("Xan",30);
$ana = new Participante("Ana",25);

//$xan->setNome("Xan");
//$xan->setIdade(30);

//$ana->setNome("Ana");
//$ana->setIdade(25);

echo "Os participantes son ". $xan->nome." e ".$ana->nome."<hr>";

//XOGADOR
$pedro = new Xogador("Pedro", 20, "defensa");
$pedro->setNome("Pedrolo");
echo "O xogador con alias ", $pedro->getNome()," xoga de ".$pedro->getPosto(). " e é o xogador número " . Xogador::$numXogador . "<hr>";

//ARBITRO

$paco = new Arbitro("Paco", 35, 13);
echo "O arbitro ", $paco->nome, " ten unha experiencia de $paco->anos anos e unha idade de $paco->idade anos.<hr>";

?>

