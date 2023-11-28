<?php

try {
//CONECTAMOS
$pdo = new PDO("mysql:host=db;dbname=usuariosTempo;charset=utf8mb4", "root", "root");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$consulta = "SELECT passwd from usuariosTempo where nome='{$_GET['nome']}'";
$stmt = $pdo->prepare($consulta);
$stmt->execute();

$fila=$stmt->fetch();
$passTecleado=$_GET['contrasinal'];
if($stmt->rowCount() >0 ){ //HAI UN USUARIO{
    foreach ($fila as $posicion => $contrasinal) 
        if(password_verify($passTecleado,$contrasinal))
            $contrasinalBD=$contrasinal;
    
}
if(isset($contrasinalBD)){
    $stmt = $pdo->prepare("SELECT ultimaconexion, rol from usuariosTempo where (nome=? AND passwd=?)");
    $stmt->execute(array($_GET["nome"],$contrasinalBD));
    $rol=$stmt->fetch();
    if($rol["rol"]=='admin'){
        date_default_timezone_set('Europe/Madrid'); //ESTABLECE TIMEZONE
        $time=time();
        $agora=date("Y-m-d H:i:s", $time); //DEVOLVE A DATA E HORA ACTUAL EN FORMATO mysql
        $stmt=$pdo->prepare("UPDATE usuariosTempo SET ultimaconexion='$agora'");
        $stmt->execute();
        $sentencia=$pdo->prepare("SELECT * FROM usuariosTempo ");
            if(!$sentencia->execute())
                echo "Houbo un erro na execución da consulta";
            else 
                while($fila=$sentencia->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='tema'><br> {$fila['nome']}<br> {$fila['ultimaconexion']}<br> {$fila['rol']}</div>";
                }
    }
    else{
        echo "Hola {$_GET['nome']} a tua ultima conexion foi {$rol['ultimaconexion']}";
        date_default_timezone_set('Europe/Madrid'); //ESTABLECE TIMEZONE
        $time=time();
        $agora=date("Y-m-d H:i:s", $time); //DEVOLVE A DATA E HORA ACTUAL EN FORMATO mysql
        $stmt=$pdo->prepare("UPDATE usuariosTempo SET ultimaconexion='$agora'");
        $stmt->execute();
        
    }
}
else{
header("Location:login.php");

$stmt = null;
$conProyecto = null;
die();
}

} catch (Exception $e) {
echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}
finally {
$pdo = null; //PECHAMOS A CONEXIÓN COA BASE DE DATOS
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
<body>
<form action="rexistro.html">
    <button type="submit">Volver a rexistro</button>
</form>
<form action="login.php">
    <button type="submit">Volver a login</button>
</form>
</body>
</html>