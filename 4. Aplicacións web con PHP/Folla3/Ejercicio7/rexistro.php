<?php
session_start();

    echo"
        <form action='garda.php' method='get'>
            <input type='input' autofocus placeholder='Usuario' name='in_usuario'/>
            <input type='password' autofocus placeholder='Contrasinal' name='in_contrasinal'/><br>
            <input type='submit' value='Enviar' name='btn_enviar'/>
        </form>
    ";

?>
