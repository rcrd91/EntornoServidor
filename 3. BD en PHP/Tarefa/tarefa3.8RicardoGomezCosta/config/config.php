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

    table, th, td {
        border: 1px solid;
        border-collapse:collapse;
		text-align: center;
    }

	table {
		margin-left: auto;
  		margin-right: auto;
	}

	p, label {
		font-weight: bold;
	}

	fieldset  {
		border-radius: 3px;
		display: inline-block;
	}

	
	th {
		width: 300px;
		text-align:center;
	}

    
	img {
		width:100px;
    }

	
	#boton {
        color:teal;	
    }

	#boton1 {
		background-color: chocolate;
		border-radius: 3px;
		border-width: thin;
		background-color: chocolate;
		border-radius: 3px;
		border-width: thin;
	}

	#boton2 {
		color: chocolate;
	}

	#boton3 {
		color:seagreen;
	}

	#logo {
		width: 300px;
		height: 120px;
		border-radius: 10px;
		border-width: thin;
	}

	#logo1 {
		width: 200px;
		height: 200px;
	}

</style>
<body>

<?php
//Datos da configuración da base de datos
$servidor='db';
$usuario='tarefa';
$pass='Tarefa3.8!';
$bbdd='tarefa'; 
?>

</body>
</html>
