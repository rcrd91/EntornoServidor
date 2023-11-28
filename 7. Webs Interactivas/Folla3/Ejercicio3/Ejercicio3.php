<!DOCTYPE html>
<html>
<head>
<title>Ejemplo de JavaScript</title>
<meta charset="UTF-8">
</head>
<body>

<button name="listar2" id="listarOrdeadoNome">Listado ordeado por nome</button>
<button name="listar3" id="listarOrdeadoEmail">Listado ordeado por email</button>

<table class="table table-striped" id="tabla1">  </table>

<script>
	document.getElementById('listarOrdeadoEmail').addEventListener('click',listaOrdeadoEmail);
	document.getElementById('listarOrdeadoNome').addEventListener('click',listaOrdeadoNome);


	function listaOrdeadoEmail(){
		const data = new FormData();
		data.append('boton', 'email');
		fetch("listaVendedores.php",{
 			method: 'POST',
		 	body: data
		})
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

	function listaOrdeadoNome(){
		const data = new FormData();
		data.append('boton', 'nome');

		fetch("listaVendedores.php",{
 			method: 'POST',
		 	body: data
		})
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