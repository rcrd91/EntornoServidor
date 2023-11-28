<?php
function validarNome($nome){
 return (strlen($nome)>4);

}
function validarEmail($email){
 return preg_match("/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[az]{2,}$/i", $email);
}
function validarPasswords($pass1) {
 return (strlen($pass1) > 5);
}
