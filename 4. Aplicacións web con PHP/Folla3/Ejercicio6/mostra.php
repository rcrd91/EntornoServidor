<?php
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="Acceso restrinxido"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Authorizacion requerida.';
        exit;
    }

    else {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
        <meta charset="UTF-8" />
        <title>Autentiación http</title>
        </head>
        <body>
        Conseguiu o acceso á zona restrinxida</B> co usuario
        <?php echo $_SERVER['PHP_AUTH_USER'] ?>.
        </body>
        </html>
        <?php
    }
?>

