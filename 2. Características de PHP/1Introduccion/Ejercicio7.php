<!-- 7. Fai unha páxina que recolla e mostre a información NUNHA TÁBOA con columnas Nome_Elemento, ValorElemento, 
enviada desde o formulario da imaxe “formulario artista.gif”. Envía a información empregando o método $_GET. -->

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

    Nombe e Apelidos: <input type="text" name="nome"><br>

    E-Mail: <input type="text" name="email"><br>

    Experiencia: 
    <input type="checkbox" id="experiencia1" name="experiencia1" value="Musico">
    <label for="experiencia1"> Músico</label>

    <input type="checkbox" id="experiencia2" name="experiencia2" value="Comico">
    <label for="experiencia2"> Cómico</label>

    <input type="checkbox" id="experiencia3" name="experiencia3" value="Actor">
    <label for="experiencia3"> Actor</label><br>

    
    Indica a túa idade:
     <input type="radio" id="idade1" name="Idade1" value="HTML"> Entre 20 e 40 anos<br>
    <input type="radio" id="idade2" name="Idade2" value="HTML"> Máis de 40 anos <br>


    Cómo atopaches a páxina:

    <select name="selecciona" id="selecciona">
        <option value="deCasualidade">de casualidade</option>
        <option value="poloGoogle">polo Google</option>
        <option value="conecidaFamilia">é coñecida da familia</option>
    </select> <br>
  

    Os teus comentarios:<br>

    <textarea rows="4" cols="50" name="comment" form="usrform"></textarea> <br>

    <button type="button">Enviar</button>
    <button type="button">Borrar</button>


    
    </form>
    
</body>
</html>
