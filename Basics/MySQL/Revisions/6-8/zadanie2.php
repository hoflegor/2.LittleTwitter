<?php

require_once '../config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DB);

    $name = $connection->real_escape_string($_POST['name']);

    $email = $connection->real_escape_string($_POST['email']);

    $salt = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(6/strlen($x)) )),1,6);

    $password = hash('sha256', $name.$salt);

    $sql = "INSERT INTO users(name, email, password, salt) VALUES('$name', '$email', '$password', '$salt')";

    if($connection->query($sql)){
        $sql2 = "SELECT * FROM users WHERE password='$password'";
        $result = $connection->query($sql2);
        $addedUser = $result->fetch_assoc();
        $id = $addedUser['id'];
        echo "Dodano użytkownika id: $id";
}
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <title>Zadanie 2 - dodawanie użytkownika</title>
</head>
<body>
<div class="container-fluid">
    <div class="form-group">
        <form class="form-inline" name="add_user" action="zadanie2.php" method="POST" style="width: 50%; margin: auto; float: none;">
            <label for="email">E-mail address</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <label for="name">Username</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <button type="submit" class="btn btn-success">Zaloguj się</button>
        </form>
    </div>
</div>
</body>
</html>