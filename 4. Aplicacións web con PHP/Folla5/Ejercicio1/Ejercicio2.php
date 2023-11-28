<?php

//Borrar
if(isset($_GET["btn_borrar"])) {

    foreach($_COOKIE as $clave=>$valor) {
        setcookie("$clave", "$valor", 1);
        header("Location:Ejercicio2.php"); //Actualizamos
    }
}

//Engadir
if(isset($_GET["btn_enviar"])) {
    $usuario = $_GET["in_usuario"];
    $email = $_GET["in_email"];

    setcookie("$usuario", "$email", time()+600);
    header("Location:Ejercicio2.php"); //Actualizamos
}

//Imprimir
foreach($_COOKIE as $clave=>$valor) {
    echo "$clave : $valor <br>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action='Ejercicio2.php' method='get'>
        <input type='input' autofocus placeholder='Usuario' name='in_usuario'/>
        <input type='input' autofocus placeholder='Email' name='in_email'/><br>
        <input type='submit' value='Enviar' name='btn_enviar'/>
        <input type='submit' value='Borrar Cookies' name='btn_borrar'/>
</form>
    
</body>
</html>