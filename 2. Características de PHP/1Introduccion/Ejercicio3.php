<!-- 3. Fai unha páxina web que mostre os impares ata 50, indicando o seu número de orden, empregando un bucle for nun script PHP. 
Fai que os números sexan títulos h2, e define nun ficheiro .css que h2 está centrado. Na páxina ten que mostrarse:
O 1º impar é 1
O 2º impar é 3.
O 3º impar é 5. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <
</head>
<body>

    <?php

        $num=1;

        for($i=1; $i<51; $i++) {
        
    
            if ($i%2!=0) {
                
                echo "<br>O $num º impar é $i</br>";
                $num++; }
        
        }

    ?>

</body>
</html>
