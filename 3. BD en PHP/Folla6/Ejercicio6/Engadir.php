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
    <form action = "Ejercicio6.php" method = "POST" enctype="multipart/form-data">

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

    while($fila=$a->fetch(PDO::FETCH_ASSOC)) {

        $srcImaxe = "{$fila['Imaxe']}.jpg";

        echo "<div class='tema'> <img src='imaxes/$srcImaxe'>";
        echo "<br>{$fila['Titulo']} <br>{$fila['Autor']} <br>{$fila['Ano']}</br> 
        <input type = 'checkbox' name = 'check[]' value = '{$fila['Titulo']}'>"; 
        echo" </div> </form>"; //Cerramos formulario checkbox
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


    //! PARTE 2:

    //* Imprimir
    if (isset($_POST["btnn_mostrar"])){

        //Preparamos a sentencia
        $consulta=$pdo->prepare("SELECT * FROM tema");
        $consulta->execute();
        imprimir($consulta);
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
                    echo "arquivo subido con éxito"; 
                } 
            }
        }
    
        $img_file = substr($img_file, 0, -4);  

        //Preparamos a sentencia
        $consulta=$pdo->prepare(" INSERT INTO tema (Titulo, Autor, Ano, Duracion, Imaxe) VALUES (?, ?, ?, ?, ?) ");

        $consulta->bindParam(1, $in_titulo);
        $consulta->bindParam(2, $in_autor);
        $consulta->bindParam(3, $in_ano);
        $consulta->bindParam(4, $in_duracion);
        $consulta->bindParam(5, $tmp_name);
        $consulta->execute();
        imprimir($consulta);
    }

    
    //* Eliminar Disco Seleccionado
    if (isset($_POST["btn_borrar"])) {

        foreach($_POST['check'] as $check) {

            //Preparamos a sentencia
            $consulta=$pdo->prepare("DELETE FROM tema WHERE Titulo = ? ");
            $consulta->bindParam(1, $check);
            $consulta->execute();
        }

        //Eliminado correctamente?
        if ($consulta == true) {
            echo "Eliminado correctamente.";
        } else echo "Non eliminado.";
        echo"<br><br>";  
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
                        echo "arquivo subido con éxito"; 
                    } 
                }
            }

            $img_file = substr($img_file, 0, -4);
        
            //Preparamos a sentencia
            $consulta=$pdo->prepare("UPDATE tema SET Titulo = ?, Autor = ?, Ano = ?, Duracion = ?, Imaxe = ? WHERE Titulo = ? ");
            $consulta->bindParam(1, $in_titulo);
            $consulta->bindParam(2, $in_autor);
            $consulta->bindParam(3, $in_ano);
            $consulta->bindParam(4, $in_duracion);
            $consulta->bindParam(5, $tmp_name);
            $consulta->bindParam(6, $check);
            $consulta->execute();
            imprimir($consulta); 
        }
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
