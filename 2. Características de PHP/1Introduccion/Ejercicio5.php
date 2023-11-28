<!-- 5. Mostra a táboa de multiplicar do 7. Fai unha táboa similar á do exercicio anterior que teña
como nome das columnas Número (será sempre o 7), Multiplicando, Resultado. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    
</head>
<body>

    <?php
    echo"<table>";
    echo"<tr>
            <th>Numero</th>
            <th>Multiplicando</th>
            <th>Resultado</th>
        </tr>";
        
        $numero=7;
        
        
        for($i=1; $i<=10; $i++) {

            $resultado=$numero*$i;

            echo "<tr>
                        <td>$numero</td>
                        <td>$i</td>
                        <td>$resultado</td>
                </tr>";
        }

    echo"</table>";
    ?>

</body>
</html>