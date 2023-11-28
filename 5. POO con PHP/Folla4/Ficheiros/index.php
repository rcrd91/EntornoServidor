<?php
    include_once('clases/cliente.php');
    include_once('public/funcions.php');


    if(isset($_GET['novo']))
    {
        //TERIAMOS QUE RECOLLER OS VALORES DESDE UN FORMULARIO

        $clientenovo = new Cliente('ana','conxo','ana22@gmail.com');
        insertar($clientenovo);
    }

    if(isset($_GET['todos']))
    {
        listado();
    } 



