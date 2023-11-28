<?php
session_start();

$_SESSION["in_nome"] = $_GET['in_nome'];


//COOKIES PRINCIPAL
/* if(isset($_GET['btn_enviar'])) {
    setcookie("in_nome", "{$_GET['in_nome']}", time()+600); //*Creamos a cookie
    //header("Location:mostra.php"); //Actualizamos
} */

/* $in_nome = $_COOKIE['in_nome'];
echo $in_nome; */
echo $_SESSION['in_nome'];


//! ---------------------------------------------------------------------------------------------

/* //COOKIES AO ELEGIR IDIOMA
if(isset($_GET['sel_idioma']) && ($_GET['sel_idioma']=='Galego')) {
    setcookie("idioma", "Galego", time()+600); //Creamos a cookie
    header("Location:mostra.php"); //Actualizamos
}
if(isset($_GET['sel_idioma']) && ($_GET['sel_idioma']=='Castelán')) {
    setcookie("idioma", "Castelán", time()+600); //Creamos a cookie
    header("Location:mostra.php"); //Actualizamos
}
if(isset($_GET['sel_idioma']) && ($_GET['sel_idioma']=='Inglés')) {
    setcookie("idioma", "Inglés", time()+600); //Creamos a cookie
    header("Location:mostra.php"); //Actualizamos
} 



//IMPRIMIR
if (isset($_COOKIE['idioma'])) {
    if($_COOKIE['idioma'] == "Galego") {
        echo"Benvido";
    }
    if($_COOKIE['idioma'] == "Castelán") {
        echo"Bienvenido";
    }
    if($_COOKIE['idioma'] == "Inglés") {
        echo"Welcome";
    }
}
 */
?>
