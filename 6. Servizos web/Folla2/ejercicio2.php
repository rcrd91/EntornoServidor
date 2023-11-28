<?php
session_start(); //Utilizar outra páxina para cerrar sesión

echo"
      <form action='ejercicio2.php' method='get'>
      <select name='sel_idioma'>  
            <option value='en'> Inglés </option> 
            <option value='es'> Castelán </option>
            <option value='gl'> Galego </option>  
        </select>
        <p><input type='text' autofocus placeholder='Termo a buscar' name='termo'/></p>
        <p><input type='submit' value='Enviar' name='enviar'/></p>
      </form>
";

if(!empty($_GET['termo']) && isset($_GET['enviar']) ) {

    //SESSION
    $_SESSION['idioma'] = $_GET['sel_idioma'];

    $url = 'http://';
    $url .= $_SESSION['idioma']. ".wikipedia.org/w/api.php";
    $url .= '?action=query';
    $url .= '&list=search';
    $url .= '&format=xml';
    $url .= '&redirects';
    $url .= '&srsearch=' . urlencode($_GET['termo']);
    $lista_paxinas = file_get_contents($url);
    file_put_contents('paxina.xml', $lista_paxinas);
    echo'
        <hr>
        <div>
        <h3>Listado de páxinas co termo'.$_GET['termo']. '</h3>
        <ul>
    ';
    $xml = new SimpleXMLElement($lista_paxinas);
    foreach($xml->query->search->children() as $pax) {
        $params = 'termo=' . $_GET['termo'];
        $params .= '&pax=' . urlencode($pax['title']);
        echo "<li><a href='?$params'>" . $pax['title'] . "</a></li>";
    }
}
?>

</ul>
</div>
<?php
   if(!empty($_GET['pax'])) {
        $url = 'http://';
        #$url . =  "en.wikipedia.org/w/api.php";
        $url .= $_SESSION['idioma']. ".wikipedia.org/w/api.php";
        $url .= '?action=parse';
        $url .= '&prop=text';
        $url .= '&format=xml';
        $url .= '&redirects';
        $url .= '&page=' . urlencode($_GET['pax']);
        $paxina = file_get_contents($url);
        echo '<hr> <div>
        <h3>Contido da páxina' . $_GET['pax']. '</h3>';
        echo htmlspecialchars_decode($paxina);
    }
    echo '</div>';
?>