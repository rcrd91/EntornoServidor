<!DOCTYPE html>
<html>
<head>
    <style></style>
    <meta charset="utf-8" />
    <title></title>
</head>

<body>

<?php 

    $servidor="dbXdebug";
    $usuario="root";
    $passwd="root";
    $base="proba";

    //CONECTAMOS
    $conexion = new mysqli($servidor, $usuario, $passwd, $base); //CONECTAMOS COA NOTACIÓN POO: "new"
    if($conexion->connect_error)
        die("Non é posible conectar coa BD: ". $conexion->connect_error);
    $conexion->set_charset("utf8");

    //PREPARAMOS A SENTENCIA:
    $sentenciaPrep=$conexion->prepare("INSERT INTO cliente (id, nome, apelidos) VALUES(?, ?, ?)");

    // DAMOS VALORES AOS PAŔÁMETROS E EXECUTAMOS:

    //* Sentencia preparada 1
    $id=34;
    $nome="Uxía";
    $apelidos="Gómez";

    $sentenciaPrep->bind_param('iss',$id, $nome, $apelidos); //INDICAMOS O TIPO DAS VARIABLES: Int, String, String
    if(!$sentenciaPrep->execute() ) //EXECUTAMOS A CONSULTA
        echo "Houbo un erro na execución da consulta";
    else echo "Sentencia preparada 1 insertada correctamente. <br>" ;  
    
    //* Sentencia preparada 2
    $id=62;
    $nome="Alba";
    $apelidos="López";

    $sentenciaPrep->bind_param('iss',$id, $nome, $apelidos);
    if(!$sentenciaPrep->execute() )
        echo "Houbo un erro na execución da consulta";
    else echo "Sentencia preparada 2 insertada correctamente. <br>";

    //* Sentencia preparada 3
    $id=72;
    $nome="Pepolo";
    $apelidos="García";

    $sentenciaPrep->bind_param('iss',$id, $nome, $apelidos);
    if(!$sentenciaPrep->execute() )
        echo "Houbo un erro na execución da consulta";
    else echo "Sentencia preparada 3 insertada correctamente. <br>";   


    $sentenciaPrep->close(); //PECHAMOS AS CONEXIÓNS
    $conexion->close();

?>

</article>
</body>
</html>
