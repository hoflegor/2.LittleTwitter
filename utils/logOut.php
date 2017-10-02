<?php
session_start();

unset($_SESSION['loggedUser']);
echo "Wylogowałeś się z LittelTwitter ;-(<br>
    <a href='../index.php'>Przejdź do strony głównej</a> ";