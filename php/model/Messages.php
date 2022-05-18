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

    public function getAllMessages(){

        $sql = 'SELECT * FROM messages';
        $check = $this->selectQuery($sql);
        return $check->fetchAll();
    }

    public function getMessageById($id){

        $sql = 'SELECT * FROM messages WHERE id = :id';
        $p = [':id'  =>  $id ];
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

        $sql = 'SELECT  messages.id, messages.sent_by, messages.date, messages.content, messages.id_channel,
                        users.name, users.id
                        FROM messages
                        INNER JOIN users ON messages.sent_by = users.id
                        WHERE messages.id_channel = :id_channel';
        $p = [':id_channel'  =>  intval($channelId) ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }

    public function deleteMessage($id)
    {
        $sql = "DELETE FROM messages WHERE id = :id";
        $p = [':id' => $id ];
        $result = $this->selectQuery($sql,$p);
        return $result->fetchAll();

    }

    public function deleteAllUsersMessagesByUserId($id_user)
    {
        $sql = "DELETE FROM messages WHERE sent_by = :sent_by";
        $p = [':sent_by' => $id_user ];
        $result = $this->selectQuery($sql,$p);
        return $result->fetchAll();

    }
    public function deleteAllChannelMessages($id_channel)
    {
        $sql = "DELETE FROM messages WHERE id_channel = :id_channel";
        $p = [':id_channel' => $id_channel ];
        $result = $this->selectQuery($sql,$p);
        return $result->fetchAll();

    }

    function countMessagesByChannel($id_channel){
        $sql= 'SELECT COUNT(id_channel) FROM messages WHERE id_channel = :id_channel';
        $p = [':id_channel'  =>  $id_channel ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }


    public function modifyMessages( $id, $content, $id_channel){
        $sql = 'UPDATE messages SET content = :content, id_channel = :id_channel WHERE id = :id ' ;
        $params = ([':id' => $id, ':content' => $content, ':id_channel' => $id_channel]);
        $result = $this->selectQuery($sql, $params);
        return $result->fetchAll();
    }

    function getLastActivity($id_channel){
        $sql= 'SELECT MAX(date) AS "Last Activity" FROM messages WHERE id_channel = :id_channel';
        $p = [':id_channel'  =>  $id_channel ];
        $check = $this->selectQuery($sql,$p);
        return $check->fetchAll();
    }

}

