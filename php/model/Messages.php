<?php


require_once 'Model.php';

class Messages extends Model{

    function __construct(){}

    public function getAllMessagesByUserId($id){

        $sql = 'SELECT * FROM messages WHERE sent_by = :sent_by';
        $p = [':sent_by'  =>  $id ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }

    public function getAllMessagesByChannel($channelId){

        $sql = 'SELECT * FROM channels WHERE id = :id';
        $p = [':id'  =>  $channelId ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();

    }

}

