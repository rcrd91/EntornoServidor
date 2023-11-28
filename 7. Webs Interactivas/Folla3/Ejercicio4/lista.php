<?php
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proyecto";

$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);

if (!isset($_GET['familia'])) {
    die('Error: el parámetro "q" no está definido');
}
else{
    if($_GET['q']==0)
        $stmt = $pdo->prepare('SELECT * FROM productos WHERE familia = :familia');

    if($_GET['q']==1)
        $stmt = $pdo->prepare('SELECT * FROM productos WHERE familia = :familia ORDER BY nombre');

    if($_GET['q']==2)
        $stmt = $pdo->prepare('SELECT * FROM productos WHERE familia = :familia ORDER BY descripcion');

    if($_GET['q']==3)
        $stmt = $pdo->prepare('SELECT * FROM productos WHERE familia = :familia ORDER BY pvp');
    
    $stmt->bindParam(':familia', $_GET['familia']);
    $stmt->execute();
}
    
//$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
$resultado = $stmt->fetchAll();

echo json_encode($resultado);
?>
