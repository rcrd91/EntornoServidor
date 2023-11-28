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
    $soldos = array("Ana"=>"1001", "Sara"=>"1002", "Juan"=>"1003", "Paco"=>"1004", "Bea"=>"1005");
    
    end($soldos); //COLOCÁMONOS AO FINAL DO ARRAY

    do { 
        echo key($soldos)." ".current($soldos)."<br/>";         //Mostramos CLAVE e VALOR da posición actual
    } while(prev($soldos));                                     //MENTRES HAXA OUTRO ELEMENTO PREVIO A SEGUIR
?>
    
</body>
</html>