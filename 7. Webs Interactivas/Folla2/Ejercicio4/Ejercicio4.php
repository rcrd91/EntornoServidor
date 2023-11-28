<!DOCTYPE html>
<html>
<head>
<title>Ejemplo de JavaScript</title>
<meta charset="UTF-8">
</head>
<body>
<form id="formulario1" action="insertaVendedor.php">
	<label>Nome</label>
	<input type="text" name="nome" id="nome"><br/>
	<label>Email</label>
	<input type="text" name="email" id="email"><br/>
	<input type="submit" name="enviar" id="enviar"><br>
</form>
<button name="listar" id="listar">Listamos todos</button>
<button name="listar" id="listarOrdeado">Listado ordeado por email</button>
<table class="table table-striped" id="tabla1">  </table>
<script>
	document.getElementById('listar').addEventListener('click',listaTodos);
	document.getElementById('listarOrdeado').addEventListener('click',listaOrdeadoEmail);

	function listaTodos(){
		fetch("listaVendedores.php")
		.then(response => response.json())
		.then(data => {
			// console.log(data);
			let cadea = '<tr><th>Nome</th><th>Email</th></tr>';
			for (let vendedor of data) {
				cadea += "<tr><td>"+vendedor.nome+"</td><td>"+vendedor.email+"</td></tr>";
			}
		document.getElementById("tabla1").innerHTML = cadea;
		})
		.catch(erro => { alert("houbo un erro no listado");}
		);
	}

	function listaOrdeadoEmail(){
		fetch("ordeadoEmail.php")
		.then(response => response.json())
		.then(data => {
			// console.log(data);
			let cadea = '<tr><th>Nome</th><th>Email</th></tr>';
			for (let vendedor of data) {
				cadea += "<tr><td>"+vendedor.nome+"</td><td>"+vendedor.email+"</td></tr>";
			}
		document.getElementById("tabla1").innerHTML = cadea;
		})
		.catch(erro => { alert("houbo un erro no listado");}
		);
	}
</script>
</body>
</html>