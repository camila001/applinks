<?php

namespace models;

require_once("Conexion.php");

class Link{

    public function insertarLink($data){
        $stm = Conexion::conector()->prepare("INSERT INTO links VALUES(NULL,:A,:B,:C)");
        $stm->bindParam(":A",$data['nombre']);
        $stm->bindParam(":B",$data['link']);
        $stm->bindParam(":C",$data['email']);
        return $stm->execute();
    }

    public function getAllLinks($email){
        $stm = Conexion::conector()->prepare("SELECT * FROM links WHERE emailFK=:A");
        $stm->bindParam(":A",$email);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function eliminarLink($id){
        $stm = Conexion::conector()->prepare("DELETE FROM links WHERE id=:A");
        $stm->bindParam(":A",$id);
        return $stm->execute();
    }

}