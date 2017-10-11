<?php

$title = "LittelTwitter - szczegóły profilu";

require_once(__DIR__ . '/templates/header.php');

require_once(__DIR__ . '/src/Tweet.php');
require_once(__DIR__ . '/src/User.php');
require_once (__DIR__ . '/src/Comment.php');


if ($_SERVER['REQUEST_METHOD'] == 'GET' &&
    $_GET['name'] != null) {

    $name = $_GET['name'];
    $idUser = User::loadByUsername($conn, $name)->getId();

    if ($name != $login) {

        $form = <<<EOL
<form action="utils/newMessage.php" method="get">
    <button name="sendTo" value="$name">Wyślij wiadomość do użytkownika $name</button>
</form>
EOL;
        echo $form;
    }
    else {
        echo "<p><a href='edit_user.php?name=" . $login . "'>Edytuj profil</a></p><hr>";

    }

    echo "<p><h3><ins>Szczegóły profilu użytkownika $name:</ins></h3></p>
<hr>
";

    $creationDate=User::loadByUsername($conn,$name)->getCreationDate();

    echo "<p><em><strong>Dołączył: </strong>$creationDate</em></p>";

    $tweets=Tweet::countTweetByUserId($conn,(User::loadByUsername($conn, $name)->getId()));

    echo "<p><em><strong>Tweety: </strong>$tweets</em></p>";


    echo "<hr><p><strong>Historia tweetów  użytkownika $name:</strong></p>
<hr>
";


    $tweets = Tweet::loadAllTweetsByUserId($conn, $idUser);

    foreach ($tweets as $tweet) {
        echo "<br>";

        $text = $tweet->getText();
        $date = $tweet->getCreationDate();
        $id = $tweet->getId();
        $count = Comment::countCommentByTweetId($conn, $id);

        echo "<strong>**</strong>" . "
<ins>$date</ins>
" . "<br>" .
            "<em>$text</em>" . "<br>" .
            "<strong>*</strong>Liczba komentarzy: $count" . "<br>" .
            "<a href='post_detail.php?idTweet=$id&name=$name'> Pokaż szczegóły/komentarze</a>" .
            "<br>";
    }
}
else{
    echo "<strong>!!</strong>Wrong input'<strong>!!</strong><br>";
}




require_once(__DIR__ . '/templates/footer.php');
