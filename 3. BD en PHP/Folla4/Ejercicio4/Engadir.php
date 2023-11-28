<!DOCTYPE html>
<html>
<head>
<style>

	#contenedor {
		width:70%;
		margin:20px auto;
		background-color:white;
		display: grid; 
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		grid-gap: 5px; 
	}

	.tema {
		height:210px;
		background-color:white;
		border:1px black solid;
		text-align: center;
		padding-top:20px;
		font-family:Arial;	
	}

	img {
        width:130px;
        height:130px;
	}

    .button {
        color:green;
    }

</style>

<meta charset="utf-8" />
<title></title>
</head>

<body>

    <!-- Formulario ==> Main -->
    <form action = "Ejercicio4.php" method = "POST" enctype="multipart/form-data">

        <input type="submit" value="< MAIN" name="btn_main" class="button">
        <hr>
    </form>

    <!-- Formulario Engadir -->
    <form action = "Engadir.php" method = "POST" enctype="multipart/form-data">

        Título: <input type="text" name="in_titulo"/>
        Autor: <input type="text" name="in_autor"/>
        Ano: <input type="text" name="in_ano"/>
        Duración: <input type="text" name="in_duracion"/>
        Imaxe: <input type="file" name="src_imaxe"/>

        <p>
            <input type="submit" value="Engadir" name="btn_engadir">
            <input type="submit" value="Editar" name="btn_modificar">
            <input type="submit" value="Eliminar" name="btn_borrar">
            <hr>
            <input type="submit" value="Mostrar Temas" name="btnn_mostrar">

        </p>
    
<article id="contenedor">

<?php

//* FUNCIÓNS
function imprimir($a){ 

    while($fila = mysqli_fetch_array($a)) {

        $srcImaxe = "{$fila['Imaxe']}.jpg";

        echo "<div class='tema'> <img src='imaxes/$srcImaxe'>";
        echo "<br>{$fila['Titulo']} <br>{$fila['Autor']} <br>{$fila['Ano']}</br> 
        <input type = 'checkbox' name = 'check[]' value = '{$fila['Titulo']}'>"; 
        echo" </div> </form>"; //Cerramos formulario checkbox
    } 
} 
    
    $servidor="dbXdebug";
    $usuario="root";
    $passwd="root";
    $base="musica";

    //CONECTAMOS
    $conexion = new mysqli($servidor, $usuario, $passwd, $base);
    if($conexion->connect_error)
        die("Non é posible conectar coa BD: ". $conexion->connect_error);
    $conexion->set_charset("utf8");
 
        //* Imprimir 
        if (isset($_POST["btnn_mostrar"])) {

            //PREPARAMOS A SENTENCIA:
            $sentenciaPrep = $conexion->prepare("SELECT * FROM tema");
            
            $sentenciaPrep->execute();
            $resultado=$sentenciaPrep->get_result();

            imprimir($resultado);
            
            $sentenciaPrep->close();
        }

    
    //* Engadir
    if(isset($_POST["btn_engadir"])){

        $in_titulo = $_POST["in_titulo"];
        $in_autor = $_POST["in_autor"];
        $in_ano = $_POST["in_ano"];
        $in_duracion = $_POST["in_duracion"];
        $tmp_name = $_FILES['src_imaxe']['tmp_name'];

        //SE O FICHEIRO ESTÁ SUBIDO POR POST:
        if (is_uploaded_file($tmp_name)) {

            $img_file = $_FILES['src_imaxe']['name']; //O NOME
            $img_type = $_FILES['src_imaxe']['type']; // A EXTENSIÓN

            // SE É UNHA IMAXE:
            if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))) {

                //COMPROBAMOS QUE PODEMOS ESCRIBIR NA CARPETA IMAXES E TODO FOI BEN:
                if (move_uploaded_file($tmp_name, "imaxes/". $img_file)) {
                    echo "Arquivo subido con éxito. "; 
                } 
            }
        }

        $img_file = substr($img_file, 0, -4); 
        
        //PREPARAMOS A SENTENCIA:
        $sentenciaPrep = $conexion->prepare(" INSERT INTO tema (Titulo, Autor, Ano, Duracion, Imaxe) VALUES (?, ?, ?, ?, ?) ");

        $sentenciaPrep->bind_param('ssiis',$in_titulo, $in_autor, $in_ano, $in_duracion, $img_file);
        //$sentenciaPrep->bind_param('iss',$in_id, $in_nome, $in_apelidos);

        if(!$sentenciaPrep->execute() )
            echo "Houbo un erro na execución da consulta";
        else echo "Insertada correctamente. <br>" ;

        $sentenciaPrep->close(); //PECHAMOS AS CONEXIÓNS

    }

     
    //* Eliminar Disco Seleccionado
    if (isset($_POST["btn_borrar"])) {

        foreach($_POST['check'] as $check) {
            $sentenciaPrep = $conexion->prepare(" DELETE FROM tema WHERE Titulo = '$check' ");
            //$sentenciaPrep->bind_param('iss',$in_id, $in_nome, $in_apelidos);
        }

        if(!$sentenciaPrep->execute() )
        echo "Houbo un erro na execución da consulta";
        else echo "Eliminada correctamente. <br>" ;

        $sentenciaPrep->close(); //PECHAMOS AS CONEXIÓNS
       
    }

    //* Modificar Disco Seleccionado
    if (isset($_POST["btn_modificar"])) {

        $in_titulo = $_POST["in_titulo"];
        $in_autor = $_POST["in_autor"];
        $in_ano = $_POST["in_ano"];
        $in_duracion = $_POST["in_duracion"];
        $tmp_name = $_FILES['src_imaxe']['tmp_name'];
        
        foreach($_POST['check'] as $check) {

            //SE O FICHEIRO ESTÁ SUBIDO POR POST:
            if (is_uploaded_file($tmp_name)) {

                $img_file = $_FILES['src_imaxe']['name']; //O NOME
                $img_type = $_FILES['src_imaxe']['type']; // A EXTENSIÓN

                // SE É UNHA IMAXE:
                if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))) {

                    //COMPROBAMOS QUE PODEMOS ESCRIBIR NA CARPETA IMAXES E TODO FOI BEN:
                    if (move_uploaded_file($tmp_name, "imaxes/". $img_file)) {
                        echo "Arquivo subido con éxito. "; 
                    } 
                }
            }

            $img_file = substr($img_file, 0, -4);
        
            //PREPARAMOS A SENTENCIA:
            $sentenciaPrep = $conexion->prepare(" UPDATE tema SET Titulo='$in_titulo', Autor='$in_autor', Ano='$in_ano', Duracion='$in_duracion', Imaxe='$img_file' WHERE Titulo = '$check' ");

            //$sentenciaPrep->bind_param('ssiis',$in_titulo, $in_autor, $in_ano, $in_duracion, $img_file);
            
            if(!$sentenciaPrep->execute() )
                echo "Houbo un erro na execución da consulta";
            else echo "Insertada correctamente. <br>" ;

            $sentenciaPrep->close(); //PECHAMOS AS CONEXIÓNS
            }
    }

$conexion->close(); //PECHAMOS AS CONEXIÓNS

?>

</article>
</body>
</html>
