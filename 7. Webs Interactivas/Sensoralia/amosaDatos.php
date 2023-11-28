<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amosa Datos</title>
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

    <!-- SELECT -->
    <label for="sensor">Sensor:</label>
    <select id="sensor" name="sensor">
        <option value="8">Temperatura</option>
        <option value="9">Presión</option>
        <option value="10">Humedad</option>
    </select>

    <!-- INPUT -->
    <label for="medidas">Medidas:</label>
    <input type="number" id="medidas" name="medidas" min="0" max="10" value="0">
    <hr>

    <!-- GARDAR -->
    <button type="button" id="gardar">Gardar na BD</button> <hr>

    <!-- TABLA -->
    <table>
        <thead>
            <tr><th>VARIABLE</th><th>MEDICION</th><th>DATA</th><th>HORA</th></tr>
        </thead>
        <tbody id="tbody">
            <!-- data -->
        </tbody>
    </table>

</form>

<script>

    document.getElementById("sensor").addEventListener("change", mostrarDatos);
    document.getElementById("medidas").addEventListener("change", mostrarDatos);
    document.getElementById("gardar").addEventListener("click", gardarDatos);

    function mostrarDatosss() {

        var url = "colleDatos.php";
        var data = new FormData(document.getElementById("formulario"));

        fetch(url, {
            method: "POST",
            body: data
        })
        .then(response => response.text())
        .then(data => document.getElementById("tbody").innerHTML = data)
        .catch(error => console.log("Error:", error))
    }


    function gardarDatos() {

        var url = "gardaDatos.php";
        var data = new FormData(document.getElementById("formulario"));

        fetch(url, {
            method: "POST",
            body: data
        })
        .then(response => response.text())
        .then(data => {
            if(data=="gardado") {
                alert("Gardado na BD");
            } else alert("Non gardado na BD");
        })
        .catch(error => console.log("Error:", error))

    }

</script>
    
</body>
</html>