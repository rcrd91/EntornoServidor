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

    <!-- Formulario Main -->
    <form action = "Ejercicio4.php" method = "POST">
        
        <p><input type="submit" value="Mostrar Temas" name="btn_mostrar"></p>
        <p><input type="submit" value="Ordear por Titulo" name="btn_ordearTitulo"/></p>
        <p><input type="submit" value="Ordear por Autor" name="btn_ordearAutor"/></p>
        
        <select name="autor" id="autor">
            <option value="The Beatles">The Beatles</option>
            <option value="The Rolling Stones">The Rolling Stones</option>
            <option value="Outros">Outros</option>
        </select>
        <input type="submit" value="Mostrar por autor seleccionado" name="btn_autor"/>

    </form>

    <hr>

    <!-- Formulario ==> Engadir -->
    <form action = "Engadir.php" method = "POST" enctype="multipart/form-data">
        
        <input type="submit" value="MODIFICAR >" name="boton_modificar" class="button">
        <!-- <input type="submit" value="Engadir rexistro" name="boton_engadir">
        <input type="submit" value="Editar rexistro" name="boton_modificar">
        <input type="submit" value="Eliminar rexistro" name="boton_borrar"> -->
    </form>

<article id="contenedor">

<?php


    // FUNCIÓNS

    //* Imprimir 
    function imprimir($a){ 

        while($fila = mysqli_fetch_array($a)) {

            $srcImaxe = "{$fila['Imaxe']}.jpg";

            echo "<div class='tema'> <img src='imaxes/$srcImaxe'>";
            echo "<br>{$fila['Titulo']} <br>{$fila['Autor']} <br>{$fila['Ano']}</br>"; 
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
        if (isset($_POST["btn_mostrar"])) {

            //PREPARAMOS A SENTENCIA:
            $sentenciaPrep = $conexion->prepare("SELECT * FROM tema");
            
            $sentenciaPrep->execute();
            $resultado=$sentenciaPrep->get_result();

            imprimir($resultado);
            
            $sentenciaPrep->close();
        }
 
        
        //* Ordear por titulo
        if (isset($_POST["btn_ordearTitulo"])) {

            //PREPARAMOS A SENTENCIA:
            $sentenciaPrep = $conexion->prepare("SELECT * FROM tema ORDER BY Titulo");
            
            $sentenciaPrep->execute();
            $resultado=$sentenciaPrep->get_result();

            imprimir($resultado);
            
            $sentenciaPrep->close();
        } 

        //* Ordear por autor
        if (isset($_POST["btn_ordearAutor"])) {

            //PREPARAMOS A SENTENCIA:
            $sentenciaPrep = $conexion->prepare("SELECT * FROM tema ORDER BY Autor");
            
            $sentenciaPrep->execute();
            $resultado=$sentenciaPrep->get_result();

            imprimir($resultado);
            
            $sentenciaPrep->close();

        }

       //* Ordear por autor seleccionado
        if (isset($_POST["btn_autor"])) {

            $autor = $_POST["autor"];

            //PREPARAMOS A SENTENCIA:
            $sentenciaPrep = $conexion->prepare("SELECT * FROM tema WHERE Autor = '$autor'");

            if ($autor == "Outros") {
                //PREPARAMOS A SENTENCIA:
                $sentenciaPrep2 = $conexion->prepare("SELECT * FROM tema WHERE Autor NOT LIKE 'The Beatles' && Autor NOT LIKE 'The Rolling Stones' ");
                $sentenciaPrep2->execute();
                $resultado2 = $sentenciaPrep2->get_result();
                imprimir($resultado2);
                $sentenciaPrep2->close();
            }

            $sentenciaPrep->execute();
            $resultado=$sentenciaPrep->get_result();
            imprimir($resultado);
            
            $sentenciaPrep->close();
        }


    $conexion->close(); //PECHAMOS AS CONEXIÓNS


     
?>

</article>
</body>
</html>
