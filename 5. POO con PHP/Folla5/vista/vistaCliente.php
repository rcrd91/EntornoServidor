<?php
require('../modelo/config.php');
#include_once('../modelo/ClienteModelo.php');

//*IMPRIMIR 
function imprimir($clientes) {
   foreach($clientes as $fila) {
      echo" <p> {$fila['nome']} {$fila['apelidos']} {$fila['email']} </p>";
   }
}

// FORMULARIOS --------------------------------------------------------------------------------------------------------

//* MENU 
function formularioMenu() {
   echo"
      <form action='ClienteControlador.php' method='get'>
         <p><input type='submit' value='Engadir cliente' name='btn_engadirCliente'/></p>
         <p><input type='submit' value='Mostrar clientes' name='btn_mostrarClientes'/></p><hr>
         <p><input type='submit' value='Buscar por email' name='btn_buscarEmail'/></p><hr>
         <p><input type='submit' value='Borrar por email' name='btn_borrarEmail'/></p><hr>
         <p><input type='submit' value='Actualizar por email' name='btn_actualizarCliente'/></p><br>
      </form>
   ";
}



//* ENTRADA 
function formularioEntrada() {
   echo"
      <form action='ClienteControlador.php' method='get'>
         <p> NOME: <input type='text' name='in_nome'/></p>
         <p> APELIDOS: <input type='text'  name='in_apelidos'/></p>
         <p> EMAIL: <input type='text'  name='in_email'/></p>
         <p><input type='submit' value='ENVIAR' name='btn_engadir'/></p><br>
      </form>
   ";
}



//* BUSCAR
function formularioBuscar(){
   echo"
      <form action='ClienteControlador.php' method='get'>
         <p> EMAIL A BUSCAR: <input type='text' name='in_email'/></p><hr>
         <p><input type='submit' value='BUSCAR' name='btn_buscar'/></p><br>
      </form>
   ";
}



//*BORRAR
function formularioBorrar($clientes) {
   echo"
      <form action='ClienteControlador.php' method='get'>
         <table>
   ";
         foreach($clientes as $fila) {
            $botonBorrar = "<button type='submit' name='btn_borrar' value= '{$fila['email']}' > BORRAR! </button>";

            echo" <tr> <td>{$fila['nome']} {$fila['apelidos']} {$fila['email']} $botonBorrar </td> </tr> ";
         }
   echo"
         </table>
      </form>
   ";   
} 




//* ACTUALIZAR
function formularioBuscar2(){
   echo"
      <form action='ClienteControlador.php' method='get'>
         <p> EMAIL A ACTUALIZAR: <input type='text' name='in_email'/></p><hr>
         <p><input type='submit' value='ACTUALIZAR' name='btn_buscar2'/></p><br>
      </form>
   ";
}

function formularioActualizar($email) {
   echo"
      <form action='ClienteControlador.php' method='get'>
         <p> NOME: <input type='text' name='in_nome'/></p>
         <p> APELIDOS: <input type='text'  name='in_apelidos'/></p>
         <p> EMAIL: <input type='text'  name='in_email'/></p>
         <p> <button type='submit' value=$email name='btn_actualizar'> ACTUALIZAR </button>
      </form>
   ";
}


