<?php
//pobierz listę id i tytułu filmów
$servername = "localhost";
$username = "root";
$password = "qweta";
$baseName = "cinemas_ex";

//Nawiązywanie połączenia
$conn = new mysqli($servername,
                   $username,
                   $password,
                   $baseName);

//Sprawdzanie połączenia
if ($conn->connect_error) {
    die("<strong>!!<strong>Connection failed. Error: <strong>$conn->connect_error!!</strong>.<br>");
}
echo("<strong>**</strong>Connected to database <strong>$baseName</strong>.<br>");


$sql="SELECT id_movies, name FROM movies";
$result=$conn->query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 1 - modyfikacja danych</title>
</head>
<body>
<?php
//tutaj wygeneruj linki z przekazaniem id filmu za pomocą GET np:
//<a href="zadanie1_getmovie.php?id=34" target="_blank">tytuł filmu</a>
foreach ($result as $row){
   echo '<a href="zadanie1_getmovie.php?id=' . $row['id_movies'] . '"'. 'target="_blank">' . $row['name'] . "</a>" ."<br>";

}

$conn->close();
$conn = null;
?>

</body>
</html>
