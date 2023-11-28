<?php   
//inserirVendedor.php
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);
    $pdoStmt = $pdo->prepare('SELECT COUNT(*) FROM vendedor WHERE email=:email');
    $email = $_POST['email'];
    $pdoStmt->bindParam(':email', $email);
    $pdoStmt->execute();
    $numVendedores = $pdoStmt->fetchColumn();
    if ($numVendedores > 0) {
        $erro['resultado'] = 'El correo electrónico ya existe';
        echo json_encode($erro);
    } else {
        $pdoStmt = $pdo->prepare('INSERT INTO vendedor(nome, email) VALUES(:nome, :email)');
        $nome = $_POST['nome'];
        $pdoStmt->bindParam(':nome',$nome);
        $pdoStmt->bindParam(':email',$email);
        $pdoStmt->execute();
        $mensaxe['resultado'] = 'OK'; //En notación array para posteriores exemplos
        echo json_encode($mensaxe);
    }
} catch (PDOException $e) {
    $problema = "Houbo un erro coa inserción: ". $e->getMessage();
    $erro['resultado'] = $problema;
    echo json_encode($erro);
}
?>

