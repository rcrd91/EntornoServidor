<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
<br/>
<?php

$servidor='db';
$usuario='root';
$pass='root';
$db='EMPRESA'; 

try {
    //! Abrimos Conexión
    $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8", $usuario, $pass);

    //VALORES
    $in_usuario = $_GET["in_usuario"];
    $in_contrasinal=password_hash($_GET['in_contrasinal'], PASSWORD_DEFAULT);

    if (isset($_GET["btn_enviar"])){
        $consulta=$conexion->prepare("INSERT INTO usuario (usuario, contrasinal) VALUES (?, ?) ");
        $consulta->bindParam(1, $in_usuario);
        $consulta->bindParam(2, $in_contrasinal);
        $consulta->execute();
    }

    if($resultado = true) {
        echo "Engadido Correctamente";
    }
  
} catch (Exception $e) {
    echo "Error";
} finally {
    $conexion = null; //! Cerramos conexión
}


?>
<h2>Estou en garda.php </h2>
<a href="rexistro.php">Ir a rexistro</a>
<br>
</body>
</html>