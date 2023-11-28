<?php

include_once('../modelo/Conexion.php');
include_once('../modelo/Cliente.php');

class ClienteModelo extends Cliente  {

    #Constructor

    public function engadir() :PDOStatement {

        try {
            $conexion = new Conexion;
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdoSt = $conexion->prepare("INSERT INTO clientes (nome, apelidos, email) VALUES (:nome, :apelidos, :email)");     
            $pdoSt->bindParam(':nome', $this->nome);
            $pdoSt->bindParam(':apelidos', $this->apelidos);
            $pdoSt->bindParam(':email', $this->email);  
            $pdoSt->execute();
            
        } catch (Exception $e) {
            echo 'Erro na conexión á BD',  $e->getMessage();
        }

        return $pdoSt;
    }

    
    static function todo() :PDOStatement {

        try {
            $conexion = new Conexion();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdoSt = $conexion->prepare("SELECT * FROM clientes");       
            $pdoSt->execute();
            
        } catch (Exception $e) {
            echo 'Erro na conexión á BD',  $e->getMessage();
        }

        return $pdoSt;
    }


    static function buscar($email) :PDOStatement {

        try {
            $conexion = new Conexion;
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdoSt = $conexion->prepare("SELECT * FROM clientes WHERE email = ? ");     
            $pdoSt->bindParam(1, $email);
            $pdoSt->execute();
            
        } catch (Exception $e) {
            echo 'Erro na conexión á BD',  $e->getMessage();
        }

        return $pdoSt;
    }

    static function borrar($email) :PDOStatement {

        try {
            $conexion = new Conexion;
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdoSt = $conexion->prepare("DELETE FROM clientes WHERE email = ? ");     
            $pdoSt->bindParam(1, $email);
            $pdoSt->execute();
            
        } catch (Exception $e) {
            echo 'Erro na conexión á BD',  $e->getMessage();
        }

        return $pdoSt;
    }

    static function actualizar($nome, $apelidos, $emailNovo, $email) :PDOStatement {

        try {
            $conexion = new Conexion;
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdoSt = $conexion->prepare("UPDATE clientes SET nome = ?, apelidos = ?, email = ? WHERE email = ? ");     
            $pdoSt->bindParam(1, $nome);
            $pdoSt->bindParam(2, $apelidos);
            $pdoSt->bindParam(3, $emailNovo);
            $pdoSt->bindParam(4, $email);
            $pdoSt->execute();
            
        } catch (Exception $e) {
            echo 'Erro na conexión á BD',  $e->getMessage();
        }

        return $pdoSt;
    }
    
}


?>