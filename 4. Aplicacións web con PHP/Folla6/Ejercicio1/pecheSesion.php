<?php

if(isset($_GET['btn_pecharSesion'])) {
    session_start();
    session_destroy();
    header("Location:sesion1a.php"); 
}
?>