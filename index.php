<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>LittelTwitter</title>
</head>
<body>
<h1><strong><em>LittelTwitter</em></strong></h1>
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
else {

    require_once(__DIR__ . '/utils/menu.php');
    require_once(__DIR__ . "/src/Tweet.php");
    require_once(__DIR__ . "/src/User.php");

    echo "<p><strong>Zalogowany użytkownik: <br><em>" . $log['user'] .
        "</em></strong></p ><hr>";

    echo "
            <form action=\"\" method=\"post\">
                <label><ins><h2>Tweetnij, nowego tweeta:</h2></ins><br>
                    <textarea name=\"tweet\" cols=\"32\" rows=\"6\" maxlength=\"140\" placeholder=\"Maksymalna długość tweeta to 140 znaków!\"></textarea>
                </label>
                <br>
                    <input type=\"submit\" value=\"Tweet!!\">
            </form>
            <hr>";


    if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
        $_POST['tweet'] == true && strlen($_POST['tweet']) > 0
    ) {


        $tweet = $conn->real_escape_string($_POST['tweet']);
        $creationDate = new DateTime();
        $id = User::loadByUsername($conn, $log['user'])->getId();

        Tweet::createTweet($conn, $id, $tweet, $creationDate);


    }


    $tweets = Tweet::loadAllTweets($conn);

    echo "<table>
    <thead>
    <tr>
        <h2>Tweety <small><small>(wszystkich użytkowników) </small></small></h2>
    </tr>
    </thead>
    <tr>
        <th scope='col'>Kto tweetnął</th>
        <th scope='col'>Kiedy Tweetnął</th>
        <th scope='col'>Co tweetnął</th>
    </tr>";

    foreach ($tweets as $tweet) {

        $userId = $tweet->getUserId();
        $tweetId = $tweet->getId();

        $sql = "SELECT id_user AS user_id,
              id_tweet AS id,
              username AS name,
              t.text AS text,
              t.creation_date AS tweet_date
              
              FROM users u JOIN tweet t
              WHERE t.id_user=$userId AND u.id=t.id_user
              AND t.id_tweet=$tweetId";

        $result = $conn->query($sql);


        if ($result == true && $result->num_rows != 0) {
            foreach ($result AS $row) {
                $userId = $row['user_id'];
                $name = $row['name'];
                $text = $row['text'];
                $date = $row['tweet_date'];
                $id = $row['id'];

                echo "
            <tr>
                <td>
                $name<br><a href='user_detail.php?&name=$name'>--->szczegóły użytkownika</a>
                </td>
                <td>
                $date
                </td>
                <td>
                $text<br><a href='post_detail.php?idTweet=$id&name=$name'>--->szczegóły wpisu</a>
                </td>
            <tr>";

            }
        }
    }

    $conn->close();
    $conn = null;

}

?>

<!--TODO Mam wątpliwości do jakości kodu HTML ( szczególnie sposobu "echowania" tabeli i formularza)... Jest w miarę ok? W jaki inny sposób można stworzyć tabelę częściowo generowaną z php, tak by kod HTML był czytelniejszy?-->

</table>
</body>
</html>