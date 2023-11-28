<?php

//echo $_POST['fecha']; //2023-06-07
//echo $_POST['orden']; //asc desc
//echo $_POST['last']; //last

if( $_POST['orden'] && $_POST['fecha']) {

    $fecha = $_POST['fecha'];
    $fecha_formateada = date("d-m-Y", strtotime($fecha));
    $orden = $_POST['orden'];

    $url = "https://solarmobi.iessanclemente.net/api/v1/centros/1/mediciones?ord={$orden}&fecha={$fecha_formateada}";
    $json = file_get_contents($url);
    $data = json_decode($json, true); //array

    $html = "";

    foreach($data["datos"]["mediciones"] as $dato) {
        $idmedicion = $dato["idmedicion"];
        $fechahora = $dato["fechahora"];
        $potenciatotalac = $dato["potenciatotalac"];

        $html.= "<tr> <td>$idmedicion</td><td>$potenciatotalac</td><td>$fechahora</td> </tr>";
    }

    echo $html;
} 

else {
    
    $last = $_POST['last'];

    $url = "https://solarmobi.iessanclemente.net/api/v1/centros/1/mediciones?last={$last}";

    $json = file_get_contents($url);
    $data = json_decode($json, true); //array

    $html = "";

    foreach($data["datos"]["mediciones"] as $dato) {
        $idmedicion = $dato["idmedicion"];
        $fechahora = $dato["fechahora"];
        $potenciatotalac = $dato["potenciatotalac"];

        $html.= "<tr> <td>$idmedicion</td><td>$potenciatotalac</td><td>$fechahora</td> </tr>";
    }

    echo $html;
}

?>