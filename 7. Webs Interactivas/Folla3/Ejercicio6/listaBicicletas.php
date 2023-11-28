<?php

try {
    $servidor = "db";
    $usuario = "root";
    $passwd = "root";
    $base = "tendaBikes";

    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);

    if(isset($_POST['boton']) && $_POST['boton'] == 'todo') {
        $pdostatement = $pdo->query("SELECT * FROM bicicletas");
    }

    if(isset($_POST['boton']) && $_POST['boton'] == 'bicicleta') {
        $bicicleta = $_POST['sel_bicicleta'];
        $pdostatement = $pdo->prepare("SELECT * FROM productos WHERE bicicleta = :bicicleta");
        $pdostatement->bindParam(':bicicleta', $bicicleta);
        $pdostatement->execute();
    }

   

    $resultado = $pdostatement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultado);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>