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
    $id=3;
    $nome="Xan";
    $apelidos="Fieito";

    $sentenciaPrep->bind_param('iss',$id, $nome, $apelidos); //INDICAMOS O TIPO DAS VARIABLES: Int, String, String
    if(!$sentenciaPrep->execute() ) //EXECUTAMOS A CONSULTA
        echo "Houbo un erro na execución da consulta";
    else echo "Insertada correctamente. <br>" ;  
        
    $id=4;
    $nome="Eva";
    $apelidos="Loureiro";

    $sentenciaPrep->bind_param('iss',$id, $nome, $apelidos);
    if(!$sentenciaPrep->execute() )
        echo "Houbo un erro na execución da consulta";
    else echo "Insertada correctamente. <br>";   


    $sentenciaPrep->close(); //PECHAMOS AS CONEXIÓNS
    $conexion->close();

?>

</article>
</body>
</html>
