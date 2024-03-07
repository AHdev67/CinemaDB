<?php

namespace Model;

// abstract class, will never be called upon in the code.
abstract class Connect {

    const HOST = "localhost";
    const DB = "antoine_cinema";
    const USER = "root";
    const PASS = "";

    // static function  tied to the class, won't need object creation 
    public static function Connexion(){
        try {
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
        } 
        catch(\PDOException $ex){
            return $ex->getMessage();
        }
        
    }
}
