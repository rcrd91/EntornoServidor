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
    <form action="Ejercicio4.php" method="get">

        <hr>
        <p><b>ENGADIR LIBRO</b></p>
        <p>ID: <input type="text" name="in_id"/></p>
        <p>Título: <input type="text" name="in_titulo"/></p>
        <p>Autor: <input type="text" name="in_autor"/></p>
        <p>Editorial: <input type="text" name="in_editorial"/></p>
        <input type="submit" value="Engadir" name="btn_engadir"/>
        <hr>

        <p><b>BORRAR LIBRO</b></p>
        <p>Título: <input type="text" name="in_titulob"/></p>
        <p><input type="submit" value="Borrar" name="btn_borrar"></p>
        <hr>

        <p><b>MOSTRAR LIBROS</b></p>
        <p><input type="submit" value="Mostrar" name="btn_mostrar"/></p>
        <hr>


    </form><br>

<?php

    //* FUNCIÓNS

    function imprimir($a){ 

        echo "<table>";
        echo"<tr> <th>ID</th> <th>Titulo</th> <th>Autor</th> <th>Editorial</th> </tr>";

        while($fila = mysqli_fetch_array($a))
        echo "<tr>  <td>".$fila["ID"]."</td>  <td>".$fila["Titulo"]."</td>  <td>".$fila["Autor"]."</td>  <td>".$fila["Editorial"]."</td> </tr>";

        echo "</table> <br><br>"; 
    }
    

    // ABRIMOS CONEXIÓN
    $conexion=mysqli_connect("dbXdebug","root","root","folla1"); 

    if ($conexion) {
        mysqli_set_charset($conexion,"utf8");


        //* Imprimir
        $consultaImprimir = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Editorial FROM libro");

        if (isset($_GET["btn_mostrar"])) {
            imprimir($consultaImprimir);
        }     
            
        
        //* Engadir
        if (isset($_GET["btn_engadir"])) {

            $in_id = $_GET["in_id"];
            $in_titulo = $_GET["in_titulo"];
            $in_autor = $_GET["in_autor"];
            $in_editorial = $_GET["in_editorial"];

            $consultaEngadir = mysqli_query($conexion, " INSERT INTO libro (ID, Titulo, Autor, Editorial) VALUES ('$in_id', '$in_titulo', '$in_autor', '$in_editorial') ");
            $consultaImprimir = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Editorial FROM libro");
            imprimir($consultaImprimir);

            //Engadido correctamente?
            if ($consultaEngadir == true) {
                echo "Libro engadido correctamente.";
            } else echo "Libro non engadido.";
            echo"<br><br>";

        }     
            

        //* Eliminar
        if (isset($_GET["btn_borrar"])) {

            $in_titulob = $_GET["in_titulob"];

            $consultaBorrar = mysqli_query($conexion, " DELETE FROM libro WHERE Titulo='$in_titulob'; ");
            $consultaImprimir = mysqli_query($conexion, "SELECT ID, Titulo, Autor, Editorial FROM libro");
            imprimir($consultaImprimir);

            //Eliminado correctamente?
            if ($consultaBorrar == true) {
                echo "Libro borrado correctamente.";
            } else echo "Libro non borrado.";
            echo"<br><br>";
        }  


    } else { echo "Erro conectando";}

    mysqli_close($conexion); 

?>

</body>
</html>


