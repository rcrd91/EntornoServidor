<?php
session_start();

// Array diccionario
$_SESSION['diccionario']['Hola']="Hello";

// Mostramos o diccionario
echo" 
    <form action='Ejercicio1.php' method='get'>
        <table> <tr> <th>Galego</th> <th>Inglés</th> </tr>
";
foreach ($_SESSION['diccionario'] as $clave => $valor) {
    echo" <tr> <td>$clave</td> <td>$valor</td> <td> <button type='submit' value='$clave' name='btn_eliminar'> Eliminar </button> </td> </tr> ";    
}
echo" </table>
    </form>
";

//* ------------------------------------------------------------------------------------------------------------

// Botón Palabra nova
echo"
<form action='Ejercicio1.php' method='get'>
    <input type='submit' value='Palabra Nova' name='btn_palabraNova'/>
</form>
";

// Entrada Galego/Inglés + Botóns
if(isset($_GET['btn_palabraNova'])) { 
    echo"
        <form action='Ejercicio1.php' method='get'>
            <input type='input' autofocus placeholder='Palabra en Galego' name='in_palabraGalego'/>
            <input type='input' autofocus placeholder='Palabra en Inglés' name='in_palabraIngles'/><br>
            <input type='submit' value='Insertar' name='btn_insertar'/>
            <input type='submit' value='Cancelar' name='btn_cancelar'/>
        </form>
    ";
} 

//* ------------------------------------------------------------------------------------------------------------

// Botóns
else {

    if(isset($_GET['btn_insertar'])) {
        $_SESSION['diccionario'][$_GET['in_palabraGalego']] = $_GET['in_palabraIngles'];
        echo"Rexistro inserido correctamente. <hr>";
        //!header("Location:Ejercicio1.php"); 
    }
    else if(isset($_GET['btn_eliminar'])) {
        unset($_SESSION['diccionario'][$_GET["btn_eliminar"]]);
        echo"Rexistro eliminado correctamente. <hr>";   
    }
    echo"
            <form action='Ejercicio1.php' method='get'>
                <input type='submit' value='Diccionario' name='btn_diccionario'/>
            </form>
        ";
}


// Gardar os datos nun ficheiro de texto
/* if(!($fich=fopen('diccionario.txt','w')))
return;
foreach($diccionario as $clave=>$valor)
fprintf($fich,"%s|%s\n",$clave,$valor); */


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
</style>
<body>
</body>
</html>