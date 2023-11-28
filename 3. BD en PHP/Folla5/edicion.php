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

echo "<h1>Edición</h1> <hr>";

//!Abrimos Conexión
$servidor = "dbXdebug";
$usuario = "root";
$passw = "root";
$db = "tendaInformatica";

$conexion = new mysqli ($servidor, $usuario, $passw, $db);
if($conexion->connect_error)
    die("Erro de conexion:".$conexion->connect_error);
$conexion->set_charset("utf8");

//* FORMULARIOS ----------------------------------------------------------------------------------------------------------------

    //* Select de PRODUCTOS
    $sentenciaPre = $conexion->prepare("SELECT * FROM productos ");
    $sentenciaPre->execute();
    $resultado = $sentenciaPre->get_result();

    //Abrimos formulario Select Produtos
    echo"
            <h2>Productos</h2>

            <form action='edicion.php' method='post'> 

            <select name='producto' id='producto'> //* Valores de familia
                <option value='todos'> Todos </option>
    ";
                //option para cada produto:
                while($fila=$resultado->fetch_array(MYSQLI_BOTH)){
                echo "<option value='{$fila['id']}'> ID: {$fila['id']} | Nome: {$fila['nombre']} | Nome corto: {$fila['nombre_corto']} | PVP: {$fila['pvp']} | Familia: {$fila['familia']} </option>";
                }
    echo"
            </select><br><br>
            ID: <input type='text' name='in_id'/>
            Nome: <input type='text' name='in_nome'/>
            Nome Corto: <input type='text' name='in_nomeCorto'/>
            Descripción: <input type='text' name='in_descripcion'/>
            PVP: <input type='text' name='in_pvp'/>
            Familia: <input type='text' name='in_familia'/>
        
            <p>
                <input type='submit' value='Engadir producto' name='btn_engadirProducto'>
                <input type='submit' value='Actualizar producto seleccionado' name='btn_actualizarProducto'>
                <input type='submit' value='Borrar producto seleccionado' name='btn_borrarProducto'/>
            </p>
            </form>
            <hr>
    ";
    //Cerramos formulario

    $sentenciaPre->close();


//* Select de FAMILIAS
    $sentenciaPre = $conexion->prepare("SELECT * FROM familias ");
    $sentenciaPre->execute();
    $resultado = $sentenciaPre->get_result();

    //Abrimos formulario Select Familias
    echo"
            <h2>Familias</h2>

            <form action='edicion.php' method='post'> 

                <select name='familia' id='familia'> //* Valores de familia
                    <option value='todos'> Todos </option>
    ";
                    //option para cada produto:
                    while($fila=$resultado->fetch_array(MYSQLI_BOTH)){
                    echo "<option value='{$fila['cod']}'> Código: {$fila['cod']} | Familia: {$fila['nombre']} </option>";
                    }
    echo"
                </select><br><br>

            Código: <input type='text' name='in_id'/>
            Familia: <input type='text' name='in_nome'/>
            <p> 
                <input type='submit' value='Engadir familia' name='btn_engadirFamilia'>
                <input type='submit' value='Actualizar familia seleccionada' name='btn_actualizarFamilia'>
                <input type='submit' value='Borrar familia seleccionada' name='btn_borrarFamilia'/> 
            </p>
            </form>

    ";
    //Cerramos formulario

    $sentenciaPre->close();

    
//* PRODUCTOS ----------------------------------------------------------------------------------------------------------------

//* Engadir PRODUCTO
if(isset($_POST["btn_engadirProducto"])){

    $in_id = $_POST["in_id"];
    $in_nome = $_POST["in_nome"];
    $in_nomeCorto = $_POST["in_nomeCorto"];
    $in_descripcion = $_POST["in_descripcion"];
    $in_pvp = $_POST["in_pvp"];
    $in_familia = $_POST["in_familia"];

    $sentenciaPrep = $conexion->prepare(" INSERT INTO productos (id, nombre, nombre_corto, descripcion, pvp, familia) VALUES (?, ?, ?, ?, ?, ?) ");

    $sentenciaPrep->bind_param('isssds',$in_id, $in_nome, $in_nomeCorto, $in_descripcion, $in_pvp, $in_familia);

    if(!$sentenciaPrep->execute() )
        echo "Houbo un erro na execución da consulta.";
    else echo "Produto engadido correctamente.<br>" ;

    $sentenciaPrep->close();  
}

