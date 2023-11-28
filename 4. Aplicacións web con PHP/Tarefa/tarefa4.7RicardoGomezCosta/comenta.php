<?php
session_start();

//Renovar sesión
session_regenerate_id(true);

// SESSION
if(isset($_GET['btn_login'])) {
    $_SESSION["in_usuario"] = $_GET['in_usuario'];
    $_SESSION["in_contrasinal"] = $_GET['in_contrasinal'];
    $_SESSION["btn_login"] = $_GET['btn_login'];
}

//COnfiguración
require('config/config.php');

//Cerrar sesión
echo"
    <form action='pechaSesion.php' method='get'>
        <p><button type='submit' id='crimson' name='btn_pecharSesion'>Cerrar sesión</button></p>
    </form>
";

//Botón Páxina Principal
echo"<p><a href='mostra.php'><button>Páxina principal</button></a></p><hr>"; 

//Base de datos
$servidor='db';
$usuario= 'tarefa';
$pass='Tarefa4.7';
$db='tarefa4.7'; 

try {
    //! Abrimos conexión
    $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8mb4", $usuario, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //* Se Clicamos nunha película
    if (isset($_GET["btn_pelicula"])) {

        //Valores
        $btn_pelicula = $_GET['btn_pelicula'];

        //Consulta
        $consulta = $conexion->prepare("SELECT * FROM produto WHERE idProduto = ?");
        $consulta->bindParam(1, $btn_pelicula);

        if ($consulta->execute()) { 
            echo"<article id='produto2'>";
            echo" <table>
                    <form action='comenta.php' method='get'>
            ";
                while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){

                    //Valores
                    $srcImaxe = "imaxes/{$fila['imaxe']}";
                    $botonComentario = "<button type='submit' name='btn_comentario' value='{$fila['idProduto']}'>Comentarios</button>";

                    echo"
                        <div class='produto2'>
                            <p><img class='img2' src='$srcImaxe'></p><hr>
                            <p><b>Nome: </b>{$fila['nome']}</p><hr>
                            <p><b>Xénero: </b>{$fila['familia']}</p><hr>
                            <p><b>Descrición: </b></p>
                            <p>{$fila['descricion']}</p><hr>
                            <p>$botonComentario</p><br>
                        </div>
                    ";
                }
            echo" </form> </table> <br>";
        }
    }

    //* Se Clicamos en ver/engadir comentario
    if (isset($_GET["btn_comentario"])) {

        //Valores
        $btn_comentario = $_GET['btn_comentario']; 
        $siModerado = 'si';

        //Consulta
        $consulta = $conexion->prepare("SELECT * FROM produto, comentarios WHERE produto.idProduto = comentarios.idProduto AND produto.idProduto = ? AND comentarios.moderado = ?");
        $consulta->bindParam(1, $btn_comentario);
        $consulta->bindParam(2, $siModerado);
        $consulta->execute(); 

        if ($consulta->execute() ) {
            echo"
                <article id='contenedor'>
                    <form action='comenta.php' method='get'>
                        <table>
            ";
                        //Valores
                        $botonEngadirComentario= "<button type='submit' name='btn_EngadirComentario' value=$btn_comentario>Engadir</button>";

                        $textArea = "<textarea name='in_comentario' cols='25' rows='8' autofocus placeholder='Engadir comentario' required
                        pattern='^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$'></textarea><br>";

                        $reset = "<input type='reset' id='boton3' value='Limpar'>";

                        
                        echo"
                            <div class='produto2'>
                                <p><b>Comentarios de usuarios</b></p><hr>
                        ";
                                while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                        echo"
                                <p><b> {$fila['usuario']}:</b> {$fila['comentario']} </b></p><hr>
                        ";
                                }
                        echo"
                                <p>$textArea<p>
                                <p>$botonEngadirComentario $reset<p>
                            </div>
                        ";
            echo" 
                        </table>
                    </form> 
                </article>
            ";
        }
    }

    //* Se Clicamos en engadir comentario
    if (isset($_GET["btn_EngadirComentario"])) {

        //Valores
        $btn_EngadirComentario = $_GET['btn_EngadirComentario'];
        $usuario = $_SESSION['in_usuario']; 
        $in_comentario = $_GET['in_comentario'];
        $fecha=date("Y-m-d H:i:s");
        $moderado = 'non'; 

        //Codificamos comentario
        $comentarioCod = htmlentities($in_comentario);

        //Consulta
        $consulta=$conexion->prepare("INSERT INTO comentarios (usuario, idProduto, comentario, dataCreacion, moderado) VALUES (?, ?, ?, ?, ?) ");
        
        $consulta->bindParam(1, $usuario); 
        $consulta->bindParam(2, $btn_EngadirComentario);
        $consulta->bindParam(3, $comentarioCod); 
        $consulta->bindParam(4, $fecha); 
        $consulta->bindParam(5, $moderado); 
        $consulta->execute();

        if ($consulta == true ) {
            echo"Grazas $usuario polo comentario. Está en proceso de moderación.";
        } else echo"Erro";
        
    } else {
        //!header("Location:login.php");
        $consulta = null;
        die();
    }

} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
} finally {
    $conexion = null; //! Cerramos conexión
}

?>
