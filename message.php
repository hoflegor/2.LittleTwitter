<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>LittelTwitter - szczegóły wiadomości </title>
</head>
<body>
<h1><strong><em>LittelTwitter - szczegóły wiadomości </em></strong></h1>
<hr>
<?php

require_once (__DIR__ . '/utils/checkLog.php');

if ($log['check'] == false) {


    echo "<h2>LittelTwitter jest dosyć cwany - by mieć pełen dostęp musisz być
            <a href='login.php'><strong>zalogowany!!</strong></a></h2><hr>";

    echo "<h2>Jeśli nie masz konta, zbędne narzekanie - czas na 
            <a href='register.php'>
            <strong>zarejestrowanie!!</strong></h2></a>";

}
else{

    require_once(__DIR__ . '/utils/menu.php');

    echo "<p><strong>Zalogowany użytkownik: <br><em>" . $log['user'] .
        "</em></strong></p ><hr>";

    echo "<p><h3><ins>Szczegóły wiadomości:</ins></h3></p>";

    if ($_SERVER['REQUEST_METHOD'] = 'GET'
        && isset($_GET['messageId'])){

        $id=$_GET['messageId'];

        require_once (__DIR__ . '/src/Message.php');

        $message = Message::loadMessageById($conn, $id);
        $senderId=$message->getSenderId();
        $receiverId=$message->getReceiverId();
        $text=$message->getText();
        $creationDate=$message->getCreationDate();
        Message::markAsRead($conn,$id);

        require_once (__DIR__ . '/src/User.php');

        $sender=User::loadByUserId($conn, $senderId)->getUsername();
        $receiver=User::loadByUserId($conn, $receiverId)->getUsername();

        $echo=<<<EOL
<p><strong>Data: </strong>$creationDate</p>
<p><strong>Nadwca: </strong> $sender</p>
<p><strong>Odbiorca: </strong> $receiver</p>
<p><strong>Wiadomość: </strong> $text</p>

EOL;
        echo $echo;

    }

}



?>

</table>
</body>
</html>