<?php
function validarNome($nome){
 return (strlen($nome)>4);

}
function validarEmail($email){
    return preg_match("/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i", $email);
}
function validarPasswords($pass) {
 return (strlen($pass) > 5);
}

function validar($pass1, $pass2) {
    $iguales = $pass1 == $pass2;
    return $iguales;
} 