//* Eliminar PRODUCTO Seleccionado
if (isset($_POST["btn_borrarProducto"])) {

    $producto = $_POST["producto"];

    $sentenciaPrep = $conexion->prepare(" DELETE FROM productos WHERE id = '$producto' ");

    if ( $producto == "todos") {
        echo"Eliminaríamos todos os datos de productos. ";
    }

    if(!$sentenciaPrep->execute() )
        echo "Houbo un erro na execución da consulta.";
    else echo "Produto borrado correctamente.<br>" ;

    $sentenciaPrep->close();  
}


//* Actualizar PRODUCTO Seleccionado
if (isset($_POST["btn_actualizarProducto"])) {

    $in_id = $_POST["in_id"];
    $in_nome = $_POST["in_nome"];
    $in_nomeCorto = $_POST["in_nomeCorto"];
    $in_descripcion = $_POST["in_descripcion"];
    $in_pvp = $_POST["in_pvp"];
    $in_familia = $_POST["in_familia"];
    $producto = $_POST["producto"];

    $sentenciaPrep = $conexion->prepare("UPDATE productos SET id='$in_id', nombre='$in_nome', nombre_corto='$in_nomeCorto', descripcion='$in_descripcion', pvp='$in_pvp', familia='$in_familia' WHERE id = '$producto' ");

    if ($producto == "todos") {
        echo"Modificaríamos todos os datos de productos. ";
    }

    if(!$sentenciaPrep->execute() )
    echo "Houbo un erro na execución da consulta.";
    else echo "Producto actualizado correctamente. <br>" ;

    $sentenciaPrep->close(); 
} 

//* FAMILIAS ----------------------------------------------------------------------------------------------------------------

//* Engadir FAMILIA
if(isset($_POST["btn_engadirFamilia"])){

    $in_id = $_POST["in_id"];
    $in_nome = $_POST["in_nome"];
    
    $sentenciaPrep = $conexion->prepare(" INSERT INTO familias (cod, nombre) VALUES (?, ?) ");

    $sentenciaPrep->bind_param('ss',$in_id, $in_nome);

    if(!$sentenciaPrep->execute() )
        echo "Houbo un erro na execución da consulta.";
    else echo "Familia engadida correctamente.";

    $sentenciaPrep->close();  
}

//* Eliminar FAMILIA Seleccionada
if (isset($_POST["btn_borrarFamilia"])) {

    $familia = $_POST["familia"];

    $sentenciaPrep = $conexion->prepare(" DELETE FROM familias WHERE cod = '$familia' ");

    if ( $familia == "todos") {
        echo"Eliminaríamos todos os datos de familias. ";
    }

    if(!$sentenciaPrep->execute() )
        echo "Houbo un erro na execución da consulta";
    else echo "Familia borrada correctamente.";

    $sentenciaPrep->close();  
}


//* Actualizar FAMILIA Seleccionada
if (isset($_POST["btn_actualizarFamilia"])) {

    $in_id = $_POST["in_id"];
    $in_nome = $_POST["in_nome"];
    $familia = $_POST["familia"];

    $sentenciaPrep = $conexion->prepare("UPDATE familias SET cod='$in_id', nombre='$in_nome' WHERE cod = '$familia' ");

    if ($familia == "todos") {
        echo"Modificaríamos todos os datos de familias...";
    }

    if(!$sentenciaPrep->execute() )
    echo "Houbo un erro na execución da consulta.";
    else echo "Familia actualizada correctamente. <br>" ;

    $sentenciaPrep->close(); 
}  


$conexion->close(); //!PECHAMOS AS CONEXIÓNS

echo" 
    <hr>
    <form action='inicio.php' method='post'>
        <input type='submit' value='Inicio' name='btn_inicio' class='button'/> 
    </form> 
    <br>
    <form action='edicion.php' method='post'>
        <input type='submit' value='⟳' name='btn_edicion'/> 
    </form>
";

?>

</body>
</html>
