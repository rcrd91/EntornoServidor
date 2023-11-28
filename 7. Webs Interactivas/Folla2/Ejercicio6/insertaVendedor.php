<?php
$servidor = "db";
$usuario = "root";
$passwd = "root";
$base = "proba";

$nome = $_GET['nome'];
$email = $_GET['email'];

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
    $pdostatement = $pdo->prepare("INSERT INTO vendedor (nome, email) VALUES (?, ?)");
    $pdostatement->bindParam(1, $nome);
    $pdostatement->bindParam(2, $email);
    $pdostatement->execute();

	// Se a dirección é exitosa, enviar un mensaxe de éxito
    $resultado['resultado'] = 'Insertado correctamente';
    echo json_encode($resultado);
  } catch (PDOException $e) {
	//Se hay un error ao insertar, enviar un mensaxe de error
    $resultado['resultado'] = 'Erro na inserción: ' . $e->getMessage();
    echo json_encode($resultado);
  }
} else {
  // Se hay un erro nos datos, enviar unha mensaxe de erro indicando os campos con errores
  $resultado['resultado'] = 'Erro nos datos';
  $resultado['errores'] = $errores;
  echo json_encode($resultado);
}
?>
