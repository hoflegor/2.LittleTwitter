<?php
$servername = "localhost";
$username = "root";
$password = "qweta";
$baseName = "LittleTwitter";

$conn = new mysqli($servername,
                   $username,
                   $password,
                   $baseName);

//if ($conn->connect_error) {
//    die("<hr><strong>!!</strong>Connection failed. Error: <strong><ins>$conn->connect_error</ins>!!</strong><hr>");
//}
//echo("<strong>**</strong>Connected to database: <strong><ins>$baseName</ins></strong>.<hr>");