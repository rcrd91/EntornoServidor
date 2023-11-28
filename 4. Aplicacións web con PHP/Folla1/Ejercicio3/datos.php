<?php
session_start();
echo"O usuario logueado é {$_SESSION['usuario']} <hr>";

//* FUNCIÓNS

// Imprimir 
function imprimir($a) { 
    echo "<table> <tr> <th>Número</th> <th>Nome</th> <th>Numero Empregado</th> <th>Límite crédito</th> </tr>";
        while($fila=$a->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr> <td>{$fila['numero']}</td> <td>{$fila['nome']}</td> <td>{$fila['num_empregado_asignado']}</td> <td>{$fila['limite_de_credito']}</td> </tr>"; 
        }
    echo "</table>";
}

//Formulario
echo"
    <form action='datos.php' method='get'> 
        <input type='submit' value='Ordear por nome da empresa' name='btn_ordearNome'/>
        <br><br>
        <input type='submit' value='Ordear por empregado asignado' name='btn_ordearEmpregado'/>
    </form>
";  

$servidor='db';
$usuario=$_SESSION['usuario'];
$pass=$_SESSION['pass'];
$db='EMPRESA'; 

try {
    //! Abrimos Conexión
    $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8", $usuario, $pass);

    //* Se o usuario é Ana
    if ($_SESSION['usuario']=="Ana"){
        echo"
            <form action='engadeRexistro.php' method='get'> 
                <input type='submit' value='Engadir rexistro' name='btn_engadirRexistro'/>
            </form>
            <hr>
        ";
    }

    //* Ordear por nome da empresa
    if (isset($_GET["btn_ordearNome"])){
        $consulta=$conexion->prepare("SELECT * FROM cliente ORDER BY nome ");
        $consulta->execute();
        imprimir($consulta);
    }

    //* Ordear por empregado asignado
    elseif (isset($_GET["btn_ordearEmpregado"])){
        $consulta=$conexion->prepare("SELECT * FROM cliente ORDER BY num_empregado_asignado ");
        $consulta->execute();
        imprimir($consulta);
    }

    //* Mostrar todo
    else {
        $consulta=$conexion->prepare("SELECT * FROM cliente ");
        $consulta->execute();
        imprimir($consulta);
    }
  
} catch (Exception $e) {
    echo "Usuario incorrecto";
} finally {
    $conexion = null; //! Cerramos conexión
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<style>
    table, th, td {
        border: 1px solid;
        border-collapse:collapse;
		text-align: center;
    }

	table {
		margin-left: auto;
  		margin-right: auto;
	} 
</style>
<body>
    <a href="login.php">Ir a Login</a>
</body>
</html>