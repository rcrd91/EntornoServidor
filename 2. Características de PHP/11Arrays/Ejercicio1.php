<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<style>
        body  {
            background-color:lightgreen;
        }

        table, th, td {
            border: 1px solid;
            border-collapse:collapse;
        }

</style>

<body>

    <h1>Cine</h1>

    <!-- Botóns -->
    <form action="Ejercicio1.php" method="get">

        Buscar exemplar: <br><input type="text" name="exemplar" /> 
        <input type="submit" value="Buscar Exemplar" name="buscarexemplar" /><br><br>
    
        <input type="submit" value="Ver listado completo das películas" name="completo" /><br>
        <input type="submit" value="Ordeado polo título" name="ordeadotitulo" /><br>
        <input type="submit" value="Ordeado polo director" name="ordeadodirector" /><br>
        <input type="submit" value="Ordeado pola duración películas" name="ordeadoduracion" /><br><br>

        Buscar unha duración maior que: <br><input type="text" name="duracion" />
        <input type="submit" value="Buscar Duración" name="buscarduracion" /><br><br>

    </form><br>


<?php 

    //*PELICULAS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //include 'datos1.php';

    $pelis=array("Ciudadano Kane"=>array("Orson Welles",119),
                "Casablanca"=>array("Michael Curtiz",102),
                "El Padrino"=>array("Francis Ford Coppola",175),
                "Lo que el viento se llevó"=>array("Victor Fleming",224),
                "Lawrence de Arabia"=>array("David Lean",217),
                "El mago de Oz"=>array("Victor Fleming",101),
                "El graduado"=>array("Mike Nichols",105),
                "La ley del silencio"=>array("Elia Kazan",108),
                "La lista de Schindler"=>array("Steven Spielberg",195),
                "Cantando bajo la lluvia"=>array("Stanley Donen-Gene Kelly",99));


    //* FUNCIÓNS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Ver listado completo das películas
    function imprimir($pelis){ 
        echo "<table>";
        echo"<tr> <th>Título</th> <th>Director</th> <th>Duración</th> </tr>";
        foreach($pelis as $peli => $info) {
            echo"<tr> <td>". $peli . "</td>  <td>". $info[0] . "</td><td>". $info[1] . "</td> </tr>";
        }
        echo "</table><br>";
    }

    if (isset($_GET["completo"])) { 
        imprimir($pelis);
    } 



    //Ordeado polo titulo
    function ordearTitulo($pelis){ 
        ksort($pelis);
        imprimir($pelis);
    }

    if (isset($_GET["ordeadotitulo"])) {
        ordearTitulo($pelis);
    } 

    
    //Ordeado polo director
    function ordearDirector($a,$b) {
        if($a[0]<$b[0]) 
            return -1;
        elseif ($a[0]>$b[0]) 
            return 1;
        else
            return 0; }

    if(isset($_GET['ordeadodirector'])){
        uasort($pelis, 'ordearDirector');
        imprimir($pelis);
    }

    
    
    //Ordeado pola duración películas    
    function ordearDuracion($a,$b){ 
        if($a[1]<$b[1]) 
            return -1;
        elseif ($a[1]>$b[1]) 
            return 1;
        else
            return 0; }

    if(isset($_GET['ordeadoduracion'])){
        uasort($pelis, 'ordearDuracion');
        imprimir($pelis);
    }


    //Buscar Exemplar
    function fBusqueda($pelis,$busqueda) {
        echo"<p>As películas que conteñen ".$busqueda." no campo 'Título' son: </p>";

        $pelisbusqueda= array();

        foreach($pelis as $peli => $info) {
            if (str_contains($peli,$busqueda)){
                $pelisbusqueda[$peli] = array($info[0],$info[1]);
            }
        }

        return $pelisbusqueda;
    }

    if (isset($_GET["buscarexemplar"])) {
        $busqueda= $_GET['exemplar'];
        imprimir(fBusqueda($pelis,$busqueda));
    }

    
    //Buscar con duración maior que
    function fDuracion($pelis,$busqueda) {

        $duracionbusqueda= array();

        foreach($pelis as $peli => $info) {
            if ($info[1] > $busqueda){
                $duracionbusqueda[$peli] = array($info[0],$info[1]);
            }
        }

        return $duracionbusqueda;
    }

    if (isset($_GET["buscarduracion"])) {
        $busqueda= $_GET['duracion'];
        imprimir(fDuracion($pelis,$busqueda));
    }

?> 
    
</body>
</html>