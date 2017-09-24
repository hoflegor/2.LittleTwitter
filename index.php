<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LittelTwitter - strona główna</title>

</head>
<body>

<?php

    require_once (__DIR__ . "/src/conn.php");
    require_once (__DIR__ . "/src/Tweet.php");

    session_start();

    if (!isset($_SESSION['loggedUser']) || $_SESSION['loggedUser']==null) {

//        var_dump($_SESSION['loggedUser']);

        echo "<h1>LOGOWANIE:</h1>
              <form action=\"login.php\" method=\"post\">
        <label>Login:<br>
            <input type=\"text\" name=\"username\" placeholder=\"Tu podaj swój login\">
        </label>
        <br>
        <label>Hasło:
            <br>
            <input type=\"password\" name=\"password\" placeholder=\"Tu podaj swoje hasło\">
        </label>
        <br>
        <input type=\"submit\" value=\"Zaloguj się\">
    </form>";

        echo "<hr>";

        echo "<h2>Jeśli nie posiadasz konta, <ins><a href='register.php'>zarejestruj się!</a></ins></h2>";

    }
    elseif($_SESSION['loggedUser']!=null){
        $loggedUser=$_SESSION['loggedUser'];

        require_once (__DIR__ . '/src/conn.php');

        $sql="SELECT id FROM users WHERE username='$loggedUser'";
        $result=$conn->query($sql);

        foreach ($result as $row) {
            $loggedUserId=$row['id'];
        }

        echo "
            <form action=\"\" method=\"post\">
                <label><strong>Tweetnij, nowego tweeta:</strong><br>
                    <textarea name=\"tweet\" cols=\"32\" rows=\"6\" maxlength=\"140\" placeholder=\"Maksymalna długość tweeta to 140 znaków!\"></textarea>
                </label>
                <p>
                    <input type=\"submit\" value=\"Tweet!!\">
                </p>
            </form>
            ";

        if ($_SERVER['REQUEST_METHOD']=='POST'){

            if ($_POST['tweet']==true && strlen($_POST['tweet'])>0){

                $tweet=$conn->real_escape_string($_POST['tweet']);
                $creationDate=new DateTime();

                $newTweet=new Tweet();
                $newTweet->setUserId($loggedUserId)
                    ->setText($tweet)
                    ->setCreationDate
                    ($creationDate->format('Y-m-d H:i:s'))
                    ->savetoDB($conn);

                echo "<strong>Tweetnięto nowego tweeta</strong><br>" .
                        $creationDate->format('Y-m-d / H:i:s');

            }

        }

        var_dump(Tweet::loadAllTweets($conn,$loggedUserId));

    }



?>

</body>
</html>



