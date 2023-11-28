<!-- 1. Partindo dos seguintes datos:
Garda nun array de 2 dimensións estes valores. Por exemplo, o primeiro valor será
viaxes[0]=array(“Madrid”, “Segovia”, 90201);
viaxes[1]=array(... );
Despois para acceder aos valores viaxes[0][0] será “Madrid”, viaxes[0][1] será “Segovia” e
viaxes[0][2] será 90201. Fai o código para representar a seguinte páxina web,
COMPROBANDO nun bucle cal é o traxecto máis longo (tanto a orixe, o destino, como a
distancia): -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <style> 
        table, th, td {
            border: 1px solid;
            border-collapse:collapse;}
    </style>
</head>

<body>

<?php

    echo"<table>";

    echo"<tr> <th>Orixe</th> <th>Destino</th> <th>Distancia(km)</th> </tr>";

    $comunidades = array (
        array("Madrid", "Segovia", 90.201),
        array("Madrid", "A Coruña", 596.887),
        array("Barcelona", "Cádiz", 1152.669),
        array("Bilbao", "Valencia", 622.233),
        array("Sevilla", "Santander", 832.067),
        array("Oviedo", "Badajoz", 682.429),
    );

    $aux=$comunidades[0]; //iniciamos na posición 0. 1 posición.

    for($row=0;$row<count($comunidades);$row++){ //recorre cada array dentro do array comunidades. 6 posicións.

        echo "<tr>";

        for($col=0; $col<count($comunidades[$row]); $col++){ //recorre os valores de cada array. 3 valores.

            echo"<td>".$comunidades[$row][$col]."</td>"; //Imprime a posición e o valor (6 veces). 
        }

        echo"</tr>";

        if($comunidades[$row][$col-1]>$aux[2]){ //para saber traxecto mais longo.
                $aux=$comunidades[$row];
        }
    }

    echo "</table> <br>";

    echo "O traxecto máis longo é o de ".$aux[0]." a ".$aux[1]." con ". $aux[2] . "km.";

?>

</body>
</html> 