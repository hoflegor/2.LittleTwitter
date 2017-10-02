<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>LittleTwiter - szczegóły tweeta</title>
</head>
<body>

<?php

session_start();

require(__DIR__ . '/utils/checkLog.php');

if ($log['stat'] == false) {
    echo "<strong>!!</strong>Wrong input - no GET parametr<strong>!!</strong><br>";
} else {

    require(__DIR__ . '/src/conn.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['idTweet'] != null) {

        $tweetId = $_GET['idTweet'];

        require(__DIR__ . '/src/Tweet.php');
        require(__DIR__ . '/src/Comment.php');
        require (__DIR__ . '/src/User.php');

        echo "<h1>Tweet :</h1>" . "<p>(" . (Tweet::loadTweetById($conn, $tweetId)
                ->getCreationDate()) . ")</p>" .
                Tweet::loadTweetById($conn, $tweetId)->getText() . "<hr>";

        echo "<h3>Komentarze:</h3>";



        foreach ((Comment::loadAllCommentsByTweetId($conn, $tweetId))
            as $comment){

            $user=User::loadByUserId($conn,($comment->getUserId()))->getUsername();



            echo "**" . $user .
                " (" . $comment->getCreationDate() . "):". "<br>" .
                $comment->getText()
                . "<br><br>"
                ;

        }

        $conn->close();
        $conn = null;


    }
}
?>
</body>
</html>
