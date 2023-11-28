<!DOCTYPE html>
<html>
<head>
<style>
    body {
            background-color:lightgrey;
        }

    table, th, td {
            border: 1px solid;
            border-collapse:collapse;
        }

    .button {
        color:green;
    }
</style>

<meta charset="utf-8" />
<title></title>
</head>

<body>


<?php

 //* FUNCIÓNS ----------------------------------------------------------------------------------------------------------------

    function imprimir($a){ 

        //Abrimos Formulario
        echo"
            <form action='detalle.php' method='post'> 
                <table>
                    <tr> <th>ID</th> <th>Nome</th> <th>Nome Corto</th> <th>Descrición</th> <th>PVP</th> <th>Familia</th> <th>Detalle</th> </tr> ";
    
                while($fila = mysqli_fetch_array($a)) {
                    echo"<tr> <td>{$fila['id']}</td> <td>{$fila['nombre']}</td> <td>{$fila['nombre_corto']}</td> 
                    <td>{$fila['descripcion']}</td> <td>{$fila['pvp']}</td> <td>{$fila['familia']}</td>";
                }
        echo" 
                </table> 
            </form> <br><br>
        "; //Cerramos formulario
    }

    function imprimir2($a){ 

        //Abrimos Formulario
        echo"
            <form action='detalle.php' method='post'> 
                <table>
                    <tr> <th>ID</th> <th>Nome</th> <th>Nome Corto</th> <th>Descrición</th> <th>PVP</th> <th>Familia</th> </tr> ";
    
                while($fila = mysqli_fetch_array($a)) {
                    echo"<tr> <td>{$fila['id']}</td> <td>{$fila['nombre']}</td> <td>{$fila['nombre_corto']}</td> 
                    <td>{$fila['descripcion']}</td> <td>{$fila['pvp']}</td> <td>{$fila['familia']}</td>";
                }
        echo" 
                </table> 
            </form> <br><br>
        "; //Cerramos formulario
    }

    echo "<h1>Inicio</h1> <hr>";
    

    //! Abrimos Conexión ----------------------------------------------------------------------------------------------------------------
    $servidor = "dbXdebug";
    $usuario = "root";
    $passw = "root";
    $db = "tendaInformatica";

   /* $conexion = new mysqli ($servidor, $usuario, $passw, $db);
    if($conexion->connect_error)
        die("Erro de conexion:".$conexion->connect_error);
    $conexion->set_charset("utf8"); */

    $conexion = new mysqli($servidor, $usuario, $passw, $db);
 

        //*FORMULARIOS ----------------------------------------------------------------------------------------------------------------

        //* Select de FAMILIAS

        $sentenciaPre = $conexion->prepare("SELECT * FROM familias ");
        $sentenciaPre->execute();
        $resultado = $sentenciaPre->get_result();

        //Abrimos formulario
        echo"
            <form action='productos.php' method='post' enctype='multipart/form-data'>

                <select name='familia' id='familia'> //* Valores de familia
                    <option value='todos'> Todos </option>
        ";
                    //option para cada produto:
                    while($fila=$resultado->fetch_array(MYSQLI_BOTH)){
                    echo "<option value='{$fila['cod']}'> {$fila['nombre']} </option>";
                    }
        echo"
                </select> 

                <input type='submit' value='Consultar familias' name='btn_consultar'/> 

            </form> 
            <hr>   
        ";
        //Cerramos formulario

        $sentenciaPre->close();


    



        // ------------------------------------------------------------------------------------------------------------------------


        //* Buscar PRODUCTOS
        //Abrimos formulario
        echo"
            <form action='inicio.php' method='post'> 

                <input type='text' name='in_buscar'>

                <input type='submit' value='Buscar productos' name='btn_buscar'>

            </form>
            <hr>
        ";
        //Cerramos formulario

        //* CONSULTA Buscar PRODUCTOS
        if (isset($_POST["btn_buscar"])) {

            $in_buscar = $_POST["in_buscar"];

            $sentenciaPrep = $conexion->prepare("SELECT * FROM productos WHERE nombre LIKE '%$in_buscar%' OR nombre_corto LIKE '%$in_buscar%' OR descripcion LIKE '%$in_buscar%' OR pvp LIKE '%$in_buscar%' OR familia LIKE '%$in_buscar%' ");
            $sentenciaPrep->execute();
            $resultado = $sentenciaPrep->get_result();

            imprimir2($resultado);

            $sentenciaPrep->close(); 
        }

    
        //* -> edicion.php
        echo"
            <br>
            <form action='edicion.php' method='POST'>
                <input type='submit' value='Edición' name='btn_edicion' class='button'/> 
            </form>
        ";


    $conexion->close();
    //! Cerramos Conexión ----------------------------------------------------------------------------------------------------------------


    //* Botón Refrescar
    echo" 
        <br>

        <form action='inicio.php' method='post'>
            <input type='submit' value='⟳' name='btn_inicio'/> 
        </form> 
    ";

?>

</body>
</html>
