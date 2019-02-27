<?php
//poniżej napisz kod definiujący klasę
class Member {

    private $username;
    private $passwd;
    private $accessLevel = 0;

    public function __construct($username, $passwd){
        $this->setUsername($username);
        $this->setPasswd($passwd);
        echo "<br><strong>**Create new object---></strong><br> username: $this->username<br>password: $this->passwd<br>";

    }

    public function setUsername($username){
        if(is_string($username)==true && strlen($username)>=5) {
            $this->username = $username;
        }
        else{

            $this->username=$this->generateRandomString();
        }
    }

    public function setPasswd($passwd){
        if (is_string($passwd) && strlen($passwd)>=5){
            $this->passwd=$passwd;
        }
        else{
            $this->passwd=$this->generateRandomString();
        }
    }

    private function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function info(){
        echo "<br><strong>**Username: </strong>$this->username<br><strong>password: </strong>$this->passwd<br>";


    }

    public function __destruct()
    {
        echo "<br><strong>**Obiekt użytkownika <ins>$this->username</ins> został zniszczony</strong><br>";
    }

}

$m1=new Member('hoflegor','qwerty');
$m1->info();

$m2=new Member('Tom', 'abcd');
$m2->info();

