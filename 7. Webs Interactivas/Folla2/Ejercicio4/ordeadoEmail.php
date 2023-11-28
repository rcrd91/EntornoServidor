<?php
//listaVendedores.php
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";

$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
$pdostatement = $pdo->query("select * from vendedor order by email");
$resultado = $pdostatement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
?>