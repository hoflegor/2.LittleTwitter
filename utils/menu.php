<?php

require_once (__DIR__ . "/checkLog.php");

$name = $log['user'];

//require_once (__DIR__ . '/conn.php');

$sql="SELECT id FROM users WHERE username='$name'";
$result=$conn->query($sql);

foreach ($result as $row){
    $idUser=$row['id'];
}

$menu=<<<EOD

<ul>
    <li><a href="index.php">Strona główna</a></li>
    <li><a href="messages.php?show=all">Wiadomości</a></li>
    <li><a href="user_detail.php?name=$name">Sczegóły profilu</a></li>
    <li><a href="utils/logOut.php">Wyloguj się</a></li>
</ul>
<br>
<hr>

EOD;

echo $menu;

