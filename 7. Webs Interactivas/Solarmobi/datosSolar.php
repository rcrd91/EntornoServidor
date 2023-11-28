<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolarMobi</title>
</head>

<style>
    table, th, td {
        width:1000px;
        border: 2px solid red;
        border-collapse:collapse;
        text-align: center;
        margin: auto;
    }
</style>
<body>

    <!-- FORMULARIO -->
    <form id="formulario">

        <!-- Fecha -->
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha">

        <!-- Select -->
        <label for="orden">Orden:</label>
        <select id="orden" name="orden">
            <option value="asc">Ascendente</option>
            <option value="desc">Descendente</option>

        </select>
        <hr>

        <!-- Checkbox-->
        <label for="last">Last:</label>
        <input type="checkbox" id="last" name="last" value="last">
        <hr>

        <!-- Consultar -->
        <input type="button" id="consultar" name="consultar" value="Consultar">

        <!-- Gardar -->
        <button type="button" id="gardar" name="gardar">Gardar</button>
        <hr>

        <!-- TABLA -->
        <table>
            <thead>
                <tr> <th>ID medición</th><th>Potencia</th><th>Fecha e Hora</th> </tr>
            </thead>
            <tbody id="tbody">
                <!-- data -->
            </tbody>
        </table>

    </form>

    <!-- ConsultaBD -->
    <button id="consultarBD">Consultar BD</button><hr>

    <script>

        document.getElementById("consultar").addEventListener("click", consultarDatos);
        document.getElementById("gardar").addEventListener("click", gardarDatos);
        document.getElementById("consultarBD").addEventListener("click", mostrarDatosBD);


        function consultarDatos() {

            const data = new FormData(document.getElementById("formulario"));
            const url = "consultaSolar.php";

            fetch(url,{
                method:"POST",
                body: data
            })
            .then(response => response.text())
            .then(data => document.getElementById("tbody").innerHTML = data)
            .catch(error => console.log("Error:", error))
        } 


        function gardarDatos() {
            
            const data = new FormData(document.getElementById("formulario"));
            const url = "gardaSolar.php";

            fetch(url,{
                method:"POST",
                body: data
            })
            .then(response => response.text())
            .then(data => {
                if(data === "gardado") {
                    alert("Engadido á BD");
                } else(alert("Non engadido á BD"))
            })
            .catch(error => console.log("Error:", error))
        } 

        function mostrarDatosBD() {
            window.location.href = "datosnaBD.php";
        }

    </script>

</body>
</html>