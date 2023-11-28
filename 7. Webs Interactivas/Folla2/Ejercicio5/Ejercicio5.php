<!DOCTYPE html>
<html>
<head>
<title>Ejemplo de JavaScript</title>
<meta charset="UTF-8">
</head>
<body>
<form id="formulario1" action="insertaVendedor.php" method="get">
	<label>Nome</label>
	<input type="text" name="nome" id="nome"><br/>
	<label>Email</label>
	<input type="text" name="email" id="email"><br/>
	<input type="submit" value="Insertar" name="insertar" id="insertar"><br>
</form>

<table class="table table-striped" id="tabla1">  </table>
<script>
	document.getElementById('insertar').addEventListener('click',insertaVendedor);
	
	function insertaVendedor(){
		fetch("insertaVendedor.php")
	}
</script>
</body>
</html>