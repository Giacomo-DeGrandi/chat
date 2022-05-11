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

    public function subscribeUser($username, $email, $password, $rights, $dob, $data1){

        $sql = "INSERT INTO `users`(`name`, `email`, `password`, `rights`, `dob`, `data1`) 
                VALUES (:name,:email,:password,:rights,:dob,:data1)";

        $password = password_hash($password, PASSWORD_ARGON2ID);
        $params = ([':name' => $username, ':email' => $email,
            ':password' => $password, ':rights' => $rights,
            ':dob' => $dob, ':data1' => $data1]);
        $this->selectQuery($sql, $params);
    }

    public function getUserInfosByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = [':email' => $email ];
        $result = $this->selectQuery($sql, $params);
        $result = $result->fetchAll();
        return $result;
    }



}

