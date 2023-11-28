<?php

class Contacto {

    //PROPIEDADES
    private $nome;
    private $apelidos;
    private $tfno;

    //MÉTODOS
    public function __construct($nome, $apelidos, $tfno){
        $this->nome = $nome;
        $this->apelidos = $apelidos;
        $this->tfno = $tfno;
    }

    //GETTERS
    public function getNome(){
        return $this->nome;
    }

    public function getApelidos(){
        return $this->apelidos;
    }

    public function getTfno(){
        return $this->tfno;
    }

    //SETTERS
    public function setNome($nome) {
        $this->nome = $nome;  
    }

    public function setApelidos($apelidos) {
        $this->apelidos = $apelidos;  
    }

    public function setTfno($tfno) {
        $this->tfno = $tfno;  
    }

    //FUNCIÓNS
    function mostraInformacion() {
        $nome = $this->nome;
        $apelidos = $this->apelidos;
        $tfno = $this->tfno;

        echo"Nome: $nome <br>";
        echo"Apelidos: $apelidos <br>";
        echo"Tfno: $tfno <hr>";
    }

    function mostraInformacion1() {

        echo"Nome:{$this->getNome()} <br>";
        echo"Apelidos:{$this->getApelidos()} <br>";
        echo"Tfno:{$this->getTfno()} <hr>";
    }

    //Destructor
    public function __destruct(){
        echo "<br> Obxecto de nome ".$this->nome." foi destruído. <br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

//Objeto
$contacto1 = new Contacto("Ricardo","Gómez",675356820);
$contacto2 = new Contacto("Xan","López",674356723);
$contacto3 = new Contacto("Ana","García",643872347);

//mostraInformacion()
$contacto1->mostraInformacion();
$contacto2->mostraInformacion();
$contacto3->mostraInformacion();

//GET
echo"{$contacto1->getNome()} ";
echo"{$contacto1->getApelidos()} ";
echo"{$contacto1->getTfno()} <br>";

echo"{$contacto2->getNome()} ";
echo"{$contacto2->getApelidos()} ";
echo"{$contacto2->getTfno()} <br>";

echo"{$contacto3->getNome()} ";
echo"{$contacto3->getApelidos()} ";
echo"{$contacto3->getTfno()} <hr>";

/* $contacto1->mostraInformacion1();
$contacto2->mostraInformacion1();
$contacto3->mostraInformacion1(); */

?>
    
</body>
</html>