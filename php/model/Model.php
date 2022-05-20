<?php


abstract class Model {

    private $conn;

    function connect(){


        /*
        $server="localhost";
        $username="root";
        $password="";
        $database="new_discord";
                    */


        $server="localhost:3306";
        $username="digitree";
        $password="@LaPlateforme92.@";
        $database="carlo-de-grandi-giacomo_little_discord";


        $dsn = "mysql:host=$server;dbname=$database;charset=UTF8";
        $this->conn = new PDO($dsn, $username, $password);
        return $this->conn;
    }

    function selectQuery($sql, $p = null){
        if ($p === null) {
            $r = $this->connect()->query($sql);
        } else {
            $r = $this->connect()->prepare($sql);
            $r -> execute($p);
        }
        return $r;
    }

}