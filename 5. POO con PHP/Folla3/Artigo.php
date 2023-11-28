<?php

class Artigo {

    //PROPIEDADES
    private string $id;
    private string $nome;
    
    public static $numArtigo = 0;

    //FUNCIÓNS
    public function __construct($id, $nome) {

        $this->id = $id;
        $this->nome = $nome;

        self::$numArtigo++; 
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
        $this->nome = "Rato";
    }

    //Print
    public function __toString(){
        return $this->nome;
    }
}


//OBJETOS

//Artigo ($id, $nome)
$artigo1 = new Artigo("1","Pantalla");
echo $artigo1->nome;
echo"<br>";

$artigo2 = clone $artigo1; //AGORA $ana TERÁ COMO NOME “Anónimo”
echo $artigo2->nome;

?>

