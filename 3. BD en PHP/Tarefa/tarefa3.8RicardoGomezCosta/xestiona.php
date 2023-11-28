<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xestión</title>
</head>
<body>

<?php
require('config/config.php');

//Abrimos formulario "Xestión de clientes"
echo"
    <img src='./logos/xestion.png ' id='logo' alt='Video Club' >
    <hr>
    <form action='cliente.php' method='post'>
            <input type='submit' value='Xestión de clientes' name='btn_xestionCliente' id='boton'/>
            <br><br>
    </form> 
";  
//Cerramos formulario

//Abrimos formulario "Xestión de películas"
echo"
    <form action='artigo.php' method='post'>
            <input type='submit' value='Xestión de películas' name='btn_xestionPeliculas' id='boton'/>
            <br><br>
    </form> 
";  
//Cerramos formulario


//Abrimos formulario "Xestión de alugueres"
echo"
    <form action='alugaArtigo.php' method='post'>
            <input type='submit' value='Xestión de alugueres' name='btn_xestionAluguer' id='boton'/>
            <br><br>
    </form>
    <hr>
";  
//Cerramos formulario

//Abrimos formulario "Listado de películas / Películas alugadas / Películas non alugadas"
echo"
    <form action='xestiona.php' method='post'>
        <input type='submit' id='boton1' value='⟳' name='btn_refrescar'/> 
        <input type='submit' id='boton2' value='Listado de películas' name='btn_mostrarPeliculas'/>
        <input type='submit' id='boton2' value='Películas alugadas' name='btn_mostrarAlugadas'/>
        <input type='submit' id='boton2' value='Películas non alugadas' name='btn_mostrarNonAlugadas'/>
    </form>
    <br>
";
//Cerramos formulario


//* FUNCIÓNS ---------------------------------------------------------------------------------------------------------------------------------

//* Imprimir
function imprimir($a) { 

    echo "<table> <tr> <th>Imaxe</th> <th>ID Película</th> <th>Nome</th> <th>Sinopse</th> <th>Prezo por día</th> </tr>";
    while($fila = $a->fetch(PDO::FETCH_ASSOC)) {

        $srcImaxe = "{$fila['imaxe']}";
        echo "<tr> </td> <td><img src='imaxes/$srcImaxe'></td> <td>{$fila['idArtigo']}</td> <td>{$fila['nomelongo']}</td> <td>{$fila['detalle']}</td> <td>{$fila['prezo']} € </tr>"; 
    }
    echo "</table>";
}


//! Abrimos conexión 
try { 
	$pdo = new PDO("mysql:host=$servidor;dbname=$bbdd;charset=utf8", $usuario, $pass);
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	//* Botóns --------------------------------------------------------------------------------------------------------------------------------

	//* Botón "Listado de películas"
	if (isset($_POST["btn_mostrarPeliculas"])){  

        //Consulta       
		$consulta = $pdo->prepare("SELECT * FROM artigo");
		$consulta->execute();

		imprimir($consulta);
	}

    //* Botón "Películas alugadas"
	if (isset($_POST["btn_mostrarAlugadas"])){  

        //Consulta
        $consulta = $pdo->prepare("SELECT * FROM aluga, artigo WHERE artigo.idArtigo = aluga.idArtigo AND aluga.devolto = ?");

        $valor = 0; //Alugado
        $consulta->bindParam(1, $valor);
		$consulta->execute();
		imprimir($consulta);
	}

    //* Botón "Películas non alugadas"
	if (isset($_POST["btn_mostrarNonAlugadas"])){  

        //Consulta
		$consulta=$pdo->prepare("SELECT * FROM aluga, artigo WHERE artigo.idArtigo = aluga.idArtigo AND aluga.devolto = ?");

        $valor = 1; //Non Alugado
        $consulta->bindParam(1, $valor);
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