<?php
session_start();

if (isset($_GET["btn_enviar"])) {

    $servidor="db";
    $usuario=$_SESSION['usuario'];
    $pass=$_SESSION['pass'];
    $db="EMPRESA";

    try {
        //! Abrimos Conexión
        $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8mb4", $usuario, $pass);

        //Valores
        $in_numero=$_GET["in_numero"];
        $in_nome=$_GET["in_nome"];
        $in_numeroEmpregado=$_GET["in_numeroEmpregado"];
        $in_limiteCredito=$_GET["in_limiteCredito"];

        //Consulta
        $consulta=$conexion->prepare("INSERT INTO cliente (numero, nome, num_empregado_asignado, limite_de_credito) VALUES (?,?,?,?) ");

        $consulta->bindParam(1, $in_numero);
        $consulta->bindParam(2, $in_nome);
        $consulta->bindParam(3, $in_numeroEmpregado);
        $consulta->bindParam(4, $in_limiteCredito);

        if($consulta->execute())
            header("Location:datos.php");
        else echo "Erro na consulta.";
   
    } catch (Exception $e) {
        echo"Erro". $e->getMessage();
        echo"
            <form action='login.php' method='get'>
                <input type='submit' value='Volver a Login' name='btn_login'>
            </form>
        ";
    } finally {
        $conexion = null; //! Cerramos conexión
    }
}
else{
    echo"
        <form action='engadeRexistro.php' method='get'>
            Número: <input type='text' name='in_numero'> <br><br>
            Nome: <input type='text' name='in_nome'> <br><br>
            Número de empregado asignado: <input type='text' name='in_numeroEmpregado'> <br><br>
            Límite de credito: <input type='text' name='in_limiteCredito'> <br><br>
            <input type='submit' value='Enviar' name='btn_enviar'>
        </form>
    ";
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset=”UTF8”>
</head>
<body>
</body>
</html>