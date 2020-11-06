<?php

namespace controllers;

require_once("../models/Usuario.php");
use models\Usuario as Usuario;

class Login{
    private $email;
    private $clave;

    public function __construct()
    {
        $this->email = $_POST['email'];
        $this->clave = $_POST['pass'];
    }

    public function login(){
        session_start();
        if($this->email=="" || $this->clave==""){
            $_SESSION['error'] = "Completa los campos";
            header("Location: ../index.php");
            return;
        }

        $modelo = new Usuario();
        $array = $modelo->buscarUser($this->email, $this->clave);
        //print_r($array);

        if(count($array)==0){
            $_SESSION['error'] = "Email o clave no coinciden";
            header("Location: ../index.php");
            return;
        }

        $_SESSION['usuario'] = $array[0];
        header("Location: ../views/nuevo.php");
    }

}
$obj = new Login();
$obj->login();