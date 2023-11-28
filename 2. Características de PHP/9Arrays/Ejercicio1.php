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

    function menorAmaior($a,$b) {
        if($a<$b) //de menor
            return -1;
        elseif ($a>$b) //a maior
            return 1;
        else
            return 0;
        }

    $datos=array('f'=>4, 'g'=>8, 'a'=>-1, 'b'=>-10);
    uasort($datos, 'menorAmaior'); //CHAMAMOS á FUNCIÓN. $datos quedará ORDENADO

    foreach($datos as $key => $val){
        echo " $key = $val <br>"; // -10 -1 4 8
    }
?>

</body>
</html>