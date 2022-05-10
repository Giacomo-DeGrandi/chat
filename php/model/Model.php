<?php


abstract class Model {

    private $conn;

    function getConn(){

        $server="localhost";
        $username="root";
        $password="";
        $database="little_discord";

        $dsn = "mysql:host=$server;dbname=$database;charset=UTF8";
        $this->conn = new PDO($dsn, $username, $password);
        return $this->conn;
    }

    public function selectQuery($sql,$params = null){

        if($params === null){
            $result = $this->getConn()->query($sql);
        } else {
            $result = $this->getConn()->prepare($sql);
            $result->execute($params);

        }
        return $result;
    }


}