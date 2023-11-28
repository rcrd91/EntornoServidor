<?php

abstract class Coche {
    abstract public function consumir() ;
}

class CocheGasolina extends Coche {

    public function consumir(){
        return 'O ' . __CLASS__ . ' consume gasolina';
    }
}

class CocheElectrico extends Coche {

    public function consumir() {
        return 'O ' . __CLASS__ . ' consume electricidade';
    }   
}

class CocheHidroxeno extends Coche {

    public function consumir() {
        return 'O ' . __CLASS__ . ' consume hidróxeno';
    } 
    
}

// A FUNCIÓN mostra() EMPREGA UN OBXECTO Coche COMO PARÁMETRO: EN TEMPO DE
// EXECUCIÓN DECIDIRÁ CAL FUNCIÓN É A APROPIADA.
function mostrar(Coche $coche) {
    echo $coche->consumir(). "<br>";
}

//Objetos
$cochegasolina = new CocheGasolina();
$cocheelectrico = new CocheElectrico();
$cocheHidroxeno = new CocheHidroxeno();

mostrar($cochegasolina);
mostrar($cocheelectrico);
mostrar($cocheHidroxeno);