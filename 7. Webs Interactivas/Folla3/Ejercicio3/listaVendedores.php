<?php
//listaVendedores.php
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";

$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);


if($_POST['boton']=='email') {
    $pdostatement = $pdo->query("select * from vendedor order by email");
}

if($_POST['boton']=='nome') {
    $pdostatement = $pdo->query("select * from vendedor order by nome");
}

$resultado = $pdostatement->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($resultado);
?>