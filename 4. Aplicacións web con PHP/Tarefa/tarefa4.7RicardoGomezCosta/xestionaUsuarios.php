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


    //* Xestionar Usuarios
    if (isset($_GET["btn_xestionUsuarios"])){  

        //Valores
        $rolUsuario = "usuario";

        //Consulta
        $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE rol = ?");
        $consulta->bindParam(1, $rolUsuario); 
        $consulta->execute();
   
        echo"
           <form action='xestionaUsuarios.php' method='get'>
   
               <select name='sel_usuario'>
       ";
                   while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){ 
                   echo "<option value='{$fila['usuario']}'> {$fila['usuario']} </option> "; //Valor usuario
                   }
       echo"
               </select>
               <input type='submit' id='verde' value='Convertir en Administrador' name='btn_convertirAdministrador'/>
               <input type='submit' id='naranja' value='Banear usuario' name='btn_banear'/>
               <input type='submit' id='rojo' value='Borrar usuario' name='btn_borrar'/>
           </form>
       ";       
    }

    //* Botón "Convertir en Administrador"
    if (isset($_GET["btn_convertirAdministrador"])){

        //Valores
        $sel_usuario = $_GET["sel_usuario"];
        $rolAdministrador = "administrador";

        //Consulta
        $consulta = $conexion->prepare("UPDATE usuarios SET rol = ? WHERE usuario = ?");
        $consulta->bindParam(1, $rolAdministrador);
        $consulta->bindParam(2, $sel_usuario);
        $consulta->execute();

        if( $consulta == true )
            echo "$sel_usuario agora é administrador.";
        else echo "Error" ;
    }

    //* Botón "Banear Usuario"
    if (isset($_GET["btn_banear"])){

        //Valores
        $sel_usuario = $_GET["sel_usuario"];
        $contrasinalBaneado = "baneado";
        
        //Consulta
        $consulta = $conexion->prepare("UPDATE usuarios SET contrasinal = ? WHERE usuario = ? ");
        $consulta->bindParam(1, $contrasinalBaneado);
        $consulta->bindParam(2, $sel_usuario);
        $consulta->execute();

        if( $consulta == true )
            echo"$sel_usuario baneado por mala conducta.";
        else echo"error" ;
    }

    //* Botón "Borrar Usuario"
    if (isset($_GET["btn_borrar"])){

        //Valores
        $sel_usuario = $_GET["sel_usuario"];

        //Consulta
        $consulta = $conexion->prepare("DELETE FROM usuarios WHERE usuario = ? ");
        $consulta->bindParam(1, $sel_usuario);
        $consulta->execute();

        if( $consulta == true )
            echo "$sel_usuario borrado da base de datos.";
        else echo "error";
    }
  
} catch (Exception $e) {
   echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
} finally {
    $conexion = null; //! Cerramos conexión
}

?>