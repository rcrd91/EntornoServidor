<?php
include_once('clases/Cliente.php');
include_once('public/funcions.php'); 

//Formulario Engadir/Mostrar
echo"
    <form action='index.php' method='get'>
        <p><input type='submit' value='Engadir cliente' name='btn_engadirCliente'/></p>
        <p><input type='submit' value='Mostrar clientes' name='btn_mostrar'/></p><hr>

        <p><input type='input' autofocus placeholder='Email a buscar' name='in_buscarEmail'/></p>
        <p><input type='submit' value='Buscar email' name='btn_buscarEmail'/></p><hr>

        <p><input type='input' autofocus placeholder='Email a borrar' name='in_borrarEmail'/></p>
        <p><input type='submit' value='Borrar email' name='btn_borrarEmail'/></p><hr>

        <p><input type='submit' value='Actualizar cliente' name='btn_actualizarCliente'/></p><br>
    </form>
";

if(isset($_GET['btn_engadirCliente'])) {
    //Engagir cliente
    echo"
        <form action='index.php' method='get'>
            <p><input type='input' autofocus placeholder='Nome' name='in_nome'/></p>
            <p><input type='input' autofocus placeholder='Apelidos' name='in_apelidos'/></p>
            <p><input type='input' autofocus placeholder='Email' name='in_email'/></p>
            <p><input type='submit' value='Engadir' name='btn_engadir'/></p><hr>
        </form>
    ";
}

if(isset($_GET['btn_actualizarCliente'])) {

    $conexion = new Conexion();

     //Consulta
     $pdoSt = $conexion->prepare("SELECT * FROM clientes ");
     $pdoSt->execute();

    echo"
    <form action='index.php' method='get'>

        <select name='sel_email'> 
    ";
            while($fila = $pdoSt->fetch(PDO::FETCH_ASSOC)){ 
            echo "<option value='{$fila['email']}'> {$fila['nome']} {$fila['apelidos']} {$fila['email']}</option> "; //Valor usuario
            }
    echo"
        </select>
        <input type='submit' id='rojo' value='Actualizar usuario' name='btn_actualizar'/>
        </form>
    ";     
}

//* Botón "Actualizar"
if (isset($_GET["btn_actualizar"])){

    $conexion = new Conexion();

    echo" Vas actualizar {$_GET['sel_email']}"; //! acabar

    //Consulta
    $pdoSt = $conexion->prepare("SELECT * FROM clientes ");
    $pdoSt->execute();

     //Engagir cliente
     echo"
     <form action='index.php' method='get'>
         <p><input type='input' autofocus placeholder='Nome' name='in_nome'/></p>
         <p><input type='input' autofocus placeholder='Apelidos' name='in_apelidos'/></p>
         <p><input type='input' autofocus placeholder='Email' name='in_email'/></p>
         <p><input type='submit' value='Actualizar' name='btn_actualizar'/></p><hr>
     </form>
 ";

}


//!OK
if(isset($_GET['btn_engadir'])) {

    //Valores
    $in_nome = $_GET['in_nome'];
    $in_apelidos = $_GET['in_apelidos'];
    $in_email = $_GET['in_email'];

    $clientenovo = new Cliente($in_nome, $in_apelidos, $in_email);
    insertar($clientenovo);
}

//!OK
if(isset($_GET['btn_mostrar'])) {

    listado();
}


//!OK
if(isset($_GET['btn_buscarEmail'])) {

    buscarClientePorEmail($_GET['in_buscarEmail']);
    //buscarClientePorEmail($_GET['in_buscarEmail']);
}

//!OK
if(isset($_GET['btn_borrarEmail'])) {

    borrarClientePorEmail($_GET['in_borrarEmail']);
}

//!
if(isset($_GET['btn_actualizarCliente'])) {

    actualizarClientePorEmail($_GET['in_nome'], $_GET['in_apelidos'], $_GET['in_email'], $_GET['sel_email']);
}
