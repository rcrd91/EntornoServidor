<!-- 6. Fai un formulario simple que pide o nome e apelidos, que chame a outra páxina chamada listado.php, na que se mostre os valores do nome e apelidos introducidos no formulario GET.
Lembra que para acceder ás variables pasadas desde un formulario empregamos a variable
$_GET[“nomeDoElemento”]. Por exemplo, se temos un formulario cunha caixa de texto chamada “direccion”, o seu valor estará na variable $_GET[“direccion”]. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="welcome.php" method="get">
    Nome: <input type="text" name="nome"><br>
    Apelidos: <input type="text" name="apelidos"><br>
    <input type="submit">
    </form>
    
</body>
</html>
