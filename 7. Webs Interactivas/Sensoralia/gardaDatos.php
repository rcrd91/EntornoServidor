<?php

/* $sensor = 8;
$medidas = 3; */

$sensor = $_POST['sensor'];
$medidas = $_POST['medidas'];

$url =  "https://sensoralia.iessanclemente.net/api/v1/sensores/{$sensor}/mediciones?limit={$medidas}";

$json = file_get_contents($url);
$data = json_decode($json, true); //array

//CONEXION
$servidor = "db";
$usuario = "root";
$contrasinal = "root";
$base = "proba";

$pdo = new PDO("mysql:host=$servidor;dbname=$base", $usuario, $contrasinal);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nombresensor = $data["sensor"]["nombresensor"];

foreach($data["datos"] as $dato) {
    $valor = $dato["valor"];
    $fechahora = $dato["fechahora"];

    $fecha = date("d-m-Y", strtotime($fechahora));
    $hora = date("H:i:s", strtotime($fechahora));

    //Consulta
    $stmt = $pdo->prepare("INSERT INTO medidasxx VALUES(:variable, :medicion, :data, :hora)");
    $stmt->bindParam(':variable', $nombresensor);
    $stmt->bindParam(':medicion', $valor);
    $stmt->bindParam(':data', $fecha);        
    $stmt->bindParam(':hora', $hora);        
    $stmt->execute();
}

echo "gardado";

?>