<?php

require_once (__DIR__ . '/../config.php');

$query1 = '';

$query2 = '';

$query3 = '';

$query4 = 'SELECT * FROM  users WHERE SHA2(CONCAT(name, salt), 256) = password';

$query5 = '';

$query6 = '';

$query7 = 'SELECT title, price, phone FROM offers WHERE status = 1 AND DATEDIFF(expire, NOW()) > 0';

$query8 = '';

$query9 = '';

$query10 = '';

$query11 = '';

$query12 = '';

$query13 = 'UPDATE offers SET promoted = 1, promoted_to = DATE_ADD(NOW(), INTERVAL, 30 DAY)
              WHERE promoted = 0 AND SUBSTR(phone, 3, 2) = "48"';

$query14 = '';

$query15 = '';

$query16 = 'SELECT COUNT(*) FROM offers WHERE status = 1 AND AND DATEDIFF(NOW(), expire) < 0';

$query17 = '';

$query18 = '';

$query19 = '';

$query20 = '';