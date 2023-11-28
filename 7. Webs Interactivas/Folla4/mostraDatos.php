<!DOCTYPE html>
<html>
<head>
</head>

<style>
    table, th, td {
        width:1000px;
        border: 1px solid red;
        border-collapse:collapse;
        text-align: center;
        margin: auto;
    }
</style>

<body>

    <form id="formulario">
        
        <label for="sensor">Sensor:</label>
        <select id="sensor" name="sensor">
            <option value="8">Temperatura</option>
            <option value="9">Presión</option>
            <option value="10">Humedad</option>
        </select>
        <hr>

        <label for="numMedidas">numMedidas:</label>
        <input type="number" id="numMedidas" name="numMedidas" min="0" max="10" value="0">
        <hr>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha">
        <hr>

        <button id="gardar">Gardar</button>
        <hr>

       

        <!------- Tabla ------->
        <table>
            <thead>
                <tr> <th>ID</th> <th>Valor</th> <th>Fecha y Hora</th> </tr>
            </thead>

            <tbody id="tbody">
                <!-- data -->
            </tbody>
        </table>

    </form>

    <script>

        document.getElementById("sensor").addEventListener("change", mostrarDatos);
        document.getElementById("numMedidas").addEventListener("change", mostrarDatos);
        document.getElementById("gardar").addEventListener("click", gardarDatos);

        function mostrarDatos() {
          
            const data = new URLSearchParams(new FormData(document.getElementById("formulario")))

            fetch("colleDatos.php", {
                method: 'POST',
                body: data
            }) 
            .then(response => response.text())
            .then(data => { 
                document.getElementById("tbody").innerHTML = data;
            })
            .catch(error => console.log("Error:", error))
        }

        
        function gardarDatos() {
          
            const data = new URLSearchParams(new FormData(document.getElementById("formulario")))

            fetch("gardaDatos.php", {
                method: 'POST',
                body: data
            }) 
            .then(response => response.text())
            .then(data => {
                if (data === "engadido") {
                    alert("Engadido");
                } else {
                    alert("Non engadido");
                }      
            })
            .catch(error => console.log("Error:", error))
        }

    </script>

</body>

</html>
