<?php

$servidor='db';
$usuario='root';
$pass='root';
$db='proba';

try {
    //! Abrimos conexión
    $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8mb4", $usuario, $pass);
    #$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Get
    $in_usuario = $_GET['in_usuario'];
    $in_contrasinal = $_GET['in_contrasinal']; //Contraseña introducida

    //Consulta 
    $consulta = "SELECT passwd FROM usuariosTempo WHERE nome = '$in_usuario' ";
    $consulta = $conexion->prepare($consulta);
    $consulta->execute(); //Contén contraseña da BD

    //Gardamos a consulta nun array
    $fila = $consulta->fetch(); 

    if($consulta->rowCount() > 0 ){ //Hai 1 usuario

        foreach ($fila as $posicion => $contrasinal) //Recorremos $fila para acceder ás contrasinais

        if(password_verify($in_contrasinal,$contrasinal)) { //Comparamos contraseñas
            $contrasinalBD = $contrasinal;
        }
    }
        
    if(isset($contrasinalBD)){
        //Get
        $in_usuario = $_GET['in_usuario'];
        $in_contrasinal = $_GET['in_contrasinal'];

        //Consulta
        $consulta = $conexion->prepare("SELECT ultimaconexion, rol FROM usuariosTempo WHERE (nome=? AND passwd=?)");
        $consulta->bindParam(1, $in_usuario);
        $consulta->bindParam(2, $contrasinalBD);
        $consulta->execute();

        //Gardamos a consulta nun array
        $array = $consulta->fetch();

        //* Se é ADMINISTRADOR
        if($array["rol"]=='administrador') {
        
            date_default_timezone_set('Europe/Madrid'); //ESTABLECE TIMEZONE
            $time = time();
            $agora = date("Y-m-d H:i:s", $time); //DEVOLVE A DATA E HORA ACTUAL EN FORMATO mysql

            $consulta = $conexion->prepare("UPDATE usuariosTempo SET ultimaconexion = '$agora' ");
            $consulta->execute();

            $consulta = $conexion->prepare("SELECT * FROM usuariosTempo");
                if ($consulta->execute()) {
                    echo" <table> 
                            <tr> <th>NOME</th> <th>ÚLTIMA CONEXIÓN</th> <th>ROL</th> </tr>
                    ";
                        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                            echo"
                                <tr> <td>{$fila['nome']}</td> <td>{$fila['ultimaconexion']}</td> <td>{$fila['rol']}</td> </tr>
                            ";
                        }
                    echo" </table> <br>";

                } else echo "Houbo un erro na execución da consulta";
        }
   
        //* Se é USUARIO
        else{
            //Get
            $in_usuario = $_GET['in_usuario'];

            echo "Hola $in_usuario a tua última conexión foi {$array['ultimaconexion']}";
            date_default_timezone_set('Europe/Madrid'); //ESTABLECE TIMEZONE
            $time = time();
            $agora = date("Y-m-d H:i:s", $time); //DEVOLVE A DATA E HORA ACTUAL EN FORMATO mysql
            $consulta = $conexion->prepare("UPDATE usuariosTempo SET ultimaconexion='$agora'");
            $consulta->execute();
        }
    }

    else {
        header("Location:login.php");
        $consulta = null;
        die();
    }

} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
$conexion = null; //! Cerramos conexión
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, th, td {
        border: 1px solid;
        border-collapse:collapse;
		text-align: center;
    }
</style>
<body>
<form action="rexistro.html">
    <button type="submit">Ir a Rexistro</button>
</form>
<form action="login.php">
    <button type="submit">Ir a Login</button>
</form>
</body>
</html>