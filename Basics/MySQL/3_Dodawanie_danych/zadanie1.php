<?php
//zapisz poniżej zapytania dodające rekordy do pierwszej tabeli
$table1row1 = 'INSERT INTO clients(name, surname) VALUES ("Jane", "Doe");';
$table1row2 = 'INSERT INTO clients(name, surname) VALUES ("John", "Doe");';
$table1row3 = 'INSERT INTO clients(name, surname) VALUES ("Jan", "Niezbedny");';
$table1row4 = 'INSERT INTO clients(name, surname) VALUES ("Piotr", "Poczebny");';
$table1row5 = 'INSERT INTO clients(name, surname) VALUES ("Jam", "Cham");';

//zapisz poniżej zapytania dodające rekordy do drugiej tabeli
$table2row1 = 'INSERT INTO orders (description) VALUES ("Salvus menss ducunt ad victrix.");';
$table2row2 = 'INSERT INTO orders (description) VALUES ("Est pius adiurator, cesaris.");';
$table2row3 = 'INSERT INTO orders (description) VALUES ("With apples drink ketchup.");';
$table2row4 = 'INSERT INTO orders (description) VALUES ("Hail me furner, ye proud whale!");';
$table2row5 = 'INSERT INTO orders (description) VALUES ("Engage, definition!");';

//zapisz poniżej zapytania dodające rekordy do trzeciej tabeli
$table3row1 = 'INSERT INTO products (name, description, price) VALUES ("whiskey", "Broccoli fritters has to have a sliced, hot ginger component.", 69.99);';
$table3row2 = 'INSERT INTO products (name, description, price) VALUES ("cola", "Per guest prepare a handfull tablespoons of crême fraîche with crushed apple for dessert.", 4.99);';
$table3row3 = 'INSERT INTO products (name, description, price) VALUES ("lemon", "Combine steak, lobster and melon. blend with salty jasmine and serve heated with white bread. Enjoy!", 0.99);';
$table3row4 = 'INSERT INTO products (name, description, price) VALUES ("juice", "Minced, rich pudding is best brushed with raw lemon juice.", 3.99);';
$table3row5 = 'INSERT INTO products (name, description, price) VALUES ("water", "Try roasting pie flavored with champaign, rubed with baking powder.", 1.99);';

//dodaj poniżej kod, który spowoduje podpięcie pliku z obsługą formularza i zapisu do bazy
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 1 - dodawanie produktów do bazy</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="zadanie1_form.php" method="post" role="form">
                <legend>Add product</legend>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name...">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                           placeholder="Description...">
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price"
                           placeholder="Price...">
                </div>
                <button type="submit" class="btn btn-primary">Add product</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
