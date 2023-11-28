<!DOCTYPE html>
<html>
<head>
    <style></style>
    <meta charset="utf-8" />
    <title></title>
</head>

<body>

    <!-- Formulario -->
    <form action="Ejercicio3.php" method="get">
        <hr>
        <p><b>ENGADIR CLIENTE</b></p>
        <p>
        ID: <input type="text" name="in_id"/>
        Nome: <input type="text" name="in_nome"/>
        Apelidos: <input type="text" name="in_apelidos"/>
        </p>
        <input type="submit" value="Engadir" name="btn_engadir"/>
        <hr>
    </form>

<?php 

    $servidor="dbXdebug";
    $usuario="root";
    $passwd="root";
    $base="proba";

    //Conectamos
    $conexion = new mysqli($servidor, $usuario, $passwd, $base);
    if($conexion->connect_error)
        die("Non é posible conectar coa BD: ". $conexion->connect_error);
    $conexion->set_charset("utf8");
 

    if (isset($_GET["btn_engadir"])) {

        $in_id = $_GET["in_id"];
        $in_nome = $_GET["in_nome"];
        $in_apelidos = $_GET["in_apelidos"];

        //PREPARAMOS A SENTENCIA:
        $sentenciaPrep = $conexion->prepare(" INSERT INTO cliente (id, nome, apelidos) VALUES (?, ?, ?) ");

        $sentenciaPrep->bind_param('iss',$in_id, $in_nome, $in_apelidos);
        
        if(!$sentenciaPrep->execute() )
            echo "Houbo un erro na execución da consulta";
        else echo "Insertada correctamente. <br>" ;

        $sentenciaPrep->close(); 
    }
    
    $conexion->close(); //Desconectamos

?>

</article>
</body>
</html>
