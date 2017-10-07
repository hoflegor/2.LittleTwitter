<?php
session_start();

unset($_SESSION['loggedUser']);
header("refresh: 8 ../index.php");
echo "<h1>Jako, że Ty wychodzisz, to my będziemy się smucić ;-( <br><br>
            Za 8 sekund ten tekst zniknie, a Ty może zechcesz wrócić?</h1>";