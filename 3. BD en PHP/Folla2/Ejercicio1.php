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

    <!-- Formulario -->
    <form action="Ejercicio1.php" method="get">

        <hr>
        <p><b>MOSTRAR DISCOS</b></p>
        <input type="submit" value="Mostrar" name="btn_mostrar"/>

        <hr>
        <p><b>ENGADIR DISCO</b></p>
        <p>
        ID: <input type="text" name="in_id"/>
        Título: <input type="text" name="in_titulo"/>
        Grupo: <input type="text" name="in_grupo"/>
        Disco: <input type="text" name="in_disco"/>
        Ano: <input type="text" name="in_ano"/>
        Duración: <input type="text" name="in_duracion"/>
        </p>
        <input type="submit" value="Engadir" name="btn_engadir"/>
        <hr>

    </form>

   

    <!-- Abrimos formulario -->
    <form action = "Ejercicio1.php" method = "get">

        <p><b>BORRAR DISCO SELECCIONADO</b></p>
        <p><input type="submit" value="Borrar" name="btn_borrar"></p>

        <hr>
        <p><b>MODIFICAR DISCO SELECCIONADO</b></p>
        <p>
        ID: <input type="text" name="inp_id"/>
        Título: <input type="text" name="inp_titulo"/>
        Grupo: <input type="text" name="inp_grupo"/>
        Disco: <input type="text" name="inp_disco"/>
        Ano: <input type="text" name="inp_ano"/>
        Duración: <input type="text" name="inp_duracion"/>
        </p>
        <input type="submit" value="Modificar" name="btn_modificar"/>
        <hr> <br>


<?php

    //* FUNCIÓNS
    function imprimir($a){ 

        echo "<table>";
        
        echo"<tr> <th>ID</th> <th>Título</th> <th>Grupo</th> <th>Disco</th> <th>Ano</th> <th>Duración</th> <th>Seleccionado</th> </tr>";

        while($fila = mysqli_fetch_array($a))
        echo "<tr>  <td>{$fila['ID']}</td>  <td>{$fila['Titulo']}</td>  <td>{$fila['Grupo']}</td> <td>{$fila['Disco']}</td> <td>{$fila['Ano']}</td> <td>{$fila['Duracion']}</td> 
                    <td> <input type = 'checkbox' name = 'check[]' value = '{$fila['ID']}'> </td> </tr>"; //!

        echo "</table> </form> <br><br>"; //Cerramos formulario
    }
    

    // ABRIMOS CONEXIÓN
    $conexion=mysqli_connect("dbXdebug","root","root","folla2"); 

    if ($conexion) { 
        mysqli_set_charset($conexion,"utf8");


        //* Imprimir 
        $consultaImprimir = mysqli_query($conexion, "SELECT * FROM disco");

        //$boton= echo"<a href='/UD3/2Consultas/botons.html' target='_blank'>BOTON</a>";
        isset($boton);

        if (isset($_GET["btn_mostrar"])) {

            imprimir($consultaImprimir);
        }     
        
        //* Engadir
        if (isset($_GET["btn_engadir"])) {

            $in_id = $_GET["in_id"];
            $in_titulo = $_GET["in_titulo"];
            $in_grupo = $_GET["in_grupo"];
            $in_disco = $_GET["in_disco"];
            $in_ano = $_GET["in_ano"];
            $in_duracion = $_GET["in_duracion"];

            $consultaEngadir = mysqli_query($conexion, " INSERT INTO disco (ID, Titulo, Grupo, Disco, Ano, Duracion) VALUES ('$in_id', '$in_titulo', '$in_grupo', '$in_disco', '$in_ano', '$in_duracion') ");
            
            //Engadido correctamente?
            if ($consultaEngadir == true) {
                echo "Engadido correctamente.";
            } else echo "Non engadido.";
            echo"<br><br>";
        }  
           
        //* Eliminar
        if (isset($_GET["btn_borrar"])) {

            foreach($_GET['check'] as $check) {
                $consultaEliminar = mysqli_query($conexion, "DELETE FROM disco WHERE ID = $check");
            }
            
            //Eliminado correctamente?
            if ($consultaEliminar == true) {
                echo "Eliminado correctamente.";
            } else echo "Non eliminado.";
            echo"<br><br>";
        }

        //* Modificar Disco Seleccionado
        if (isset($_GET["btn_modificar"])) {

            $inp_id = $_GET["inp_id"];
            $inp_titulo = $_GET["inp_titulo"];
            $inp_grupo = $_GET["inp_grupo"];
            $inp_disco = $_GET["inp_disco"];
            $inp_ano = $_GET["inp_ano"];
            $inp_duracion = $_GET["inp_duracion"];

            foreach($_GET['check'] as $check) {
                $consultaModificar = mysqli_query($conexion, "UPDATE disco SET ID='$inp_id', Titulo='$inp_titulo', Grupo='$inp_grupo', Disco='$inp_disco', Ano='$inp_ano', Duracion='$inp_duracion' WHERE ID = $check ");  
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


