<!DOCTYPE html>
<html>
<head>
<title>Ejemplo de JavaScript</title>
<style>
	.oculta
{
display:none;
}
</style>
<meta charset="UTF-8">
</head>
<body>
<form id="formulario" action="insertaVendedor.php" method="get">
	<label>Nome</label>
	<input type="text" name="nome" id="nome"value='<?php echo 	isset($_POST["nome"]) ? $_POST["nome"] : "" ?>' required><br/>
	<p id='errNome' for='nome' class='oculta' >Debe ter máis de 3 caracteres</p>

	<label>Email</label>
	<input type="text" name="email" id="email"><br/>
	<p id='errMail' for='email' class='oculta'>A dirección de email non é correcta</p>

	<input type="submit" value="Insertar" name="insertar" id="insertar"><br>
	<p id='errInsertar' for='insertar' class='oculta' >Non insertado</p>
</form>

<table class="table table-striped" id="tabla1">  </table>
<script>
	document.getElementById('insertar').addEventListener('click',insertaVendedor);

	
	function insertaVendedor(){
		.then(fetch("insertaVendedor.php"))
		.catch(erro => { alert("houbo un erro no listado");}
		);
	}

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" 	integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 	crossorigin="anonymous"></script>
<script src="validar.js"></script> 
</body>
</html>