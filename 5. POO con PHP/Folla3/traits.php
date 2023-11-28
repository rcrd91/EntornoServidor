<?php

trait DatosPersoa {

    //PROPIEDADES
    private string $nome;
    private string $apelidos;
    private string $idade;

    //GETTERS
    public function getNome(){
        return $this->nome;
    }

    public function getApelidos() {
        return $this->apelidos;
    }

    public function getIdade() {
        return $this->idade;
    }

    //SETTERS
    public function setNome($nomeEnviado){
        $this->nome = $nomeEnviado;
    }

    public function setApelidos($apelidosEnviados){
        $this->apelidos = $apelidosEnviados;
    }

    public function setIdade($idadeEnviada){
        $this->idade = $idadeEnviada;
    }

    //FUNCIÓNS

    public function mostrar() {
        return "{$this->nome} {$this->apelidos} {$this->idade}";
    }

    public function __toString(){
       return $this->mostrar();
    } 
}

class Vendedor {
   use DatosPersoa;
}

class Cliente {
    use DatosPersoa;
}

//Cliente
$cliente1 = new Vendedor();
$cliente1->setNome("Ana");
$cliente1->setApelidos("García Costa");
$cliente1->setIdade("20");
//$cliente1->mostrar();
echo $cliente1;

echo"<hr>";

//Vendedor
$vendedor1 = new Vendedor();
$vendedor1->setNome("Xan");
$vendedor1->setApelidos("Gómez Ares");
$vendedor1->setIdade("30");
//$vendedor1->mostrar();
echo $vendedor1;



?>