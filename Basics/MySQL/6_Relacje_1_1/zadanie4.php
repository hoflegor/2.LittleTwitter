<?php
//dodaj tutaj kod odpowiedzialny za dodanie kodu osbługi formularza
if ($_SERVER['REQUEST_METHOD']=='POST'){

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

    $quantity=$_POST['ticketQuantity'];
    $price=$_POST['ticketPrice'];
    $type=$_POST['ticketType'];
//    var_dump($type);

    $sql="INSERT INTO Tickets (quantity, price) VALUES ($quantity, $price)";
    $result=$conn->query($sql);

    $lastId=$conn->insert_id;

    if($type=="cash" || $type=="card" || $type=="transfer"){
        $sql="INSERT INTO Payments (id, type, date) VALUES ($lastId, '$type', NOW())";
        var_dump($sql);
        $result=$conn->query($sql);
    }


    var_dump($quantity,$price,$type);

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
    <title>Zadanie 4 - kupowanie biletów</title>
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
                <legend>Buy ticket</legend>
                <div class="form-group">
                    <label for="">Ticket quantity</label>
                    <input type="number" class="form-control" name="ticketQuantity" id="ticketQuantity"
                           placeholder="Ticket quantity...">
                </div>
                <div class="form-group">
                    <label for="">Ticket price</label>
                    <input type="number" step="0.01" class="form-control" name="ticketPrice" id="ticketPrice"
                           placeholder="Ticket price...">
                </div>
                <div class="form-group">
                    <label for="">Payment type</label>
                    <select name="ticketType" id="ticketType" class="form-control">
                        <option value=""> -- Select payment --</option>
                        <option value="card">Card</option>
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">ADD</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
