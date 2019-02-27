<?php
//ByNastka
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
$usersAndMails = "SELECT name, email FROM users";
$resultUsers = $conn->query($usersAndMails);
$allDomains = "SELECT substring_index(email, '@', -1) FROM users GROUP BY substring_index(email, '@', -1)";
$resultDomains = $conn->query($allDomains);
$conn->close();
$conn=0;
$domainTable=array();
foreach ($resultDomains as $row){
    $domainTable[] = $row["substring_index(email, '@', -1)"];
}
$userTable=array();
foreach ($resultUsers as $row){
    $userTable["$row[name]"]=$row['email'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 5 - użytkownicy w domenie</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <!--Poniżej napisz formularz-->
            <form action="" method="post" role="form">
                <legend>Użytkownicy w domenie</legend>

                <div class="form-group">
                    <label for="domain">Domena</label>
                    <select name="domain" id="domain" class="form-control">
                        <option value=""> -- Wybierz domenę --</option>
                        <?php
                        for ($i=0 ; $i<= count($domainTable)-1 ; $i++){
                            echo "<option value='$domainTable[$i]'>$domainTable[$i]</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Pokaż</button>
            </form>
            <ul class="list-group userList">
                <?php
                if ($_SERVER["REQUEST_METHOD"] = "POST" && isset($_POST["domain"])){
                    foreach ($userTable as $key=>$value){
                        if (strpos($value, "$_POST[domain]") !== false){
                            echo "<li class='list-group-item user'>$key ($value)</li>";
                        }
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
</div>

</body>
</html>
