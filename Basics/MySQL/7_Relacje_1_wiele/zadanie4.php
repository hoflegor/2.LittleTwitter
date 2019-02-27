<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 4 - dodawanie podkategorii</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="zadanie4_add_sub.php" method="post" role="form">
                <legend>Add subcategory</legend>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="Name...">
                </div>
                <div class="form-group">
                    <label for="">Main category</label>
                    <select name="mainCategory" id="mainCategory" class="form-control">
                        <option value=""> -- Select main cat --</option>
                        <?php
                        //dopisz tutaj kod generujący kolejne elementy option z głównymi kategoriami z bazy
                        //atrybut value ma mieć wartość id głównej kategorii
                        //wyświetlana na stronie w polu option ma być nazwa głównej kategorii

                        $servername = "localhost";
                        $username = "root";
                        $password = "qweta";
                        $baseName = "products_ex";

                        $conn = new mysqli($servername,
                                           $username,
                                           $password,
                                           $baseName);

                        if ($conn->connect_error) {
                            die("<strong>!!<strong>Connection failed. Error: <strong>$conn->connect_error!!</strong>.<br>");
                        }
                        echo("<strong>**</strong>Connected to database <strong>$baseName</strong>.<br>");

                        $sql = "SELECT * FROM Categories";
                        $result=$conn->query($sql);

                        foreach ($result as $row){
                            echo "<option value=" .$row['id_categories'] .">" . $row['name'] . "</option>";
                        }

                        $conn->close();
                        $conn = null;

                        ?>
                    </select>
                </div>
                <button type="submit" value="catSub" class="btn btn-success">ADD SUB-CATEGORY</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>
</div>
</body>
</html>
