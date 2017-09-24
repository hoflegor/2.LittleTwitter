
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LittelTwitter - rejestracja</title>

</head>
<body>

<?php

require_once (__DIR__ . "/src/conn.php");
require_once (__DIR__ . "/src/User.php");

session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){

    $username=$conn->real_escape_string($_POST['username']);
    $password=$conn->real_escape_string($_POST['password']);

    $user=User::loadByUsername($conn,$username);


    if ($user && password_verify($password, $user->getHashedPassword())){
        $_SESSION["loggedUser"]=$username;
        echo "<h2>**Zalogowano użytkownika: $username</h2>";
    }
    else{
        echo "<h2>**Podano błędny login lub hasło</h2>";
    }

}

$conn->close();
$conn = null;
?>

<hr>
<a href="index.php">Przejdź do strony głównej</a>

</body>
</html>
