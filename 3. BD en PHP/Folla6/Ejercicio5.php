<!DOCTYPE html>
<html>
<head>
<style>
    body {
        background-color:lightgrey;
    }
    table, th, td {
        border: 1px solid;
        border-collapse:collapse;
    }
</style>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<!-- Botóns -->
<form action="Ejercicio5.php" method="get">

    <input type="text" name="in_palabraBuscar"/>
    <input type="submit" value="Buscar por nome" name="btn_buscarNome"/>
    <input type="submit" value="Buscar por apelido" name="btn_buscarApelido"/>
    <input type="submit" value="Mostrar todos" name="btn_mostrar"/>
    <br><br>
    
</form>

<?php

$servidor="db";
$usuario="root";
$passwd="root";
$base="proba";


//! Abrimos conexión
try { 
    $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

//* Buscar por nome
if (isset($_GET["btn_buscarNome"])){

    //Preparamos a sentencia
    $pdoStatement=$pdo->prepare("SELECT nome, apelidos FROM cliente WHERE nome = ? ");
    $palabraBuscar = $_GET["in_palabraBuscar"];
    $pdoStatement->bindParam(1, $palabraBuscar);
    $pdoStatement->execute();

    echo "<table> <tr><th>Nome</th><th>Apelidos</th></tr>";
    while($fila=$pdoStatement->fetch(PDO::FETCH_ASSOC) )
    echo "<tr><td>".$fila['nome']." </td><td>".$fila['apelidos']."</td></tr>";
    echo "<table>";
}


//* Buscar por apelido
if (isset($_GET["btn_buscarApelido"])){

    $palabraBuscar = $_GET["in_palabraBuscar"];

    //Preparamos a sentencia
    $pdoStatement=$pdo->prepare("SELECT nome, apelidos FROM cliente WHERE apelidos = ? ");
    $palabraBuscar = $_GET["in_palabraBuscar"];
    $pdoStatement->bindParam(1, $palabraBuscar);
    $pdoStatement->execute();

    echo "<table> <tr><th>Nome</th><th>Apelidos</th></tr>";
    while($fila=$pdoStatement->fetch(PDO::FETCH_ASSOC) )
    echo "<tr><td>".$fila['nome']." </td><td>".$fila['apelidos']."</td></tr>";
    echo "<table>";
}

//* Mostrar todos
if (isset($_GET["btn_mostrar"])){

    //Preparamos a sentencia
    $pdoStatement=$pdo->prepare("SELECT * FROM cliente");
    $pdoStatement->execute();

    echo "<table> <tr><th>Nome</th><th>Apelidos</th></tr>";
    while($fila=$pdoStatement->fetch(PDO::FETCH_ASSOC) )
    echo "<tr><td>".$fila['nome']." </td><td>".$fila['apelidos']."</td></tr>";
    echo "<table>";
}

    
} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
    $pdo = null; //! Cerramos conexión
} 

?>

</body>
</html>
