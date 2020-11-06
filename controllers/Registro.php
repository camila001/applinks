<?php

namespace controllers;

require_once("../models/Usuario.php");
use models\Usuario as Usuario;

class Registro{
    public $email;
    public $nombre;
    public $clave;

    public function __construct()
    {
        $this->email = $_POST['email'];
        $this->nombre = $_POST['nombre'];
        $this->clave = $_POST['pass'];
    }

    public function registrarUser(){
        session_start();
        if($this->email=="" || $this->nombre=="" || $this->clave==""){
            $_SESSION['error'] = "Complete los campos vacios";
            header("Location: ../registro.php");
            return;
        }
        $modelo = new Usuario();

        $data = ['email'=>$this->email, 'nombre'=>$this->nombre, 'clave'=>$this->clave];

        $count =$modelo->insertarUser($data);

        if($count==1){
            $_SESSION['resp'] = "Usuario Creado!";
        }else{
            $_SESSION['error']="Hubo un error en la base de datos";
        }

        header("Location: ../registro.php");

    }


}

$obj = new Registro();
$obj->registrarUser();