<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>LittelTwitter - strona główna</title>
</head>
<body>
<h1><em>LittelTwitter - strona główna</em></h1>
<hr>
<ul>
    <li><a href="index.php">Strona główna</a></li>
    <li><a href="user_detail.php">Sczegóły profilu</a></li>
    <li><a href="">lorem</a></li>
    <?php
    session_start();
    if(isset($_SESSION['loggedUser'])){
        echo "<li><a href='utils/logOut.php'>Wyloguj</a></li>";
    }
    ?>
</ul>
<br>
<hr>


<?php

require_once(__DIR__ . "/utils/checkLog.php");

if ($log == true) {

    echo "
            <form action=\"\" method=\"post\">
                <label><h2>Tweetnij, nowego tweeta:</h2></strong><br>
                    <textarea name=\"tweet\" cols=\"32\" rows=\"6\" maxlength=\"140\" placeholder=\"Maksymalna długość tweeta to 140 znaków!\"></textarea>
                </label>
                <br>
                    <input type=\"submit\" value=\"Tweet!!\">
            </form>
            <hr>
            ";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once(__DIR__ . "/src/Tweet.php");

        if ($_POST['tweet'] == true && strlen($_POST['tweet']) > 0) {

            $tweet = $conn->real_escape_string($_POST['tweet']);
            $creationDate = new DateTime();

            $newTweet = new Tweet();
            $newTweet->setUserId($loggedUserId)
                ->setText($tweet)
                ->setCreationDate
                ($creationDate->format('Y-m-d H:i:s'))
                ->savetoDB($conn);

            echo "<strong>Tweetnięto nowego tweeta</strong><br>" .
                $creationDate->format('Y-m-d / H:i:s');

            $conn->close();
            $conn = null;

        }

    }
    require_once(__DIR__ . "/utils/allTweets.php");
}


?>


</body>
</html>