
<!DOCTYPE html>
<html lang="es">
<head>
<title>Login</title>
<style>
	.oculta
{
display:none;
}
</style>
</head>
<body >
<h3>Registro</h3>
<form name='login' id="rexistro" method='POST' action='login.php'>
<input type="text" placeholder="usuario" id='usuario' name='usuario' value='<?php echo 	isset($_POST["usuario"]) ? $_POST["usuario"] : "" ?>' required>
<br>
<p id='errUsuario' for='usuario' class='oculta' >
	Debe ter máis de 3 caracteres
</p>

<input type="password" placeholder="contrasinal" id='pass' name='pass' required>
<br>
<p id='errPassword' for='pass' class='oculta'>
	Debe ter máis de 5 caracteres e algunha letra maiúscula
</p >

<input type="password" placeholder="repetir contrasinal" id='pass2' name='pass2' required>
<br>
<p id='errPassword2' for='pass2' class='oculta'>
	As contrasinais non coinciden
</p >

<input type="mail" placeholder="e-Mail" name='mail' id='mail' value='<?php echo isset($_POST["mail"]) ? $_POST["mail"] : "" ?>' required>
<br>
<p id='errMail' for='email' class='oculta'>
	A dirección de email non é correcta
</p>
<input type="submit" value="Registrar" name='enviar'>
</form> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" 	integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 	crossorigin="anonymous"></script>
<script src="validar.js"></script> 
</body>
</html>
