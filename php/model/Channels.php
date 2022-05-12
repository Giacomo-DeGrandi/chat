<?php


require_once 'Model.php';

class Channels extends Model{

    function __construct(){}

    public function getAllChannels(){

        $sql = 'SELECT * FROM channels';
        $check = $this->selectQuery($sql);
        return $check->fetchAll();
    }

    public function getChannelById($id){

        $sql = 'SELECT * FROM channels WHERE id = :id';
        $p = [':id'  =>  $id ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();

    }

}

