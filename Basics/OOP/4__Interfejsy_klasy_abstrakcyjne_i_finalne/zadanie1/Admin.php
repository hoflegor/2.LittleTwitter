<?php
include_once 'User.php';

class Admin extends User {
    public function checkLogin(string $username, string $password) : bool{
        $ip = explode("." , $_SERVER['REMOTE_ADDR']);
        if (($this->loginFails <3) && ($ip[0] == 127 || $ip[0] == 192)){
            if (($this->username == $username) && ($this->password == $password)){
                return true;
            }
            else{
                $this->loginFails +=1;
                return false;
            }
        }
        else{
            echo "account blocked";
            return false;
        }
    }
    public function setPassword(string $password) : bool{
        if (strlen($password) >=10){
            $this->password = $password;
            return true;
        }
        return false;
    }
    public function setAge(int $age) : bool{
        if(is_int($age) && $age >21){
            $this->age = $age;
            return true;
        }
        return false;
    }
}