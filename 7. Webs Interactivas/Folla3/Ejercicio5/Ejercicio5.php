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

	table {
		margin-left: auto;
  		margin-right: auto;
	}
</style>

<body>

<form id="formulario1" action="Ejercicio5.php">

	<?php

	$servidor = "db";
	$usuario = "root";
	$passwd = "root";
	$base = "proyecto";

	$pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8mb4", $usuario, $passwd);

	// CONSULTA
	$pdoSt = $pdo->query( "SELECT * FROM familias");

	//SELECT:
	echo"<label for='familia'> FAMILIA: </label>
			<select name='familia'>
	";
			foreach($pdoSt as $fila){ 
				echo "<option value='{$fila['cod']}'> {$fila['nombre']} </option> ";
				
			}
	echo"
			</select>
	";
	   
	?>

</form>

<table class="table" id="tabla"></table>


<script>

    /* document.addEventListener('change', e=>{
        lista(document.querySelector('select').value, 0)
    }); */
	document.addEventListener('change', e=>{
        lista(document.querySelector('select').value, 0)
    });
	document.querySelectorAll('button')[0].addEventListener('click', e=>{
        lista(document.querySelector('select').value, e.target.value)
    });
    document.querySelectorAll('button')[1].addEventListener('click', e=>{
        lista(document.querySelector('select').value, e.target.value)
    });
    document.querySelectorAll('button')[2].addEventListener('click', e=>{
        lista(document.querySelector('select').value, e.target.value)
    });


	//* FUNCIÓNS

	function lista(familia, q) {
		let cadea = "<tr> <th><button id='nombre' value='1'>NOMBRE</button></th> <th><button id='descripcion' value='2'>DESCRIPCIÓN</button></th> <th><button id='pvp' value='3'>PVP</button></th></tr>";

		document.getElementById("tabla").innerHTML = cadea;

		fetch("lista.php?familia=" + familia +"&q="+q)
		.then(response => response.json())
		.then(data => {
			let cadea = '';
			for (let vendedor of data) {
				cadea += "<tr><td>"+vendedor.nombre+"</td><td>"+vendedor.descripcion+"</td><td>"+vendedor.pvp+"</td></tr>";
			}
			document.getElementById("tabla").innerHTML += cadea;

			document.getElementById("nombre").addEventListener("click", e=>{
				lista(familia, 1);
			});

			document.getElementById("descripcion").addEventListener("click", e=>{
				lista(familia, 2);
			});

			document.getElementById("pvp").addEventListener("click", e=>{
				lista(familia, 3);
			});
		})
		.catch(erro => { alert("houbo un erro no listado");}
		);
	}

</script>
</body>
</html>
