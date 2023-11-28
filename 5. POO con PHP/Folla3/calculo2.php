<?php
require('Clases/Calculo.php'); 
require('Clases/Multiplica.php'); 
require('Clases/Suma.php'); 
require('Clases/Resta.php'); 


//Calcular
echo"
    <form action='calculo2.php' method='get'>
        <p><input type='input' autofocus placeholder='Operando 1' name='in_operando1'/></p>
        <p><input type='input' autofocus placeholder='Operando 2' name='in_operando2'/></p>
        <select name='sel_operacion'>
            <option value='sumar'> Sumar </option>
            <option value='restar'> Restar </option>
            <option value='multiplicar'> Multiplicar </option>
        </select>
        <p><input type='submit' value='Calcular' name='btn_calcular'/></p><hr>
    </form>
";

//Sumar
if (isset($_GET["btn_calcular"]) && $_GET["sel_operacion"] == 'sumar' ){

    //Valores
    $in_operando1 = $_GET["in_operando1"];
    $in_operando2 = $_GET["in_operando2"];
    $sel_operacion = $_GET["sel_operacion"];
    $btn_calcular = $_GET["btn_calcular"];

    $operacion = new Suma($in_operando1, $in_operando2);
    echo"Resultado = {$operacion->calcular()} ";

}

//Restar
if (isset($_GET["btn_calcular"]) && $_GET["sel_operacion"] == 'restar' ){

    //Valores
    $in_operando1 = $_GET["in_operando1"];
    $in_operando2 = $_GET["in_operando2"];
    $sel_operacion = $_GET["sel_operacion"];
    $btn_calcular = $_GET["btn_calcular"];

    $operacion = new Resta($in_operando1, $in_operando2);
    echo"Resultado = {$operacion->calcular()} ";

}

//Multiplicar
if (isset($_GET["btn_calcular"]) && $_GET["sel_operacion"] == 'multiplicar' ){

    //Valores
    $in_operando1 = $_GET["in_operando1"];
    $in_operando2 = $_GET["in_operando2"];
    $sel_operacion = $_GET["sel_operacion"];
    $btn_calcular = $_GET["btn_calcular"];

    $operacion = new Multiplica($in_operando1, $in_operando2);
    echo"Resultado = {$operacion->calcular()} ";
}

?>

