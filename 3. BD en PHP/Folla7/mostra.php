<!DOCTYPE html>
<html>
<head>
<style>

	#contenedor
	{
		width:70%;
		margin:20px auto;
		background-color:white;
			
		display: grid; 
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		grid-gap: 5px; 
	
	}

	.producto
	{
		/* width:200px; */
		/* height:210px; */
		height:230px;
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

</style>


<meta charset="utf-8" />
<title></title>
</head>
<body>
<article id="contenedor">
<?php

//* FUNCIÓNS

//* Imprimir 
function imprimir($a) { 

    while($fila=$a->fetch(PDO::FETCH_ASSOC)) {

        //$srcImaxe = "{$fila['Imaxe']}.jpg";
		$srcImaxe = "{$fila['Imaxe']}";

        echo "<div class='producto'> <img src='imaxes/$srcImaxe'>"; //* css: producto
        echo "<br>{$fila['Nome']} <br>{$fila['Marca']} <br>{$fila['Tipo']} <br>{$fila['Prezo']}€ </br>"; 
        echo" </div> ";
    } 
}

$servidor="db";
$usuario="root";
$passwd="root";
$base="senderismo";

//! Abrimos conexión
try { 
	$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	//* Botóns --------------------------------------------------------------------------------------------------------------------

	//* Mostrar todo
	if (isset($_POST["btn_mostrarProductos"])){  

		//Preparamos a sentencia
		$consulta=$pdo->prepare("SELECT * FROM material");
		$consulta->execute();

		imprimir($consulta);
	}

	//* Mostrar ordenados por marca
	if (isset($_POST["btn_ordenadosMarca"])){  

		//Preparamos a sentencia
		$consulta=$pdo->prepare("SELECT * FROM material ORDER BY Marca");
		$consulta->execute();

		imprimir($consulta);
	}
		

    //* Mostrar tipo seleccionado
    if (isset($_POST["btn_mostrarTipo"])){

		$sel_tipo = $_POST["sel_tipo"];

		//Preparamos a sentencia
		$consulta=$pdo->prepare("SELECT * FROM material WHERE tipo = ?"); 
		$consulta->bindParam(1, $sel_tipo);
		$consulta->execute();

		imprimir($consulta);
    }

	//* Buscar por marca
	if (isset($_POST["btn_buscarMarca"])){

		$in_palabraBuscar = $_POST["in_palabraBuscar"];
		$in_palabraBuscar = "%$in_palabraBuscar%";

		//Preparamos a sentencia
		$consulta=$pdo->prepare("SELECT * FROM material WHERE Marca LIKE ?"); 
		$consulta->bindParam(1, $in_palabraBuscar);
		$consulta->execute();

		imprimir($consulta);
    }

	//* Buscar en todo
	if (isset($_POST["btn_buscar"])){

		$in_palabraBuscar = $_POST["in_palabraBuscar"];
		$in_palabraBuscar = "%$in_palabraBuscar%";

		//Preparamos a sentencia
		$consulta=$pdo->prepare("SELECT * FROM material WHERE Nome LIKE ? OR Marca LIKE ? OR Tipo LIKE ? OR Prezo LIKE ? ");
		$consulta->bindParam(1, $in_palabraBuscar);
		$consulta->bindParam(2, $in_palabraBuscar);
		$consulta->bindParam(3, $in_palabraBuscar);
		$consulta->bindParam(4, $in_palabraBuscar);
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

<article>

<!-- Botón intro -->
<br><br>
<form action='intro.php' method='post'>
    <input type='submit' value='Intro' name='btn_intro'/> 
</form> 

</body>
</html>






















