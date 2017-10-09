<?php

require_once (__DIR__ .  '/../utils/conn.php');

class Message
{
    private $id;
    private $senderId;
    private $receiverId;
    private $text;
    private $creationDate;
    private $status;

    public function __construct()
    {
        $this->id=-1;
        $this->senderId="";
        $this->receiverId="";
        $this->text="";
        $this->creationDate="";
        $this->setStatus();
    }

    public function setSenderId($senderId)
    {
        $this->senderId = $senderId;

        return $this;
    }

    public function setReceiverId($receiverId)
    {
        $this->receiverId = $receiverId;

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

    public function setStatus()
    {
        $this->status = 0;
    }



    public function getId()
    {
        return $this->id;
    }

    public function getSenderId()
    {
        return $this->senderId;
    }

    public function getReceiverId()
    {
        return $this->receiverId;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getStatus()
    {
        return $this->status;
    }



    public function savToDB(mysqli $conn){
        if($this->id=-1){
            $sql="
              INSERT INTO messages (id_sender, id_receiver, text, creation_date, status)
              VALUES ($this->senderId, $this->receiverId, '$this->text', '$this->creationDate', $this->status)";

            var_dump($sql);

            $result=$conn->query($sql);

            if ($result==true){
                return true;
            }
                return false;
        }
    }

    static public function loadAllMessagesBySenderId($conn, $senderId){

        $sql="SELECT * FROM messages WHERE id_sender = $senderId";

        $ret=[];

        $result=$conn->query($sql);

        if ($result==true){
            foreach ($result as $row){
                $loadedMessage=new message();
                $loadedMessage->id=$row['id_message'];
                $loadedMessage->senderId=$row['id_sender'];
                $loadedMessage->receiverId=$row['id_receiver'];
                $loadedMessage->text=$row['text'];
                $loadedMessage->creationDate=$row['creation_date'];
                $loadedMessage->status=$row['status'];

                $ret[]=$loadedMessage;
            }
        }
        return $ret;
    }

    static public function loadAllMessagesSendOrReceive($conn,$id){

        $sql="SELECT * FROM messages WHERE id_receiver = $id OR id_sender=$id ORDER BY id_message";

        $ret=[];

        $result=$conn->query($sql);

        if ($result==true){
            foreach ($result as $row){
                $loadedMessage=new message();
                $loadedMessage->id=$row['id_message'];
                $loadedMessage->senderId=$row['id_sender'];
                $loadedMessage->receiverId=$row['id_receiver'];
                $loadedMessage->text=$row['text'];
                $loadedMessage->creationDate=$row['creation_date'];
                $loadedMessage->status=$row['status'];

                $ret[]=$loadedMessage;
            }
        }
        return $ret;

    }

    static public function loadAllMessagesByReceiverId($conn, $receiverId){

        $sql="SELECT * FROM messages WHERE id_receiver = $receiverId";

        $ret=[];

        $result=$conn->query($sql);

        if ($result==true){
            foreach ($result as $row){
                $loadedMessage=new message();
                $loadedMessage->id=$row['id_message'];
                $loadedMessage->senderId=$row['id_sender'];
                $loadedMessage->receiverId=$row['id_receiver'];
                $loadedMessage->text=$row['text'];
                $loadedMessage->creationDate=$row['creation_date'];
                $loadedMessage->status=$row['status'];

                $ret[]=$loadedMessage;
            }
        }
        return $ret;
    }

    static public function setRead(mysqli $conn, $id){
        $sql="UPDATE messages SET status=1 WHERE id_message=$id";

        $result=$conn->query($sql);

        if ($result==true){
            return true;
        }
        return false;
    }

    static public function newMessage(mysqli $conn, $senderId, $receiverId, $text, $creationDate){

        $newMessage=new Message();

        $newMessage->setSenderId($senderId)
            ->setReceiverId($receiverId)
            ->setText($text)
            ->setCreationDate
                ($creationDate->format('Y-m-d // H:i:s'))
            ->savToDB($conn);

        return $newMessage;

    }

    public static function loadUnreadById($conn,$id){
        $sql="SELECT * FROM messages WHERE id_receiver=$id AND status=0";

        $ret = [];

        $result = $conn->query($sql);

        if ($result == true && $result->num_rows != 0) {

            foreach ($result as $row) {
                $loadedMessage = new message();
                $loadedMessage->id = $row['id_message'];
                $loadedMessage->senderId = $row['id_sender'];
                $loadedMessage->receiverId = $row['id_receiver'];
                $loadedMessage->text = $row['text'];
                $loadedMessage->creationDate = $row['creation_date'];
                $loadedMessage->status = $row['status'];

                $ret[] = $loadedMessage;
            }
        }
        return $ret;
    }

    static public function countUnreadByUserId(mysqli $conn, $id){

        $sql="SELECT * FROM messages WHERE id_receiver=$id AND status=0";
        $result=$conn->query($sql);

        if ($result==true) {
            $counter = $result->num_rows;

            return $counter;
        }

            return false;

    }

}
//
//var_dump(Message::newMessage($conn, 8,9,'YesYesYes', '2016-12-20 12:37:18'));
//Message::newMessage($conn, 8,9,'Proud, cloudy vogons oddly fight a united, neutral klingon,','2016-12-20 12:37:17');

//var_dump(Message::loadAllMessagesSendOrReceive($conn, 8));