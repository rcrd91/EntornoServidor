<!-- 4. Crea agora o mesmo array do exercicio anterior empregando o construtor array( ). Mostra ao final o
máximo dos soldos e o mínimo. -->

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
    echo "<tr> <th>Mínimo</th> <td>$min</td> </tr>";
    echo "<tr> <th>Máximo</th> <td>$max</td> </tr>";

echo"</table>"; 
?>

</body>
</html>