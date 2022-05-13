<?php


require_once 'Model.php';

class Messages extends Model{

    function __construct(){}

    public function write($user_id,$content,$date,$id_channel){
        $sql = "INSERT INTO messages (sent_by, date, content, id_channel) 
                VALUES (:sent_by,:date,:content,:id_channel)";
        $p = [':sent_by'  =>  $user_id , ':date'  =>  $date,  ':content'  =>  $content,  ':id_channel'  =>  $id_channel ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }

    public function getAllMessagesByUserId($id){

        $sql = 'SELECT * FROM messages WHERE sent_by = :sent_by';
        $p = [':sent_by'  =>  $id ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }

    public function getAllMessagesByChannel($channelId){

        $sql = 'SELECT  messages.id, messages.sent_by, messages.date, messages.content,
                        users.name
                        FROM messages
                        INNER JOIN users ON messages.sent_by = users.id
                        WHERE id_channel = :id_channel';
        $p = [':id_channel'  =>  $channelId ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();

    }

}

