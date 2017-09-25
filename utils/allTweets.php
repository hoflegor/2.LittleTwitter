<table>
        <thead>
        <tr>
            <h2>Twoje Tweety:</h2>
        </tr>
        </thead>
        <tr>
            <th scope='col'>Treść</th>
            <th scope='col'>Nr. tweeta</th>
            <th scope='col'>Kiedy tweetnięto</th>
        </tr>
        <?php

            require (__DIR__ . "/../src/conn.php");
            require (__DIR__ . "/../src/Tweet.php");

            foreach (Tweet::loadAllTweets($conn, $loggedUserId) as $tweet) {
                echo "<tr>
                        <td>" . $tweet->getText() . "</td>" .
                    "<td>" . $tweet->getId() . "</td>" .
                    "<td>" . $tweet->getCreationDate() . "</td>" .
                    "</tr>";
            }

            $conn->close();
            $conn = null;

        ?>
</table>