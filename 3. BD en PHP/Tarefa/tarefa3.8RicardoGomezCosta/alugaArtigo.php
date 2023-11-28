<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguer de películas</title>
</head>
<body>

<?php

//* Xestión
echo"
    <img src='./logos/alugueres.png ' id='logo' alt='Video Club' >
    <hr>
    <form action='xestiona.php' method='post'>
        <input type='submit' value='Xestión' name='btn_xestiona' id='boton'/> 
    </form> <hr>
";

//Abrimos formulario Alugar película / Devolver película / Mostrar alugueres
echo"
    <form action='alugaArtigo.php' method='post' enctype='multipart/form-data'>
        <input type='submit' id='boton1' value='⟳' name='btn_refrescar'/>
        <input type='submit' id='boton2' value='Alugar película' name='btn_alugarPelicula'/>
        <input type='submit' id='boton2' value='Devolver película' name='btn_devolverPelicula'/>
        <input type='submit' id='boton2' value='Mostrar alugueres' name='btn_mostrarAlugar'/>

    </form><br>
";
//Cerramos formulario 


//* FUNCIÓNS --------------------------------------------------------------------------------------------------------------------

//* Imprimir
function imprimir($a) { 

    echo "<table><tr> <th>Código cliente</th> <th>Nome cliente</th> <th>Apelidos cliente</th> <th>ID Aluga</th> <th>ID Artigo</th> 
        <th>Película</th> <th>Data</th> <th>Días Alugados</th> <th>Prezo total do aluguer</th> </tr>";
    while($fila=$a->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>  <td>{$fila['codCliente']}</td> <td>{$fila['nome']}</td> <td>{$fila['apelidos']}</td> </td> <td>{$fila['idAluga']}</td> 
        <td>{$fila['idArtigo']}</td> <td>{$fila['nomelongo']}</td> <td>{$fila['fecha']}</td> <td>{$fila['numDiasAlugados']}</td> 
        <td>{$fila['prezo']} €</td> </tr>"; 
    }
    echo "</table>";
}

require('config/config.php'); //Login

