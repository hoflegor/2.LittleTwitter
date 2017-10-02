
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="LittelTwitter"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LittelTwitter - Logowanie</title>

</head>
<body>

<?php

require_once (__DIR__ . "/src/User.php");

if($_SERVER['REQUEST_METHOD']=='POST'){

    session_start();

    require (__DIR__ . "/utils/conn.php");

    $username=$conn->real_escape_string($_POST['username']);
    $password=$conn->real_escape_string($_POST['password']);

    $user=User::loadByUsername($conn,$username);


    if ($user && password_verify($password, $user->getHashedPassword())){
        $_SESSION["loggedUser"]=$username;
        echo "<h2>**Zalogowano użytkownika: <em>$username</em></h2> 
                <a href='index.php'>Przejdź do strony głównej</a> ";

    }
    else{
        echo "<h2>**Podano błędny login lub hasło</h2>
                <a href='index.php'>Przejdź do strony głównej</a>";
    }

    $conn->close();
    $conn = null;

}

else{
    echo "<h1>LOGOWANIE:</h1>
              <form action=\"login.php\" method=\"post\">
        <label>Login:<br>
            <input type=\"text\" name=\"username\" placeholder=\"Tu podaj swój login\">
        </label>
        <br>
        <label>Hasło:
            <br>
            <input type=\"password\" name=\"password\" placeholder=\"Tu podaj swoje hasło\">
        </label>
        <br>
        <input type=\"submit\" value=\"Zaloguj się\">
    </form>";
}

?>

</body>
</html>
