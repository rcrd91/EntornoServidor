<?php
session_start();

//Configuración
require('config/config.php');

//Botón Cerrar sesión
echo"
    <form action='pechaSesion.php'>
        <p><button type='submit' id='crimson' name='btn_pecharSesion'>Cerrar sesión</button></p>
    </form>
";

//Botón Páxina Principal
echo"<p><a href='mostra.php'><button>Xestión</button></a></p><hr>";

//Base de datos
$servidor='db';
$usuario= 'tarefa';
$pass='Tarefa4.7';
$db='tarefa4.7'; 

try {
    //! Abrimos conexión
    $conexion = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8mb4", $usuario, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //* Xestionar Produtos
    if (isset($_GET["btn_xestionProdutos"])){  
        echo"
            <form action='xestionaProdutos.php' method='get'>
                <input type='submit' value='Alta' name='btn_alta'/>
                <input type='submit' value='Baixa' name='btn_baixa'/>
                <input type='submit' value='Modificación' name='btn_modificacion'/>
            </form> 
        ";  
    }

    //* Formulario Alta Produtos
    if (isset($_GET["btn_alta"])){  
        echo"
            <fieldset>
            <form action='xestionaProdutos.php' method='post' enctype='multipart/form-data'>
                <input type='text' name='in_nome' autofocus placeholder='Nome' required> <br><br>
        
                <input type='text' name='in_familia' autofocus placeholder='Familia' required> <br><br>

                <textarea name='in_descricion' cols='25' rows='8' autofocus placeholder='Descrición' required
                pattern='^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$'></textarea> <br><br>
                
                <input type='file' name='src_imaxe'/><br><br>
                <input type='submit' value='Engadir' name='btn_engadir'/>
                <input type='reset' value='Limpar'>
            </form> 
            </fieldset>
        ";  
    }

    //* Formulario boton Engadir
    if (isset($_POST["btn_engadir"])){  

        //Valores
        $in_nome = $_POST["in_nome"];
        $in_descricion = $_POST["in_descricion"];
        $in_familia = $_POST["in_familia"];
        $tmp_name = $_FILES['src_imaxe']['tmp_name'];

        if (is_uploaded_file($tmp_name)) {

            $img_file = $_FILES['src_imaxe']['name']; 
            $img_type = $_FILES['src_imaxe']['type']; 

            // Extensión .png ou .jpg/.jpeg
            if (((strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))) {

                if (move_uploaded_file($tmp_name, "imaxes/". $img_file)) {

                    //Consulta
                    $consulta = $conexion->prepare("INSERT INTO produto (nome, descricion, familia, imaxe ) VALUES (?, ?, ?, ?) ");
                    $consulta->bindParam(1, $in_nome);
                    $consulta->bindParam(2, $in_descricion);
                    $consulta->bindParam(3, $in_familia);
                    $consulta->bindParam(4, $img_file);
                    
                    if($consulta->execute()) {
                        echo "Película engadida correctamente." ; 
                    } else echo "Película non engadida.";

                } 
            } else echo "Non se puido subir o ficheiro polo tipo de extensión. So se permiten ficheiros jpg/jpeg ou png";
        }
    }

    //* -----------------------------------------------------------------------------------------------------------------------

    //* Select Borrar Produto
    if (isset($_GET["btn_baixa"])){  

        $consulta = $conexion->prepare("SELECT * FROM produto"); 
        $consulta->execute();
   
        echo"
           <form action='xestionaProdutos.php' method='get'>
   
               <select name='sel_produto'>
       ";
                   while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){ 
                   echo "<option value='{$fila['idProduto']}'> {$fila['idProduto']} | {$fila['nome']} </option> ";
                   }
       echo"
               </select>
               <input type='submit' value='Borrar' name='btn_borrar'/>
           </form>
       ";       
    }

    //* Botón "Borrar"
    if (isset($_GET["btn_borrar"])){

        //Valores
        $sel_produto = $_GET["sel_produto"];

        //Consulta
        $consulta = $conexion->prepare("DELETE FROM produto WHERE idProduto = ? ");
        $consulta->bindParam(1, $sel_produto);
        $consulta->execute();

        if( $consulta == true )
            echo "Película borrada.";
        else echo "Error" ;
    }
  
    //* -----------------------------------------------------------------------------------------------------------------------


    //* Select Modificar Produto
    if (isset($_GET["btn_modificacion"])){  

        $consulta = $conexion->prepare("SELECT * FROM produto"); 
        $consulta->execute();
   
        echo"
           <form action='xestionaProdutos.php' method='get'>
   
               <select name='sel_produto'> 
       ";
                   while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){ 
                   echo "<option value='{$fila['idProduto']}'> {$fila['idProduto']} | {$fila['nome']} </option> ";
                   }
       echo"
               </select>
               <input type='submit' value='Seleccionar' name='btn_seleccionar'/>
           </form>
       ";       
    }

    //* Formulario Modificar produto
    if (isset($_GET["btn_seleccionar"])){

        //Valores
        $sel_produto = $_GET['sel_produto'];

        echo"
            <fieldset>
            <form action='xestionaProdutos.php' method='post' enctype='multipart/form-data'>

                <p><input type='input' autofocus placeholder='Nome' name='in_nome' required/></p>
                <p><textarea name='in_descricion' cols='25' rows='8' autofocus placeholder='Descrición' required
                pattern='^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$'></textarea></p>
                <p><input type='input' autofocus placeholder='Familia' name='in_familia' required/><br></p>
                <p><input type='file' name='src_imaxe' required/><br></p>

                <button type='submit' name='btn_modificar' value='{$sel_produto}'>Modificar</button>
            </form>
            </fieldset>
        ";
    }

    //* Botón "Modificar"
    if (isset($_POST["btn_modificar"])){

        //Valores
        $btn_modificar = $_POST["btn_modificar"];
        $in_nome = $_POST["in_nome"];
        $in_descricion = $_POST["in_descricion"];
        $in_familia = $_POST["in_familia"];
        $tmp_name = $_FILES['src_imaxe']['tmp_name'];

        if (is_uploaded_file($tmp_name)) {

            $img_file = $_FILES['src_imaxe']['name']; 
            $img_type = $_FILES['src_imaxe']['type']; 

            // Extensión .png ou .jpg/.jpeg
            if (((strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))) {

                if (move_uploaded_file($tmp_name, "imaxes/". $img_file)) {

                    //Consulta
                    $consulta = $conexion->prepare("UPDATE produto SET nome = ?, descricion = ?, familia = ?, imaxe = ? WHERE idProduto = ?");
                    $consulta->bindParam(1, $in_nome);
                    $consulta->bindParam(2, $in_descricion);
                    $consulta->bindParam(3, $in_familia);
                    $consulta->bindParam(4, $img_file);
                    $consulta->bindParam(5, $btn_modificar);

                    if($consulta->execute()) {
                        echo "Película Modificada correctamente." ; 
                    } else echo "Non Modificada.";

                } 
            } else echo "Non se puido subir o ficheiro polo tipo de extensión. So se permiten ficheiros jpg/jpeg ou png";
        } 
    }
}

catch (Exception $e) {
   echo "Erro ao conectar co servidor MySQL: ". $e->getMessage();
}

finally {
$conexion = null; //! Cerramos conexión
}


?>