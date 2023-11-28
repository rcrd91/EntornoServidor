<!-- Partindo da seguinte táboa... Garda estes datos nun array asociativo(comunidade=>escolarizacion), 
e fai unha táboa con 3 columnas: Comunidade, escolarización por 1000 habitantes, %escolarización (que será sobre 100),
que QUEDE como a anterior, empregando foreach. Ao final da táboa, noutra liña, mostra logo de
calculalo “A porcentaxe media de escolarización é ......”. OPCIONAL: Emprega CSS para os estilos
da táboa, e ponlle un título á páxina: Porcentaxe de escolarización, que quede antes da táboa. -->

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

echo "<h1>Porcentaxe de escolarización</h1>";

echo"<table>";

    echo"<tr> <th>Comunidade</th> <th>Escolarización por 1000<br> habitantes</th> </tr>";

        $comunidades = array(
                        "Andalucía" => 593.6,
                        "Aragón" => 600.3,
                        "Asturias" => 582.9,
                        "Baleares" => 489.7,
                        "Canarias" => 573.2,
                        "Cantabria" => 551.5,
                        "Castilla e León" => 645.3,
                        "Castilla la Mancha" => 555.8,
                        "Cataluña" => 568.3,
                        "Comunidade Valenciana" => 561.1,
                        "Extremadura" => 584.3,
                        "Galicia" => 600.1 );
        $suma = 0;

        foreach($comunidades as $comunidade => $escolarizacion) {
            echo "<tr> <td>$comunidade</td> <td>$escolarizacion</td> </tr>";

            $suma+=$escolarizacion;
        }
        
echo"</table><br>";


$porcentaje = ($suma/10)/count($comunidades);

echo "A porcentaxe media de escolarización é ${porcentaje}";
?>

</body>
</html>