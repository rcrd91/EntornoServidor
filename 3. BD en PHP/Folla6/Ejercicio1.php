<!DOCTYPE html>
<html>
<head>
<style>
</style>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<?php

$servidor="db";
$usuario="root";
$passwd="root";
$base="proba";

try {
    //! Abrimos Conexión
    $pdo = new PDO("mysql:host=$servidor; dbname=$base; charset=utf8mb4", $usuario, $passwd);

    //Para xerar excepcións cando se informe dun erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Todo ben na conexión";
    
} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
    $pdo = null; //! Cerramos conexión
} 

?>


</body>
</html>
