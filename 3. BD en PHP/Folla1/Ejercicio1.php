<!DOCTYPE html>
<html>
<head>
<title>Conexión a bases de datos</title>
</head>
<style>
    body {
        background-color:lightgrey;
    }
        table, th, td {
            border: 1px solid;
            border-collapse:collapse;
        }
</style>
<body>
    
<?php

    $conexion=mysqli_connect("dbXdebug","root","root","folla1"); //Conexión


    //* Mostra os datos están gardados na táboa xogador
    if ($conexion) {
        mysqli_set_charset($conexion,"utf8");
        $resultado=mysqli_query($conexion,"SELECT id, DNI, Nome, Apelidos, Idade FROM xogador");
        if ($resultado != FALSE) {

            echo "Imprimir a BD completa: <br>";
            echo "<table>";
            echo"<tr> <th>ID</th> <th>DNI</th> <th>Nome</th> <th>Apelidos</th> <th>Idade</th> </tr>";

            while($fila=mysqli_fetch_array($resultado))
                echo "<tr>  <td>".$fila["id"]."</td>  <td>".$fila["DNI"]."</td>  <td>".$fila["Nome"]."</td>  <td>".$fila["Apelidos"]."</td>  <td>".$fila["Idade"]."</td>  </tr>";

            echo "</table> <br><br>";

        } else { echo "Fallou a conexión coa base de datos";
        }
    } else { echo "Erro conectando coa base de datos";
    }



    //* Os xogadores con idade < 30.
    if ($conexion) {
        mysqli_set_charset($conexion,"utf8");
        $resultado=mysqli_query($conexion,"SELECT id, DNI, Nome, Apelidos, Idade FROM xogador WHERE Idade < 30");
        if ($resultado != FALSE) {

        echo "Os xogadores con idade < 30: <br>";
            echo "<table>";
            echo"<tr> <th>ID</th> <th>DNI</th> <th>Nome</th> <th>Apelidos</th> <th>Idade</th> </tr>";

            while($fila=mysqli_fetch_array($resultado))
                echo "<tr>  <td>".$fila["id"]."</td>  <td>".$fila["DNI"]."</td>  <td>".$fila["Nome"]."</td>  <td>".$fila["Apelidos"]."</td>  <td>".$fila["Idade"]."</td>  </tr>";

            echo "</table> <br><br>";

        } else { echo "Fallou a conexión coa base de datos";
        }
    } else { echo "Erro conectando coa base de datos";
    }



    //* Os xogadores con apelidos maiores que 'García'.
    if ($conexion) {
        mysqli_set_charset($conexion,"utf8");
        $resultado=mysqli_query($conexion,"SELECT id, DNI, Nome, Apelidos, Idade FROM xogador WHERE LENGTH(Apelidos) > LENGTH('García') ");
        //$resultado=mysqli_query($conexion,"SELECT id, DNI, Nome, Apelidos, Idade FROM xogador WHERE Apelidos > 'García' ");

        if ($resultado != FALSE) {

            echo "Os xogadores con apelidos maiores que 'García': <br>";
            echo "<table>";
            echo"<tr> <th>ID</th> <th>DNI</th> <th>Nome</th> <th>Apelidos</th> <th>Idade</th> </tr>";

            while($fila=mysqli_fetch_array($resultado))
                echo "<tr>  <td>".$fila["id"]."</td>  <td>".$fila["DNI"]."</td>  <td>".$fila["Nome"]."</td>  <td>".$fila["Apelidos"]."</td>  <td>".$fila["Idade"]."</td>  </tr>";

            echo "</table> <br><br>";

        } else { echo "Fallou a conexión coa base de datos";
        }
    } else { echo "Erro conectando coa base de datos";
    } 



    //* Conta cantos xogadores teñen máis de 22 anos.
    if ($conexion) {
        mysqli_set_charset($conexion,"utf8");
        $resultado=mysqli_query($conexion,"SELECT COUNT(id) FROM xogador WHERE Idade > 22");
        if ($resultado != FALSE) {

        echo "Conta cantos xogadores teñen máis de 22 anos:";

            while($fila=mysqli_fetch_array($resultado))
                echo"<p>" .$fila["COUNT(id)"]. "</p>";

        } else { echo "Fallou a conexión coa base de datos";
        }
    } else { echo "Erro conectando coa base de datos";
    }


    // Pechamos a conexion.
    mysqli_close($conexion);
?>

</body>
</html>
