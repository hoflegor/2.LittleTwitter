<?php
//poniżej napisz kod pobierający dane o pojedynczym filmie po przesłaniu żądania GET
$servername = "localhost";
$username = "root";
$password = "qweta";
$baseName = "cinemas_ex";

$conn = new mysqli($servername,
                   $username,
                   $password,
                   $baseName);

if ($conn->connect_error) {
    die("<strong>!!<strong>Connection failed. Error: <strong>$conn->connect_error!!</strong>.<br>");
}
echo("<strong>**</strong>Connected to database <strong>$baseName</strong>.<br>");



if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id=$_GET['id'];
//        var_dump($id);
    $sql="SELECT * FROM movies WHERE id_movies=$id";
     $result=$conn->query($sql);

    foreach ($result as $row) {
        $id = $row['id_movies'];
        $name = $row ['name'];
        $description = $row['description'];
        $rating = $row ['rating'];
}

//zapisz do poniższych zmiennych odpowiednie dane z bazy, formularz zostanie nimi automatycznie wypełniony

}

//poniżej napisz kod odpowiedzialny za obsługe formularza
if($_SERVER['REQUEST_METHOD']=='POST'){
    var_dump($_POST);

    $id=$_POST['movieId'];
    $name='"' . $_POST['movieName'] . '"';
    $description='"' . $_POST['movieDescription'] . '"';
    $rating=$_POST['movieRating'];

    $sql="UPDATE movies SET name=$name, description=$description, rating=$rating WHERE id_movies=$id";
    var_dump($sql);

    if ($conn->query($sql)==TRUE){
        echo "Eytowano film: $name";
    }
    else{
        echo "Bląd: " . $conn->error;
    }

}


$conn->close();
$conn = null;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 1 - edycja filmu</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="" method="post" role="form">
                <legend>Edycja filmu</legend>
                <div class="form-group">
                    <label for="">Id filmu</label>
                    <input type="text" class="form-control" readonly name="movieId" id="movieId" placeholder="Id filmu"
                           value="<?= $id ?>">
                </div>
                <?php echo $id;?>
                <div class="form-group">
                    <label for="">Nazwa filmu</label>
                    <input type="text" class="form-control" name="movieName" id="movieName" placeholder="Nazwa filmu"
                           value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <label for="">Opis filmu</label>
                    <input type="text" class="form-control" name="movieDescription" id="movieDescription"
                           placeholder="Opis filmu"
                           value="<?= $description ?>">
                </div>
                <div class="form-group">
                    <label for="">Rating filmu</label>
                    <input type="number" step="0.01" class="form-control" name="movieRating" id="movieRating"
                           placeholder="Rating filmu"
                           value="<?= $rating ?>">
                </div>
                <button type="submit" class="btn btn-primary">Edytuj</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
