<!DOCTYPE html>
<html>
<head>
<title>Ejemplo de JavaScript</title>
<meta charset="UTF-8">
</head>
<style>
	table, th, td {
		width:1000px;
		
        border: 1px solid;
        border-collapse:collapse;
		text-align: center;
    }

	img {
		width:50px;
		height:50px;
	}

	table {
		margin-left: auto;
  		margin-right: auto;
	}
</style>
<body>

<button name="listar2" id="listarTodo">Listar Todo</button>

<table class="table table-striped" id="tabla1">  </table>

<script>
	document.getElementById('listarTodo').addEventListener('click',listaTodo);
	document.getElementById('listarBicicleta').addEventListener('click',listaBicicleta); //!


	function listaTodo() {
		const data = new FormData();
		data.append('boton', 'todo');

		fetch("listaBicicletas.php", {
			method: 'POST',
			body: data
		})
		.then(response => response.json())
		.then(data => {
		console.log(data);
		let cadea = '<tr><th>Nome Bici</th><th>Prezo</th><th>Imaxe</th></tr>';

		data.forEach(bicicleta => {
			const nome = bicicleta.nomeBici;
			const prezo = bicicleta.prezo;
			const imaxe = `<img src='imaxes/${bicicleta.imaxe}'/>`;

			cadea += `<tr><td>${nome}</td><td>${prezo}</td><td>${imaxe}</td></tr>`;
		});

		document.getElementById("tabla1").innerHTML = cadea;
		})
		.catch(erro => { alert("houbo un erro no listado"); });
	}


</script>
</body>
</html>