<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="Ejercicio5.php" method="post">

        <input type="submit" value="Ordenar array polos puntos de menor a maior." name="menormaior" /><br><br>
        <input type="submit" value="Ordenar array polos puntos de maior a menor." name="maiormenor" /><br><br>
        <input type="submit" value="Ordenar array polo nome alfabéticamente." name="alfabeticamente" /><br><br>
        <input type="submit" value="Ordenar array polo tamaño do nome." name="tamano" /><br><br>

    </form><br>

<?php

    //FUNCIÓNS

    function menorAmaior($a,$b) {
        if($a<$b) //de menor
            return -1;
        elseif ($a>$b) //a maior
            return 1;
        else
            return 0;
        
    }

    function maiorAmenor($a,$b) {
        if($a>$b) //de maior
            return -1;
        elseif ($a<$b) //a menor
            return 1;
        else
            return 0;
    }
    
    function ordear($a,$b) { //ordena cadenas por tamaño
        if ($a<$b) 
            return -1;
        elseif ($a>$b)
            return 1;
        else
            return 0;
        }

    
    function tamano($a, $b) {
        if (mb_strlen($a)>mb_strlen($b)) 
            return -1;
        elseif (mb_strlen($a)<mb_strlen($b))
            return 1;
        else
            return 0;
        }

    

    //BOTONS
    if (isset($_POST["menormaior"])) {
        uasort($puntos, 'menorAmaior'); //Ordeamos

        foreach($puntos as $key => $val){
            echo " $key = $val <br>"; //Imprimimos
        }
    }

    if (isset($_POST["maiormenor"])) {
        uasort($puntos, 'maiorAmenor');//Ordeamos

        foreach($puntos as $key => $val){
            echo " $key = $val <br>"; //Imprimimos
        }
    }

    if (isset($_POST["alfabeticamente"])) {
        uksort($puntos, 'ordear'); //Ordeamos

        foreach($puntos as $key => $val){
            echo " $key = $val <br>"; //Imprimimos
        }
    }

    if (isset($_POST["tamano"])) {
        uksort($puntos, 'tamano'); //Ordeamos
        
        foreach($puntos as $key => $val){
            echo " $key = $val <br>"; //Imprimimos
        }
    }
?>

</body>
</html>