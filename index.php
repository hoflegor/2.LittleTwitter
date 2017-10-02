<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>LittelTwitter - strona główna</title>
</head>
<body>
<h1><em>LittelTwitter - strona główna</em></h1>
<hr>

<?php
require(__DIR__ . '/utils/checkLog.php');


if ($log['check'] == true) {

    require_once(__DIR__ . '/utils/menu.php');

    echo "
            <form action=\"\" method=\"post\">
                <label><h2>Tweetnij, nowego tweeta:</h2></strong><br>
                    <textarea name=\"tweet\" cols=\"32\" rows=\"6\" maxlength=\"140\" placeholder=\"Maksymalna długość tweeta to 140 znaków!\"></textarea>
                </label>
                <br>
                    <input type=\"submit\" value=\"Tweet!!\">
            </form>
            <hr>
            ";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
        $_POST['tweet'] == true && strlen($_POST['tweet']) > 0
    ) {

        require_once(__DIR__ . "/src/Tweet.php");

        require(__DIR__ . "/src/conn.php");

        $tweet = $conn->real_escape_string($_POST['tweet']);
        $creationDate = new DateTime();


        Tweet::createTweet($conn, $log['id'], $tweet, $creationDate);

        $newTweetEcho = "<strong>Tweetnięto nowego tweeta:</strong><br>" .
            $creationDate->format('Y-m-d H:i:s');

        $conn->close();
        $conn = null;

    }

    require(__DIR__ . '/utils/conn.php');
    require(__DIR__ . '/src/Tweet.php');
    require(__DIR__ . '/src/User.php');

    echo "<table>
    <thead>
    <tr>
        <h2>Tweety:</h2>
    </tr>
    </thead>
    <tr>
        <th scope='col'>Kto tweetnął</th>
        <th scope='col'>Kiedy Tweetnął</th>
        <th scope='col'>Co tweetnął</th>
    </tr>";

    $tweets = Tweet::loadAllTweets($conn);

    foreach ($tweets as $tweet) {

        $userId = $tweet->getUserId();
        $tweetId = $tweet->getId();

        $sql = "SELECT username AS name, t.text AS text,
              t.creation_date AS tweet_date FROM users u JOIN tweet t
              WHERE t.id_user=$userId AND u.id=t.id_user
              AND t.id_tweet=$tweetId";

        $result = $conn->query($sql);


        if ($result == true && $result->num_rows != 0) {
            foreach ($result AS $row) {
                $name = $row['name'];
                $text = $row['text'];
                $date = $row['tweet_date'];
                echo "
            <tr>
                <td>
                $name
                </td>
                <td>
                $date
                </td>
                <td>
                $text
                </td>
            <tr>";

            }
        }
    }


    $conn->close();
    $conn = null;

}

?>

</table>
</body>
</html>