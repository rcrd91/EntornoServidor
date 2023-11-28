<?php

echo"
    <form action='amosaDatos.php' method='get'>

        <select name='sel_opcion'> 
            <option value='8'> Temperatura </option> 
            <option value='9'> Presión </option> 
            <option value='10'> Humidade </option> 
        </select>

        <input type='submit'  value='Enviar' name='btn_enviar'/>
    </form>
";


    $url= "https://sensoralia.iessanclemente.net/api/v1/sensores/";

    if(isset($_GET['sel_opcion'])) {
        $url .= $_GET['sel_opcion']. "/mediciones?limit=2";
    } 
 
    $lista_sensores = file_get_contents($url);
   
    $mediciones = json_decode($lista_sensores);
    var_dump($mediciones);

?>