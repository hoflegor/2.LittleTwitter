<?php

$title="LittleTwitter - wiadomości";

require_once(__DIR__ . '/templates/header.php');

require_once(__DIR__ . '/src/Message.php');
require_once(__DIR__ . '/src/User.php');

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
            $messages = Message::loadAllMessagesBySenderId($conn, $idUser);
            break;

        case 'receiv' :
            $messages = Message::loadAllMessagesByReceiverId($conn, $idUser);
            break;

    }

}

foreach ($messages as $message) {

    $senderId = $message->getSenderId();
    $creationDate = $message->getCreationDate();
    $messageId = $message->getId();
    $status = $message->getStatus();


    if ($idUser == $senderId) {
        echo "<strong>Wysłana---></strong>";
    } else {
        if ($status == 0) {
            echo "<br><strong><ins>!!NOWA WIADOMOŚĆ!!</ins></strong><br><br>";
        }
        echo "<strong>--->Odebrana:</strong>";

    }


    echo "<br>($creationDate)<br>"
        . substr($message->getText(), 0, 30) . "...<br>"
        . "<a href='message.php?messageId=$messageId'>--->Przejdź do szczegółów wiadomości</a>"
        . "<hr>";

}


require_once(__DIR__ . '/templates/footer.php');