<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>LittelTwitter - wiadomości</title>
</head>
<body>
<h1><strong><em>LittelTwitter - wiadomości</em></strong></h1>
<hr>
<?php

require_once(__DIR__ . '/utils/checkLog.php');

if ($log['check'] == false) {


    echo "<h2>LittelTwitter jest dosyć cwany - by mieć pełen dostęp musisz być
            <a href='login.php'><strong>zalogowany!!</strong></a></h2><hr>";

    echo "<h2>Jeśli nie masz konta, zbędne narzekanie - czas na 
            <a href='register.php'>
            <strong>zarejestrowanie!!</strong></h2></a>";

} else {

    require_once(__DIR__ . '/utils/menu.php');
    require_once(__DIR__ . '/utils/conn.php');
    require_once(__DIR__ . '/src/Message.php');
    require_once(__DIR__ . '/src/User.php');

    echo "<p><strong>Zalogowany użytkownik: <br><em>" . $log['user'] .
        "</em></strong></p ><hr>";

    $idUser = User::loadByUsername($conn, $log['user'])->getId();


    $counter = Message::countUnreadByUserId($conn, $idUser);

    echo "<p><h3><ins>Wiadomości ($counter):</ins></h3></p>";

    echo "<h4>" .
        '<a href="messages.php?show=all">Wszystkie</a>' . " " .
        '<a href="messages.php?show=sent">Wysłane</a>' . " " .
        '<a href="messages.php?show=receiv">Odebrane</a>' . " " .
        '<a href="messages.php?show=unread">Nieprzeczytane (' . ($counter) . ')</a>' . " " .
        "</h4><hr>";

    if ($_SERVER['REQUEST_METHOD'] == 'GET' &&
        isset($_GET['show'])) {

        $show = $_GET['show'];

        switch ($show) {
            case 'all':
                $messages = Message::loadAllMessagesSendOrReceive($conn, $idUser);
                break;

            case 'unread';
                $messages = Message::loadUnreadById($conn, $idUser);
                break;

            case 'sent':
                $messages=Message::loadAllMessagesBySenderId($conn, $idUser);
                break;

            case 'receiv' :
                $messages = Message::loadAllMessagesByReceiverId($conn, $idUser);
                break;

        }

    }

    foreach ($messages as $message) {

        $senderId = $message->getSenderId();
        $creationDate = $message->getCreationDate();


        if ($idUser == $senderId) {
            echo "<strong>Wysłana---></strong>";
        } else {
            echo "<strong>--->Odebrana:</strong>";
        }
        echo "<br>($creationDate)<br>" .
            $message->getText()
            . "<hr>";

    }


    $conn->close();
    $conn = null;

}