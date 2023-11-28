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
    <form action = "Ejercicio1.php" method = "POST">
        
        <p><input type="submit" value="Mostrar Temas" name="btn_mostrar"></p>
        <p><input type="submit" value="Ordear por Titulo" name="btn_ordearTitulo"/></p>
        <p><input type="submit" value="Ordear por Autor" name="btn_ordearAutor"/></p>
        
        <select name="autor" id="autor">
            <option value="The Beatles">The Beatles</option>
            <option value="The Rolling Stones">The Rolling Stones</option>
            <option value="Outros">Outros</option>
            <!-- <option value="Bruce Springsteen">Bruce Springsteen</option>
            <option value="Pink Floyd">Pink Floyd</option>
            <option value="The Beach Boys">The Beach Boys</option>
            <option value="Pink Floyd">Pink Floyd</option>
            <option value="Eagles">Eagles</option>
            <option value="John Lennon">John Lennon</option>
            <option value="The Doors">The Doors</option>
            <option value="Bob Dylan">Bob Dylan</option>
            <option value="Led Zeppelin">Led Zeppelin</option> -->
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

//! PARTE 1:

//* FUNCIÓNS

    //* Imprimir 
    function imprimir($a){ 

        while($fila = mysqli_fetch_array($a)) {

            $srcImaxe = "{$fila['Imaxe']}.jpg";

            echo "<div class='tema'> <img src='imaxes/$srcImaxe'>";
            echo "<br>{$fila['Titulo']} <br>{$fila['Autor']} <br>{$fila['Ano']}</br>"; 
            echo" </div> ";
        } 
    }   

    // ABRIMOS CONEXIÓN
    $conexion=mysqli_connect("dbXdebug","root","root","musica"); 

    if ($conexion) { 
        mysqli_set_charset($conexion,"utf8");


        //* Imprimir 
        $consulta = mysqli_query($conexion, "SELECT * FROM tema");

        if (isset($_POST["btn_mostrar"])) {

            imprimir($consulta);
        }     
        
        //* Ordear por titulo
        if (isset($_POST["btn_ordearTitulo"])) {

            $consulta = mysqli_query($conexion, "SELECT * FROM tema ORDER BY Titulo");

            imprimir($consulta);
        } 

        //* Ordear por autor
        if (isset($_POST["btn_ordearAutor"])) {

            $consulta = mysqli_query($conexion, "SELECT * FROM tema ORDER BY Autor");

            imprimir($consulta);
        }

        //* Ordear por autor seleccionado
        if (isset($_POST["btn_autor"])) {

            $autor = $_POST["autor"];

            $consulta = mysqli_query($conexion, "SELECT * FROM tema WHERE Autor = '$autor' ");

            if ( $autor == "Outros") {
                $consultaOutros = mysqli_query($conexion, "SELECT * FROM tema WHERE Autor NOT LIKE 'The Beatles' && Autor NOT LIKE 'The Rolling Stones' ");
                imprimir($consultaOutros);
            }
            
            imprimir($consulta);
        }
    
    } else { echo "Erro conectando";}

    mysqli_close($conexion); 
?>

</article>
</body>
</html>