try {
    //! Abrimos Conexión
	$pdo = new PDO("mysql:host=$servidor;dbname=$bbdd;charset=utf8", $usuario, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //* ALUGAR PELÍCULA ----------------------------------------------------------------------------------------------------------------------

    //* Botón "Alugar Película" 
    if (isset($_POST["btn_alugarPelicula"])){

        //Consulta SELECCIONAR CLIENTE
        $consulta1 = $pdo->prepare("SELECT * FROM cliente"); 
        $consulta1->execute();

        //Consulta SELECCIONAR PELICULA DISPOÑIBLE
        $consulta2 = $pdo->prepare("SELECT * FROM aluga, artigo WHERE artigo.idArtigo = aluga.idArtigo AND aluga.devolto = ?");

        //Enlazes
        $valor = 1; //1=Non Alugada
        $consulta2->bindParam(1, $valor);
        $consulta2->execute();        

        //Abrimos formulario "Alugar película"
        echo"
            <br>
            <fieldset>
            <form action='alugaArtigo.php' method='post'> 
                <label> Cliente: </label>
                <select name='sel_cliente' id='cliente'>
        ";
                    //Select Cliente
                    while($fila = $consulta1->fetch(PDO::FETCH_ASSOC)){ 
                        echo"
                            <option value='{$fila['codCliente']}'> {$fila['codCliente']} | {$fila['nome']} {$fila['apelidos']} </option> 
                        ";
                    }
        echo"
                </select><br><br> 

                <label>Película:</label>
                <select name='sel_idArtigo' id='idArtigo'>
        ";
                    //Select Película
                    while($fila = $consulta2->fetch(PDO::FETCH_ASSOC)){
                        echo"
                            <option value='{$fila['idArtigo']}'> ID: {$fila['idArtigo']} | {$fila['nome']} | Prezo por día: {$fila['prezo']} </option> 
                        ";
                    }
        echo"
                </select><br><br>

                <label>Fecha:</label>
                <input type='date' name='in_fecha'> <br><br>
                <input type='text' name='in_numeroDias' autofocus placeholder='Nº de días' required
                pattern='\d{1,5}'> <br><br>

                <input type='submit' id='boton3' value='Alugar' name='btn_alugar'/>
                <input type='reset' id='boton3' value='Limpar'>
            </form>
            </fieldset> 
        ";  
        //Cerramos formulario
    }

    //* Botón "Alugar"
    if (isset($_POST["btn_alugar"])){
    
        //Valores
        $sel_cliente = $_POST["sel_cliente"];
        $sel_idArtigo = $_POST["sel_idArtigo"];
        $in_fecha = $_POST["in_fecha"];
        $in_numeroDias = $_POST["in_numeroDias"];
        $valorDevolto = 0;
   
        //Consulta
        $consulta = $pdo->prepare("UPDATE aluga, artigo 
        SET aluga.codCliente = ?, aluga.idArtigo = ?, aluga.fecha = ?, aluga.numDiasAlugados = ?, aluga.prezo = ? * artigo.prezo , aluga.devolto = ? 
        WHERE aluga.idArtigo = ? ");

        $consulta->bindParam(1, $sel_cliente);
        $consulta->bindParam(2, $sel_idArtigo);
        $consulta->bindParam(3, $in_fecha);
        $consulta->bindParam(4, $in_numeroDias);
        $consulta->bindParam(5, $in_numeroDias);
        $consulta->bindParam(6, $valorDevolto);
        $consulta->bindParam(7, $sel_idArtigo);

        if($consulta->execute()) {
            echo "Alugado correctamente.";
        } else echo "Non alugado";
    }


    //* DEVOLVER PELÍCULA --------------------------------------------------------------------------------------------------------------------

    //* Botón "Devolver película"
    if (isset($_POST["btn_devolverPelicula"])){

        //Preparamos sentencia
        $consulta=$pdo->prepare("SELECT * FROM cliente"); 
        $consulta->execute();  

        //Abrimos formulario "Cliente que vai devoler película:"
        echo"
            <form action='alugaArtigo.php' method='post'>
                <p>Cliente que vai devoler película:</p>
                <select name='sel_cliente' id='cliente'>
        ";
                    //Select cliente:
                    while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){ 
                        echo"
                            <option value='{$fila['codCliente']}'> {$fila['codCliente']} | {$fila['nome']} {$fila['apelidos']} </option> 
                        ";
                    }
        echo" 
                </select>
                <input type='submit' id='boton3' value='Seleccionar' name='btn_seleccionar'/>
            </form> 
        ";  
        //Cerramos formulario
    }

    //* Botón "Seleccionar"
    if (isset($_POST["btn_seleccionar"])){

        //Valores
        $sel_cliente = $_POST["sel_cliente"];
        $valor = 0;

        //Consulta SELECCIONAR CLIENTE:
        $consulta = $pdo->prepare("SELECT * FROM aluga, artigo WHERE artigo.idArtigo = aluga.idArtigo AND codCliente = ? AND devolto = ?"); 
        
        $consulta->bindParam(1, $sel_cliente);
        $consulta->bindParam(2, $valor);


        $consulta->execute();
    
        //Abrimos formulario "Película a devolver:"
        echo"
            <form action='alugaArtigo.php' method='post'> 
                <p>Película a devolver:</p> 
                <select name='sel_pelicula' id='cliente'>
        ";
                    //Select película:
                    while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){ 
                        echo"
                            <option value='{$fila['idArtigo']}'> {$fila['idArtigo']} | {$fila['nomelongo']} </option> 
                        ";
                    }
        echo"
                </select>
                <input type='submit' id='boton3' value='Devolver' name='btn_devolver'/>
            </form>
        ";
        //Cerramos formulario

    }

    //* Botón "Devolver"
    if (isset($_POST["btn_devolver"])){

        //Valores
        $sel_pelicula = $_POST["sel_pelicula"];
        $valor1 = 1;
        $valor0 = 0;
        $valorNull = null;

        //Consulta
        $consulta = $pdo->prepare("UPDATE aluga SET devolto = ?, codCliente = ?, fecha = ?, numDiasAlugados = ?, prezo = ? WHERE idArtigo = ? AND devolto = ?");

        $consulta->bindParam(1, $valor1);
        $consulta->bindParam(2, $valorNull);
        $consulta->bindParam(3, $valorNull);
        $consulta->bindParam(4, $valorNull);
        $consulta->bindParam(5, $valorNull);
        $consulta->bindParam(6, $sel_pelicula);
        $consulta->bindParam(7, $valor0);
        
        //Executamos
        if($consulta->execute()) {
            echo "Devolto correctamente." ;    
        } else echo "Non devolto";
    }


    //* MOSTRAR ALUGUERES -------------------------------------------------------------------------------------------------------------------

    //* Botón "Mostrar alugueres"
    if (isset($_POST["btn_mostrarAlugar"])){

		$consulta = $pdo->prepare("SELECT cliente.codCliente, cliente.nome, cliente.apelidos, aluga.idAluga, aluga.idArtigo, aluga.fecha, aluga.numDiasAlugados, aluga.prezo, aluga.devolto, artigo.nomelongo
        FROM cliente, aluga, artigo 
        WHERE cliente.codCliente = aluga.codCliente AND artigo.idArtigo = aluga.idArtigo");

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
