<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
</head>
<style>

	body {
        background-color:lightgrey;
    }

	.fieldset1 {
		margin-left: auto;
  		margin-right: auto; 
		text-align:center;
		padding-top:auto;
	}

	#contenedor {
		width:70%;
		margin:20px auto;
		background-color:white;
		display: grid; 
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		grid-gap: 5px;
		background-color:lightgrey;
	}

	.btn_pelicula {
		border-radius: 25px silver;
		background-position:center;
		background-size: 100%;
		background-color:silver;
	}

	.produto { 
		border-radius:5px; 
		height:230px;
		text-align: center;
		padding-top:20px;
		font-size: 12px;
		background-color:lightgrey;
	}

	.produto2 { 
		margin: auto;
		text-align: center;
		padding: 60px;
		height:0 auto;
		width:500px;
		border:1px black solid;
		text-align: center;
		padding-top:20px;
		background-color:silver;
		border-radius: 5px;
	}

	.comentario { 
		height:230px;
		border:1px black solid;
		text-align: center;
		padding-top:20px;
		font-size: 12px;
		background-color:silver;
	}

	.img2 {
		width:200px;
		height:240px;
	}

	img {
		width:130px;
		height:170px;
	}

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

	textarea {
  		resize: none;
	}

	fieldset {
		border-radius: 3px;
		display: inline-block;
	}

	#verde {
		color: green;
	}

	#rojo {
		color:red;	
	}

	#crimson {
		color:crimson;	
	}

	#naranja {
		color:orange;
	}

</style>
<body>

<?php
//Datos da configuración da base de datos
$servidor='db';
$usuario='tarefa';
$pass='Tarefa4.7';
$db='tarefa4.7';
?>

</body>
</html>
