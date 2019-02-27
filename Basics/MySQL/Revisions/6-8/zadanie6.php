<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 6 - oferty kończące</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <ul class="offerList">
                <?php
                //<li>Tytul oferty 1</li>
                //<li>Tytul oferty 2</li>

                //poniżej wygeneruj liste tytułów ofert spełniających założenia zadania
                ?>
            </ul>

            <form action="" method="post" role="form">
                <legend>Oferty kończące</legend>
                <div class="form-group">
                    <label for=""></label>
                    <select name="daysToEnd" id="daysToEnd" class="form-control">
                        <option value=""> --Wybierz --</option>
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="7">7</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Pokaż</button>
            </form>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        </div>
    </div>
</div>

</body>
</html>
