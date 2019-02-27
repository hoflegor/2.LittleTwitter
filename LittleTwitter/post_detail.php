<?php

$title = "LittleTwitter - szczegóły tweeta";

require_once(__DIR__ . '/templates/header.php');

require(__DIR__ . '/src/Tweet.php');
require(__DIR__ . '/src/Comment.php');
require(__DIR__ . '/src/User.php');

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
            <textarea name="comment" cols="32" rows="6" maxlength="60" minlength="2"
                      placeholder="Maksymalna długość komentarza to 60 znaków, minimalna 2!"></textarea>
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


}

if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
    $_POST['comment'] == true) {

    $userId = User::loadByUsername($conn, $log['user'])->getId();

    $comment = $conn->real_escape_string($_POST['comment']);
    $creationDate = new DateTime();
    $textComment = $_POST['comment'];
    $userId = User::loadByUsername($conn, $log['user'])->getId();

    Comment::createComment($conn, $userId, $_POST['idTweet'],
        $textComment, $creationDate);

    header('Location:' . $_SERVER['REQUEST_URI']);

}

require_once(__DIR__ . '/templates/footer.php');
