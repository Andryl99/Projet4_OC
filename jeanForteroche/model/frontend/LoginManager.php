<?php

require_once('model/Manager.php');

class LoginManager extends Manager
{

    
    public function checkLogin($login, $password)
    {
        $db = $this->dbConnect();

        $users = $db->prepare('SELECT login, password FROM userdb WHERE login=? AND password=?');
        $users->execute(array($login, $password));
        
        return $users;

    }
}