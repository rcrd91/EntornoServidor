<?php
//listaVendedores.php
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";

$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
$pdostatement = $pdo->prepare("INSERT INTO vendedor (nome, email) VALUES (?, ?) ");
$pdostatement->bindParam(1, $_GET['nome']);
$pdostatement->bindParam(2, $_GET['email']);
$pdostatement->execute();
$resultado = $pdostatement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
?>