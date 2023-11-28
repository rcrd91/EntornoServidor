<?php

    $numMedidas = $_POST['numMedidas'];
    $sensor = $_POST['sensor'];
    $html = "";

    $url = "https://sensoralia.iessanclemente.net/api/v1/sensores/{$sensor}/mediciones?limit={$numMedidas}";
    
    $json = file_get_contents($url);
    $data = json_decode($json, true);

    foreach($data["datos"] as $dato) {
        $idmedicion = $dato["idmedicion"];
        $valor = $dato["valor"];
        $fechahora = $dato["fechahora"];
        //$imaxe = "<img src='imaxes/{$dato['imaxe']}'/>";

        $html .= "<tr> <td>$idmedicion</td> <td>$valor</td> <td>$fechahora</td> </tr>";

    }
    echo $html;

?>