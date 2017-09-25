<?php

if (isset($_SESSION['loggedUser']) && $_SESSION!=null) {
    $loggedUser = $_SESSION['loggedUser'];

    require_once(__DIR__ . '/../src/conn.php');

    $sql = "SELECT id FROM users WHERE username='$loggedUser'";
    $result = $conn->query($sql);

    foreach ($result as $row) {
        $loggedUserId = $row['id'];
        $log=true;
        return $log;
    }
}
elseif(!isset($_SESSION['loggedUser']) || $loggedUser==null){
    echo "<h1>By uzyskać pełny dostęp, musisz być zalogowany!</h1><hr>";

    require_once (__DIR__ . "/../login.php");

    echo "<hr>Jeśli nie masz konta,
            <a href='register.php'>
            <ins><strong>zarejestruj się</strong></ins></a>!!";
    $log=false;
    return false;
}

var_dump($loggedUser);