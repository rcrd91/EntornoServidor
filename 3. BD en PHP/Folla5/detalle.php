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

//* FUNCIÓNS:

//* Imprimir 
function imprimir($a){ 

    //Abrimos Formulario
    echo"
        <form action='detalle.php' method='post'> 
            <table>
                <tr> <th>ID</th> <th>Nome</th> <th>Nome Corto</th> <th>Descrición</th> <th>PVP</th> <th>Familia</th></tr> ";

            while($fila = mysqli_fetch_array($a)) {
                echo"<tr> <td>{$fila['id']}</td> <td>{$fila['nombre']}</td> <td>{$fila['nombre_corto']}</td> 
                <td>{$fila['descripcion']}</td> <td>{$fila['pvp']}</td> <td>{$fila['familia']}</td> 
                 <tr> ";
            }
    echo" 
            </table> 
        </form> <br><br>
    "; //Cerramos formulario
}

echo "<h1>Detalle</h1> <hr>";

//!Abrimos Conexión ----------------------------------------------------------------------------------------------------------------
$servidor = "dbXdebug";
$usuario = "root";
$passw = "root";
$db = "tendaInformatica";

$conexion = new mysqli ($servidor, $usuario, $passw, $db);
if($conexion->connect_error)
    die("Erro de conexion:".$conexion->connect_error);
$conexion->set_charset("utf8");
    
    
    //* Consulta botón Detalle
    if (isset($_POST["check"])) { 

        foreach($_POST['check'] as $check) {
            $sentenciaPrep = $conexion->prepare(" SELECT * FROM productos WHERE id = '$check' ");
        }

        $sentenciaPrep->execute();
        $resultado=$sentenciaPrep->get_result();
        imprimir($resultado);

        $sentenciaPrep->close();  
    }

    $conexion->close();
    //! Cerramos Conexión ----------------------------------------------------------------------------------------------------------------

    //* Botón Inicio
    echo" 
        <br>
        <form action='inicio.php' method='post'>
            <input type='submit' value='Inicio' name='btn_inicio' class='button'/> 
        </form> 
    ";
?>

</body>
</html>
