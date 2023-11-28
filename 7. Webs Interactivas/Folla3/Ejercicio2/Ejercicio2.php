<!DOCTYPE html>
<html>
<head>
<title>Ejemplo de JavaScript con Fetch</title>
<style>
	.oculta
{
display:none;
}
</style>
<meta charset="UTF-8">
</head>
<body>
<form id="formulario1" action="insertaVendedor.php" method='post'>
	<label>Nome</label>
	<input type="text" name="nome" id="nome"><br/>
	<p id='errNome' for='nome' class='oculta' >Debe ter máis de 3 caracteres</p>

	<label>Email</label>
	<input type="text" name="email" id="email"><br/>
	<p id='errMail' for='email' class='oculta'>A dirección de email non é correcta</p>


	<br> 
</form>
<button name="insertar" id="insertar">Insertar datos</button>
<p id='errInsertar' for='insertar' class='oculta' >Non insertado</p>
<script>

document.getElementById('insertar').addEventListener('click',insertando);

function insertando(){
	//COLLEMOS OS DATOS do FORMULARIO:
	const datos = new URLSearchParams(new FormData(document.getElementById("formulario1")));
	fetch("insertaVendedor.php", {
		method: 'POST',  //INDICAMOS O MÉTODO DE ENVÍO E OS DATOS QUE ENVIAMOS
		body: datos
	})
	.then(response => response.json())
	.then(data => {
		console.log(data);
		if(data.resultado == 'OK' ) {
			alert("Rexistro inserido perfectamente");
		} else if (data.resultado == 'El correo electrónico ya existe') {
			alert(data.resultado);
		} else {
			alert("Problema inserindo rexistro"); 
		}
	})
	.catch(erro => { alert("houbo un erro para conectar coa BBDD"+erro);}
	);
}

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" 	integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 	crossorigin="anonymous"></script>
<script src="validar.js"></script> 
</body>
</html>
