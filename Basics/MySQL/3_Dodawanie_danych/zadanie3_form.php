<?php
//poniżej napisz kod dodający dane do tabeli w zależności od tego jaki formularz został przesłany
//PAMIĘTAJ O WALIDACJI PRZESYŁANYCH DANYCH

if ($_SERVER['REQUEST_METHOD']=='POST'){

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
    die("!!Connection failed. Error: <strong>$conn->connect_error</strong>.<br>");
}
echo("<strong>**</strong>Connected to database <strong>$baseName</strong>.<br>");

//Walidacja danych

switch($_POST['submit']){

    case 'cinemas':
        $name=$_POST['name'];
        $adrress=$_POST['address'];
        $sql="INSERT INTO cinemas (name, address) VALUES ('$name', '$adrress')";
//        var_dump($sql);
        $echo = "<strong>**</strong>Added cinema:<br>name: $name <br>address: $adrress.<br>";
        break;

    case 'movies':
        $name=$_POST['name'];
        $description=$_POST['description'];

        if (!is_numeric($_POST['rating']) ||
            !isset($_POST['rating']) ||
            ($_POST['rating'])<=0 ||
            ($_POST['rating']>10)){
            echo "<strong>!!</strong>Wrong input - movie rating<strong>!!</strong><br>";
            }
        else{
            $rating=$_POST['rating'];
            $sql="INSERT INTO movies (name, description, rating) VALUES ('$name', '$description', '$rating')";
            var_dump($sql);
            $echo = "<strong>**</strong>Added movie:<br>name: $name <br>
                    descriptiom: $description.<br>rating: $rating<br>";
            }
            break;

    case'payments':
        if($_POST['type'] === 'online' ||
            $_POST['type'] === 'cash' ||
            $_POST['type'] === 'card'){
            $type=$_POST['type'];
        }
        $date=$_POST['date'];
        $sql="INSERT INTO payments (type, date) VALUES ('$type', '$date')";
        var_dump($sql);
        $echo = "<strong>**</strong>Added paymet:<br>type: $type <br>
                    date: $date<br>";
        }

//    Wysłanie/sprawdzanie zapytania
if($conn->query($sql)===TRUE){
    echo("$echo");
}else{
    echo("Error: $conn->error");
}

//Niszczenie połączenia
    $conn->close();
    $conn = null;

}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 3 - formularze dodawania do bazy</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body

<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="" method="post" role="form" class="cinema_form">
                <legend>Dodaj kino</legend>
                <div class="form-group">
                    <label for="name">Nazwa</label>
                    <input type="text" class="form-control" name="name" id="name" maxlength="255"
                           placeholder="Nazwa...">
                </div>
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" name="address" id="address" maxlength="255"
                           placeholder="Adres...">
                </div>
                <button type="submit" name="submit" value="cinemas" class="btn btn-primary">Dodaj</button>
            </form>
            <hr>
            <form action="" method="post" role="form" class="34w2q1_form">
                <legend>Dodaj film</legend>
                <div class="form-group">
                    <label for="name">Nazwa</label>
                    <input type="text" class="form-control" name="name" id="name" maxlength="255"
                           placeholder="Nazwa...">
                </div>
                <div class="form-group">
                    <label for="description">Opis</label>
                    <input type="text" class="form-control" name="description" id="description" maxlength="255"
                           placeholder="Opis...">
                </div>
                <div class="form-group">
                    <label for="rating">Ocena</label>
                    <input type="number" class="form-control" name="rating" id="rating" min="0" max="30" step="0.01"
                           placeholder="Ocena...">
                </div>
                <button type="submit" name="submit" value="movies" class="btn btn-primary">Dodaj</button>
            </form>
            <hr>
            <form action="" method="post" role="form" class="ticket_form">
                <legend>Dodaj bilet</legend>
                <div class="form-group">
                    <label for="quantity">Ilość</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" min="0"
                           placeholder="Ilość...">
                </div>
                <div class="form-group">
                    <label for="price">Cena</label>
                    <input type="number" class="form-control" name="price" id="price" min="0" step="0.01"
                           placeholder="Cena...">
                </div>
                <button type="submit" name="submit" value="tickets" class="btn btn-primary">Dodaj</button>
            </form>
            <hr>
            <form action="" method="post" role="form" class="payment_form">
                <legend>Dodaj płatność</legend>
                <div class="form-group">
                    <label for="type">Typ płatności</label>
                    <select name="type" id="type" class="form-control">
                        <option value=""> -- Wybierz Typ --</option>
                        <option value="online">online</option>
                        <option value="cash">cash</option>
                        <option value="card">card</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="date" class="form-control" name="date" id="date"
                           placeholder="Data...">
                </div>
                <button type="submit" name="submit" value="payments" class="btn btn-primary">Dodaj</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
