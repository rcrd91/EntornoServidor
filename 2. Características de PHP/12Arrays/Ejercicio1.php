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
            background-color:lightyellow;
        }

        table, th, td {
            border: 1px solid;
            border-collapse:collapse;
        }

</style>

<body>

<h1>Pinturas</h1>

    <!-- Botóns -->
    <form action="Ejercicio1.php" method="get">

        <input type="submit" value="Ver listado completo de pinturas" name="completo" /><br>
        <input type="submit" value="Ordeado polo nome do autor" name="ordeado_nome" /><br>
        <input type="submit" value="Ordeado polo título" name="ordeado_titulo" /><br>
        <input type="submit" value="Ordeado cronolóxicamente" name="ordeado_cronoloxico" /><br>
        <input type="submit" value="Ordeado dende a máis moderna á máis antiga" name="ordeado_moderna" /><br>
        <input type="submit" value="Pasa a maiúscula a primeira letra de cada palabra do título" name="maiuscula_primeirapalabra" /><br>
        <input type="submit" value="Pasa a maiúscula a terceira letra do título" name="maiuscula_terceiraletra" /><br>
        <input type="submit" value="Elimina os espazos dos títulos" name="elimina_espazos" /><br>
        <input type="submit" value="Cambia a letra 'o' pola letra 'u' de todos os datos" name="cambia_letra" /><br><br>

        Buscar palabra: <br><input type="text" name="palabra" />
        <input type="submit" value="Buscar Palabra" name="buscar" /><br><br>
    </form><br>

<?php

    //include 'pinturas.php';
    
    $pinturas=array("Mona Lisa"=>array("Leonardo da Vinci",1510),
                    "A noite estrelada"=>array("Vincent Van Gogh",1889),
                    "O berro"=>array("Edvard  Munch",1893),
                    "Guernica"=>array("Pablo Picasso",1937),
                    "A persistencia da memoria"=>array("Salvador Dalí",1931),
                    "Un domingo pola tarde na illa de Grand Jatte"=>array("Georges Seurat",1884),
                    "A ronda de noite"=>array("Rembrandt",1642),
                    "O bico"=>array("Gustav Klimt",1908),
                    "As meninas"=>array("Diego Velázquez",1656));
            
                    

    //Ver listado completo das pinturas
    function imprimir($pinturas){ 
        echo "<table>";
        echo"<tr> <th>Título</th> <th>Autor</th> <th>Data</th> </tr>";
        foreach($pinturas as $pintura => $info) {
            echo"<tr> <td>". $pintura . "</td>  <td>". $info[0] . "</td><td>". $info[1] . "</td> </tr>";
        }
        echo "</table><br>";
    }
    if (isset($_GET["completo"])) { 
        imprimir($pinturas);
    } 



    //Ordeado polo titulo
    function ordearTitulo($pinturas){ 
        ksort($pinturas);
        imprimir($pinturas);
    }
    if (isset($_GET["ordeado_titulo"])) {
        ordearTitulo($pinturas);
    } 



    //Ordeado polo nome do autor
    function ordearAutor($a,$b) {
        if($a[0]<$b[0]) 
            return -1;
        elseif ($a[0]>$b[0]) 
            return 1;
        else
            return 0; 
    }
    if(isset($_GET['ordeado_nome'])){
        uasort($pinturas, 'ordearAutor');
        imprimir($pinturas);
    }



    //Ordeado Cronolóxicamente 
    function ordearCronoloxico($a,$b){ 
        if($a[1]<$b[1]) 
            return -1;
        elseif ($a[1]>$b[1]) 
            return 1;
        else
            return 0; 
    }
    if(isset($_GET['ordeado_cronoloxico'])){
        uasort($pinturas, 'ordearCronoloxico');
        imprimir($pinturas);
    }



    //Ordeado dende a mais moderna á mais antiga 
    function ordearModerna($a,$b){ 
        if($a[1]>$b[1]) 
            return -1;
        elseif ($a[1]<$b[1]) 
            return 1;
        else
            return 0; 
    }
    if(isset($_GET['ordeado_moderna'])){
        uasort($pinturas, 'ordearModerna');
        imprimir($pinturas);
    }



    //Pasa a maiúscula a primeira letra de cada palabra do título
    function maiusculaPrimeirapalabra($pinturas){ 
        echo "<table>";
        echo"<tr> <th>Título</th> <th>Autor</th> <th>Data</th> </tr>";
        foreach($pinturas as $pintura => $info) {
            $pintura = ucwords($pintura);
            echo"<tr> <td>". $pintura . "</td>  <td>". $info[0] . "</td><td>". $info[1] . "</td> </tr>";
        }
        echo "</table><br>";
    }
    if (isset($_GET["maiuscula_primeirapalabra"])) {
        maiusculaPrimeirapalabra($pinturas);
    }



    //Pasa a maiúscula a terceira letra do título
    function maiusculaTerceiraletra($pinturas){ 
        echo "<table>";
        echo"<tr> <th>Título</th> <th>Autor</th> <th>Data</th> </tr>";
        foreach($pinturas as $pintura => $info) {
            $pintura[2]=ucwords($pintura[2]);
            echo"<tr> <td>". $pintura . "</td>  <td>". $info[0] . "</td><td>". $info[1] . "</td> </tr>";
        }
        echo "</table><br>";
    }
    if (isset($_GET["maiuscula_terceiraletra"])) {
        maiusculaTerceiraletra($pinturas);
    }



    //Elimina os espazos dos títulos
    function eliminaEspazos($pinturas){ 
        echo "<table>";
        echo"<tr> <th>Título</th> <th>Autor</th> <th>Data</th> </tr>";
        foreach($pinturas as $pintura => $info) {
            $pintura = str_replace(" ", "",$pintura);
            echo"<tr> <td>". $pintura . "</td>  <td>". $info[0] . "</td><td>". $info[1] . "</td> </tr>";
        }
        echo "</table><br>";
    }
    if (isset($_GET["elimina_espazos"])) {
        eliminaEspazos($pinturas);
        
    }



    //Cambia a letra 'o' pola letra 'u' de todos os datos
    function cambiaLetra($pinturas){ 
        echo "<table>";
        echo"<tr> <th>Título</th> <th>Autor</th> <th>Data</th> </tr>";
        foreach($pinturas as $pintura => $info) {
            $pintura = str_replace("o", "u",$pintura);
            $pintura = str_replace("O", "U",$pintura);
            echo"<tr> <td>". $pintura . "</td>  <td>". $info[0] . "</td><td>". $info[1] . "</td> </tr>";
        }
        echo "</table><br>";
    }
    if (isset($_GET["cambia_letra"])) {
        cambiaLetra($pinturas);
        
    }



    //Buscar Exemplar
    function Buscar($pinturas,$busqueda) {
        echo"<p>As pinturas que conteñen ".$busqueda." son: </p>";

        $pinturasbusqueda= array();

        foreach($pinturas as $pintura => $info) {
            if (str_contains($pintura,$busqueda) || str_contains($info[0],$busqueda) || str_contains($info[1],$busqueda)){
                $pinturasbusqueda[$pintura] = array($info[0],$info[1]);
            }
        }

        return $pinturasbusqueda;
    }
    if (isset($_GET["buscar"])) {
        $busqueda= $_GET['palabra'];
        imprimir(Buscar($pinturas,$busqueda));
    }

?>

</body>
</html>