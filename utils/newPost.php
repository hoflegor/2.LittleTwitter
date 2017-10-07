<?php

require (__DIR__ . '/../src/' ;)

if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
    $_POST['comment'] == true && strlen($_POST['comment']) > 0
) {

    $userId=User::loadByUsername($conn,$log['user'])->getId();


    echo "ok!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1";

    $comment = $conn->real_escape_string($_POST['comment']);
    $creationDate = new DateTime();
    $textComment = $_POST['comment'];
    $userId=User::loadByUsername($conn,$log['user'])->getId();

    Comment::createComment($conn, $userId, $tweetId,
        $textComment, $creationDate);
}