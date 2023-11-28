<!-- Fai unha páxina na que se mostre unha táboa e 6 botóns para ordenar: alfabéticamente polo nome da orixe,
por orden alfabético descendente do nome da orixe (da Z á A), polo destino alfabéticamente, por orden
alfabético descendente do nome do destino, pola distancia de menor a maior, e pola distancia de maior a
menor. A parte que recolle os datos enviados polo botón deberá indicar como está sendo a ordenación, e
mostrar o array ordenado NUNHA TÁBOA -->

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
            border-collapse:collapse;
        }

        th {
            color: green;
        }


    </style>

<body>

    <form action="Ejercicio6.php" method="GET">
		<div id="caixaSeleccion">
                <button id="imprimir" type="submit" name="imprimir" value="imprimir">Mostra a táboa</button><br><br>       
				<button id="orixe" type="submit" name="orixe" value="orixe">Alfabéticamente por orixe</button><br><br>
				<button id="orixedesc" type="submit" name="orixedesc" value="orixedesc">Alfabéticamente-Descendente por orixe</button><br><br>
				<button id="destino" type="submit" name="destino" value="destino">Alfabéticamente por destino</button><br><br>
				<button id="destinodesc" type="submit" name="destinodesc" value="destinodesc">Alfabéticamente-descendente por destino</button><br><br>
				<button id="menormaior" type="submit" name="menormaior" value="menormaior">Distancia de menor a maior</button><br><br>
				<button id="maiormenor" type="submit" name="maiormenor" value="maiormenor">Distancia de maior a menor</button><br><br>
		</div>
	</form>

<?php

    //*ARRAY //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $distancias=array(["Madrid","Segovia",90201],
                        ["Madrid","A Coruña",596887],
                        ["Barcelona","Cádiz",1152669],
                        ["Bilbao","Valencia",622233],
                        ["Sevilla","Santander",832067],
                        ["Oviedo","Badajoz",682429] 
    );


    //* FUNCIÓNS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //IMPRIMIR
    function imprimir($distancias){ 
        echo "<table>";
        echo"<tr> <th>Origen</th> <th>Destino</th> <th>Distancia en Km</th> </tr>";

        foreach($distancias as $valor) {
            echo"<tr> <td>{$valor[0]}</td>  <td>{$valor[1]}</td> <td>{$valor[2]}</td> </tr>";
        }

        /* for($i = 0; $i < count($distancias); $i++) {
            echo "Orixe {$distancias[$i][0]}, destino {$distancias[$i][1]}, distancia {$distancias[$i][2]}";
        }*/

        echo "</table>";
    }

    if (isset($_GET["imprimir"])) {
        imprimir($distancias);
    } 


    //* ORIXEN[0] /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Alfabéticamente por orixe
    if (isset($_GET["orixe"])){
        sort($distancias);
        imprimir($distancias);
    }



    //Alfabéticamente-Descendente por orixe
    if (isset($_GET["orixedesc"])){
        rsort($distancias);
        imprimir($distancias);
    }


    //* DESTINO[1] /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Alfabéticamente por Destino
    function ordearDestino($a,$b) {
        if($a[1]<$b[1]) 
            return -1;
        elseif ($a[1]>$b[1]) 
            return 1;
        else
            return 0; 
    }

    if(isset($_GET['destino'])){
        uasort($distancias, 'ordearDestino');
        imprimir($distancias);
    }



    //Alfabéticamente-Descendente por Destino
    function ordearDestinoDes($a,$b) {
        if($a[1]>$b[1]) 
            return -1;
        elseif ($a[1]<$b[1]) 
            return 1;
        else
            return 0; }

    if(isset($_GET['destinodesc'])){
        uasort($distancias, 'ordearDestinoDes');
        imprimir($distancias);
    }



    //* DISTANCIA[2] /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //De menor a maior
    function fMenorMaior($a,$b) {
        if($a[2] < $b[2])
            return -1;
        elseif ($a[2] > $b[2])
            return 1;
        else
            return 0;         
    }
    if (isset($_GET["menormaior"])){ 
        usort($distancias,'fMenorMaior');
        imprimir($distancias);
    }



    //De maior a menor
    function fMaiorMenor($a,$b){  
        if($a[2] > $b[2])
            return -1;
        elseif ($a[2] < $b[2])
            return 1;
        else
            return 0; 
    }
    if (isset($_GET["maiormenor"])){ 
        usort($distancias,'fMaiorMenor');
        imprimir($distancias); 
    }

?>

</body>
</html>