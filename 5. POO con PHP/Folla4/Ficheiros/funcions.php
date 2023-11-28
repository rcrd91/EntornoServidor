<?php

function listado()
{
//QUERO LISTAR TODOS
$clientes = Cliente::devolveTodos();  //UN PDOStatement
 while($filas = $clientes->fetch(PDO::FETCH_OBJ))
         {
            echo $filas->nome." ". $filas->apelidos." ".$filas->email. "<br>";
         }

}

function insertar(Cliente $clienteNovo)
{

   if($clienteNovo->gardar())
        {
            echo "Cliente gardado correctamente <br>";
        }  

}