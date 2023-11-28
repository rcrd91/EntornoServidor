<?php

class Cliente {
    protected $nome;
    protected $apelidos;
    protected $email;
    const TABLA = 'clientes';

    public function __construct($nom, $apel, $mail)
    {
        $this->nome = $nom;
        $this->apelidos = $apel;
        $this->email = $mail;
    }

}