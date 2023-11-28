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

    hr { 
        background-color: black; height: 1px; 
    }

</style>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<h1>Intro</h1>

<!-- Botóns -->
<form action="mostra.php" method="post">

    <hr>
    <input type="submit" value="Mostrar todos os productos" name="btn_mostrarProductos"/>
    <input type="submit" value="Mostrar ordenados por marca" name="btn_ordenadosMarca"/>
    <hr>
    <input type="text" name="in_palabraBuscar"/>
    <input type="submit" value="Buscar por marca" name="btn_buscarMarca"/>
    <input type="submit" value="Buscar en todo" name="btn_buscar"/> 
   
</form>
<hr>

<?php

//* FUNCIÓNS

//* Imprimir 
function imprimir($a) { 

    while($fila=$a->fetch(PDO::FETCH_ASSOC)) {

        $srcImaxe = "{$fila['Imaxe']}.jpg";

        echo "<div class='producto'> <img src='imaxes/$srcImaxe'>"; //* css: producto
        echo "<br>{$fila['Nome']} <br>{$fila['Marca']} <br>{$fila['Tipo']} <br>{$fila['Prezo']}€ <br>{$fila['Imaxe']}</br>"; 
        echo" </div> ";
    } 
}

$servidor="db";
$usuario="root";
$passwd="root";
$base="senderismo";

try {
    //! Abrimos Conexión
    $pdo = new PDO("mysql:host=$servidor; dbname=$base; charset=utf8mb4", $usuario, $passwd);

    //Para xerar excepcións cando se informe dun erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Todo ben na conexión";

     
    //* Select de TIPOS ----------------------------------------------------------------------------------------------------------------
    //Preparamos sentencia pdo:
    $sentenciaPre2=$pdo->prepare("SELECT Tipo FROM material"); 
    $sentenciaPre2->execute();

    //Abrimos formulario
    echo"
        <form action='mostra.php' method='post'>
            <select name='sel_tipo' id='tipo'> 
    ";
                //option para cada produto:
                while($fila=$sentenciaPre2->fetch(PDO::FETCH_ASSOC)){ //Valor de cada fila = Nome
                echo "<option value='{$fila['Tipo']}'>{$fila['Tipo']}</option> ";
                }
    echo"
            </select>
            <input type='submit' value='Mostrar tipo' name='btn_mostrarTipo'/>
            <hr>
        </form>
    ";
    //Cerramos formulario



    //* Select de PRODUCTOS ----------------------------------------------------------------------------------------------------------------
    //Preparamos sentencia pdo:
    $sentenciaPre=$pdo->prepare("SELECT * FROM material"); 
    $sentenciaPre->execute();
    
    //Abrimos formulario 
    echo"
        <form action='intro.php' method='post' enctype='multipart/form-data'>

            <select name='sel_producto' id='producto'>
    ";
                //option para cada produto:
                while($fila=$sentenciaPre->fetch(PDO::FETCH_ASSOC)){ //Valor de cada fila = Nome
                echo "<option value='{$fila['Nome']}'> Nome: {$fila['Nome']} | Marca: {$fila['Marca']} | Tipo: {$fila['Tipo']} | Prezo: {$fila['Prezo']} </option> ";
                }
    echo"
            </select>
            <input type='submit' value='Borrar producto seleccionado' name='btn_borrar'/>
            <br>
    ";       
            
    echo"
            <p>
                Nome:<input type='text' name='in_nome'/>
                Marca:<input type='text' name='in_marca'/>
                Tipo:<input type='text' name='in_tipo'/>
                Prezo:<input type='text' name='in_prezo'/>
                Imaxe:<input type='file' name='src_imaxe'/>
            </p>

            <p>
                <input type='submit' value='Engadir producto' name='btn_engadir'/>
                <input type='submit' value='Editar producto seleccionado' name='btn_editar'/>
            </p>
            <hr>

        </form> 
    ";  
    //Cerramos formulario


    //* Botóns --------------------------------------------------------------------------------------------------------------------

    //* Eliminar producto seleccionado 
	if (isset($_POST["btn_borrar"])){

		$sel_producto = $_POST["sel_producto"];

		//Preparamos a sentencia
		$consulta=$pdo->prepare("DELETE FROM material WHERE Nome = ? ");
		$consulta->bindParam(1, $sel_producto);

		if(!$consulta->execute() )
        	echo "Houbo un erro na execución da consulta.";
    	else echo "Produto borrado correctamente.<br>" ;

	}

	//* Engadir producto
	if (isset($_POST["btn_engadir"])){

		$in_nome = $_POST["in_nome"];
		$in_marca = $_POST["in_marca"];
		$in_tipo = $_POST["in_tipo"];
		$in_prezo = $_POST["in_prezo"];
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

		//$img_file = substr($img_file, 0, -4);  //Eliminamos a extensión da imaxen.

		//Preparamos a sentencia
		$consulta=$pdo->prepare("INSERT INTO material (Nome, Marca, Tipo, Prezo, Imaxe ) VALUES (?, ?, ?, ?, ?) ");

		$consulta->bindParam(1, $in_nome);
		$consulta->bindParam(2, $in_marca);
		$consulta->bindParam(3, $in_tipo);
		$consulta->bindParam(4, $in_prezo);
		$consulta->bindParam(5, $img_file);

		if(!$consulta->execute() )
        	echo "Houbo un erro na execución da consulta.";
    	else echo "Produto engadido correctamente." ;

	}

	//* Editar producto seleccionado 
	if (isset($_POST["btn_editar"])){

		$sel_producto = $_POST["sel_producto"];
		$in_nome = $_POST["in_nome"];
		$in_marca = $_POST["in_marca"];
		$in_tipo = $_POST["in_tipo"];
		$in_prezo = $_POST["in_prezo"];
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

		$img_file = substr($img_file, 0, -4);  //Eliminamos a extensión da imaxen.

		//Preparamos a sentencia
		$consulta=$pdo->prepare("UPDATE material SET Nome = ?, Marca = ?, Tipo = ?, Prezo = ?, Imaxe = ? WHERE Nome = ? ");
		$consulta->bindParam(1, $in_nome);
		$consulta->bindParam(2, $in_marca);
		$consulta->bindParam(3, $in_tipo);
		$consulta->bindParam(4, $in_prezo);
		$consulta->bindParam(5, $img_file);
		$consulta->bindParam(6, $sel_producto);

		if(!$consulta->execute() )
			echo "Houbo un erro na execución da consulta.";
		else echo "Produto editado correctamente." ;
	}

} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
    $pdo = null; //! Cerramos conexión
}

//* Botón Refrescar
echo" 
<br><br>

<form action='intro.php' method='post'>
    <input type='submit' value='⟳' name='btn_intro'/> 
</form> 
";

?>

</body>
</html>
