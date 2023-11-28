<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos desde la BD</title>
    <style>
        table, th, td {
            width: 1000px;
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            margin: auto;
        }
    </style>
</head>

<body>

<button onclick="window.location.href = 'datosSolar.php';">Volver</button>

<!-- TABLA -->
    <table>
        <thead>
            <tr><th>ID</th><th>Valor</th><th>Fecha e Hora</th></tr>
        </thead>

        <tbody>
            <?php
                //Conexión
                $servidor = "db";
                $usuario = "root";
                $passwd = "root";
                $base = "proba";

                $pdo = new PDO("mysql:host=$servidor;dbname=$base;charset=utf8", $usuario, $passwd);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare('SELECT * FROM medidas2');
                $stmt->execute();

                $html = "";

                foreach ($stmt as $fila) {
                    $id = $fila['id'];
                    $valor = $fila['valor'];
                    $fecha = $fila['fecha'];

                    $html .= "<tr><td>$id</td><td>$valor</td><td>$fecha</td></tr>";
                }

                echo $html;
                
            ?>
        </tbody>

    </table>

</body>

</html>
