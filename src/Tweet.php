<?php

class Tweet
{
    private $id;
    private $userId;
    private $text;
    private $creationDate;

    public function __construct()
    {
        $this->id = -1;
        $this->userId = "";
        $this->text = "";
        $this->creationDate = "";
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

    private function savetoDB(mysqli $conn)
    {
        if ($this->id == -1) {
            $sql = "INSERT INTO tweet (id_user, text, creation_date) VALUES 
                  ('$this->userId', '$this->text','$this->creationDate')";

            $result = $conn->query($sql);

            if ($result == true) {
                $this->id = $conn->insert_id;
                return true;
            }
        }

        return false;
    }

    static public function loadTweetById(mysqli $conn, $id)
    {
        $sql = "SELECT * FROM tweet WHERE id_tweet=$id";

        $result = $conn->query($sql);

        if ($result == true) {
            $row = $result->fetch_assoc();

            $loadedTweet = new Tweet();
            $loadedTweet->id = $row['id_tweet'];
            $loadedTweet->userId = $row['id_tweet'];
            $loadedTweet->text = $row['text'];
            $loadedTweet->creationDate = $row['creation_date'];

            return $loadedTweet;
        }
        return null;
    }

    static public function loadAllTweetsByUserId(mysqli $conn, $id)
    {
        $sql = "SELECT * FROM tweet WHERE id_user=$id ORDER BY id_tweet DESC";
        $ret = [];

        $result = $conn->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {

                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id_tweet'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creation_date'];

                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }

    static public function loadAllTweets(mysqli $conn)
    {
        $sql = "SELECT * FROM tweet  ORDER BY id_tweet DESC";
        $ret = [];

        $result = $conn->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {

                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id_tweet'];
                $loadedTweet->userId = $row['id_user'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creation_date'];

                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }

    static public function createTweet(
        mysqli $conn, $loggedUserId, $tweet, $creationDate)
    {

        $newTweet = new Tweet();
        $newTweet->setUserId($loggedUserId)
            ->setText($tweet)
            ->setCreationDate
            ($creationDate->format('Y-m-d // H:i:s'))
            ->savetoDB($conn);

    }


    static public function countTweetByUserId(mysqli $conn, $id)
    {

        $sql = "SELECT * FROM tweet WHERE id_user=$id";
        $result = $conn->query($sql);

        $counter = $result->num_rows;

        return $counter;

    }

}