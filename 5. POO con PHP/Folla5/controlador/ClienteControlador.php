<?php
include_once('../modelo/Conexion.php');
include_once('../vista/vistaCliente.php');
include_once('../modelo/ClienteModelo.php');

//* MENU 
formularioMenu();


//* MOSTRAR 
if(isset($_GET['btn_mostrarClientes'])) {
    $datos = ClienteModelo::todo();
    imprimir($datos);
}


//* ENGADIR
if(isset($_GET['btn_engadirCliente'])) {
    formularioEntrada();
}
if(isset($_GET['btn_engadir'])) {
    //Valores
    $nome = $_GET['in_nome'];
    $apelidos = $_GET['in_apelidos'];
    $email = $_GET['in_email'];

    $novoCliente = new ClienteModelo($nome, $apelidos, $email);
    $novoCliente->engadir();
}


//* BORRAR
if(isset($_GET['btn_borrarEmail'])) {
    $datos = ClienteModelo::todo();
    formularioBorrar($datos);
}
if(isset($_GET['btn_borrar'])) {
    //Valores
    $email = $_GET['btn_borrar'];
    ClienteModelo::borrar($email);
}


//* BUSCAR 
if(isset($_GET['btn_buscarEmail'])) {
    formularioBuscar();
}
if(isset($_GET['btn_buscar'])) {
    $email = $_GET['in_email'];
    $datos = ClienteModelo::buscar($email);
    imprimir($datos);
}


//* ACTUALIZAR 
if(isset($_GET['btn_actualizarCliente'])) {
    formularioBuscar2();
} 
if(isset($_GET['btn_buscar2'])) {
    $email = $_GET['in_email']; //a
    formularioActualizar($email);
} 
if(isset($_GET['btn_actualizar'])) {
    $nome = $_GET['in_email']; 
    $apelidos = $_GET['in_email']; 
    $emailNovo = $_GET['in_email']; 
    $email = $_GET['btn_actualizar']; 

    ClienteModelo::actualizar($nome, $apelidos, $emailNovo, $email);
}