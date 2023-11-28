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

//* Con marcadores anónimos:
/* try { 
    //! Abrimos conexión
    $pdo = new PDO("mysql:host=$servidor; dbname=$base; charset=utf8", $usuario, $passwd);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo "Todo ben na conexión. ";

    //Preparamos a sentencia:
    $pdoStatement=$pdo->prepare("INSERT INTO cliente (id, nome, apelidos) VALUES (?,?,?)");
    $id=102;
    $nome="Xiao";
    $apelidos="Ferreiro";
    $pdoStatement->bindParam(1, $id);
    $pdoStatement->bindParam(2, $nome);
    $pdoStatement->bindParam(3, $apelidos);
    $pdoStatement->execute();

} catch (Exception $e) {
        echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
    $pdo = null; //! Cerramos conexión
} */



//* Con marcadores coñecidos e con 3 variables $codCliente, $nome e $apelido
/*try { 
    //! Abrimos conexión
    $pdo = new PDO("mysql:host=$servidor; dbname=$base; charset=utf8", $usuario, $passwd);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo "Todo ben na conexión. ";

    //PREPARAMOS A SENTENCIA:
    $pdoStatement=$pdo->prepare("INSERT INTO cliente (id, nome, apelidos)
    VALUES (:id,:nome,:apelidos)");
    $id=106;
    $nome="Xan";
    $apelidos="Ferrán";
    $pdoStatement->bindParam(':id', $id);
    $pdoStatement->bindParam(':nome', $nome);
    $pdoStatement->bindParam(':apelidos', $apelidos);
    $pdoStatement->execute();

} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
    $pdo = null; //! Cerramos conexión
} */


//* Empregando un array asociativo
try { 
    //! Abrimos conexión
    $pdo = new PDO("mysql:host=$servidor; dbname=$base; charset=utf8", $usuario, $passwd);

    //Para xerar excepcións cando se informe dun erro
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo "Todo ben na conexión. ";

    //Preparamos a sentencia
    $pdoStatement=$pdo->prepare("INSERT INTO cliente (id, nome, apelidos) VALUES (:id,:nome,:apelidos)");
    $datosCliente= array('id'=>108,'nome'=>'Xose', 'apelidos'=>'Gómez');
    $pdoStatement->execute($datosCliente);

} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
    $pdo = null; //! Cerramos conexión
} 


?>

</body>
</html>
