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

    <!-- Botóns -->

    <form action="Ejercicio2.php" method="GET">

        <input type="submit" value="Imprime BD" name="imprimir" /><br>
        <input type="submit" value="Alfabéticamente pola orixe" name="orixe" /><br>
        <input type="submit" value="Alfabéticamente descendente pola orixe" name="orixedesc" /><br>
        <input type="submit" value="Alfabeticamente polo destino" name="destino" /><br>
        <input type="submit" value="Alfabéticamente descendente polo destino" name="destinodesc" /><br>

    </form><br>

<?php

    // ABRIMOS CONEXIÓN
    $conexion=mysqli_connect("dbXdebug","root","root","folla1"); 


    //* Imprime 
    if ($conexion) { mysqli_set_charset($conexion,"utf8");

        $resultado = mysqli_query($conexion, "SELECT id, Orixe, Destino, Distancia FROM traxecto");

        if ($resultado != FALSE) {

            function imprimir($resultado){ 

                echo "<table>";
                echo"<tr> <th>ID</th> <th>Orixe</th> <th>Destino</th> <th>Distancia</th> </tr>";

                while($fila = mysqli_fetch_array($resultado))
                echo "<tr>  <td>".$fila["id"]."</td>  <td>".$fila["Orixe"]."</td>  <td>".$fila["Destino"]."</td>  <td>".$fila["Distancia"]."</td> </tr>";

                echo "</table> <br><br>"; 
            }
            if (isset($_GET["imprimir"])) {
                imprimir($resultado);
            }     
        } 
    } 


    //* Alfabéticamente pola orixe
    if ($conexion) { mysqli_set_charset($conexion,"utf8");

        $resultado = mysqli_query($conexion, "SELECT id, Orixe, Destino, Distancia FROM traxecto ORDER BY Orixe ");

        if ($resultado != FALSE) {

            if (isset($_GET["orixe"])){
                imprimir($resultado);
            }
        } 
    } 


    //* Alfabéticamente-Descendente pola orixe
    if ($conexion) { mysqli_set_charset($conexion,"utf8");

        $resultado = mysqli_query($conexion, "SELECT id, Orixe, Destino, Distancia FROM traxecto ORDER BY Orixe DESC ");

        if ($resultado != FALSE) {

            if (isset($_GET["orixedesc"])){
                imprimir($resultado);
            } 
        } 
    } 


    //* Alfabéticamente polo destino
    if ($conexion) { mysqli_set_charset($conexion,"utf8");

        $resultado = mysqli_query($conexion, "SELECT id, Orixe, Destino, Distancia FROM traxecto ORDER BY Destino ");

        if ($resultado != FALSE) {

            if (isset($_GET["destino"])){
                imprimir($resultado);
            } 
        } 
    } 

    //* Alfabéticamente descendente polo destino
    if ($conexion) { mysqli_set_charset($conexion,"utf8");

        $resultado = mysqli_query($conexion,"SELECT id, Orixe, Destino, Distancia FROM traxecto ORDER BY Destino DESC ");

        if ($resultado != FALSE) {

            if (isset($_GET["destinodesc"])){
                imprimir($resultado);
            }
        } 
    } 

        
    // CERRAMOS CONEXIÓN
    mysqli_close($conexion);

?>

</body>
</html>


