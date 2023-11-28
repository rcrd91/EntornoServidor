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

//* Imprimir (con botón detalle) 
function imprimir($a){ 

    //Abrimos Formulario 
    echo"
        <form action='detalle.php' method='post'> 
            <table>
                <tr> <th>ID</th> <th>Nome</th> <th>Nome Corto</th> <th>Descrición</th> <th>PVP</th> <th>Familia</th> <th>Detalle</th> </tr> ";

            while($fila = mysqli_fetch_array($a)) {
                echo"<tr> <td>{$fila['id']}</td> <td>{$fila['nombre']}</td> <td>{$fila['nombre_corto']}</td> 
                <td>";
                echo substr($fila['descripcion'],0,100); 
                echo" ...</td> <td>{$fila['pvp']}</td> <td>{$fila['familia']}</td> 
                <td> <button type = 'submit' name = 'check[]' value = '{$fila['id']}'>Detalle</button> </td> <tr> ";
            }
             
    echo" 
            </table> 
        </form> <br><br>
    "; //Cerramos formulario
}
    
echo "<h1>Produtos</h1> <hr>";

//! Abrimos Conexión ----------------------------------------------------------------------------------------------------------------
$servidor = "dbXdebug";
$usuario = "root";
$passw = "root";
$db = "tendaInformatica";

$conexion = new mysqli ($servidor, $usuario, $passw, $db);
if($conexion->connect_error)
    die("Erro de conexion:".$conexion->connect_error);
$conexion->set_charset("utf8");
    
    //* CONSULTA do producto seleccionado no Select de Inicio
    if (isset($_POST["btn_consultar"])) {

        $familia = $_POST["familia"];

        //Preparamos a sentencia
        $sentenciaPrep = $conexion->prepare("SELECT id, nombre, nombre_corto, descripcion, pvp, familia FROM productos WHERE familia = '$familia' ");
        $sentenciaPrep->execute();
        $resultado = $sentenciaPrep->get_result();

        if ($familia == "todos") {
            $sentenciaPrep = $conexion->prepare("SELECT * FROM productos");
            $sentenciaPrep->execute();
            $resultado = $sentenciaPrep->get_result();
        }
        
        imprimir($resultado);

        $sentenciaPrep->close(); 
    }


$conexion->close(); 
//! Cerramos Conexión ----------------------------------------------------------------------------------------------------------------


//* Botón Inicio
echo" 
    <form action='inicio.php' method='post'>
        <input type='submit' value='Inicio' name='btn_inicio' class='button'/> 
    </form> 
";

?>

</body>
</html>
