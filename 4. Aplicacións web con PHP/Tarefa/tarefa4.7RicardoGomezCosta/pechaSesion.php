<?php

if(isset($_GET['btn_pecharSesion'])) {
    session_unset();
    header("Location:login.php");
}
?>