<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xestión de clientes</title>
</head>
<body>

<?php

//* FUNCIÓNS

//* Imprimir 
function imprimir($a) { 

    echo "<table> <tr> <th>Código Cliente</th> <th>Nome</th> <th>Apelidos</th> <th>Email</th> </tr>";
    while($fila=$a->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr> <td>{$fila['codCliente']}</td> <td>{$fila['nome']}</td> <td>{$fila['apelidos']}</td> <td>{$fila['email']}</td> </tr>"; 
    }
    echo "</table>";
}


//* Botón Páxina Principal
echo" 
    <img src='./logos/clientes.png ' id='logo' alt='Video Club' >
    <hr>
    <form action='xestiona.php' method='post'>
        <input type='submit' value='Xestión' name='btn_xestiona' id='boton'/> 
    </form> <hr>
";

//Abrimos formulario Engadir cliente / Borrar cliente / Mostrar clientes
echo"
    <form action='cliente.php' method='post'> 
        <input type='submit' id='boton1' value='⟳' name='btn_refrescar'/> 
        <input type='submit' id='boton2' value='Engadir cliente' name='btn_engadirCliente'/>
        <input type='submit' id='boton2' value='Borrar cliente' name='btn_borrarCliente'/>
        <input type='submit' id='boton2' value='Mostrar clientes' name='btn_mostrarClientes'/>
        <br><br>
    </form>
";  
//Cerramos formulario


require('config/config.php'); //Login

try {
    //! Abrimos Conexión
	$pdo = new PDO("mysql:host=$servidor;dbname=$bbdd;charset=utf8", $usuario, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //* Botón "Engadir Cliente"
    if (isset($_POST["btn_engadirCliente"])){

        //Abrimos formulario ENGADIR CLIENTE
        echo"
            <fieldset>
            <form action='cliente.php' method='post'>

                <input type='text' name='in_nome' autofocus placeholder='Nome' required
                pattern='^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$'> <br><br>

                <input type='text' name='in_apelidos' autofocus placeholder='Apelidos' required
                pattern='^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$'> <br><br>

                <input type='text' pattern='[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}'
                name='in_email' autofocus placeholder='Email' required> <br><br>

                <input type='submit' id='boton3' value='Engadir' name='btn_engadir'/>
                <input type='reset' id='boton3' value='Limpar'>
            
            </form>
            </fieldset>
        ";  
        //Cerramos formulario
    
    }

    //* Botón "Engadir"
    if (isset($_POST["btn_engadir"])){
    
        //Valores
        $in_nome = $_POST["in_nome"];
        $in_apelidos = $_POST["in_apelidos"];
        $in_email = $_POST["in_email"];
 
        //Consulta
        $consulta=$pdo->prepare("INSERT INTO cliente (nome, apelidos, email) VALUES (?, ?, ?) ");

        $consulta->bindParam(1, $in_nome);
        $consulta->bindParam(2, $in_apelidos);
        $consulta->bindParam(3, $in_email);
        
        if(!$consulta->execute() )
            echo "Erro na consulta.";
        else echo "Cliente engadido correctamente.<br><br>" ;
    }

    //* --------------------------------------------------------------------------------------------------------------------------------------

    //* Botón "Borrar cliente"
    if (isset($_POST["btn_borrarCliente"])){
    
        //Consulta
         $consulta = $pdo->prepare("SELECT * FROM cliente"); 
         $consulta->execute();
    
        //Abrimos formulario 
        echo"
            <form action='cliente.php' method='post' enctype='multipart/form-data'>
    
                <select name='sel_cliente' id='cliente'>
        ";
                    //Select cliente
                    while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){ 
                    echo "<option value='{$fila['codCliente']}'> {$fila['codCliente']} | {$fila['nome']} {$fila['apelidos']} | {$fila['email']} </option> ";
                    }
        echo"
                </select>
                <input type='submit' id='boton3' value='Borrar' name='btn_borrar'/>
            </form>
        ";       
        //Cerramos formulario
    }

    //* Botón "Borrar"
    if (isset($_POST["btn_borrar"])){

        //Valores
        $sel_cliente = $_POST["sel_cliente"];

        //Consulta
        $consulta = $pdo->prepare("DELETE FROM cliente WHERE codCliente = ? ");
        $consulta->bindParam(1, $sel_cliente);

        if(!$consulta->execute() )
            echo "Houbo un erro na execución da consulta.";
        else echo "Cliente borrado correctamente.<br>" ;
    }

    //*---------------------------------------------------------------------------------------------------------------------------------------

    //* Botón "Mostrar clientes"
    if (isset($_POST["btn_mostrarClientes"])){

        //Consulta
		$consulta = $pdo->prepare("SELECT * FROM cliente");
		$consulta->execute();

		imprimir($consulta);
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
