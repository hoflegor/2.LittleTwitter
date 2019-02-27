<?php
//napisz poniżej kod osbługujący formularz i zapisujący odpowiednie dane do bazy
if($_SERVER['REQUEST_METHOD']=='POST') {

    $servername = "localhost";
    $username = "root";
    $password = "qweta";
    $baseName = "products_ex";

    $conn = new mysqli($servername,
        $username,
        $password,
        $baseName);

    if ($conn->connect_error) {
        die("<strong>!!<strong>Connection failed. Error: <strong>$conn->connect_error!!</strong>.<br>");
    }
    echo("<strong>**</strong>Connected to database <strong>$baseName</strong>.<br>");

    $id=$_POST['mainCategory'];
    $name=$_POST['name'];

    $sql = "
    INSERT INTO Categories_sub (main_id, name) VALUES ('$id', '$name')
    ";

    $result=$conn->query($sql);

    $conn->close();
    $conn = null;

}