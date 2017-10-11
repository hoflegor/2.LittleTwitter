<?php

class User
{
    private $id;
    private $username;
    private $hashedPassword;
    private $email;
    private $creationDate;

    public function __construct()
    {
        $this->id = -1;
        $this->username = "";
        $this->email = "";
        $creationDate = "";
        $this->hashedPassword = "";
    }

    public function setPassword($newPassword)
    {
        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $this->hashedPassword = $newHashedPassword;
        return $this;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
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

    public function getCreationDate()
    {
        return $this->creationDate;
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

    private function saveToDB(mysqli $conn)
    {
        if ($this->id == -1) {
            //Saving to DB
            $sql = "INSERT INTO users (username, email, hashed_password, creation_date) VALUES
                  ('$this->username', '$this->email', '$this->hashedPassword','$this->creationDate')";

            $result = $conn->query($sql);

            if ($result == true) {
                $this->id = $conn->insert_id;
                return true;
            }
        } else {
            $sql = "UPDATE users SET
                  username='$this->username',
                  email='$this->email',
                  hashed_password='$this->hashedPassword'
                  WHERE id=$this->id";

            $result = $conn->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }

    static public function loadByUserId(mysqli $conn, $id)
    {
        $sql = "SELECT * FROM users WHERE id=$id";

        $result = $conn->query($sql);

        if ($result == true) {
            $row = $result->fetch_assoc();

            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->email = $row['email'];
            $loadedUser->hashedPassword = $row['hashed_password'];
            $loadedUser->creationDate = $row['creation_date'];

            return $loadedUser;

        }
        return null;
    }

    static public function loadByUsername(mysqli $conn, $username)
    {
        $sql = "SELECT * FROM users WHERE username='$username'";

        $result = $conn->query($sql);

        if ($result == true) {
            $row = $result->fetch_assoc();

            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->email = $row['email'];
            $loadedUser->hashedPassword = $row['hashed_password'];
            $loadedUser->creationDate = $row['creation_date'];

            return $loadedUser;

        }
        return null;
    }

    static public function loadAllUsers(mysqli $conn)
    {
        $sql = "SELECT * FROM users";
        $ret = [];

        $result = $conn->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->username = $row['username'];
                $loadedUser->email = $row['email'];
                $loadedUser->hashedPassword = $row['hashed_password'];
                $loadedUser->creationDate = $row['creation_date'];

                $ret[] = $loadedUser;
            }
        }
        return $ret;
    }

    public function delete(mysqli $conn)
    {
        if ($this->id != 1) {
            $sql = "DELETE FROM users WHERE id=$this->id";

            $result = $conn->query($sql);

            var_dump($result);

            if ($result == true) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }

    static public function updatePass(mysqli $conn, $idUser, $newPass){
        $user= User::loadByUserId($conn, $idUser);
        $user->setPassword($newPass)->saveToDB($conn);

    }

    static public function register(mysqli $conn, $email, $username,
                                    $password, $creationDate)
    {


        $sqlEmail = "SELECT email FROM users WHERE email = '$email'";
        $resultEmail = $conn->query($sqlEmail);

        $sqlName = "SELECT username FROM users WHERE username = '$username'";
        $resultName = $conn->query($sqlName);

        if ($resultName->num_rows == 1) {
            echo "<strong>Użytkownik o podanym loginie jest już dodany, innego podanie, to czyn zalecany!!</strong><br>";
            return false;
        }

        if ($resultEmail->num_rows == 0) {

            $newUser = new User();
            $newUser->setUsername($username)
                ->setEmail($email)
                ->setPassword($password)
                ->setCreationDate
                ($creationDate->format('Y-m-d // H:i:s'));
            if ($newUser->saveToDB($conn) == true) {
                header("refresh:4 ;url=login.php");
                echo "<strong><em>$username</em> ---> Właśnie zostałeś zarejestrowany :-) Za 4 sekundy wpisz dane i będziesz zalogowany...
                            </strong>";
                return true;
            }
            return false;

        } else {
            echo "<strong>Uzytkownik o podanym mailu został już dodany, inny prze Ciebie musi być wpisany!!</strong><br>";
            return false;
        }

    }

    public function __destruct()
    {
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
//
//var_dump (User::loadByUserId($conn,1));
//var_dump (User::loadByUserId($conn,2));
//var_dump (User::loadByUserId($conn,666));
//
//var_dump(User::loadAllUsers($conn));
//
//User::loadByUserId($conn,1)
//    ->setUsername("Me")->setEmail('new@mail.com')->setPassword('abcd')
//    ->saveToDB($conn);
//
//var_dump(User::loadByUserId($conn,1));

//User::loadByUserId($conn,5)->delete($conn);

//var_dump(User::loadByUserUsername($conn,'Mikey'));
