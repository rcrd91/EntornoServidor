<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
<br/>
<?php

$datos=array("nome"=>$_GET['in_usuario'], "contrasinal"=>$_GET['in_pass']);
$_SESSION['datos'];
$_SESSION['datos']=$datos;

echo "O usuario é ",$_SESSION['datos']['nome'];
echo "A contrasinal é ",$_SESSION['datos']['contrasinal'];

?>
<h2>Estou na páxina 1b!! </h2>
<a href="sesion1a.php">Ir a sesion1a</a>
<br>
</body>
</html>