<?php
//Stwórz poniżej odpowiednie zmienne z danymi do bazy
$serverName="localhost";
$userName="root";
$password="qweta";
$baseName="cinemas_ex";

//Poniżej napisz kod łączący się z bazą danych
$conn = new mysqli($serverName, $userName, $password, $baseName);

if($conn->connect_error){
    die ("Connection failed. Error: $conn->connect_error");
}
else{
    echo "Connected to database: $baseName<hr>";
}

$getAvgQuery = 'SELECT AVG(rating) FROM Movies';

$sql = "SELECT AVG(rating) AS avg_rating FROM movies";


$result = $conn->query($sql);
$row = $result->fetch_assoc();
$average = $row['avg_rating'];
echo "Avarage rating: " . $average ."<hr>";

$sql="SELECT name, rating FROM movies WHERE rating > $average";
$result=$conn->query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 2 - wyświetlanie danych z bazy</title>
</head>
<body>
<?php
//wyświetl filmy z ratingiem większym niż średnia
Echo "Better than average: <br>";
foreach ($result as $row){
        echo "**" . $row['name'] .": " . $row['rating'] . "<br>";
}

$conn->close();
$conn=null;
?>
</body>
</html>
