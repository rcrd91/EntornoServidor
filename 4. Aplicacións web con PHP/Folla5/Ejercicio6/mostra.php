<?php



if(isset($_GET['btn_galego'])) {
    setcookie("idioma", "Galego", time()+600);
    header("Location:mostra.php"); //Actualizamos
}
if(isset($_GET['btn_castelan'])) {
    setcookie("idioma", "Castelán", time()+600);
    header("Location:mostra.php"); //Actualizamos
}

if(isset($_GET['btn_ingles'])) {
    setcookie("idioma", "Inglés", time()+600);
    header("Location:mostra.php"); //Actualizamos
}


//IMPRIMIR
if (isset($_COOKIE['idioma'])) {
    if($_COOKIE['idioma'] == "Galego") {
        echo"Ola";
    }
    if($_COOKIE['idioma'] == "Castelán") {
        echo"Hola";
    }
    if($_COOKIE['idioma'] == "Inglés") {
        echo"Hello";
    }
}

?>
