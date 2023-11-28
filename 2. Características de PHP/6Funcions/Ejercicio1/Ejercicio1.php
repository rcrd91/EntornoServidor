<!-- 1. Fai unha táboa na que se vaian mostrando o que fan as diferentes funcións de tratamento de
cadeas de caracteres. Partindo dunha cadea como por exemplo “Hoxe estamos nun 'día de
outono' chove, chove!!”, representa as funcións nunha táboa como a seguinte: -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid;
        }

        table {
            width: 90%;
            border-collapse: collapse;
        }

        th {
            background-color: #D6EEEE;
            
        }
        
    </style>
</head>
<body>

<?php

    echo"<h1> Funcións de tratamento de cadeas de caracteres.</h1><br>";

    echo"<table>";

        echo"<tr> <th>Nome da función</th> <th>Explicación</th> <th>Exemplo</th> </tr>";
        echo"<tr> <td><b>strlen()<b> </td><td>strlen (string cadea): devolve o número de caracteres da cadea.</td> <td> ('Hello') devolve: 5</td> </tr>";
        echo"<tr> <td><b>substr()<b> </td><td>string substr (string cadea, int comezo [, int lonxitude]) : Devolve unha subcadea, empezando polo comezo e de lonxitude lonxitude.</td> <td>('Hello World,6') devolve: world</td> </tr>";
        echo"<tr> <td><b>strstr()<b> </td> <td>strstr(string cadea, string busca) : devolve a cadea desde a primeira aparición da cadea busca</td> <td>('Hello World!','e) devolve: ello world!</td> </tr>";
        echo"<tr> <td><b>strchr( )<b> </td><td>strchr(string cadea, string letra) : idéntica á anterior, pero a primeira aparición da letra</td> <td>('Hello World!','e) devolve: ello world!</td> </tr>";
        echo"<tr> <td><b>strrchr( )<b> </td><td>strrchr(string cadea, string letra): devolve a cadea desde a última aparición do carácter</td> <td>('Hello World!','e) devolve: ello world!</td> </tr>";
        echo"<tr> <td><b>strpos( )<b> </td> <td>strpos( string cadea, string busca): devolve a posición numérica da primeira aparición.</td> <td>('love php', php) devolve: 5</td> </tr>";
        echo"<tr> <td><b>str_replace( )<b> </td> <td>str_replace( string buscada, string substituída, string orixinal): substitúe as aparicións da cadea buscada na cadea orixinal pola substituída.</td> <td>('world','Ricardo','Hello world!') devolve: Hello Ricardo!</td> </tr>";
        echo"<tr> <td><b>trim( )<b> </td><td>trim (string cadea): elimina os espazos á esquerda e dereita da cadea.</td><td>('Hello World','Hed!') devolve: llo Worl</td> </tr>";
        echo"<tr> <td><b>ltrim()<b> </td> <td>ltrim (string cadea): elimina os espazos á esquerda da cadea.</td> <td>('Hello World!','Helloqwewer!') Devolve: World!</td> </tr>";
        echo"<tr> <td><b>rtrim()<b> </td> <td>rtrim (string cadea): elimina os espazos á dereita da cadea.</td> <td>('Hello World!','World!') Devolve: Hello</td> </tr>";
        echo"<tr> <td><b>mb_strlen()<b></td> <td>mb_strlen(string cadea): Obtén a lonxitude de unha cadena de caracteres</td> <td>('Hello World!') Devolve: 12</td> </tr>";
        echo"<tr> <td><b>strtoupper()<b> </td> <td> strtoupper(string cadea): pasa a maiúsculas todos os caracteres dun texto</td> <td>('Hello WORLD!') Devolve: HELLO WORLD!</td> </tr>";
        echo"<tr> <td><b>strtolower()<b> </td> <td>strtolower(string cadea): pasa a minúsculas todos os caracteres dun texto</td> <td>('hello world!') Devolve: hello world!</td> </tr>";
        echo"<tr> <td><b>ucwords()<b> </td> <td>ucwords (string cadea): a maiúsculas cada palabra.</td> <td>('hello world!') Devolve: Hello World</td> </tr>";
        echo"<tr> <td><b>ucfirst()<b> </td> <td>ucfirst (string cadea): a maiúsculas o primeiro carácter da cadea</td> <td>('hello world!') Devolve: Hello world!</td> </tr>";
        echo"<tr> <td><b>strcmp()<b> </td> <td>strcmp(string str1, string str2): devolve un enteiro. Devolve < 0 se str1 é vai antes alfabeticamente que str2; >0 se str2 vai antes alfabeticamente que str1, 0 se son iguais.</td> <td>('Hello','Hello') Devolve: 0 (Son iguais.)</td> </tr>";
        echo"<tr> <td><b>urlencode()<b> </td> <td>urlencode(string str): devolve unha cadea codificada para pasar variables a unha páxina php</td> <td>Hola, bos días! >usamos encode> Hola,+bos+días!</td> </tr>";
        echo"<tr> <td><b>urldecode()<b> </td> <td> urldecode(string str): decodifica calquera cifrado %## dunha cadea dada (suponse que foi previamente codificada para ser pasada a outra páxina php).</td> <td>Hola,+bos+días! >decode> Hola, bos días!Hola,+bos+días! >decode> Hola, bos días!</td> </tr>";

    echo "</table> <br>";  
    
    //Proba de funcións:
    /*
    echo strlen("Hello"); //5
    echo "<br>";

    echo substr("Hello world",6); //world
    echo "<br>";

    echo strstr("Hello world!","e"); //ello world!
    echo "<br>";

    echo strchr("Hello world!","e"); //ello world!
    echo "<br>";

    echo strrchr("Hello world!","e"); //ello world!
    echo "<br>";

    echo strpos("love php","php"); //5
    echo "<br>";

    echo str_replace("world","Ricardo","Hello world!"); //Hello Ricardo!
    echo "<br>";

    echo trim("Hello World","Hed!"); //llo Worl
    echo "<br>";

    echo ltrim("Hello World!","Helloqwewer!"); //World!
    echo "<br>";

    echo rtrim("Hello World!","World!"); //Hello
    echo "<br>";

    echo mb_strlen("Hello World!"); //12
    echo "<br>";

    echo strtoupper("Hello WORLD!"); //HELLO WORLD!
    echo "<br>";

    echo strtolower("Hello World!"); //hello world!
    echo "<br>";

    echo ucwords("hello world!"); //Hello World
    echo "<br>";

    echo ucfirst("hello world!"); //Hello world!
    echo "<br>";

    echo strcmp("Hello","Hello"); //Devolve 0 porque os Strings son iguais.
    echo strcmp("Hello","Hell"); //Devolve 1        ('Hello','Hell') Devolve: 1
    echo strcmp("Hell","Hello"); //Devolve -1       ('Hell','Hello') Devolve -1
    echo "<br>";
    
    echo("urlencode codifica a url poñendo + nos espacios"); //Hola, bos días! >usamos encode> Hola,+bos+días!
    echo "<br>";

    echo("urldecode decodifica a url e saca os + dos espacios"); //Hola,+bos+días! >decode> Hola, bos días!
    echo "<br>";
    */

?>
    
</body>
</html>