<?php
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
if($_SERVER['REQUEST_METHOD']=='POST'){
    if (!isset($_POST['offer'])){
        die ("offer not selected");
    }
    elseif (!isset($_POST['src'])){
        die ("no link given");
    }
    elseif (!isset($_POST['dimension'])){
        die ("no dimension given");
    }
    else {
        $offerID = intval($_POST['offer']);
        $src=$_POST['src'];
        $dimension=$_POST['dimension'];
        $sql="INSERT INTO images (offer_id, src, dimension) VALUES ($offerID, '$src', '$dimension')";
        $result=$conn->query($sql);
        if($result==false){
            echo $conn->error;
        }
        elseif($result==true){
            echo "Obrazek został dodany do oferty ID $offerID";
        }
    }
}
$sql = "SELECT * FROM offers";
$result = $conn->query($sql);
if($result==false){
    echo $conn->error;
}
$conn->close();
$conn=null;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 4 - dodawanie obrazków do ofert</title>
</head>
<body>
<form action="" method="POST" role="form">
    <select name="offer" id="offer" class="form-control">
        <option value=""> -- Wybierz --</option>
        <?php
        foreach ($result as $row){
            $id = $row['id'];
            $title = $row['title'];
            echo "<option name='cinema' value=$id>$title</option>";
        }
        ?>
    </select><br>
    <input type="text" name="src"> enter link to image<br>
    <input type="text" name="dimension"> enter image dimensions<br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
</body>
</html>