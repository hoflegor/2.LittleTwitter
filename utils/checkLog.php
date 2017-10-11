<?php
session_start();

if (isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']!=null) {
    $log=[];
    $log['check']=true;
    $log['user']=$_SESSION['loggedUser'];
    return $log;
    }

    $log['check']=false;
    $log['user']=null;
    return $log;

//var_dump($loggedUser);