<?php

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

if ($_SERVER['REQUEST_METHOD']=='POST'){

//    var_dump($_POST);
    $movie=$_POST['movie'];
    $cinema=$_POST['cinema'];

    $sql="INSERT INTO Screenings (id_movies, id_cinemas) VALUES ('$movie','$cinema')";
    $result=$conn->query($sql);

    if($result==true){
        echo "Added movie: $movie, to cinema: $cinema";
    }
    else{
        echo "Error $conn->error";
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
    <title>Zadanie 3 - dodawanie seansu</title>
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
                <div class="form-group">
                    <label for="">Cinema</label>
                    <select name="cinema" id="cinema" class="form-control">
                        <option value=""> -- Select cinema --</option>
                        <?php
                        //dopisz tutaj kod generujący kolejne elementy option z kinami z bazy
                        //atrybut value ma mieć wartość id kina
                        //wyświetlana na stronie w polu option ma być nazwa kina

                        $sql="SELECT id, name FROM Cinemas";
                        $result=$conn->query($sql);

                        foreach ($result as $row){
                            $id=$row['id'];
                            $name=$row['name'];

                            echo "<option value=$id>$name</option>";
                        }


                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Movie</label>
                    <select name="movie" id="movie" class="form-control">
                        <option value=""> -- Select movie --</option>
                        <?php
                        //dopisz tutaj kod generujący kolejne elementy option z filmami z bazy
                        //atrybut value ma mieć wartość id filmu
                        //wyświetlana na stronie w polu option ma być nazwa filmu
                        $sql="SELECT id, name FROM Movies";
                        $result=$conn->query($sql);

                        foreach ($result as $row){
                            $id=$row['id'];
                            $name=$row['name'];

                            echo "<option value=$id>$name</option>";
                        }

                        $conn->close();
                        $conn = null;

                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">ADD SCREENING</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
