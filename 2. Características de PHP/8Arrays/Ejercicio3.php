<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<style>
        body  {
            background-color:lightgreen;
        }

        table, th, td {
            border: 1px solid;
            border-collapse:collapse;
            margin-left: auto;
            margin-right: auto;
            
        }

        th {
            color: green;
        }

        h1,h2,h3,form,input,p {
            text-align:center;
        }

    </style>

<body>

    <h1>BIBLIOTECA</h1>

    <h3><u>Operacións cos exemplares</u></h3>

    <!-- Botóns -->
    <form action="Ejercicio3.php" method="post">

        Buscar exemplar: <input type="text" name="busca" />
        <input type="submit" value="Buscar" name="buscar" /><br><br>

        <input type="submit" value="Ver listado completo da biblioteca" name="completo" /><br><br>

        <input type="submit" value="Ver listado completo ordeado polo título" name="ordeado" /><br>

    </form><br>

<?php 

    //LIBROS:
    $libros = array("El médico"=>array("Noah Gordon","Time Warner"),
                    "Marina"=>array("Carlos Ruíz Zafón","Edebé"),
                    "La Hoguera de las vanidades"=>array("Tom Wolfe","RBA editores"),
                    "El libro de las ilusiones"=>array("Paul Auster","Faber"),
                    "La muerte en Venecia"=>array("Michael Mann","Anaya"),
                    "A sangre fría"=>array("Truman Capote","Ilusiones"),
                    "2001: Odisea en el espacio"=>array("Arthur C. Clarke","P&J") 
    );


    //FUNCIÓNS:

    function completo($libros){
        echo "<table>";
        echo"<tr> <th>Título</th> <th>Autor</th> <th>Editorial</th> </tr>";
        foreach($libros as $titulo => $info) {
            echo"<tr> <td>". $titulo . "</td>  <td>". $info[0] . "</td><td>". $info[1] . "</td> </tr>";
        }
        echo "</table><br>";
        echo"<p>O número de exemplares atopados é de ".count($libros)." libros.</p>";
    }

    function ordear($libros){
        ksort($libros);
        echo "<table>";
        echo"<tr> <th>Título</th> <th>Autor</th> <th>Editorial</th> </tr>";
        foreach($libros as $titulo => $info) {
            echo"<tr> <td>". $titulo . "</td>  <td>". $info[0] . "</td><td>". $info[1] . "</td> </tr>";
        }
        
        echo "</table><br>";
        echo"<p>O número de exemplares atopados é de ".count($libros)." libros.</p>";
    }

    function busqueda($libros,$busqueda) {
        echo"<p>Os exemplares que conteñen ".$busqueda." no campo 'título', 'autor', ou 'editorial' son:</p>";

        $librosbusqueda= array();
        foreach($libros as $libro => $info) {
            if (str_contains($libro,$busqueda) || str_contains($info[0],$busqueda) || str_contains($info[1],$busqueda)){
                $librosbusqueda[$libro]=array($info[0],$info[1]);
            }
        }
        return $librosbusqueda;
    }


    //BOTÓNS:

    if (isset($_POST["completo"])) {
        completo($libros);
    } 
    
    if (isset($_POST["ordeado"])){
        ordear($libros);
    }

    if (isset($_POST["buscar"])) {
        $busqueda= $_POST['busca'];
        completo(busqueda($libros,$busqueda));
    }


?> 
    
</body>
</html>