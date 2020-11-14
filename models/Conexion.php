<?php

namespace models;

use PDO;
use PDOException;

class Conexion{
    public static $user="u0a8gx0fo3vx0f4w";
    public static $pass="w5xjEIs5DkBpEi5Ab98H";
    public static $URL="mysql:host=byocusmhxphlnbdfj4x8-mysql.services.clever-cloud.com;dbname=byocusmhxphlnbdfj4x8";

    public static function conector(){
        try{
            return new \PDO(Conexion::$URL,Conexion::$user,Conexion::$pass);
        }catch(PDOException $e){
            return null;
        }
    }


}