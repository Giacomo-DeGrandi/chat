<?php


require_once 'Model.php';



class User extends Model{

    public function checkExists($email){
        $sql= 'SELECT * FROM users WHERE email = :email ; ' ;
        $params = [':email' => $email ];
        $check = $this->selectQuery($sql,$params);
        return $check->fetchAll();
    }

}

