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
            border-collapse:collapse;}
        th {
            background-color: #D6EEEE;
        }


    </style>
</head>
<body>

<?php

    echo"<table>";

        echo"<tr> <th>Nome da función</th> <th>Explicación</th> <th>Exemplo</th></tr>";
        echo"<tr> <td><b>explode()<b></td> <td>Devuelve un array de string.</td> <td>".'explode(" ", $array)'."</td> </tr>";
        echo"<tr> <td><b>implode()<b></td> <td>Une elementos de un array en un string.</td> <td>".'implode(" ", $array)'."</td> </tr>";

        
    echo "</table> <br>";  

    //Proba de funcións:

    $amigos = "Ana Belén Carlos David Eleuterio";

    $amigo = explode(" ", $amigos);
    echo $amigo[0]; // Ana
    echo $amigo[1]; // Belén
    echo "<br>";


    $amigos = array("Ana, Belén, Carlos, David, Eleuterio");

    echo implode(" ", $amigos);  //Ana, Belén, Carlos, David, Eleuterio
    echo "<br>"; 

?>
    
</body>
</html>