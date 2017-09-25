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
<?php
session_start();
require_once (__DIR__ . "/utils/checkLog.php");

if($log==true){
    require (__DIR__ . "/utils/allTweets.php");
}

?>
</body>
</html>