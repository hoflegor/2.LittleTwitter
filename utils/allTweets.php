<table>
        <thead>
        <tr>
            <h2>Tweety:</h2>
        </tr>
        </thead>
        <tr>
            <th scope='col'>Treść</th>
            <th scope='col'>Nr. tweeta</th>
            <th scope='col'>Kiedy tweetnięto</th>
        </tr>
        <?php

            if ($log['stat']==true){

            require (__DIR__ . "/../src/conn.php");
            require (__DIR__ . "/../src/Tweet.php");

            foreach (Tweet::loadAllTweets($conn, $log['id']) as $tweet) {
                
                $creationDT = new DateTime($tweet->getCreationDate());
                $creationDTformat=$creationDT->format("Y-m-d ---> H:i:s");


                echo "<tr>
                        <td>" . $tweet->getText() . '<p><a href=post_detail.php?idTweet=' . $tweet->getId() . ">--->Pokaż szczegóły</a></p></td>" .
                    "<td>" . $tweet->getId() . "</td>" .
                    "<td>" . $creationDTformat . "</td>" .
                    "</tr>";
            }

            $conn->close();
            $conn = null;
        }

        ?>
</table>