<!-- 6. Fai o mesmo que fixeches co exercicio 3, empregando agora foreach. Mostra os valores de alumno e
de soldo tamén nunha táboa, mostrando ao final un rexistro que sexa Máximo, Valor de máximo. --> 

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
echo"<tr> <th>Alumno</th> <th>Soldo</th> </tr>";

    $alumnos = array("Alex"=>1000, "Juan"=>1001, "Jose"=>1002, "Luis"=>1003, "Paco"=>1004);

    foreach($alumnos as $nome => $soldo)
    echo "<tr> <td>$nome</td> <td>$soldo</td> </tr>";

    $max=max($alumnos);
    $min=min($alumnos);
    echo "<tr> <th>Máximo</th> <th>Valor Máximo</th> </tr>";
    echo "<tr> <td>$nome</td> <td>$max</td> </tr>";
    echo "<tr> <th>Mínimo</th> <th>Valor Mínimo</th> </tr>";
    echo "<tr> <td>$nome</td> <td>$min</td> </tr>"; //DUDA  

echo"</table>"; 
?>

</body>
</html>