<?php

interface Comparar {
    public function comparar($valor);
}

class Artigo implements Comparar {

    //PROPIEDADES
    private string $id;
    private string $nome;
    private string $prezo;
    
    public static $numArtigo = 0;

    //FUNCIÓNS
    public function __construct($id, $nome, $prezo) {

        $this->id = $id;
        $this->nome = $nome;
        $this->prezo = $prezo;

        self::$numArtigo++; 
    }

    public function comparar($valor) {

    }


    //Getters
    public function __get($atributo) {
        if (property_exists(__CLASS__, $atributo)){
            return $this->$atributo;
        } return NULL;
    }

    //Setters
    public function __set($atributo, $valor) {

        if (property_exists(__CLASS__, $atributo)){
            $this->$atributo = $valor;
        }
        else {
            echo "Non existe o atributo $atributo.";
        }
    }

    //Clonar
    public function __clone( ){
        $this->nome = "nomeClonado";
    }

    //Print
    public function __toString(){
        return $this->nome;
    }
}


//OBJETOS

//Artigo ($id, $nome $prezo)
$artigo1 = new Artigo("1","Pantalla", 150);
echo $artigo1->nome;

echo"<hr>";

$artigo2 = clone $artigo1;
echo $artigo2->nome;


?>

