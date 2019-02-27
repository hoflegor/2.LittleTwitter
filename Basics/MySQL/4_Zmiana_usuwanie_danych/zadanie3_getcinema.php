<?php
//poniżej napisz kod pobierający dane o pojedynczym kinie po przesłaniu żądania GET

//zapisz do poniższych zmiennych odpowiednie dane z bazy, formularz zostanie nimi automatycznie wypełniony
$id = '';
$name = '';
$address = '';

include('zadanie3_updatecinema.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 3 - edycja kina</title>
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
                <legend>Edycja kina</legend>
                <div class="form-group">
                    <label for="">Id kina</label>
                    <input type="text" class="form-control" readonly name="cinemaId" id="cinemaId" placeholder="Id kina"
                           value="<?= $id ?>">
                </div>
                <div class="form-group">
                    <label for="">Nazwa kina</label>
                    <input type="text" class="form-control" name="cinemaName" id="cinemaName" placeholder="Nazwa kina"
                           value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <label for="">Adres kina</label>
                    <input type="text" class="form-control" name="cinemaAddress" id="cinemaAddress"
                           placeholder="Adres kina"
                           value="<?= $address ?>">
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
