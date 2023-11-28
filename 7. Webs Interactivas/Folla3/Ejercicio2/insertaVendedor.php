<?php   
//inserirVendedor.php
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";

$nome = $_POST['nome'];
$email = $_POST['email'];

$errores = array();

// Validar nome
if (strlen($nome) < 4) {
  $errores['nombre'] = 'El nombre debe tener al menos 4 caracteres';
}

// Validar email
if (!preg_match("/^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+\.[a-z]{2,4}$/", $email)) {
  $errores['email'] = 'La dirección de email no es válida';
}

if (count($errores) == 0) {

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
    } /* catch (PDOException $e) {
        $problema = "Houbo un erro coa inserción: ". $e->getMessage();
        $erro['resultado'] = $problema;
        echo json_encode($erro);
    } */
    catch (PDOException $e) {
        //Se hay un error ao insertar, enviar un mensaxe de error
        $mensaxe['resultado'] = 'Erro na inserción: ' . $e->getMessage();
        echo json_encode($mensaxe);
    }
} else {
    // Se hay un erro nos datos, enviar unha mensaxe de erro indicando os campos con errores
    $mensaxe['resultado'] = 'Erro nos datos';
    $mensaxe['errores'] = $errores;
    echo json_encode($mensaxe);
  }

?>
