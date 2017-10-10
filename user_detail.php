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


<!--TODO-->
<!--$changePass=<<<EOL-->
<!--<form action="" method="post">-->
<!--    <button name="change" >Zmień hasło</button>-->
<!--</form>-->
<!--EOL;-->
<!---->
<!--echo $changePass;-->

<?php

require_once(__DIR__ . "/utils/checkLog.php");

if ($log['check'] == true) {

    require_once(__DIR__ . '/utils/menu.php');

    echo "<p><strong>Zalogowany użytkownik:  <br><em>" . $log['user'] .
        "</em></strong></p><hr>";

    require_once(__DIR__ . '/src/Tweet.php');
    require_once(__DIR__ . '/src/User.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

//        TODO
//        if (isset($_POST['change'])){
//            $echo=<<<EOL
//<form>
//    <input type="password" name="old">
//    <input type="password" name="new">
//    <input type="password" name="newRep">
//</form>
//EOL;
//
//        }
//
//    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET' &&
        $_GET['name'] != null) {

        $name = $_GET['name'];
        $idUser = User::loadByUsername($conn, $name)->getId();

        if ($name != $log['user']) {

            $form = <<<EOL
<form action="utils/newMessage.php" method="get">
    <button name="sendTo" value="$name">Wyślij wiadomość do użytkownika $name</button>
</form>
EOL;
            echo $form;
        }

        echo "<p><h3><ins>Szczegóły profilu użytkownika $name:</ins></h3></p>
<hr>
";

        echo "<p><strong><em>Tweety użytkownika $name:</em></strong></p>
<hr>
";


        $tweets = Tweet::loadAllTweetsByUserId($conn, $idUser);

        foreach ($tweets as $tweet) {
            echo "<br>";

            $text = $tweet->getText();
            $date = $tweet->getCreationDate();
            $id = $tweet->getId();
            $count = Tweet::countComment($conn, $id);

            echo "<strong>**</strong>" . "
<ins>$date</ins>
" . "<br>" .
                "<em>$text</em>" . "<br>" .
                "<strong>*</strong>Liczba komentarzy: $count" . "<br>" .
                "<a href='post_detail.php?idTweet=$id&name=$name'> Pokaż szczegóły/komentarze</a>" .
                "<br>";
        }
    }
    $conn->close();
    $conn = null;

}

?>
</body>
</html>