<!DOCTYPE html>
<html>
<head>
<style>
</style>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<!-- Formulario -->
<form action="Ejercicio4.php" method="get">
    
    <h3>Engadir cliente </h3>
    ID: <input type="text" name="in_id"/>
    Nome: <input type="text" name="in_nome"/>
    Apelidos: <input type="text" name="in_apelidos"/>
    <input type="submit" value="Engadir" name="btn_engadir"/>
    <hr>

</form>

<?php

$servidor="db";
$usuario="root";
$passwd="root";
$base="proba";

//* Inserir valores empregando un array asociativo
try { 
    //! Abrimos conexión
    $pdo = new PDO("mysql:host=$servidor; dbname=$base; charset=utf8", $usuario, $passwd);

    //Para xerar excepcións cando se informe dun erro
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo "Todo ben na conexión. ";

    if (isset($_GET["btn_engadir"])) {

        $in_id = $_GET["in_id"];
        $in_nome = $_GET["in_nome"];
        $in_apelidos = $_GET["in_apelidos"];

        //Preparamos a sentencia
        $pdoStatement=$pdo->prepare("INSERT INTO cliente (id, nome, apelidos) VALUES (:id,:nome,:apelidos)");
        $datosCliente= array('id'=>$in_id, 'nome'=>$in_nome, 'apelidos'=>$in_apelidos);
        $pdoStatement->execute($datosCliente);
    }

} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
    $pdo = null; //! Cerramos conexión
} 

?>

</body>
</html>
