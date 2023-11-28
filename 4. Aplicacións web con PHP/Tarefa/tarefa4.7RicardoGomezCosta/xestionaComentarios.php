<?php
session_start();

//Configuración
require('config/config.php');

//Botón Cerrar sesión
echo"
    <form action='pechaSesion.php'>
        <p><button type='submit' id='crimson' name='btn_pecharSesion'>Cerrar sesión</button></p>
    </form>
";

//Botón Páxina Principal
echo"<p><a href='mostra.php'><button>Xestión</button></a></p><hr>";

//Base de datos
$servidor='db';
$usuario= 'tarefa';
$pass='Tarefa4.7';
$db='tarefa4.7'; 

try {
    //! Abrimos conexión
    $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8mb4", $usuario, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //* Xestionar Comentarios (Mostra comentarios non moderados)
    if(isset($_GET['btn_xestionComentarios'])) {
        
        //Valores
        $nonModerado = 'non';

        //Consulta
        $consulta = $conexion->prepare("SELECT * FROM comentarios WHERE moderado = ?");
        $consulta->bindParam(1, $nonModerado);
        $consulta->execute();

        if ($consulta->execute() ) {
            
            echo" 
                <table>
                    <form action='xestionaComentarios.php' method='get'>
                    <tr> <th>Usuario</th> <th>Comentario</th> <th>Aceptar</th> <th>Borrar</th> </tr>
            ";
                while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){

                    //Valores
                    $nomeUsuario = "{$fila['usuario']}";
                    $comentario = "{$fila['comentario']}";
                    $borrarComentario = "<button type='submit' id='rojo' name='btn_borrarComentario' value='{$fila['idComentario']}'> Borrar Comentario </button>";
                    $aceptarComentario = "<button type='submit' id='verde' name='btn_aceptarComentario' value='{$fila['idComentario']}'> Aceptar Comentario </button>";

                    echo"
                        
                        <tr> <td>$nomeUsuario</td> <td>$comentario</td> <td>$aceptarComentario</td> <td>$borrarComentario</td> </tr>
                    ";
                }
            echo" 
                    </form> 
                </table> <br>
            ";
        }
    }

    //* Borrar comentario
    if(isset($_GET['btn_borrarComentario'])) {

        //Valores
        $borrarComentario = $_GET['btn_borrarComentario']; //Valor 1

        //Consulta
        $consulta = $conexion->prepare("DELETE FROM comentarios WHERE idComentario = ?"); 
        $consulta->bindParam(1, $borrarComentario);
        $consulta->execute();

        if ($consulta == true ) {
            echo"Comentario borrado.";
        } else echo"Error";
    }

    //* Aceptar comentario
    if(isset($_GET['btn_aceptarComentario'])) {

        //Valores
        $siModerado = 'si';
        $aceptarComentario = $_GET['btn_aceptarComentario']; //Valor idComentario = 1

        //Consulta
        $consulta = $conexion->prepare("UPDATE comentarios SET moderado = ? WHERE idComentario = ?");
        $consulta->bindParam(1, $siModerado);
        $consulta->bindParam(2, $aceptarComentario);
        $consulta->execute();

        if ($consulta == true ) {
            echo"Comentario aceptado.";
        } else echo"Error";
    }
} catch (Exception $e) {
   echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
} finally {
    $conexion = null; //! Cerramos conexión
}

?>