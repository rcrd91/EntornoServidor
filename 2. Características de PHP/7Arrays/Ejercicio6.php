<!-- 6. Fai un formulario no que se pida o mes con letra (valores posibles serán só “xaneiro”, “febreiro”, etc.), e na
mesma páxina se engada unha frase dicindo os días que ten ese mes, despois de darlle a un botón de que
poña “CALCULAR”. Define para isto un array asociativo, cos meses como claves e os días como valor.
Utiliza para buscar no array next( ) e un bucle do_while como o que vimos nos exercicios anteriores. --> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>

    <form action="Ejercicio6.php" method="post">

        Mes do ano: <input type="text" name="mes" />
        <input type="submit" value="Enviar" />
        
    </form>

<?php 

    $meses = array("Xaneiro"=>"31", "Febreiro"=>"29", "Marzo"=>"31", "Abril"=>"30", "Maio"=>"31", "Xuño"=>"30", "Xullo"=>"31", "Agosto"=>"31");

    reset($meses); //COLOCÁMONOS AO COMEZO DO ARRAY

    do { 
        echo key($meses)." ".current($meses)."<br/>";         //Mostramos CLAVE e VALOR da posición actual
    } while(next($meses));                                    //MENTRES HAXA OUTRO ELEMENTO A SEGUIR

    echo htmlspecialchars($_POST['mes']) . " ten X días.";

?> 
    
</body>
</html>