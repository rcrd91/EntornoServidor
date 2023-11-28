<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid;
        }

        table {
            width: 50%;
            border-collapse: collapse;
        }

        th {
            background-color: #D6EEEE;
            
        }

        th, td {
            text-align: center;
        }

    </style>
</head>
<body>

<?php

    $amigos = array("Ana", "Belén", "Carlos", "David", "Eleuterio");
    echo implode(", ", $amigos);  //Ana, Belén, Carlos, David, Eleuterio 
    echo "<br> <br>";

    echo"<table>";

        echo"<tr> <th>Nome da función</th> <th>Explicación</th> <th>Exemplo</th> <th>Mostra por pantalla</th> </tr>";

        echo"<tr> <td><b>count()<b></td> <td>Conta a cantidade de elementos.</td> <td>".'count($amigos)' ."</td> <td>".count($amigos)."</td> </tr>";
        echo"<tr> <td><b>reset()<b></td> <td>Resetea ao primer elemento do array.</td> <td>".'reset($amigos)'."</td> <td>".reset($amigos)."</td> </tr>";
        echo"<tr> <td><b>current()<b></td> <td>Devolve a posición actual.</td> <td>".'current($amigos)'."</td> <td>".current($amigos)."</td> </tr>";
        echo"<tr> <td><b>next()<b></td> <td>Devolve o seguinte elemento.</td> <td>".'next($amigos)'."</td> <td>".next($amigos)."</td> </tr>";
        echo"<tr> <td><b>end()<b></td> <td>Devolve o último elemento.</td> <td>".'end($amigos)'."</td> <td>".end($amigos)."</td> </tr>";
        echo"<tr> <td><b>prev()<b></td> <td>Devolve o elemento previo.</td> <td>".'prev($amigos)'."</td> <td>".prev($amigos)."</td> </tr>";
        echo"<tr> <td><b>key()<b></td> <td>Devolve a clave do elemento actual.</td> <td>".'key($amigos)'."</td> <td>".key($amigos)."</td> </tr>";


    echo "</table> <br>";  

    //Proba de funcións:

    //$amigos = array("Ana", "Belén", "Carlos", "David", "Eleuterio");

    echo count($amigos); //5 //Conta a cantidade de elementos.
    echo "<br>";

    echo reset($amigos); // Ana //Resetea ao primer elemento do array.
    echo "<br>";

    echo current($amigos); //Ana //Devolve a posición actual. next($amigos), echo current($amigos), nos devolve Belén.
    echo "<br>";

    echo end($amigos); //Eleuterio //Devolve o último elemento.
    echo "<br>";

    echo next($amigos); //Belén //Devolve o seguinte elemento.
    echo "<br>";

    echo prev($amigos); //Ana //Devolve o elemento previo a Belén.
    echo "<br>";

    echo key($amigos); //Devolve a clave do elemento. //Belén 
    echo "<br>";

?>
    
</body>
</html>