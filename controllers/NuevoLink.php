<?php

namespace controllers;

require_once("../models/Link.php");

use models\Link as Link;

class NuevoLink{
    public $nombre;
    public $link;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
        $this->link = $_POST['link'];
    }

    public function crear(){
        session_start();
        if($this->nombre=="" || $this->link==""){
            $_SESSION['error'] = "Completa los campos";
            header("Location: ../views/nuevo.php");
            return;
        }

        $model = new Link();
        $user = $_SESSION['usuario'];
        $data = ['nombre'=>$this->nombre, 'link'=>$this->link, 'email'=>$user['email']];
        $count = $model->insertarLink($data);

        if($count==1){
            $_SESSION['resp'] = "Añadido!";
        }else{
            $_SESSION['error'] = "Hubo un error :(";
        }
        header("Location: ../views/nuevo.php");
    }

}
$obj = new NuevoLink();
$obj->crear();