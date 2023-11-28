<?php
require('config.php');

function listado(){

   $pdoSt = Cliente::devolveTodos(); 

   echo"<table>
         <tr> <th>Nome</th> <th>Apelidos</th> <th>Email</th></tr>";
            while($fila = $pdoSt->fetch(PDO::FETCH_OBJ)) {
               echo"<tr> <td>{$fila->nome}</td> <td>{$fila->apelidos}</td> <td>{$fila->email}</td></tr>";
            }
   echo"</table>";

}


function insertar(Cliente $clienteNovo) {

   if($clienteNovo->gardar()){
      echo "Cliente gardado correctamente <br>";
   }  
}


//!
function buscarClientePorEmail($emailIndicado) {

   $pdoSt = Cliente::buscaPorEmail($emailIndicado); 

   $fila = $pdoSt->fetch(PDO::FETCH_OBJ);
   echo"<table> <tr> <td>{$fila->nome}</td> <td>{$fila->apelidos}</td> <td>{$fila->email}</td></tr> </table>";
}

//!
function borrarClientePorEmail($emailIndicado) {

   /* $pdoSt = Cliente::buscaPorEmail($emailIndicado);

   if($pdoSt == true){
      $fila = $pdoSt->fetch(PDO::FETCH_OBJ);
      echo" {$fila->nome} {$fila->apelidos} {$fila->email} Borrado correctamente ";
   } else echo "Non borrado"; */

   $pdoSt = Cliente::borrarPorEmail($emailIndicado);
   
   if($pdoSt == true){
      echo"Borrado correctamente ";
   } else echo "Non borrado";

} 


//!
function actualizarClientePorEmail($nomeIndicado, $apelidoIndicado, $emailIndicado, $emailSeleccionado) {

   $pdoSt = Cliente::actualizarPorCliente($nomeIndicado, $apelidoIndicado, $emailIndicado, $emailSeleccionado); 

   
}

