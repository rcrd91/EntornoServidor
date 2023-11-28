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
    <form action = "Ejercicio6.php" method = "POST">
        
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
    </form>

<article id="contenedor">

<?php

//! PARTE 1:

//* FUNCIÓNS

//* Imprimir 
function imprimir($a) { 

    while($fila=$a->fetch(PDO::FETCH_ASSOC)) {

        $srcImaxe = "{$fila['Imaxe']}.jpg";

        echo "<div class='tema'> <img src='imaxes/$srcImaxe'>";
        echo "<br>{$fila['Titulo']} <br>{$fila['Autor']} <br>{$fila['Ano']}</br>"; 
        echo" </div> ";
    } 
} 

$servidor="db";
$usuario="root";
$passwd="root";
$base="musica";

//! Abrimos conexión
try { 
$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    
    //* Imprimir
    if (isset($_POST["btn_mostrar"])){

    //Preparamos a sentencia
    $consulta=$pdo->prepare("SELECT * FROM tema");
    $consulta->execute();

    imprimir($consulta);

    }

    //* Ordear por título
    if (isset($_POST["btn_ordearTitulo"])){

        //Preparamos a sentencia
        $consulta=$pdo->prepare("SELECT * FROM tema ORDER BY Titulo");
        $consulta->execute();

        imprimir($consulta);
    }

    //* Ordear por autor
    if (isset($_POST["btn_ordearAutor"])){

        //Preparamos a sentencia
        $consulta=$pdo->prepare("SELECT * FROM tema ORDER BY Autor");
        $consulta->execute();

        imprimir($consulta);
    }

    //* Ordear por autor seleccionado
    if (isset($_POST["btn_autor"])){

        $palabraBuscar = $_POST["autor"];

        //Preparamos a sentencia
        $consulta=$pdo->prepare("SELECT * FROM tema WHERE Autor = ? ");
        $consulta->bindParam(1, $palabraBuscar);
        $consulta->execute();

        if ( $palabraBuscar == "Outros") {
            $consulta=$pdo->prepare("SELECT * FROM tema WHERE Autor NOT LIKE 'The Beatles' && Autor NOT LIKE 'The Rolling Stones' ");
            imprimir($consulta);
        }

        $consulta->execute();

        imprimir($consulta);
    }


} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
    $pdo = null; //! Cerramos conexión
} 
?>

</article>
</body>
</html>
