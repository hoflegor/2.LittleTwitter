<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>LittelTwitter - szczegóły profilu</title>
</head>
<body>
<h1><em>LittelTwitter - szczegóły profilu</em></h1>
<hr>

<?php

require_once (__DIR__ . "/utils/checkLog.php");

if($log['check']==true){

    require_once(__DIR__ . '/utils/menu.php');

    echo "<p><strong>Zalogowany użytkownik: <em>" . $log['user'] .
        "</em></strong></p>";

    require_once (__DIR__ . '/utils/conn.php');
    require_once (__DIR__ . '/src/Tweet.php');
    require_once (__DIR__ . '/src/User.php');

    echo "<strong>Twoje Tweety: </strong><br>";

    $id=User::loadByUsername($conn,$log['user'])->getId();

    $tweets=Tweet::loadAllTweetsByUserId($conn, $id);

    foreach ($tweets as $tweet){
        echo "<br>";

        $text=$tweet->getText();
        $date=$tweet->getCreationDate();
        $id=$tweet->getId();

        echo "<strong>**</strong>" . "<ins>$date</ins> " . "<br>" .
            "<em>$text</em>" . "<br>" .
            "<a href='post_detail.php?idTweet=$id'> Pokaż szczegóły tweeta</a>".
            "<br>";
    }

    $conn->close();
    $conn = null;

}

?>
</body>
</html>