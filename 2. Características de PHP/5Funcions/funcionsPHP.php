
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    
</head>

<body>

<?php

    //Suma 2 valores:
    function fSuma2($num1, $num2){
        $resultado = $num1 + $num2;
        return $resultado;
    }

    if(isset($_GET["suma2"])) { 
        $suma = fSuma2($_GET["n1"], $_GET["n2"]);
        echo "O resultado de sumar {$_GET["n1"]} e {$_GET["n2"]} vale $suma";
    }


    //Suma 3 valores:
    function fSuma3($num1, $num2, $num3){
        $resultado = $num1 + $num2 + $num3;
        return $resultado;
    }

    if(isset($_GET["suma3"])) { 
        $suma = fSuma3($_GET["n1"], $_GET["n2"], $_GET["n3"]);
        echo "O resultado de sumar {$_GET["n1"]} e {$_GET["n2"]} e {$_GET["n3"]} vale $suma";
    }



    //Suma 4 valores:
    function fSuma4($num1, $num2, $num3, $num4){
        $resultado = $num1 + $num2 + $num3 + $num4;
        return $resultado;
    }

    if(isset($_GET["suma4"])) { 
        $suma = fSuma4($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "O resultado de sumar {$_GET["n1"]} e {$_GET["n2"]} e {$_GET["n3"]} e {$_GET["n4"]} vale $suma";
    }



    //Multiplica 2 valores:
    function fMultiplica2($num1, $num2){
        $resultado = $num1 * $num2;
        return $resultado;
    }

    if(isset($_GET["multiplica2"])) { 
        $multiplicacion = fMultiplica2($_GET["n1"], $_GET["n2"]);
        echo "O resultado de multiplicar {$_GET["n1"]} * {$_GET["n2"]} vale $multiplicacion";
    }



    //Multiplica 3 valores:
    function fMultiplica3($num1, $num2, $num3){
        $resultado = $num1 * $num2 * $num3;
        return $resultado;
    }

    if(isset($_GET["multiplica3"])) { 
        $multiplicacion = fMultiplica3($_GET["n1"], $_GET["n2"], $_GET["n3"]);
        echo "O resultado de multiplicar {$_GET["n1"]} * {$_GET["n2"]} * {$_GET["n3"]} vale $multiplicacion";
    }



    //Multiplica 4 valores:
    function fMultiplica4($num1, $num2, $num3, $num4){
        $resultado = $num1 * $num2 * $num3 * $num4;
        return $resultado;
    }

    if(isset($_GET["multiplica4"])) { 
        $multiplicacion = fMultiplica4($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "O resultado de multiplicar {$_GET["n1"]} * {$_GET["n2"]} * {$_GET["n3"]} * {$_GET["n4"]} vale $multiplicacion";
    }



    //Maior 4 valores:
    function fMaior($num1, $num2, $num3, $num4){
        $resultado = max(array($num1, $num2, $num3, $num4));
        return $resultado;
    }

      if(isset($_GET["maior"])) { 
        $maior = fMaior($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "O resultado maior de {$_GET["n1"]} , {$_GET["n2"]} , {$_GET["n3"]} , {$_GET["n4"]} vale $maior";
    }



    //Menor 4 valores:
    function fMenor($num1, $num2, $num3, $num4){
        $resultado = min(array($num1, $num2, $num3, $num4));
        return $resultado;
    }
    
    if(isset($_GET["menor"])) { 
        $menor = fMenor($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "O resultado menor dos valores {$_GET["n1"]} , {$_GET["n2"]} , {$_GET["n3"]} , {$_GET["n4"]} vale $menor";
    }



    //Media 4 valores:
    function fMedia($num1, $num2, $num3, $num4){
        $contarArray = count(array($num1, $num2, $num3, $num4));
        $sumarArray = array_sum(array($num1, $num2, $num3, $num4));
        $resultado = ($sumarArray / $contarArray);
        return $resultado;
    }

     if(isset($_GET["media"])) { 
        $media = fMedia($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "O resultado da media de {$_GET["n1"]} e {$_GET["n2"]} e {$_GET["n3"]} e {$_GET["n4"]} vale $media";
    }



    //MaiorMenor 4 valores:
    function fOrdearMaiorMenor($num1, $num2, $num3, $num4){
        $resultado = array($num1, $num2, $num3, $num4);
       	rsort($resultado);
        
        return $resultado;
    }

    if(isset($_GET["ordearMaiorMenor"])) { 
        $maiorMenor = fOrdearMaiorMenor($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "O resultado de maior a menor vale ";
        foreach($maiorMenor as $i){
            echo $i . " " ;
        }
    }



    //MenorMaior 4 valores:
    function fOrdearMenorMaior($num1, $num2, $num3, $num4){
        $resultado = array($num1, $num2, $num3, $num4);
       	sort($resultado);
        
        return $resultado;
    }

    if(isset($_GET["ordearMenorMaior"])) { 
        $menorMaior = fOrdearMenorMaior($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "O resultado de menor a menor vale ";
        foreach($menorMaior as $i){
            echo $i . " " ;
        }
    }
    


    //Factorial 1 valor:
    function fFactorialN3($num1){
        $factorialN3 = 1;

        for ($i = 1; $i <= $num1; $i++){ 
            $factorialN3 = $factorialN3 * $i; 
        } 

        return $factorialN3;
    }

     if(isset($_GET["factorialN3"])) { 
        $factorial = fFactorialN3($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "O resultado factorial n3 de {$_GET["n1"]} vale $factorial";
    }



    //SegundoMaior 4 valores:
    function fSegundoMaior($num1, $num2, $num3, $num4){
        
    }

    if(isset($_GET["segundoMaior"])) { 
        $segundoMaior = fSegundoMaior($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "O segundo maior dos valores {$_GET["n1"]} e {$_GET["n2"]} e {$_GET["n3"]} = {$_GET["n4"]} vale $segundoMaior";
    }



    //Mediana:
    function fMediana($num1, $num2, $num3, $num4){
        
    }
    
    if(isset($_GET["mediana"])) { 
        $mediana = fMediana($_GET["n1"], $_GET["n2"], $_GET["n3"], $_GET["n4"]);
        echo "A mediana dos valores {$_GET["n1"]} , {$_GET["n2"]} , {$_GET["n3"]} , {$_GET["n4"]} vale $mediana";
    }


/*$vector[0]=$_GET["n1"];
$vector[1]=$_GET["n1"];
$vector[2]=$_GET["n1"];
$vector[3]=$_GET["n1"];
$vector[4]=$_GET["n1"];*/

  
?>


</body>
</html> 