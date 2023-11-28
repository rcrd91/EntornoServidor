<?php

$numMedidas = $_POST['numMedidas'];
$sensor = $_POST['sensor'];
$fecha = $_POST['fecha'];

$url = "https://sensoralia.iessanclemente.net/api/v1/sensores/{$sensor}/mediciones?limit={$numMedidas}";

$json = file_get_contents($url);
$data = json_decode($json, true);

// CONEXIÓN 
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";

$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare('INSERT INTO medidas VALUES (:variable, :fecha, :hora, :medicion)');

foreach ($data['datos'] as $dato) {
    $nombresensor = $data['sensor']['nombresensor'];
    $valor = $dato['valor'];
    $fecha_hora = $dato['fechahora'];

    $stmt->bindParam(':variable', $nombresensor);
    $stmt->bindParam(':fecha', date('Y-m-d', strtotime($fecha_hora))); 
    $stmt->bindParam(':hora', date('H:i:s', strtotime($fecha_hora)));
    $stmt->bindParam(':medicion', $valor);
    $stmt->execute();
}

if ($_POST['numMedidas'] != 0) {
    echo "engadido";
    
} else {
    echo 'nonengadido';
}

?>
