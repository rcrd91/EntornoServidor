<?php
require('Vehiculo.php');
session_start();

//Cerrar sesión
echo"
    <form action='pechaSesion.php' method='get'>
        <p><button type='submit' id='crimson' name='btn_pecharSesion'>Cerrar sesión</button></p><hr>
    </form>
";

//Engadir
echo"
    <form action='flotaVehiculos.php' method='get'>
        <p><input type='input' autofocus placeholder='Matrícula' name='in_matricula'/></p>
        <p><input type='input' autofocus placeholder='Modelo' name='in_modelo'/></p>
        <p><input type='input' autofocus placeholder='Kms' name='in_kms'/></p>
        <p><input type='submit' value='Engadir' name='btn_engadir'/></p><hr>
        <p><input type='submit' value='Gardar en ficheiro' name='btn_gardar'/></p>
        <p><input type='submit' value='Recuperar de ficheiro' name='btn_recuperar'/></p><hr>
    </form>
";

//OBJETOS

if(isset($_GET['btn_engadir'])) {

    //Valores
    $in_matricula = $_GET['in_matricula'];
    $in_modelo = $_GET['in_modelo'];
    $in_kms = $_GET['in_kms'];

    //Vehículo ($matricula, $modelo, $kms)
    $vehiculo = new Vehiculo("$in_matricula", "$in_modelo", "$in_kms");

    if(isset( $_SESSION["flota"])) {
        $_SESSION["flota"][] = $vehiculo;
    } else{
        $_SESSION["flota"]=[];
        ($_SESSION["flota"][] = $vehiculo);
    };

    echo"<table><tr> <th>Matrícula</th> <th>Modelo</th> <th>Kms</th> </tr>";
    foreach ($_SESSION["flota"] as $vehiculox) {

        $vehiculox->mostraTr();
    }
    echo"</table>";
}

$archivo="archivo.txt";

//Serialize
if(isset($_GET['btn_gardar'])) {

    $archivo = file_put_contents($archivo, serialize($_SESSION["flota"]) );
}

//Unserialize
if(isset($_GET['btn_recuperar'])) {

    $_SESSION["flota"] = unserialize(file_get_contents($archivo));
}

//Poñer header para recargar

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, th, td {
		width:500px;
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
</body>
</html>