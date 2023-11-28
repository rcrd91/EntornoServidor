<?php

class Empregado {

    //PROPIEDADES
    public $nome;
    public $salario;

    //VARIABLES
    public static $numEmpregados=0;

    //GETTERS
    public function getSalario(){
        return $this->salario;
    }

    public function getNome() {
        return $this->nome;
    }

    //SETTERS
    public function setNome($nomeIndicado){
        $this->nome=$nomeIndicado;
    }

    //FUNCIÓNS
    public function __construct($nome, $salario) {

        if($salario <= 2000) {
            $this->salario = $salario;  
        } else 
            echo"O Salario ten que ser inferior ou igual a 2000";

        $this->nome = $nome;
        self::$numEmpregados++; //CADA EMPREGADO CREADO INCREMENTA A VARIABLE
    }

    public function __destruct() {
        echo "<br>obxecto de nome ".$this->nome." foi destruído<br>";
    }
}


//* CLASE OPERARIO FILLA DE EMPREGADO:
class Operario extends Empregado {

    //PROPIEDADES
    private $turno;

    //GETTERS
    public function getTurno(){
        return $this->turno;
    }

    //SETTERS
    public function setTurno($turnoEnviado){
        if ($turnoEnviado == "diurno" || $turnoEnviado == "nocturno")
        $this->turno=$turnoEnviado;
    }

    //FUNCIÓNS
    public function __construct($nome, $salario, $turno) {
        
        parent::__construct($nome, $salario); //EXECÚTASE PRIMEIRO O CONSTRUTOR DE EMPREGADO

        if($turno == 'diurno' || $turno == 'nocturno') {
            $this->turno = $turno;  
        } else 
            echo"Error no turno";
        
        $this->nome = $nome;
        $this->salario = $salario;
    }

    public function __destruct(){
        parent::__destruct(); //EXECÚTASE O CONSTRUTOR DE EMPREGADO
    }

    

    
}

//Objetos
$miguel = new Empregado("Miguel", 1200);
$ana = new Empregado("Ana", 1190);
$miguel->setNome("Miguelon");
$ana->setNome("Ana");
echo "Os novos empregados son ". $miguel->nome." e ".$ana->getNome()."<br>";
$pedro=new operario("Pedro", 1180, "diurno");
$pedro->setNome("Pedro");
echo "O operario ", $pedro->getNome()," ten o turno ".$pedro->getTurno()."<br>";
//USAMOS O MÉTODO getNome() DA CLASE NAI
$pedro->setTurno("diurno");
echo "O operario ", $pedro->getNome()," ten o turno ".$pedro->getTurno()."<br>";
echo "<br>Levamos ".Empregado::$numEmpregados." empregados"."<br>";
?>

