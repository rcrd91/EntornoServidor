<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xestión de películas</title>
</head>
<body>

<?php

//* XESTIÓN DE PELÍCULAS
//Abrimos formulario Xestión
echo" 
    <img src='./logos/peliculas.png ' id='logo' alt='Video Club' >
    <hr>
    <form action='xestiona.php' method='post'>
        <input type='submit' value='Xestión' name='btn_xestiona' id='boton'/> 
    </form> <hr>
";
//Cerramos formulario

//Abrimos formulario Engadir película nova / Engadir película / Eliminar película
echo"
    <form action='artigo.php' method='post' enctype='multipart/form-data'>
        <input type='submit' id='boton0' value='⟳' name='btn_refrescar'/> 
        <input type='submit' id='boton2' value='Engadir película nova ➔ artigo' name='btn_engadirPelicula'/>
        <input type='submit' id='boton2' value='Engadir película ➔ aluga' name='btn_engadirPeliculaAlugar'/>
        <input type='submit' id='boton2' value='Eliminar película' name='btn_eliminarPelicula'/>
    </form>
    <br>
";
//Cerramos formulario

//* FUNCIÓNS ----------------------------------------------------------------------------------------------------------------

//* Imprimir
function imprimir($a) { 

    //Abrimos formulario (checkbox + botón borrar)
    echo" <form action = 'artigo.php' method = 'POST' enctype='multipart/form-data'>

    <input type='submit' id='boton3' value='Eliminar película/s seleccionada/s' name='btn_borrar'/><br><br>

    <table> <tr> <th>Seleccionar</th> <th>Nome</th> <th>Imaxe</th> </tr>";
    while($fila=$a->fetch(PDO::FETCH_ASSOC)) {

        $srcImaxe = "{$fila['imaxe']}";

        echo "<tr> <td><input type = 'checkbox' name = 'check[]' value = '{$fila['idArtigo']}'></td> <td>{$fila['nomelongo']}</td> 
        <td><img src='imaxes/$srcImaxe'></td>  </tr>";
    }
    echo"</table> </form>";
    //Cerramos formulario
}

//* Botóns --------------------------------------------------------------------------------------------------------------------

//* Botón "Engadir película nova ➔ artigo"
if (isset($_POST["btn_engadirPelicula"])){  
    //Abrimos formulario ENGADIR PELICULA NOVA
    echo"
        <fieldset>
        <form action='artigo.php' method='post' enctype='multipart/form-data'>
            <input type='text' name='in_nome' autofocus placeholder='Nome' required> <br><br>
    
            <input type='text' name='in_nomeLongo' autofocus placeholder='Nome Longo' required> <br><br>

            <input type='text' name='in_prezo' autofocus placeholder='Prezo' required
            pattern='[0-9]+([\.,][0-9]+)?'> <br><br>

            <textarea name='in_detalle' cols='25' rows='8' autofocus placeholder='Detalle' required
            pattern='^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$'></textarea> <br><br>
            <input type='file' name='src_imaxe'/><br><br>

            <input type='submit' id='boton3' value='Engadir' name='btn_engadir'/>
            <input type='reset' id='boton3' value='Limpar'>
        </form> 
        </fieldset>
    ";  
    //Cerramos formulario
}


require('config/config.php'); //Login

try {
    //! Abrimos Conexión
	$pdo = new PDO("mysql:host=$servidor;dbname=$bbdd;charset=utf8", $usuario, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //* Botón "Engadir"
    if (isset($_POST["btn_engadir"])){

        //Valores
        $in_nome = $_POST["in_nome"];
        $in_nomeLongo = $_POST["in_nomeLongo"];
        $in_detalle = $_POST["in_detalle"];
        $in_prezo = $_POST["in_prezo"];
        $tmp_name = $_FILES['src_imaxe']['tmp_name'];

        if (is_uploaded_file($tmp_name)) {

            $img_file = $_FILES['src_imaxe']['name']; 
            $img_type = $_FILES['src_imaxe']['type']; 

            // Extensión .png ou .jpg/.jpeg
            if (((strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))) {

                if (move_uploaded_file($tmp_name, "imaxes/". $img_file)) {

                    //Consulta
                    $consulta = $pdo->prepare("INSERT INTO artigo (nome, nomelongo, detalle, prezo, imaxe ) VALUES (?, ?, ?, ?, ?) ");

                    $consulta->bindParam(1, $in_nome);
                    $consulta->bindParam(2, $in_nomeLongo);
                    $consulta->bindParam(3, $in_detalle);
                    $consulta->bindParam(4, $in_prezo);
                    $consulta->bindParam(5, $img_file);

                    if($consulta->execute()) {
                        echo "Película engadida correctamente á táboa artigo." ; 
                    } else echo "Non engadida.";

                } 
            } else echo "Non se puido subir o ficheiro polo tipo de extensión. So se permiten ficheiros jpg/jpeg ou png";
        }
    }

    //* -----------------------------------------------------------------------------------------------------------------------------------

    //* Botón "Engadir película ➔ aluga"
    if (isset($_POST["btn_engadirPeliculaAlugar"])) {

        //Consulta
        $sentenciaPre = $pdo->prepare("SELECT * FROM artigo");  
        $sentenciaPre->execute();
     
         //Abrimos formulario Engadir 
         echo"
             <form action='artigo.php' method='post'> 
                 <select name='sel_pelicula' id='cliente'>
         ";
                     //Select película
                     while($fila=$sentenciaPre->fetch(PDO::FETCH_ASSOC)){ 
                         echo"
                             <option value='{$fila['idArtigo']}'> {$fila['nomelongo']} </option> 
                         ";
                     }
         echo"
                 </select><br><br> 
                 <input type='submit' id='boton3' value='Engadir' name='btn_engadirAlugar'/>
             </form>
         ";
         //Cerramos formulario
     }
 
    //* Botón "Engadir"
    if (isset($_POST["btn_engadirAlugar"])) {
 
        //Valores
        $sel_pelicula = $_POST["sel_pelicula"];
        $valor = 1; //1=Non Alugada
  
        //Consulta
        $consulta = $pdo->prepare("INSERT INTO aluga (idArtigo, devolto) VALUES (?, ?) ");
 
        $consulta->bindParam(1, $sel_pelicula);
        $consulta->bindParam(2, $valor);
         
        if($consulta->execute()) {
            echo "Película engadida correctamente á táboa aluga. <br>
                Dispoñible para ser alugada." ;
        } else echo "Erro ao engadir a película á táboa aluga";
    }
    
    //* -------------------------------------------------------------------------------------------------------------------------------------

    //* Botón "Eliminar película"
	if (isset($_POST["btn_eliminarPelicula"])){  

        //Consulta
		$consulta = $pdo->prepare("SELECT * FROM artigo");
		$consulta->execute();
		imprimir($consulta);
	}

    //* Botón "Eliminar película/s Seleccionada/s"
    if (isset($_POST["btn_borrar"])) {

        foreach($_POST['check'] as $check) {

            //Consulta
            $consulta1 = $pdo->prepare("DELETE FROM aluga WHERE idArtigo = ? "); 
            $consulta1->bindParam(1, $check);
            $consulta1->execute();

            //Consulta
            $consulta2 = $pdo->prepare("DELETE FROM artigo WHERE idArtigo = ? "); 
            $consulta2->bindParam(1, $check);
            $consulta2->execute();
        }

        if($consulta1=true && $consulta2=true) {
            echo "Película/s eliminada/s correctamente da base de datos. <br>";
        } else echo "Non se puido eliminar a película. <br>";
    }

} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
    $pdo = null; //! Cerramos conexión
}


?>

</body>
</html>
