<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $title ?></title>
</head>
<body>
<h1><strong><em><?= $title ?></em></strong></h1>
<hr>
<?php

require_once(__DIR__ . '/../utils/checkLog.php');


if ($log['check'] == false) {

//Jeśli niezalogowano -> rejestracja/login
    echo "<h2>LittelTwitter jest dosyć cwany - by mieć pełen dostęp musisz być
            <a href='login.php'><strong>zalogowany!!</strong></a>
</h2>
<hr>
<h2>Jeśli nie masz konta, zbędne narzekanie - czas na <a href='register.php'><strong>zarejestrowanie!!</strong>
</h2>
</a>";

    die;

}

//Jeśli zalogowano -> połączenie/menu/zalogowany użytkownik:
require_once(__DIR__ . '/../utils/conn.php');

$login = $log['user'];

$sql = "SELECT id FROM users WHERE username='$login'";
$result = $conn->query($sql);

foreach ($result as $row) {
    $idUser = $row['id'];
}

$menu = <<<EOD

<ul>
    <li><a href="index.php">Strona główna</a></li>
    <li><a href="messages.php?show=all">Wiadomości</a></li>
    <li><a href="user_detail.php?name=$login">Sczegóły profilu</a></li>
    <li><a href="utils/logOut.php">Wyloguj się</a></li>
</ul>
<br>
<hr>

EOD;

echo $menu;

$logedHead=<<<EOL
<p><strong>Zalogowany użytkownik: <br><em>$login</em></strong></p>
<hr>
EOL;

echo $logedHead;


