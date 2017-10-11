<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
    $_POST['tweet'] == true && strlen($_POST['tweet']) > 0
) {

    $tweet = $conn->real_escape_string($_POST['tweet']);
    $creationDate = new DateTime();
    $id = User::loadByUsername($conn, $login)->getId();

    Tweet::createTweet($conn, $id, $tweet, $creationDate);

}

$formNewTweet=<<<EOL
<form action="" method="post">
    <label><ins><h2>Tweetnij, nowego tweeta:</h2></ins>
    <br>
        <textarea name="tweet" cols="32" rows="6" maxlength="140"
        placeholder="Maksymalna długość tweeta to 140 znaków!"></textarea>
    </label>
    <br>
        <input type="submit" value="Tweet!!">
</form>
<hr>
EOL;

echo $formNewTweet;