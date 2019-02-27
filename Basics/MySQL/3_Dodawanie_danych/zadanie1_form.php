<?php
//zapisz poniżej kod obsługujący wysłanie formularza
//pamiętaj o sprawdzeniu czy dane przesłane zostały odpowiednią metodą HTTP
//pamiętaj o połączeniu do bazy danych

if($_SERVER['REQUEST_METHOD'] == 'POST'){

//    Łączenie z bazą

    $servername = "localhost";
    $username = "root";
    $password = "qweta";
    $baseName = "products_ex";

    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $baseName);

    if ($conn->connect_error) {
        die("<br>!!Connection failed. Error: <strong>$conn->connect_error.</strong>");
    }
    echo("<br>**Connected to database $baseName");

//Sprawdzanie zmiennych
   if (isset($_POST['name']) === false || strlen($_POST['name'])<=0){
        echo "!!Wrong input - name!!";
    }
    else{
        $name=$_POST['name'];
    }

    if (isset($_POST['description']) === false || strlen($_POST['description'])<=0){
        echo "!!Wrong input - description!!";
    }
    else{
        $description=$_POST['description'];
    }

    if (isset($_POST['price'])===false || !is_numeric($_POST['price']) || $_POST['price'] <=0){
        echo "!!Wrong input - price!!";
    }
    else{
        $price=$_POST['price'];
    }

    $sql="INSERT INTO products (name, description, price) VALUES ('$name','$description','$price');";
//    var_dump($sql);



    if($conn->query($sql)===TRUE){
    echo("<br>Added new record, id: $conn->insert_id<br>");
    }else{
    echo("<br>Error: <strong>$conn->error</strong>");
    }

    $conn->close();
    $conn = null;

}

else{
    echo "!!Wrong input - not POST method !!";
}
