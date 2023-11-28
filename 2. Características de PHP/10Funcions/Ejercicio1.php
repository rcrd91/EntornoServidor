<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            background-color: lightblue;
        }
</style>

<body>

    <form action="Ejercicio1.php" method="GET">

    <p>Texto de proba: Este ano está chovendo todas as tardes</p>


        Introduce Frase: <input type="text" name="frase" /><br> <!-- Este ano está chovendo todas as tardes -->

        <button id="maiuscula" type="submit" name="maiuscula" value="maiuscula">Pasa a maiúscula a primeira letra</button><br>     
		<button id="minuscula" type="submit" name="minuscula" value="minuscula">Pasa a minúscula a primeira letra</button><br>
		<button id="eliminaespazos" type="submit" name="eliminaespazos" value="eliminaespazos">Elimina os espazos</button><br>
		<button id="eliminaletras" type="submit" name="eliminaletras" value="eliminaletras">Elimina as letras "e"</button><br>
		<button id="cambiapuntos" type="submit" name="cambiapuntos" value="cambiapuntos">Cambia os puntos por comas</button><br><br>

        Introduce Palabra: <input type="text" name="palabra" /><br> <!-- chovendo -->

		<button id="comprobapalabra" type="submit" name="comprobapalabra" value="comprobapalabra">A palabra está na frase?</button><br>
		<button id="eliminapalabra" type="submit" name="eliminapalabra" value="eliminapalabra">Elimina a palabra</button><br>
        <button id="cambiapalabra" type="submit" name="cambiapalabra" value="cambiapalabra">Cambia "tardes" por "noites"</button><br>

		
	</form>

<?php
    
    //* FRASE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Pasa a maiúscula a primeira letra
    if (isset($_GET["maiuscula"])) {
       $busqueda= $_GET['frase'];
        echo ucfirst($busqueda);
    }
    
    //Pasa a minúscula a primeira letra
    if (isset($_GET["minuscula"])) {
        $busqueda= $_GET['frase'];
         echo lcfirst($busqueda);
    }

    //Elimina os espazos
    if (isset($_GET["eliminaespazos"])) {
        $busqueda= $_GET['frase'];
        echo str_replace(' ', '', $busqueda);
    }

    //Elimina as letras "e"
    if (isset($_GET["eliminaletras"])) {
        $busqueda= $_GET['frase'];
        echo str_replace('e', '', $busqueda);
    }

    //Cambia os puntos por comas
    if (isset($_GET["cambiapuntos"])) {
        $busqueda= $_GET['frase'];
        echo str_replace('.', ',', $busqueda);
    }


    //* PALABRA ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //A palabra está na frase?
    if (isset($_GET["comprobapalabra"])) {
        $frase=$_GET["frase"];
        $palabra= $_GET['palabra'];
         
        $resultado = substr_count($frase, $palabra);

        if($resultado==1){
            echo"A palabra si que está na frase";
        } else {
            echo"A palabra Non está na frase";
        }
    }
    
    //Elimina a palabra
    if (isset($_GET["eliminapalabra"])) {
        $frase=$_GET["frase"];
        $palabra= $_GET['palabra'];
         
        $resultado = chop($frase, $palabra);
        echo $resultado;
    }
    
    //Cambia "tardes" por "noites"
    str_replace("world","Peter","Hello world!");
    if (isset($_GET["cambiapalabra"])) {
        $frase=$_GET["frase"];
        $palabra= $_GET['palabra'];
        $resultado = str_replace("tardes","noites", $frase);
        echo $resultado;
    }
?>

</body>
</html>