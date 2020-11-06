<?php

namespace controllers;

require_once("../models/Link.php");

use models\Link as Link;

class EliminarLink{
    public $bt_delete;
    
    public function __construct()
    {
        $this->bt_delete = $_POST['bt_delete'];
    }

    public function eliminar(){
        $modelo = new Link();
        $modelo->eliminarLink($this->bt_delete);
        header("Location: ../views/nuevo.php");
    }
}
$obj = new EliminarLink();
$obj->eliminar();