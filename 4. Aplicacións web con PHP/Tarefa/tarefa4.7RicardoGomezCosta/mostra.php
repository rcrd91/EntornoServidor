<?php
session_start();

//Renovar sesión
session_regenerate_id(true);

// SESSION
if(isset($_GET['btn_login'])) {
    $_SESSION["in_usuario"] = $_GET['in_usuario'];
    $_SESSION["in_contrasinal"] = $_GET['in_contrasinal'];
    $_SESSION["btn_login"] = $_GET['btn_login'];
}

// COOKIES
if(isset($_GET['sel_idioma']) && ($_GET['sel_idioma']=='Galego')) {
    setcookie("idioma", "Galego", time()+300); //Creamos a cookie por 5 minutos
    header("Location:mostra.php"); //Actualizamos
}
if(isset($_GET['sel_idioma']) && ($_GET['sel_idioma']=='Castelán')) {
    setcookie("idioma", "Castelán", time()+300); 
    header("Location:mostra.php"); 
}
if(isset($_GET['sel_idioma']) && ($_GET['sel_idioma']=='Inglés')) {
    setcookie("idioma", "Inglés", time()+300); 
    header("Location:mostra.php"); 
}

//* ---------------------------------------------------------------------------------------------------------------

//Configuración
require('config/config.php');

//Cerrar sesión
echo"
    <form action='pechaSesion.php' method='get'>
        <p><button type='submit' id='crimson' name='btn_pecharSesion'>Cerrar sesión</button></p><hr>
    </form>
";

//Imprimir cookies
if (isset($_COOKIE['idioma'])) {
    if($_COOKIE['idioma'] == "Galego") {
        echo"<b>Benvido {$_SESSION['in_usuario']}</b>";
    }
    if($_COOKIE['idioma'] == "Castelán") {
        echo"<b>Bienvenido {$_SESSION['in_usuario']}</b>";
    }
    if($_COOKIE['idioma'] == "Inglés") {
        echo"<b>Welcome {$_SESSION['in_usuario']}</b>";
    }
} 

//Base de datos
$servidor='db';
$usuario= 'tarefa';
$pass='Tarefa4.7';
$db='tarefa4.7'; 

try {
    //! Abrimos conexión
    $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8mb4", $usuario, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //*Botón Login
    if(isset($_SESSION['btn_login'])){ 

        //Valores
        $in_usuario = $_SESSION['in_usuario'];
        $in_contrasinal = $_SESSION['in_contrasinal']; 

        //Consulta 
        $consulta = "SELECT contrasinal FROM usuarios WHERE usuario = '$in_usuario' ";
        $consulta = $conexion->prepare($consulta);
        $consulta->execute(); //Contén contraseña da BD

        //Gardamos a consulta nun array
        $fila = $consulta->fetch(); 

        if($consulta->rowCount() > 0 ){ //Se hay usuario

            foreach ($fila as $posicion => $contrasinal) //Recorremos $fila para acceder ás contrasinais

            if(password_verify($in_contrasinal,$contrasinal)) { //Comparamos contraseñas
                $contrasinalBD = $contrasinal;
            }
        }
        
        //* Se as contrasinales cadran
        if(isset($contrasinalBD)){

            //Valores
            $in_usuario = $_SESSION['in_usuario'];
            $in_contrasinal = $_SESSION['in_contrasinal'];

            //Consulta: Danos o rol do usuario xa verificado
            $consulta = $conexion->prepare("SELECT rol FROM usuarios WHERE (usuario = ? AND contrasinal = ?)");
            $consulta->bindParam(1, $in_usuario);
            $consulta->bindParam(2, $contrasinalBD);
            $consulta->execute();

            //Gardamos a consulta nun array
            $array = $consulta->fetch();

            //* Se é USUARIO => Mostramos películas
            if($array["rol"]=='usuario') {
                
                echo "<br><b>Sesión id: </b>"; 
                echo session_id();

                //Consulta
                $consulta = $conexion->prepare("SELECT * FROM produto");
                $consulta->execute();

                if ($consulta->execute() ) {
                    echo"<article id='contenedor'>";
                    echo" <table>
                            <form action='comenta.php' method='get'>
                    ";
                        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                            //Valores
                            $srcImaxe = "imaxes/{$fila['imaxe']}";
                            $botonImaxe = "<button type='submit' class='btn_pelicula' name='btn_pelicula' value='{$fila['idProduto']}'> <img src=$srcImaxe border= '0'/> </button>";
                    
                            echo"
                                <div class='produto'>
                                    <p>$botonImaxe</p>
                                    <p><b>{$fila['nome']}</b></p>
                                </div>
                            ";
                        }
                    echo" </form> </table> <br>";
                    echo"</article>";
                }
            }

            //* Se é ADMINISTRADOR
            if($array["rol"]=='administrador') {

                echo "<br><b>Sesión id: </b>"; 
                echo session_id();
                
                //Xestión de Comentarios: aceptar, borrar.
                echo"
                    <p><form action='xestionaComentarios.php' method='get'>
                        <button type='submit' name='btn_xestionComentarios'>Xestionar Comentarios</button>
                    </form></p>
                ";

                //Xestión de Películas: Alta, baixa, modificación.
                echo"
                    <p><form action='xestionaProdutos.php' method='get'>
                        <button type='submit' name='btn_xestionProdutos'>Xestionar Produtos</button>
                    </form></p>
                ";

                //Xestión de Usuarios: Convertir en admin, banear, borrar.
                echo"
                    <p><form action='xestionaUsuarios.php' method='get'>
                        <button type='submit' name='btn_xestionUsuarios'>Xestionar Usuarios</button>
                    </form></p>
                ";  
            }

        } else echo"<p>Valores de inicio de sesión incorrectos.</p>";

    } else {
        $consulta = null;
        die();
    }

} catch (Exception $e) {
    echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
} finally {
$conexion = null; //! Cerramos conexión
}

?>
