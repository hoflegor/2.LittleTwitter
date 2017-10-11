<?php

$tweets = Tweet::loadAllTweets($conn);

$tweetsTableStart = <<<EOL
<table>
<thead>
    <tr>
        <h2>Tweety <small><small>(wszystkich użytkowników): </small></small></h2>
    </tr>
</thead>
    <tr>
        <th scope='col'>Kto tweetnął</th>
        <th scope='col'>Kiedy Tweetnął</th>
        <th scope='col'>Co tweetnął</th>
    </tr>

EOL;

echo $tweetsTableStart;

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
        }
    }

    $tweetsTable = <<<EOL
    <tr>
        <td>
            $name
            <br>
            <a href='user_detail.php?&name=$name'>--->szczegóły użytkownika</a>
        </td>
        <td>
            $date
        </td>
        <td>
            $text
            <br>
            <a href='post_detail.php?idTweet=$id&name=$name'>--->szczegóły wpisu</a>
        </td>
    </tr>
EOL;
    echo $tweetsTable;

}

$tweetsTableEnd = <<<EOL

</table>

EOL;

echo $tweetsTableEnd;