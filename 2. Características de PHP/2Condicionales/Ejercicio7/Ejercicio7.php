<!-- 7. Fai unha páxina web con unha táboa na que se mostre a seguinte táboa, ata 100 rexistros. Cada
rexistro impar terá un fondo distinto. Emprega clases para darlle formato con CSS: -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
    td, th {
        border: 1px solid black; 
        border-collapse: collapse;}
    </style>
    
</head>
<body>

<?php
echo"<table>";

echo"<tr>
        <th>Día</th>
        <th>Saúdo</th>
    </tr>";
    
    $bd="Bos días";
    $bt="Boas tardes";
    
    
    for($i=1; $i<=10; $i++) {

        if($i%2!=0)

        echo"<tr>
                <td>$i</td>
                <td>$bd</td>    
            </tr>";
            
        elseif($i%2==0)
        echo"<tr>
            <td>$i</td>
            <td>$bt</td>
            </tr>";
    }
?>
</body>
</html>