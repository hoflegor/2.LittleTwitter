<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>LittleTwitter - wiadomości</title>
</head>
<body>
<h1><strong><em>LittelTwitter - nowa wiadomość</em></strong></h1>
<hr>

<?php

require_once(__DIR__ . '/../utils/checkLog.php');

if ($log['check'] == true) {

    require_once (__DIR__ . '/conn.php');


    if ($_SERVER['REQUEST_METHOD'] == 'GET' &&
        $_GET['sendTo'] != null) {

        $sendTo = $_GET['sendTo'];


        echo "<p><h3><ins>Nowa wiadomość do użytkownika $sendTo:<ins></ins></h3>";

        $form = <<<EOL
<form action="" method="post">
    <textarea name="mesText" cols="44" rows="6" maxlength="255"
              placeholder="Maksymalna długość wiadomości to 255 znaków!!!!"></textarea>
    <br>
    <input type="hidden" name="sendTo" value="$sendTo">
    <input type="submit" value="Wyślij!!">
</form>
<br>
EOL;
        echo $form;

        echo "<a href='../user_detail.php?name=$sendTo'><p><strong>
                Wróć do szczegółów profilu użytkownika $sendTo</strong></p></a>";

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'
        && $_POST['sendTo'] != null) {

        $sendTo = $_POST['sendTo'];

        if (strlen($_POST['mesText']) == 0) {
            echo "<h2><strong>!!</strong>Wrong input - nie można wysłać pustej wiadomości<strong>!!</strong><br></h2>";

        echo '<h2><a href="' .  $_SERVER['HTTP_REFERER'] .'">' . "Wróć do strony tworzenia wiadomości</a></h2>";

        } else {

            require_once (__DIR__ . '/../src/User.php');
            require_once (__DIR__ . '/../src/Message.php');

            $senderId=User::loadByUsername($conn, $log['user'])->getId();
            $receiverId=User::loadByUsername($conn, $sendTo)->getId();
            $text=$_POST['mesText'];
            $creationDate=new DateTime();

            Message::newMessage($conn, $senderId, $receiverId, $text, $creationDate);

            echo "<h2><ins>Wysłano wiadomość do użytkownika $sendTo</ins></h2><hr>";

            echo "<a href='../user_detail.php?name=$sendTo'><p><strong>
                Wróć do szczegółów profilu użytkownika $sendTo</strong></p></a>";

        }


    }

    $conn->close();
    $conn = null;

} else {
    echo "<h2>LittelTwitter jest dosyć cwany - by mieć pełen dostęp musisz być
            <a href='../login.php'><strong>zalogowany!!</strong></a></h2><hr>";

    echo "<h2>Jeśli nie masz konta, zbędne narzekanie - czas na 
            <a href='../register.php'>
            <strong>zarejestrowanie!!</strong></h2></a>";
}


?>