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

    $puntos = array("Ana"=>123, "Belén"=>14, "Felipe"=>3, "Moncho"=>245, "Artur"=>10);

    //sort($puntos); Con sort non sairían os nomes, so as posicións 1,2,3... 

    asort($puntos); //Usamos un array asociativo, entón hay que usar asort.

    foreach($puntos as $i => $j) {
        echo "Clave=" . $i. ", Valor=" . $j;
        echo "<br>"; 
    }

?> 
    
</body>
</html>