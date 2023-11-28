<?php

if( $_POST['orden'] && $_POST['fecha']) {

    $fecha = $_POST['fecha'];
    $fecha_formateada = date("d-m-Y", strtotime($fecha));
    $orden = $_POST['orden']; 

    $url = "https://solarmobi.iessanclemente.net/api/v1/centros/1/mediciones?ord={$orden}&fecha={$fecha_formateada}";
    $json = file_get_contents($url);
    $data = json_decode($json, true); //array

    //CONEXION
    $servidor = "db";
    $usuario = "root";
    $password = "root";
    $base = "proba";

    $pdo = new PDO("mysql:host=$servidor;dbname=$base", $usuario, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO medidas2 VALUES(:id, :valor, :fecha, :hora)");

    foreach($data["datos"]["mediciones"] as $dato) {
        $idmedicion = $dato["idmedicion"];
        $fechahora = $dato["fechahora"];
        $potenciatotalac = $dato["potenciatotalac"];

        $fecha = date("d-m-y", strtotime($fechahora));
        $hora = date("h:i:s", strtotime($fechahora));

        $stmt->bindParam(':id', $idmedicion);
        $stmt->bindParam(':valor', $potenciatotalac);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);                 
        $stmt->execute();
    }

    echo "gardado";
} 

else {
    
    $last = $_POST['last'];

    $url = "https://solarmobi.iessanclemente.net/api/v1/centros/1/mediciones?last={$last}";

    $json = file_get_contents($url);
    $data = json_decode($json, true); //array

        
    //CONEXION
    $servidor = "db";
    $usuario = "root";
    $password = "root";
    $base = "proba";

    $pdo = new PDO("mysql:host=$servidor;dbname=$base", $usuario, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO medidas2 VALUES(:id, :valor, :fecha, :hora)");

    foreach($data["datos"]["mediciones"] as $dato) {
        $idmedicion = $dato["idmedicion"];
        $fechahora = $dato["fechahora"];
        $potenciatotalac = $dato["potenciatotalac"];

        $fecha = date("d-m-y", strtotime($fechahora));
        $hora = date("h:i:s", strtotime($fechahora));

        $stmt->bindParam(':id', $idmedicion);
        $stmt->bindParam(':valor', $potenciatotalac);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);                 
        $stmt->execute();
    }

    echo "gardado";
} 

?>