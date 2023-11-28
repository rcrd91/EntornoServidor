<?php

require('Clases/Calculo.php'); 
require('Clases/Multiplica.php'); 
require('Clases/Suma.php'); 
require('Clases/Resta.php'); 

//*OBJETOS

//SUMA
$operacion = new Suma(0,0);
$operacion->setOperando1(5);
$operacion->setOperando2(7);
echo"Suma: {$operacion->calcular()} ";

//RESTA
$operacion = new Resta(0,0);
$operacion->setOperando1(7);
$operacion->setOperando2(5);
echo"Resta: {$operacion->calcular()} ";

//MULTIPLICACIÓN
$operacion = new Multiplica(0,0);
$operacion->setOperando1(7);
$operacion->setOperando2(5);
echo" Multiplicación: {$operacion->calcular()} ";

echo "<hr>";

//SUMA
$operacion = new Suma(5,7);
echo"Suma: {$operacion->calcular()} ";

//RESTA
$operacion = new Resta(7,5);
echo"Resta: {$operacion->calcular()} ";

//MULTIPLICACIÓN
$operacion = new Multiplica(5,7);
echo" Multiplicación: {$operacion->calcular()} "; 

?>

