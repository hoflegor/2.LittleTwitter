<?php

$title = "LittelTwitter - szczegóły wiadomości";

require_once (__DIR__ . '/templates/header.php');

echo "<p><h3><ins>Szczegóły wiadomości:</ins></h3></p>";

if ($_SERVER['REQUEST_METHOD'] = 'GET'
    && isset($_GET['messageId'])) {

    $id = $_GET['messageId'];

    require_once(__DIR__ . '/src/Message.php');

    $message = Message::loadMessageById($conn, $id);
    $senderId = $message->getSenderId();
    $receiverId = $message->getReceiverId();
    $text = $message->getText();
    $creationDate = $message->getCreationDate();
    Message::markAsRead($conn, $id);

    require_once(__DIR__ . '/src/User.php');

    $sender = User::loadByUserId($conn, $senderId)->getUsername();
    $receiver = User::loadByUserId($conn, $receiverId)->getUsername();

    $echo = <<<EOL
<p><strong>Data: </strong>$creationDate</p>
<p><strong>Nadwca: </strong> $sender</p>
<p><strong>Odbiorca: </strong> $receiver</p>
<p><strong>Wiadomość: </strong> $text</p>

EOL;

    echo $echo;

    echo "</table>";
    }

echo "<a href='messages.php?show=receiv'>Przejdż odebranych wiadomości</a>";

require_once(__DIR__ . '/templates/footer.php');