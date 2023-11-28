<?php

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

// Página actualizada -> imprimimos
if (isset($_COOKIE['usuario'])) {
    foreach ($_COOKIE['usuario'] as $clave => $valor) {
        echo "$clave : $valor <br>";
    }
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