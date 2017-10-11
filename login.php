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
<h1>LOGOWANIE</h1>
<h3>Poniżej wpisz swe dane, droga Pani/drogi Panie:</h3>
<hr>
<form action="login.php" method="post">
    <label>Login:<br>
        <input type="text" name="username" placeholder="Tu podaj swój login">
    </label>
    <br>
    <label>Hasło:
        <br>
        <input type="password" name="password" placeholder="Tu podaj swoje hasło">
    </label>
    <br>
    <br>
    <input type="submit" value="Zaloguj się">
</form>
<hr>
<a href='register.php'>
    <ins><strong>To tutaj kliknięcie, spowoduje rejestracji rozpoczęcie...</strong></ins></h3></a>

<?php

require_once (__DIR__ . "/utils/checkLog.php");
if ($log['check']==true){
    header("Location: index.php");
    die;
}

require_once (__DIR__ . "/src/User.php");

if($_SERVER['REQUEST_METHOD']=='POST'
    && $_POST['username'] != null
    && $_POST['password'] != null) {

    require(__DIR__ . "/utils/conn.php");

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $user = User::loadByUsername($conn, $username);


    if (password_verify($password, $user->getHashedPassword())==true) {
        $_SESSION["loggedUser"] = $username;
        header("Location: index.php");

    }
    else{
        echo "<hr><h2>Błędny login lub hasło podano ;-(</h2>" .
            "<hr><h3>Jeśli ich nie masz, próżno się załamywać,
            <br>
            trzeba kliknąć powyższy link i dane powpisywać!!
            <hr>";
    }

    $conn->close();
    $conn = null;

}

?>

</body>
</html>