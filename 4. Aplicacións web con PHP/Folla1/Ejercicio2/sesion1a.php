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
<!-- DEFINIMOS UNHA VARIABLE -->
<?php
echo "O usuario é ",$_SESSION['datos']['nome'];
echo "A contrasinal é ",$_SESSION['datos']['contrasinal'];
?>
<h2>Estou na páxina 1a!! </h2>
<a href="sesion1b.php">Ir a sesion1b </a>
</body>
<form action="sesion1b.php" method="get">
        <input type="input" value="Usuario" name="in_usuario"/>
        <input type="password" value="Pass" name="in_pass"/>
        <input type="submit" value="Enviar" name="btn_enviar"/>
</form>
</html>