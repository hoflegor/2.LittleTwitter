<?php
// Poniżej napisz kod obsługujący formularz
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

$sql='SELECT id_movies, name FROM movies';
$result=$conn->query($sql);

//usuwanie filmu
if ($_SERVER['REQUEST_METHOD']=='POST'){
//    var_dump($_POST);
    if ($_POST['movie']==""){
            echo "<strong>!!!!</strong> Wrong input - select movie <strong>!!!!</strong><br>";
    }
    else{
        $id=$_POST['movie'];
//        var_dump($id);
        $sql= "DELETE FROM movies WHERE id_movies=$id";
//        var_dump($sql);
        $result=$conn->query($sql);
        echo "Film usunięty";
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
    <title>Zadanie 2 - usuwanie filmu</title>
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
                <legend>Remove movie</legend>
                <div class="form-group">
                    <label for="">Movie</label>
                    <select name="movie" id="movie" class="form-control">
                        <option value=""> -- Select movie --</option>
                        <?php
                        //dopisz tutaj kod generujący kolejne elementy option z filmami z bazy
                        //atrybut value ma mieć wartość id filmu
                        //wyświetlana na stronie w polu option ma być nazwa filmu
                        foreach ($result as $row){
                            $id=$row['id_movies'];
                            $name=$row['name'];
                            echo "<option value='$id'>$name</option>";
                        }
                        $conn->close();
                        $conn = null;
                        ?>
                    </select>
                </div>
                <button type="submit" value="remove" class="btn btn-danger">REMOVE</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>
</div>
</body>
</html>
