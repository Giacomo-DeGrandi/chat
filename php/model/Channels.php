<?php


require_once 'Model.php';


// NOTE THAT I?VE ADDED A FOREIGN KEY FOR MESSAGES TABLE
// FROM channel.id to messages.channel_id

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
    public function getChannelIdByName($name){

        $sql = 'SELECT id FROM channels WHERE name = :name';
        $p = [':name'  =>  $name ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();

    }

    function addActiveUser($userId){
        $sql= 'UPDATE channels SET active_users = active_users + :active_users';
        $p = [':active_users'  =>  $userId ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }

}

