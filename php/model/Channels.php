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
    public function getAllChannelsNames(){
        $sql = 'SELECT name FROM channels ';
        $check = $this->selectQuery($sql);
        return $check->fetchAll();
    }
    public function getAllChannelsId(){
        $sql = 'SELECT id FROM channels ';
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


    function addNewChannel($name,$desc,$date,$last){
        $sql= 'INSERT INTO channels (name, description, date_of_creation, last_update) VALUES (:name, :description, :date_of_creation, :last_update)';
        $p = [':name'  =>  $name, ':description'  =>  $desc , ':date_of_creation' => $date , ':last_update' => $last];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }

    function modifyChannel($id, $name, $desc, $doc, $date){
        $sql= 'UPDATE channels SET  name = :name, description = :description,  date_of_creation = :date_of_creation, last_update = :last_update  WHERE id = :id';
        $p = [':id'  =>  $id, ':name'  =>  $name, ':description'  =>  $desc , ':date_of_creation'  =>  $doc , ':last_update' => $date ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }

    function deleteChannel($id){
        $sql= 'DELETE FROM channels WHERE id = :id';
        $p = [':id'  =>  $id ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }


}

