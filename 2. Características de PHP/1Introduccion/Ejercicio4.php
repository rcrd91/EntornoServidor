<!-- 4. Modifica o anterior exercicio para que saia unha táboa (dálle un estilo cun estilo.css), con título
para as columnas: Orden, Número: -->

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
    <th>Orden</th>
    <th>Numeros</th>
        </tr>";
        
        $num=1;

        for($i=1; $i<51; $i++) {
        
            if ($i%2!=0) {
                echo "<tr>
                            <td>$num</td>
                            <td>$i</td>
                        </tr>";
                $num++; }
        }

    echo"</table>";
    ?>

</body>
</html>