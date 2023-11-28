<?php
session_start();

//COnfiguración
require('config/config.php');

date_default_timezone_set('Europe/Madrid'); //Timezone

try {
    //! Abrimos Conexión
    $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8", $usuario, $pass);

    //* Botón "Rexistrar"
    if (isset($_GET["btn_rexistrar"])){ 

        //Valores
        $in_usuario = $_GET["in_usuario"];
        $in_contrasinal=password_hash($_GET['in_contrasinal'], PASSWORD_DEFAULT);
        $in_nome = $_GET["in_nome"];
        $in_email = $_GET["in_email"];
        $fecha=date("Y-m-d H:i:s"); 
        $rol = "usuario";

        //Consulta
        $consulta=$conexion->prepare("INSERT INTO usuarios (usuario, contrasinal, nomeCompleto, email, fecha, rol) VALUES (?, ?, ?, ?, ?, ?) ");
        $consulta->bindParam(1, $in_usuario);
        $consulta->bindParam(2, $in_contrasinal);
        $consulta->bindParam(3, $in_nome);
        $consulta->bindParam(4, $in_email);
        $consulta->bindParam(5, $fecha);
        $consulta->bindParam(6, $rol);
        $consulta->execute();

        if ($consulta == true ) {
            echo"<p><a href='login.php'><button>Login</button></a></p>"; //Botón Login
            echo"<p>$in_usuario rexistrado correctamente.</p>";
        } else echo"Error";
    }

    else {

        //Login
        echo"
            <div class='fieldset1'>
                <fieldset> 
                    <form action='mostra.php' method='get'>
                        Idioma 
                        <select name='sel_idioma'> 
                            <option value='Galego' name='btn_galego'> Galego </option>
                            <option value='Castelán' name='btn_castelan'> Castelán </option>
                            <option value='Inglés' name='btn_ingles'> Inglés </option>
                        </select><br><br><br><br><hr>
                        <p><input type='input' autofocus placeholder='Usuario' name='in_usuario'/></p>
                        <p><input type='password' autofocus placeholder='Contrasinal' name='in_contrasinal'/></p><hr>
                        <p><input type='submit' value='Iniciar sesión' name='btn_login'/></p>
                    </form>
        ";

        //Rexistro
        echo"
            <form action='rexistro.html'>
                <p><button type='submit'>Rexistrarse</button></p><hr>
            </form>
        ";

        //Cerrar Sesión
        echo"
                    <form action='pechaSesion.php'>
                        <p><button type='submit'>Cerrar sesión</button></p>
                    </form><br>
                </fieldset>
            </div>
        ";
    }

} catch (Exception $e) {
    echo "O nome de usuario $in_usuario xa está rexistrado. Proba con outro.";
} finally {
    $conexion = null; //! Cerramos conexión
}

?>