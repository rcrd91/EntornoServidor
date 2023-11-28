<?php
include_once('Conexion.php');

class Cliente
{
    private $nome;
    private $apelidos;
    private $email;
    const TABLA = 'clientes';

    public function __construct($nom, $apel, $mail)
    {
        $this->nome = $nom;
        $this->apelidos = $apel;
        $this->email = $mail;
    }

    public function mostra()
    {
        echo "Nome:{$this->nome}, apelidos:{$this->apelidos}, email:{$this->email} <br>";


    }
    
    
    /* PARA Insertar un obxecto*/ 
    public function gardar()
    {
       $conexion = new Conexion();
    
       try {
       $pdoStmt = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nome, apelidos,email) VALUES(:nome, :apelidos, :email)');
       $pdoStmt->bindParam(':nome', $this->nome);
       $pdoStmt->bindParam(':apelidos', $this->apelidos);
       $pdoStmt->bindParam(':email', $this->email);
       $pdoStmt->execute();
       } catch (PDOException $e) {
           die ("Houbo un erro coa inserción: ". $e->getMessage());
       }
       $conexion = null;
       return true; //Se todo foi ben devolver true
    }
    //DEVOLVE un array con todos os clientes da táboa. Método de clase
    public static function devolveTodos() : PDOStatement
    {
        $conexion = new Conexion();
        try {
            $consulta = "select * from clientes";
            $pdoStmt = $conexion->prepare($consulta); 
            $pdoStmt->execute(); 

        } catch (PDOException $e) {
            die ("Houbo un erro en devolveTodos". $e->getMessage());
        }
        return $pdoStmt; //DEVOLVEMOS TODAS AS FILAS nun PDOStatement

    }



}
