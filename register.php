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
<h1>REJESTRACJA</h1>
<hr>

<?php

require_once(__DIR__ . '/utils/checkLog.php');

if (
    isset($_POST['email']) == true &&
    isset($_POST['name']) == true && strlen($_POST['name']) >= 2 &&
    isset($_POST['password']) == true && strlen($_POST['password']) >= 6 &&
    $_POST['password'] == $_POST['repeatPassword']
) {

    require(__DIR__ . "/utils/conn.php");
    require(__DIR__ . "/src/User.php");

    $email = $conn->real_escape_string($_POST['email']);
    $users = User::loadAllUsers($conn);
    $password = $conn->real_escape_string($_POST['password']);
    $creationDate = new DateTime();
    $name = $conn->real_escape_string($_POST['name']);


    User::register($conn, $email, $name, $password, $creationDate);

    $conn->close();
    $conn = null;

    die;

} elseif ($log['check'] == true) {
    header("Location: index.php");
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'
    && $_POST['email'] != null
    && $_POST['password'] != null
    && $_POST['name'] != null
) {
    require(__DIR__ . "/utils/conn.php");
    require(__DIR__ . "/src/User.php");

    if ($_POST['password'] != $_POST['repeatPassword']) {
        echo "<strong>Hasła... to pierwsze... i to powtórzone... One nie są z samych znaków złożone!!</strong>";
    } elseif (strlen($_POST['password']) < 6) {
        echo "<strong>Hasło z minimum sześciu znaków musi być złożone, tak to już jest ustawione..</strong>";
    }


    $conn->close();
    $conn = null;

}

?>

<form action="" method="post">
    <label>Mail:
        <br>
        <input type="email" name="email" placeholder="Tu wpisz swój email">
    </label>
    <br>
    <label>Login (minimum 2 znaki):
        <br>
        <input type="text" name="name" placeholder="Tu wpisz swój login">
    </label>
    <br>
    <label>Hasło (minimum 6 znaków):
        <br>
        <input type="password" name="password"
               placeholder="Tu ustal swoje hasło">
    </label>
    <br>
    <label>Powtórz hasło:
        <br>
        <input type="password" name="repeatPassword"
               placeholder="Tu powtórz swoje hasło">
    </label>
    <br>
    <br>
    <input type="submit" value="Zarejestruj się">
</form>

</body>
</html>
