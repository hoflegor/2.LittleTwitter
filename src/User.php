<?php

require_once (__DIR__ . "/conn.php");

class User
{
    private $id;
    private $username;
    private $hashedPassword;
    private $email;

    public function __construct()
    {
        $this->id = -1;
        $this->username = "";
        $this->email = "";
        $this->hashedPassword = "";
    }

    public function setPassword($newPassword)
    {
        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $this->hashedPassword = $newHashedPassword;
        return $this;
    }

    public function setUsername( $username)
    {
        $this->username = $username;
        return $this;
    }

    public function setEmail( $email)
    {
        $this->email = $email;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function saveToDB(mysqli $conn){
        if ($this->id == -1){
            //Saving to DB
            $sql = "INSERT INTO users (username, email, hashed_password) VALUES
                  ('$this->username', '$this->email', '$this->hashedPassword')";

            $result = $conn->query($sql);

            if ($result == true){
                $this->id = $conn->insert_id;
                return true;
            }
        }
        else{
            $sql="UPDATE users SET
                  username='$this->username',
                  email='$this->email',
                  hashed_password='$this->hashedPassword'
                  WHERE id=$this->id";

            $result=$conn->query($sql);
            if ($result==true){
                return true;
            }
        }
        return false;
    }

    static public function loadByUserId(mysqli $conn, $id){
        $sql="SELECT * FROM users WHERE id=$id";

        $result=$conn->query($sql);

        if ($result == true){
            $row=$result->fetch_assoc();

            $loadedUser=new User();
            $loadedUser->id=$row['id'];
            $loadedUser->username=$row['username'];
            $loadedUser->email=$row['email'];
            $loadedUser->hashedPassword=$row['hashed_password'];

            return $loadedUser;

        }
        return null;
    }

    static public function loadAllUsers(mysqli $conn){
        $sql="SELECT * FROM users";
        $ret=[];

        $result = $conn->query($sql);

        if ($result==true && $result->num_rows!=0){
            foreach ($result as $row){
                $loadedUser = new User();
                $loadedUser->id=$row['id'];
                $loadedUser->username=$row['username'];
                $loadedUser->email=$row['email'];
                $loadedUser->hashedPassword=$row['hashed_password'];

                $ret[]=$loadedUser;
            }
        }
        return $ret;
    }

    public function delete(mysqli $conn){
        if ($this->id !=1){
            $sql="DELETE FROM users WHERE id=$this->id";

            $result=$conn->query($sql);
            if ($result==true){
                $this->id=-1;
                return true;
            }
            return false;
        }
        return true;
    }

}

//$newUser = new User();
//$newUser->setUsername("Hoff");
//$newUser->setEmail("fake@lorem.eu");
//$newUser->setPassword("qwerta1234");
//$newUser->saveToDB($conn);
//
//$newUser = new User();
//$newUser->setUsername("ThatMan");
//$newUser->setEmail("fake@ipsum.eu");
//$newUser->setPassword("lalalalal");
//$newUser->saveToDB($conn);

//var_dump (User::loadByUserId($conn,1));
//var_dump (User::loadByUserId($conn,2));
//var_dump (User::loadByUserId($conn,666));

//var_dump(User::loadAllUsers($conn));
//
//User::loadByUserId($conn,1)
//    ->setUsername("Me")->setEmail('new@mail.com')->setPassword('abcd')
//    ->saveToDB($conn);
//
//var_dump(User::loadByUserId($conn,1));

//$newUser = new User();
//$newUser->setUsername("KillMe");
//$newUser->setEmail("fake@kill.eu");
//$newUser->setPassword("sialalalalal");
//$newUser->saveToDB($conn);
