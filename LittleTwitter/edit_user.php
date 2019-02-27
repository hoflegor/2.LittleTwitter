<?php

$title = "LittleTwitter - edycja profilu";

require_once(__DIR__ . '/templates/header.php');
require_once(__DIR__ . '/src/User.php');


if ($_SERVER['REQUEST_METHOD'] == 'GET' &&
    $_GET['name'] != null) {

    $form = <<<EOL
<form action="" method="post">
    <label>Podaj aktualne hasło:<br>
        <input type="password" name="oldPasswrd">
    </label>
    <br>
    <label>Podaj nowe hasło:<br>
        <input type="password" name="newPasswrd">
    </label>
    <br>
    <label>Powtórz nowe hasło:<br>
        <input type="password" name="newPasswrdRep">
    </label>
    <br>
    <br>
    <input type="submit" value="Zmień hasło">
</form>
<hr>
EOL;

    echo $form;

    $delete = <<<EOL
<form action="" method="post">
    <button name="delete">Usuń profil</button>
</form>
EOL;

    echo $delete;


} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['oldPasswrd']) == true && $_POST['oldPasswrd'] != null
        && isset($_POST['newPasswrd']) == true && $_POST['newPasswrd'] != null
        && isset($_POST['newPasswrdRep']) == true && $_POST['newPasswrdRep'] != null


    ) {

        $oldPasswrd = $_POST['oldPasswrd'];
        $newPasswrd = $_POST['newPasswrd'];
        $newPasswrdRep = $_POST['newPasswrdRep'];

        $user = User::loadByUsername($conn, $login);

        if (password_verify($oldPasswrd, $user->getHashedPassword()) == false) {

            echo "<p><strong>Podano błędne aktualne hasło!!</strong><br>";
            echo "<a href='edit_user.php?name=$login'>Powrót do strony edycji profilu</a>";

        } elseif ($newPasswrd != $newPasswrdRep) {

            echo "<p><strong>Błędnie powtórzono nowe hasło!!</strong></p>";

        } elseif ($newPasswrd < 6) {

            echo "<p><strong>Nowe hasło musi składać się z minimum 6 znaków!!</strong></p>";

        } else {
            User::updatePass($conn, $user->getId(), $newPasswrd);

            echo "<p><strong>Twoje hasło zostało zmienione!!</strong></p><br>";
            echo "<a href='index.php'>Przejdź do strony głównej</a>";
        }

    } elseif (!isset($_POST['delete']) && !isset($_POST['finalDelete'])) {

        echo "<p><strong>Nie wprowadzono wszystkich wymaganych danych!!</strong><br>";
        echo "<a href='edit_user.php?name=$login'>Powrót do strony edycji profilu</a>";

    } elseif (isset($_POST['finalDelete'])) {

        $user = User::loadByUsername($conn, $login);

        if (password_verify($_POST['finalDelete'], $user->getHashedPassword()) == true) {

            $user->delete($conn);

            var_dump($conn->error);


            unset($_SESSION['loggedUser']);

            header('Location: utils/deleteUser.php');


        }

        else {
            echo "<p><strong>Podane błędne hasło!!</strong></p>";
        }

    } else {
        echo "<strong>Usunięcie profilu jest nieodwracalne, ostateczne, apokaliptyczne i nieco sado-masochistyczne...</strong>";
        echo "<p>Jeśli jesteś pewny, że chcesz usunąć profil i masz świadomość konsekwencji wpisz poniżej hasło.</p>";

        $deleteForm = <<<EOL
        
<form action="" method="post">
    <input type="password" name="finalDelete">
    <br>
    <input type="submit" value="Usuń profil">
</form>

EOL;

        echo $deleteForm;

    }


}


require_once(__DIR__ . '/templates/footer.php');