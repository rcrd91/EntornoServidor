<?php
session_start();

if(isset($_GET['btn_enviar'])) {

        $servidor='db';
        $usuario=$_GET['in_usuario'];
        $pass=$_GET['in_pass'];
        $db='EMPRESA'; 

        try {
                //! Abrimos Conexión
                $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8", $usuario, $pass);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //Creamos as variables de SESSION
                $_SESSION['usuario'] = $_GET['in_usuario'];
                $_SESSION['pass'] = $_GET['in_pass'];
                
                //Vamos a datos.php
                header("Location:datos.php");

        } catch (Exception $e) {
                echo "Usuario incorrecto <br>";
                echo" <a href='login.php'>Ir a Login</a> ";
        } finally {
                $conexion = null; //! Cerramos conexión
        }

} else {
        echo"
             <form action='login.php' method='get'>
                <input type='input' autofocus placeholder='Usuario' name='in_usuario'/>
                <input type='password' autofocus placeholder='Pass' name='in_pass'/>
                <input type='submit' value='Enviar' name='btn_enviar'/>
             </form>
        ";
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
</body>
</html>