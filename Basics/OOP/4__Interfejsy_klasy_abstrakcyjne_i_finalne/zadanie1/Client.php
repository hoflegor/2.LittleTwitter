<?php
include_once 'User.php';

class Client extends User {
    public function checkLogin(string $username, string $password) : bool{
        if ($this->loginFails <3){
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
        if (strlen($password) >=8){
            $this->password = $password;
            return true;
        }
        return false;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setAge(int $age) : bool{
        if(is_int($age) && $age >18){
            $this->age = $age;
            return true;
        }
        return false;
    }
}