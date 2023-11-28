<!DOCTYPE html>
<html>
<head>
<title>Conexión a bases de datos</title>
</head>
<style>
    body {
        background-color:lightgrey;
    }
        table, th, td {
            border: 1px solid;
            border-collapse:collapse;
        }
</style>
<body>

    <!-- Botóns -->
    <form action="Ejercicio3.php" method="get">

        <input type="submit" value="Ver listado completo de pinturas" name="imprimir" /><br>
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

    //* FUNCIÓNS

    function imprimir($consulta1){ 

        echo "<table>";
        echo"<tr> <th>ID</th> <th>Titulo</th> <th>Autor</th> <th>Fecha</th> </tr>";

        while($fila = mysqli_fetch_array($consulta1)) {

            echo "<tr>  <td>".$fila["ID"]."</td>  <td>".$fila["Titulo"]."</td>  <td>".$fila["Autor"]."</td>  <td>".$fila["Fecha"]."</td> </tr>";
        }
        echo "</table> <br><br>"; 
    }

    function maiusculaPrimeirapalabra($consulta6){ 

        echo "<table>";
        echo"<tr> <th>ID</th> <th>Titulo</th> <th>Autor</th> <th>Fecha</th> </tr>";

        while($fila = mysqli_fetch_array($consulta6)) {

            echo "<tr>  <td>". $fila["ID"] ."</td>  <td>". ucwords($fila[("Titulo")]) ."</td>  <td>".$fila["Autor"]."</td>  <td>".$fila["Fecha"]."</td> </tr>";
        }

        echo "</table> <br><br>"; 
    }

    function maiusculaTerceiraletra($consulta7){
        echo "<table>";
        echo"<tr> <th>ID</th> <th>Titulo</th> <th>Autor</th> <th>Fecha</th> </tr>";

        while($fila = mysqli_fetch_array($consulta7)) {

            $fila["Titulo"][2] = strtoupper($fila["Titulo"][2]); 
            echo "<tr>  <td>".$fila["ID"]."</td>  <td>". $fila["Titulo"] ."</td>  <td>".$fila["Autor"]."</td>  <td>".$fila["Fecha"]."</td> </tr>"; 
        }

        echo "</table> <br><br>"; 
    }

    function eliminaEspazos($consulta8){
        echo "<table>";
        echo"<tr> <th>ID</th> <th>Titulo</th> <th>Autor</th> <th>Fecha</th> </tr>";

        while($fila = mysqli_fetch_array($consulta8)) {

            $fila["Titulo"] = str_replace(" ", "", $fila["Titulo"]); 
            echo "<tr>  <td>".$fila["ID"]."</td>  <td>". $fila["Titulo"] ."</td>  <td>".$fila["Autor"]."</td>  <td>".$fila["Fecha"]."</td> </tr>"; 
        }

        echo "</table> <br><br>"; 
    }

    function cambiaLetra($consulta9){
        echo "<table>";
        echo"<tr> <th>ID</th> <th>Titulo</th> <th>Autor</th> <th>Fecha</th> </tr>";
            
        while($fila = mysqli_fetch_array($consulta9)) {

            $fila["Titulo"] = str_replace("o","u",$fila["Titulo"]); 
            echo "<tr>  <td>".$fila["ID"]."</td>  <td>". $fila["Titulo"] ."</td>  <td>".$fila["Autor"]."</td>  <td>".$fila["Fecha"]."</td> </tr>"; 
        }

        echo "</table> <br><br>"; 
    }


    // ABRIMOS CONEXIÓN
    $conexion=mysqli_connect("dbXdebug","root","root","folla1");
    
    if ($conexion) { 

        mysqli_set_charset($conexion,"utf8");

    
        //* Imprime táboa completa
        if (isset($_GET["imprimir"])) {
            $consulta1 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas");
            imprimir($consulta1);
        }     


        //* Alfabéticamente polo Título
        if (isset($_GET["ordeado_titulo"])){

            $consulta2 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas ORDER BY Titulo");

            imprimir($consulta2);
        }


        //* Alfabéticamente polo nome do Autor
        if (isset($_GET["ordeado_nome"])){

            $consulta3 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas ORDER BY Autor");

            imprimir($consulta3);
        }
            

        //* Ordeado Cronolóxicamente
        if (isset($_GET["ordeado_cronoloxico"])){

            $consulta4 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas ORDER BY Fecha");

            imprimir($consulta4);
        }
            

        //* Ordeado dende a mais moderna á mais antiga 
        if (isset($_GET["ordeado_moderna"])){

            $consulta5 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas ORDER BY Fecha DESC");

            imprimir($consulta5);
        }
    

        //* Pasa a maiúscula a primeira letra de cada palabra do título
        if (isset($_GET["maiuscula_primeirapalabra"])){

            $consulta6 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas ");

            maiusculaPrimeirapalabra($consulta6);
        }
            

        //* Pasa a maiúscula a terceira letra do título
        if (isset($_GET["maiuscula_terceiraletra"])){

            $consulta7 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas ");

            maiusculaTerceiraletra($consulta7);
        }
             
        


        //* Elimina os espazos do TítulO
        if (isset($_GET["elimina_espazos"])){

            $consulta8 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas ");

            eliminaEspazos($consulta8);
        }
        
        


        //* Cambia a letra 'o' pola letra 'u' de todos os datos
        if (isset($_GET["cambia_letra"])){

            $consulta9 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas ");

            cambiaLetra($consulta9);
        }


        //* Buscar polo Título exacto
        if (isset($_GET["buscar"])){

            $palabra = $_GET["palabra"];

            $consulta10 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas WHERE Titulo = '$palabra'");

            imprimir($consulta10);
        }
        

        //! Buscar por algo que conteña o Título
        /*
        function buscar($consulta10){

            $palabra = $_GET["palabra"];

            echo "<table>";
            echo"<tr> <th>ID</th> <th>Titulo</th> <th>Autor</th> <th>Fecha</th> </tr>";
    
            while($fila = mysqli_fetch_array($consulta10)) {

                $fila["Titulo"] = str_contains($fila["Titulo"],$palabra); 
                echo "<tr>  <td>".$fila["ID"]."</td>  <td>". $fila["Titulo"] ."</td>  <td>".$fila["Autor"]."</td>  <td>".$fila["Fecha"]."</td> </tr>"; 
            }
    
            echo "</table> <br><br>"; 
        }

        if (isset($_GET["buscar"])){

            $consulta10 = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Fecha FROM pinturas");


            buscar($consulta10);
            imprimir($consulta10);
        }  */
              

    } else { echo "Error conectando";}


    // CERRAMOS CONEXIÓN
    mysqli_close($conexion);


    /* $cadea = "ola que tal estás";
    echo $cadea[4]; //MOSTRA q
    $cadea[4] = "X";
    echo $cadea;  //MOSTRA ola Xue tal estás? */
?>

</body>
</html>


