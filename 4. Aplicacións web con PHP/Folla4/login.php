<?php

date_default_timezone_set('Europe/Madrid'); //ESTABLECE TIMEZONE

echo"
    <form action='mostra.php' method='get'>
        <input type='input' autofocus placeholder='Usuario' name='in_usuario'/>
        <input type='password' autofocus placeholder='Contrasinal' name='in_contrasinal'/><br>
        <input type='submit' value='Enviar' name='btn_enviar'/>
    </form>

    <form action='rexistro.html'>
        <button type='submit'>Ir a Rexistro</button>
    </form>
";

$servidor='db';
$usuario='root';
$pass='root';
$db='proba'; 

try {
    //! Abrimos Conexión
    $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8", $usuario, $pass);

    if (isset($_GET["btn_enviar"])){

        //VALORES
        $in_usuario = $_GET["in_usuario"];
        $in_contrasinal=password_hash($_GET['in_contrasinal'], PASSWORD_DEFAULT);
        $sel_rol = $_GET["sel_rol"];
        $data=date("Y-m-d H:i:s"); 

        //Consulta
        $consulta=$conexion->prepare("INSERT INTO usuariosTempo (nome, passwd, ultimaconexion, rol) VALUES (?, ?, ?, ?) ");
        $consulta->bindParam(1, $in_usuario);
        $consulta->bindParam(2, $in_contrasinal);
        $consulta->bindParam(3, $data);
        $consulta->bindParam(4, $sel_rol);
        $consulta->execute();
    }
  
} catch (Exception $e) {
    echo "Error";
} finally {
    $conexion = null; //! Cerramos conexión
}



?>