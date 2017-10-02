<?php
session_start();

if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']!=null) {
    $log=[];
//    echo "Zalogowany użytkownik:" . $_SESSION['loggedUser'];
    $log['check']=true;
    $log['user']=$_SESSION['loggedUser'];
    return $log;
    }

    echo "<h1>By uzyskać pełny dostęp, musisz być zalogowany!</h1><hr>";

    require_once (__DIR__ . '/../login.php');

    echo "<hr>Jeśli nie masz konta,
            <a href='../register.php'>
            <ins><strong>zarejestruj się</strong></ins>
            </a>!!";

    $log['check']=false;
    $log['user']=null;
    return $log;

//var_dump($loggedUser);