<?php

//By Nastka
session_start();
$_SESSION["resultsPerPage"] = isset($_GET["perPage"]) ? $_GET["perPage"] : 15;
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    require ("../config.php");
    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASS;
    $baseName = DB_DB;
    $conn = new mysqli
    ($servername,
        $username,
        $password,
        $baseName);
    if ($conn->connect_error) {
        die("Połączenie nieudane. Błąd: " .
            $conn->connect_error);
    }
    $allUsers = 'SELECT * FROM users ORDER BY name ASC';
    $result = $conn->query($allUsers);
    $conn->close();
    $conn=0;
    $rowsPerTable = $_SESSION["resultsPerPage"];
    $rowCounter=0;
    $currentRows=0;
    $pageNumber=1;
    $pageTables=array();
    while ($rowCounter>=$currentRows && $rowCounter<$currentRows + $rowsPerTable){
        foreach ($result as $row){
            $pageTable[$pageNumber][]=$row;
            $rowCounter++;
            if ($rowCounter>=100){
                break 2;
            }
            if ($rowCounter>=$currentRows+$rowsPerTable){
                $pageNumber++;
                $currentRows=$currentRows+$rowsPerTable;
            }
        }
    }
    $pageCount=count($pageTable);
    $tableToDisplay = isset($_GET['page']) ? $_GET['page'] : 1;
    if(!is_numeric($tableToDisplay)){
        echo "Błędna strona - to nie jest liczba";
    }
    if($tableToDisplay <=0 ){
        die ("Błędna strona - poniżej zakresu");
    }
    if($tableToDisplay > $pageCount){
        die ("Błędna strona - powyżej zakresu");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 4 - paginacja</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <ul class="list-group userListPerPage">
                <?php
                foreach ($pageTable[$tableToDisplay] as $key=>$value){
                    echo "<li class='list-group-item user'>$value[name]<span class='badge'>$value[id]</span></li>";
                }
                ?>
            </ul>
            <ul class="pagination">
                <?php
                $resultsPerPage = isset($_SESSION["resultsPerPage"]) ? "perPage=$_SESSION[resultsPerPage]" : null;
                for ($i=1;$i<=$pageCount;$i++){
                    echo "<li><a href='zadanie4.php?page=$i&$resultsPerPage'>page $i</a></li>";
                }
                ?>
            </ul>
            <form action="zadanie4.php" method="GET">
                <input type="number" name="perPage" min="1" max="100"> Results per page
                <input type="submit">
            </form>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
</div>
</body>
</html>