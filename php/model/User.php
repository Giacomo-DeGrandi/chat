<?php


require_once 'Model.php';

class User extends Model{


    function __construct(){}

    public function checkExists($email)
    {

        $sql= 'SELECT * FROM users WHERE email = :email ; ' ;
        $params = [':email' => $email ];
        $check = $this->selectQuery($sql,$params);
        return $check->fetchAll();
    }

    public function checkExistsUpdate($email,$id)
    {
        $sql= 'SELECT * FROM users WHERE email = :email AND id != :id ' ;
        $params = [':email' => $email, ':id' => intval($id) ];
        $check = $this->selectQuery($sql,$params);
        return $check->fetchAll();
    }

    public function subscribeUser($username, $email, $password, $rights, $dob, $data1, $connected){

        $sql = "INSERT INTO `users`(`name`, `email`, `password`, `rights`, `dob`, `data1`, `connected`) 
                VALUES (:name,:email,:password,:rights,:dob,:data1, :connected)";

        $password = password_hash($password, PASSWORD_ARGON2ID);
        $params = ([':name' => $username, ':email' => $email,
            ':password' => $password, ':rights' => $rights,
            ':dob' => $dob, ':data1' => $data1 , ':connected' => $connected]);
        $this->selectQuery($sql, $params);
    }

    public function getUserInfosByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = [':email' => $email ];
        $result = $this->selectQuery($sql,  $params);
        return $result->fetchAll();
    }

    public function getUserInfosById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = [':id' => $id ];
        $result = $this->selectQuery($sql,  $params);
        return $result->fetchAll();
    }

    public function getNameById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = [':id' => $id ];
        $result = $this->selectQuery($sql,  $params);
        return $result->fetchAll();
    }

    public function userConnected($email)
    {
        $sql = "UPDATE `users` SET `connected`= '1' WHERE email = :email";
        $params = [':email' => $email ];
        $result = $this->selectQuery($sql, $params);
        return $result->fetchAll();
    }

    public function userDisconnect($id)
    {
        $sql = "UPDATE `users` SET `connected`= '0' WHERE id = :id";
        $params = [':id' => $id ];
        $result = $this->selectQuery($sql, $params);
        return $result->fetchAll();
    }


    public function getAllActiveUserName()
    {
        $sql = "SELECT name FROM `users` WHERE `connected`= '1'";
        $result = $this->selectQuery($sql);
        return $result->fetchAll();
    }

    public function getActiveUserCount($id)
    {
        $sql = "UPDATE `users` SET `connected`= '0' WHERE id = :id";
        $params = [':id' => $id ];
        $result = $this->selectQuery($sql, $params);
        return $result->fetchAll();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM `users` ";
        $result = $this->selectQuery($sql);
        return $result->fetchAll();
    }

    public function getAllRights()
    {
        $sql = "SELECT rights FROM `users` ";
        $result = $this->selectQuery($sql);
        return $result->fetchAll();

    }

    public function getUserNameById($id)
    {
        $sql = "SELECT name FROM users WHERE id = :id";
        $params = [':id' => $id ];
        $result = $this->selectQuery($sql, $params);
        return $result->fetchAll();
    }

    public function submitUpdateUser($name, $email, $pw,$id){
        $sql = 'UPDATE `users` SET `name`=:name,`email`=:email ,`password`= :password WHERE id =:id';
        $pw = password_hash($pw, PASSWORD_ARGON2ID);
        $params = ([':id' => intval($id), ':name' => $name, ':email' => $email, ':password' => $pw]);
        $result = $this->selectQuery($sql, $params);
        return $result->fetchAll();
    }


    public function modifyUser($id, $name, $email,$data,  $rights, $connected){
        $sql = 'UPDATE `users` SET `name`=:name, `email`=:email, `rights`=:rights, `data1`=:data1, `connected`=:connected WHERE `id`=:id' ;
        $params = ([':id' => $id, ':name' => $name, ':email' => $email, ':rights' => $rights,
            ':data1' => $data , ':connected' => $connected]);
        $result = $this->selectQuery($sql, $params);
        return $result->fetchAll();
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $p = [':id' => $id ];
        $result = $this->selectQuery($sql,$p);
        return $result->fetchAll();
    }



}

