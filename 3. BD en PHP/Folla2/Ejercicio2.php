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

<!-- Abrimos formulario -->
<form action = "Ejercicio2.php" method = "get">
    
    <p><b>MOSTRAR DICCIONARIO</b></p>
    <p><input type="submit" value="Mostrar" name="btn_mostrar"></p>

    <hr>

    <p><b>ENGADIR PALABRA</b></p>
    <p>
    Inglés: <input type="text" name="in_ingles"/>
    Galego: <input type="text" name="in_galego"/>
    </p>
    <input type="submit" value="Engadir" name="btn_engadir"/>
    
    <hr>

    <p><b>BORRAR PALABRA SELECCIONADA</b></p>
    <p><input type="submit" value="Borrar" name="btn_borrar"></p>

    <hr>

    <p><b>MODIFICAR PALABRA SELECCIONADA</b></p>
    <p>
    Inglés: <input type="text" name="inp_ingles"/>
    Galego: <input type="text" name="inp_galego"/>
    </p>
    <input type="submit" value="Modificar" name="btn_modificar"/>
    
    <hr><br>

<?php

    //* FUNCIÓNS
    function imprimir($a){ 

        echo "<table>";
        
        echo"<tr> <th>Inglés</th> <th>Galego</th> </tr>";

        while($fila = mysqli_fetch_array($a))
        echo "<tr>  <td>{$fila['Ingles']}</td> <td>{$fila['Galego']}</td> 
                    <td> <input type = 'checkbox' name = 'check[]' value = '{$fila['Ingles']}'> </td> </tr>"; //!

        echo "</table> </form> <br><br>"; //Cerramos formulario
    }
    

    // ABRIMOS CONEXIÓN
    $conexion=mysqli_connect("dbXdebug","root","root","folla2"); 

    if ($conexion) { 
        mysqli_set_charset($conexion,"utf8");


        //* Imprimir 
        $consultaImprimir = mysqli_query($conexion, "SELECT * FROM dicionario");

        if (isset($_GET["btn_mostrar"])) {

            imprimir($consultaImprimir);
        }     
        
        //* Engadir Palabra
        if (isset($_GET["btn_engadir"])) {

            $in_ingles = $_GET["in_ingles"];
            $in_galego = $_GET["in_galego"];

            $consultaEngadir = mysqli_query($conexion, "INSERT INTO dicionario (Ingles, Galego) VALUES ('$in_ingles', '$in_galego')");
            
            //Engadido correctamente?
            if ($consultaEngadir == true) {
                echo "Engadido correctamente.";
            } else echo "Non engadido.";
            echo"<br><br>";
        }  
           
        //* Eliminar Palabra Seleccionada
        if (isset($_GET["btn_borrar"])) {

            foreach($_GET['check'] as $check) {
                $consultaEliminar = mysqli_query($conexion, "DELETE FROM dicionario WHERE Ingles = '$check' ");
            }
            
            //Eliminado correctamente?
            if ($consultaEliminar == true) {
                echo "Eliminado correctamente.";
            } else echo "Non eliminado.";
            echo"<br><br>";
        }

        //* Modificar Palabra Seleccionada
        if (isset($_GET["btn_modificar"])) {

            $inp_ingles = $_GET["inp_ingles"];
            $inp_galego = $_GET["inp_galego"];

            foreach($_GET['check'] as $check) {
                $consultaModificar = mysqli_query($conexion, "UPDATE dicionario SET Ingles='$inp_ingles', Galego='$inp_galego' WHERE Ingles = '$check' ");  
            }

            //Modificado correctamente?
            if ($consultaModificar == true) {
                echo "Modificado correctamente.";
            } else echo "Non modificado.";
            echo"<br><br>";
        }

    } else { echo "Erro conectando";}

    mysqli_close($conexion); 

?>

</body>
</html>
