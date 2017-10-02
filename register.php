<?php
?>

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

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    echo "<form action=\"\" method=\"post\">
        <label>Mail:
            <br>
            <input type=\"email\" name=\"email\" placeholder=\"Tu wpisz swój email\">
        </label>
        <br>
        <label>Login (minimum 2 znaki):
            <br>
            <input type=\"text\" name=\"name\" placeholder=\"Tu wpisz swój login\">
        </label>
        <br>
        <label>Hasło (minimum 6 znaków):
            <br>
            <input type=\"password\" name=\"password\"
                   placeholder=\"Tu ustal swoje hasło\">
        </label>
        <br>
        <label>Powtórz hasło:
            <br>
            <input type=\"password\" name=\"repeatPassword\"
                   placeholder=\"Tu powtórz swoje hasło\">
        </label>
        <br>
        <input type=\"submit\" value=\"Zarejestruj się\">
    </form>";
} else {

    require(__DIR__ . "/utils/conn.php");

    if (isset($_POST['email']) == true &&
        isset($_POST['name']) == true && strlen($_POST['name']) >= 2 &&
        isset($_POST['password']) == true && strlen($_POST['password']) >= 6 &&
        $_POST['password'] == $_POST['repeatPassword']) {

        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $name = $conn->real_escape_string($_POST['name']);

        require(__DIR__ . "/src/User.php");


        User::register($conn, $email, $name, $password);

        $conn->close();
        $conn = null;

    } else {
        echo "<strong>!!</strong>Wrong input - błędne lub niepełne dane <strong>!!</strong><br>";
    }
}

?>

<hr>
<a href="index.php">Przejdź do strony głównej</a>

</body>
</html>
