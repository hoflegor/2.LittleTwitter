<?php
require_once (__DIR__ . "/conn.php");
class Tweet
{
    private $id;
    private $userId;
    private $text;
    private $creationDate;

    public function __construct()
    {
        $this->id=-1;
        $this->userId="";
        $this->text="";
        $this->creationDate="";
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function savetoDB(mysqli $conn){
        if ($this->id==-1){
            $sql="INSERT INTO tweet (user_id, text, creation_date) VALUES 
                  ('$this->userId', '$this->text','$this->creationDate')";

            $result=$conn->query($sql);

            if ($result==true){
                $this->id=$conn->insert_id;
                return true;
            }
        }
        else{
            $sql="UPDATE tweet SET
                  user_id='$this->userId',
                  text='$this->text',
                  creation_date='$this->creationDate'
                  WHERE tweet_id='$id'
                  ";

            $result=$conn->query($sql);
            if ($result==true){
                return true;
            }
        }
        return false;
    }

    static public function loadTweetById(mysqli $conn, $id){
        $sql="SELECT * FROM tweet WHERE tweet_id=$id";

        $result=$conn->query($sql);

        if ($result == true){
            $row=$result->fetch_assoc();

            $loadedTweet=new Tweet();
            $loadedTweet->id=$row['tweet_id'];
            $loadedTweet->text=$row['text'];
            $loadedTweet->creationDate=$row['creation_date'];

            return $loadedTweet;
        }
        return null;
    }

    static public function loadAllTweetsByUserId(mysqli $conn, $id){
        $sql="SELECT * FROM tweet WHERE user_id=$id";
        $ret=[];

        $result=$conn->query($sql);

        if($result==true  && $result->num_rows!=0){
            foreach ($result as $row) {

                $loadedTweet=new Tweet();
                $loadedTweet->id=$row['tweet_id'];
                $loadedTweet->text=$row['text'];
                $loadedTweet->creationDate=$row['creation_date'];

                $ret[]=$loadedTweet;
            }
        }
        return $ret;
    }

    static public function loadAllTweets(mysqli $conn){
        $sql="SELECT * FROM tweet";
        $ret=[];

        $result=$conn->query($sql);

        if($result==true  && $result->num_rows!=0){
            foreach ($result as $row) {

                $loadedTweet=new Tweet();
                $loadedTweet->id=$row['tweet_id'];
                $loadedTweet->text=$row['text'];
                $loadedTweet->creationDate=$row['creation_date'];

                $ret[]=$loadedTweet;
            }
        }
        return $ret;
    }

}

//$newTweet=new Tweet();
//$newTweet->setUserId(2)->
//            setText("Be inward.")->setCreationDate('2016-12-11');
//var_dump($newTweet);
//
//
//$newTweet2=new Tweet();
//$newTweet->setUserId(2)->
//setText("Disappear and you will be invented wisely.")->setCreationDate('2014-11-10');
//var_dump($newTweet);

//$newTweet3=new Tweet();
//$newTweet3->setUserId(1)->
//setText("Result traps when you love with art.")->setCreationDate('2013-12-14');
//$newTweet3->savetoDB($conn);
//var_dump($newTweet3);
//
//$newTweet->savetoDB($conn);

//var_dump(Tweet::loadTweetById($conn,1));

//var_dump(Tweet::loadAllTweetsByUserId($conn, 2));

//var_dump(Tweet::loadAllTweets($conn));