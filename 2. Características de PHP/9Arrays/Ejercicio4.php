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

    // echo strcmp("Hello world!","Hello world!");  Devolve 0, son iguales
    // echo strcmp("Hello world!","Hello!");  Devolve 1

    function ordearInv($a,$b) {
        if ($a>$b) 
            return -1;
        elseif ($a<$b)
            return 1;
        else
            return 0;
        }

    $datos=array('f'=>4, 'g'=>8, 'a'=>-1, 'b'=>-10);
    uksort($datos, 'ordearInv'); //CHAMAMOS á FUNCIÓN. $datos quedará ORDENADO

    foreach($datos as $key => $val){
        echo " $key = $val <br>"; //a = -1 b = -10 f = 4 g = 8
    }
?>

</body>
</html>