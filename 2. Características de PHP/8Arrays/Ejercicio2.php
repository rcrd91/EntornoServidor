<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>

<style>
    table, th, td {
        border: 1px solid;
        border-collapse:collapse;}
    th {
        background-color: #D6EEEE;
    }
</style>

<body>

<?php 

    $puntos = array("Ana"=>123, "Belén"=>14, "Felipe"=>3, "Moncho"=>245, "Artur"=>10);

    foreach($puntos as $i => $j) {
        echo "Clave=" . $i. ", Valor=" . $j . ", "; 
    }

    echo"<table>";

        echo"<tr> <th>Nome da función</th> <th>Explicación</th> <th>Exemplo</th> <th>Mostra por pantalla</th> </tr>";

        echo"<tr> <td><b>sort()<b></td> <td>Ordena un array.</td> <td>".'sort($array)'."</td> <td>";

        $orixinal=$puntos;
        sort($puntos); 

            foreach($puntos as $i => $j) {
                echo "Clave=" . $i. ", Valor=" . $j;
                echo "<br>"; 
            }

        echo "</td> </tr>";



        echo"<tr> <td><b>rsort()<b></td> <td>Ordena un array en orden inverso.</td> <td>".'rsort($array)'."</td> <td>";

        $puntos=$orixinal;
        rsort($puntos); 

            foreach($puntos as $i => $j) {
                echo "Clave=" . $i. ", Valor=" . $j;
                echo "<br>"; 
            }
        
        echo "</td> </tr>";



        echo"<tr> <td><b>asort()<b></td> <td>Ordena un array y mantiene la asociación de índices.</td> <td>".'asort($array)'."</td> <td>";

        $puntos=$orixinal;
        asort($puntos); 

            foreach($puntos as $i => $j) {
                echo "Clave=" . $i. ", Valor=" . $j;
                echo "<br>"; 
            }
        echo"</td> </tr>";



        echo"<tr> <td><b>arsort()<b></td> <td>Ordena un array en orden inverso y mantiene la asociación de índices.</td> <td>".'arsort($array)'."</td> <td>";

        $puntos=$orixinal;
        arsort($puntos); 
        foreach($puntos as $i => $j) {
            echo "Clave=" . $i. ", Valor=" . $j;
            echo "<br>"; 
        }
        echo "</td> </tr>";



        echo"<tr> <td><b>ksort()<b></td> <td>Ordena un array por sus claves.</td> <td>".'ksort($array)'."</td> <td>";

        $puntos=$orixinal;
        ksort($puntos); 

        foreach($puntos as $i => $j) {
            echo "Clave=" . $i. ", Valor=" . $j;
            echo "<br>"; 
        }

        echo"</td> </tr>";



        echo"<tr> <td><b>krsort()<b></td> <td>Ordena un array por clave en orden inverso.</td> <td>".'krsort($array)'."</td> <td>";

        $puntos=$orixinal;
        krsort($puntos); 

        foreach($puntos as $i => $j) {
            echo "Clave=" . $i. ", Valor=" . $j;
            echo "<br>"; 
        }

        echo"</td> </tr>";



        echo"<tr> <td><b>shuffle()<b></td> <td>Mezcla un array.</td> <td>".'shuffle($array)'."</td> <td>";

        $puntos=$orixinal;
        shuffle($puntos); 

        foreach($puntos as $i => $j) {
            echo "Clave=" . $i. ", Valor=" . $j;
            echo "<br>"; 
        }
        echo"</td> </tr>";


        
        echo"<tr> <td><b>array_reverse()<b></td> <td>Devuelve un array con los elementos en orden inverso.</td> <td>".'array_reverse($array)'."</td> <td>";
        $puntos=$orixinal;

        $puntos=array_reverse($puntos);
        
        //array_reverse($puntos); //Usamos un array asociativo, entón hay que usar asort.

        foreach($puntos as $i => $j) {
            echo "Clave=" . $i. ", Valor=" . $j;
            echo "<br>"; 
        }

        echo"</td> </tr>";

    echo "</table> <br>";  

?> 
    
</body>
</html>