<?php
//poniżej napisz kod definiujący klasę

require_once (__DIR__ . '/../Dzien_1/Course.php');

class OnlineCourse extends Course
{

    const TOKEN_LENGTH = 8;

    private $link;
    private $accessToken;
    private $accessTime;

    public function __construct()
    {
        $this->accessToken=$this->setAccessToken();
    }

    public function setAccessToken()
    {
        return $this->generateAccessToken();

    }

    public function setLink($link)
    {
        if (!is_string($link)) {
            echo "<br>Wrong input - link !!!!<br>";
            return false;
        }
        return $this->link = $link;
    }

    public function setAccessTime($date){
        $dateObject = new DateTime($date);
        if (isset($dateObject)){
            $dateFormatted = $dateObject->format('Y-m-d H:i:s');
            $this->accessTime = $dateFormatted;
        }
        return $this;
    }

    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function generateAccessToken(){
        return $this->generateRandomString(self::TOKEN_LENGTH);
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getAccessTime()
    {
        return $this->accessTime;
    }

}

$oc1=new OnlineCourse();
var_dump($oc1);