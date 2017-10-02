<?php
require_once (__DIR__ . "/conn.php");

class Comment
{

    private $id;
    private $userId;
    private $tweetId;
    private $text;
    private $creationDate;

    public function __construct()
    {
        $this->id = -1;
        $this->userId = "";
        $this->TweetId = "";
        $this->text = "";
        $this->creationDate = "";
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function setTweetId($TweetId)
    {
        $this->TweetId = $TweetId;
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

    public function getTweetId()
    {
        return $this->TweetId;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    static public function loadCommentById(mysqli $conn, $id)
    {
        $sql = "SELECT * FROM comment WHERE id_comment=$id";

        $result = $conn->query($sql);

        if ($result == true) {
            $row = $result->fetch_assoc();

            $loadedComment = new Comment();
            $loadedComment->id = $row['id_comment'];
            $loadedComment->userId = $row['id_user'];
            $loadedComment->tweetId = $row['id_tweet'];
            $loadedComment->text = $row['text'];
            $loadedComment->creationDate = $row['creation_date'];

            return $loadedComment;
        }
        return null;
    }

    static public function loadAllCommentsByTweetId(mysqli $conn, $id)
    {
        $sql = "SELECT * FROM comment WHERE id_tweet=$id ORDER BY creation_date DESC ";
        $ret = [];

        $result = $conn->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {

                $loadedComment = new Comment();
                $loadedComment->id = $row['id_comment'];
                $loadedComment->userId = $row['id_user'];
                $loadedComment->tweetId = $row['id_tweet'];
                $loadedComment->text = $row['text'];
                $loadedComment->creationDate = $row['creation_date'];

                $ret[] = $loadedComment;
            }
        }
        return $ret;
    }

    private function saveToDB(mysqli $conn)
    {
        if ($this->id == -1) {
            $sql = "INSERT INTO comment (id_user, id_tweet, text, creation_date) VALUES 
                  ('$this->userId','$this->tweetId', '$this->text','$this->creationDate')";

            $result = $conn->query($sql);

            if ($result == true) {
                $this->id = $conn->insert_id;
                return true;
            }
        } else {
            $sql = "UPDATE comment SET
                  id_user='$this->userId',
                  id_tweet='$this->tweetId',
                  text='$this->text',
                  creation_date='$this->creationDate'
                  WHERE id_comment='$id'
                  ";

            $result = $conn->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }

    static public function createComment(
        mysqli $conn, $loggedUserId, $tweetId, $text, $creationDate)
    {

        $newComment = new Comment();
        $newComment->setUserId($loggedUserId)
            ->setTweetId($tweetId)
            ->setText($text)
            ->setCreationDate
            ($creationDate->format('Y-m-d // H:i:s'))
            ->saveToDB($conn);

    }
}


//var_dump(Comment::loadAllCommentsByTweetId($conn, 16));
//var_dump(Comment::loadCommentById($conn, 2));

//Comment::createComment($conn,8, 6, 'umbabaraumba', '2016-12-14 14:12:15');
