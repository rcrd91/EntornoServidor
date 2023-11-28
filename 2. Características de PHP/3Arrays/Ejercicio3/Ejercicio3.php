<!-- 3. Crea agora un array asociativo chamado soldos de 5 alumnos de DCWS. A clave deberá ser o nome,
e o valor será o soldo que lle asignes. Mostra os valores nunha táboa de 2 columnas (Alumno, Soldo no
encabezamento), e mostra a media dos valores ao final (un rexistro que sexa Media, valor da media). -->

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

    echo"<tr> <th>Media</th> <th>Valor da media</th> </tr>";

    $contador= count($alumnos);
    $sumaSalarios=(array_sum($alumnos) / $contador);
    echo "<tr> <td>$contador</td> <td>$sumaSalarios</td> </tr>";
    
echo"</table>"; 
?>

</body>
</html>