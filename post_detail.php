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
<h1><em>LittelTwitter - szczegóły tweeta</em></h1>
<hr>
<?php

require(__DIR__ . '/utils/checkLog.php');

if ($log['check'] == true) {

    require_once(__DIR__ . '/utils/menu.php');
    require(__DIR__ . '/src/Tweet.php');
    require(__DIR__ . '/src/Comment.php');
    require(__DIR__ . '/src/User.php');

    echo "<p><strong>Zalogowany użytkownik:  <br><em>" . $log['user'] .
        "</em></strong></p><hr>";


    if ($_SERVER['REQUEST_METHOD'] == 'GET' &&
        $_GET['name'] != null &&
        $_GET['idTweet'] != null) {


        $tweetId = $_GET['idTweet'];
        $name = $_GET['name'];

        $tweetText = Tweet::loadTweetById($conn, $tweetId)->getText();

        echo "<p><h3><ins>Tweet użytkownika <em>" . $name
            . "</em>:</ins></h3></p>" . "<p>(" .
            (Tweet::loadTweetById($conn, $tweetId)->getCreationDate()) .
            ")</p>" . $tweetText
            . "<hr>";
        ?>

        <form action='' method="post">
            <label><h2>Dodaj komentarz do Tweeta:</h2></strong><br>
                <textarea name="comment" cols="32" rows="6" maxlength="60"
                          placeholder="Maksymalna długość komentarza to 60 znaków!"></textarea>
            </label>
            <input type="hidden" name="idTweet" value="<?= $tweetId ?>">
            <br>
            <input type="submit" value="Skomentuj!!">
        </form>
        <hr>

        <?php

        echo "<h3>Komentarze:</h3>";

        foreach ((Comment::loadAllCommentsByTweetId($conn, $tweetId))
            as $comment) {

            $user = User::loadByUserId($conn, ($comment->getUserId()))->getUsername();

            echo "<strong>**</strong>" . $user .
                " (" . $comment->getCreationDate() . ")" . "<br>" .
                "<em>" . $comment->getText() . "</em>" . "<br>" . "<br>";


        }


        ?>


        <?php


    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
        $_POST['comment'] == true && strlen($_POST['comment']) > 0
    ) {

        $userId = User::loadByUsername($conn, $log['user'])->getId();

        $comment = $conn->real_escape_string($_POST['comment']);
        $creationDate = new DateTime();
        $textComment = $_POST['comment'];
        $userId = User::loadByUsername($conn, $log['user'])->getId();

        Comment::createComment($conn, $userId, $_POST['idTweet'],
            $textComment, $creationDate);

        header('Location:'.$_SERVER['REQUEST_URI']);

    }

    $conn->close();
    $conn = null;

}
else{
    echo "<h2>LittelTwitter jest dosyć cwany - by mieć pełen dostęp musisz być
            <a href='login.php'><strong>zalogowany!!</strong></a></h2><hr>";

    echo "<h2>Jeśli nie masz konta, zbędne narzekanie - czas na 
            <a href='register.php'>
            <strong>zarejestrowanie!!</strong></h2></a>";
}

?>
</body>
</html>