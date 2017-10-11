<?php

$title = "LittleTwitter";

require_once(__DIR__ . '/templates/header.php');

require (__DIR__ . '/src/User.php');
require (__DIR__ . '/src/Tweet.php');

require_once(__DIR__ . '/utils/formNewTweet.php');
require_once (__DIR__ . '/utils/allTweetsTable.php');

require_once(__DIR__ . '/templates/footer.php');


//<!--TODO Mam wątpliwości do jakości kodu HTML ( szczególnie sposobu "echowania" tabeli i formularza)... Jest w miarę ok? W jaki inny sposób można stworzyć tabelę częściowo generowaną z php, tak by kod HTML był czytelniejszy?---> próbowałem HAREDOC//-->