<?php

//BORRAR APELIDO
if (isset($_GET['btn_borrar'])) {
    $in_apelido = $_GET["in_apelido"];
    setcookie("usuario[apelido]", "$in_apelido", 1);
    header("Location:cookieArray.php"); //Actualizamos
}

//ENGADIR
if(isset($_GET["btn_enviar"])) {
    $in_nome = $_GET["in_nome"];
    $in_apelido = $_GET["in_apelido"];
    $in_email = $_GET["in_email"];

    // Cookies
    setcookie("usuario[nome]", "$in_nome");
    setcookie("usuario[apelido]", "$in_apelido");
    setcookie("usuario[email]", "$in_email");
    header("Location:cookieArray.php"); //Actualizamos
}

//IMPRIMIR
if (isset($_COOKIE['usuario'])) {
    foreach ($_COOKIE['usuario'] as $clave => $valor) {
        echo "$clave : $valor <br>";
    }
    echo "
        <form action='login.html' method='get'>
            <input type='submit' value='Volver a Login' name='btn_login'/> <br>
        </form> 
    ";
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
    
</body>
</html>