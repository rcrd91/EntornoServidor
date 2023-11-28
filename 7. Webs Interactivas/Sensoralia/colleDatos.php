<?php

/* echo $_POST['sensor'];
echo $_POST['medidas']; */

$sensor = $_POST['sensor'];
$medidas = $_POST['medidas'];

$url =  "https://sensoralia.iessanclemente.net/api/v1/sensores/{$sensor}/mediciones?limit={$medidas}";

$json = file_get_contents($url);
$data = json_decode($json, true); //array

$html = "";

$nombresensor = $data["sensor"]["nombresensor"];

foreach($data["datos"] as $dato) {
    $valor = $dato["valor"];
    $fechahora = $dato["fechahora"];

    $fecha = date("d-m-Y", strtotime($fechahora));
    $hora = date("H:i:s", strtotime($fechahora));

    $html.= "<tr><td>$nombresensor</td><td>$valor</td><td>$fecha</td><td>$hora</td></tr>";
}

echo $html;

?>