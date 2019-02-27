<?php
require("../config.php");
$servername = DB_HOST;
$username = DB_USER;
$password = DB_PASS;
$baseName = DB_DB;

$conn = new mysqli
($servername,
    $username,
    $password,
    $baseName);

if ($conn->connect_error) {
    die("Połączenie nieudane. Błąd: " .
        $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['showUser'])) {
    $userID = intval($_GET['showUser']);

    if (!is_integer($userID)) {
        echo "Błędny parametr showUser";
    } else {
        $sql = "SELECT * FROM users WHERE id=$userID";
        $result = $conn->query($sql);

        if ($result == false) {
            echo $conn->error;
        }

        if ($result->num_rows == 0) {
            echo "Brak użytkownika w bazie";
        }

        foreach ($result as $row) {
            echo $row['name'] . " (" . $row['email'] . ")";
        }
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
    <title>Zadanie 3 - pobieranie użytkownika</title>
</head>
<body>
<form action="" method="GET" role="form">
    User ID:<br>
    <input type="number" name="showUser"><br>
    <button type="submit" class="btn btn-success">Find User</button>
</form>
</body>
</html>