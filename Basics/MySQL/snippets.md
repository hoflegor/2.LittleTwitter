<img alt="Logo" src="http://coderslab.pl/wp-content/themes/coderslab/svg/logo-coderslab.svg" width="400">

# MySQL - Snippety
> Krótkie kawałki kodu, które pokazują zależności, rozwiązują popularne problemy oraz pokazują jak używać niektórych funkcji.


#### 1. Jak połączyć się z bazą MySQL w PHP

```PHP
$pdo = new PDO("mysql:host=localhost;dbname=database", 'username', 'password');
```
Aby zmienić silnik bazodanowy np. na SQLite zmieniamy tylko argumenty konstruktora, bez konieczności zmiany użytych metod.

#### 2. Czym różni się kodowanie `utf8_general_ci` od `utf8_polish_ci`?

Różnica występuje w momencie sortowania danych, w przypadku `utf8_general_ci` wyrazy rozpoczęte od polskiego znaku trafią na koniec listy sortowania, dla przykładu posiadając w bazie miasta `Białystok, Łódź, Kraków, Arłamów, Zabrze` w przypadku kodowania:  
* `utf8_general_ci` - miasta zostaną posortowane `Arłamów, Białystok, Kraków, Zabrze, Łódź`
* `utf8_polish_ci` - miasta zostaną posortowane `Arłamów, Białystok, Kraków, Łódź, Zabrze`

#### 3. Jak z konsoli połączyć się z bazą danych?

```SQL
mysql -u userName -p dbName <- ta komenda interaktywnie zapyta nas o hasło
```

Możemy także samodzielnie przełączyć się na bazę danych: 
```SQL
use dbName;
```
Aby sprawdzić liczbę tabel w bazie:
```SQL
show tables;
```

#### 4. Jak usunąć wszystko rekordy z tabeli?

```SQL
DELETE FROM tableName;
```
Powyższe zapytanie resetuje również automatycznie licznik `auto_increment`

#### 5. Jak z konsoli dodać nowego użytkownika do bazy danych?

Najpierw dodajemy użytkownika:  
```SQL
CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
```

A następnie musimy dodać użytkownikowi dostęp do wybranej bazy/tabeli
```SQL
GRANT ALL ON database.* TO 'username'@'localhost';
```

Zapytania te są ogólnymi zapytaniami do dodania wszelkich uprawnień użytkownikowi na bazie, w celu bardziej szczegółowych uprawnień zapoznaj się z dokumentacją.

#### 6. Jak pobrać szczegółowe informacje (klucze itp.) z pobranych rekordów?

Dodajemy do naszego zapytania na początku `EXPLAIN` np.  
```SQL
EXPLAIN SELECT * FROM users;
```

#### 7. Jak obliczyć ilość rekordów w tabeli?

```SQL
SELECT COUNT(anyColumnName) as count FROM tableName;
```

#### 8. Jaki zakres danych przechowuje typ `varchar`?

W najnowszych wersjach MySQL `varchar` może przyjąć `65.535` znaków. Różnica występuje w zajętości pamięci przez rekord, w przypadku jeśli typ to maksymalnie `varchar(255)` długość pola zajmuje 1 bajt, w przypadku dowolnie dłuższej wielkości pola np. `varchar(1500)` długość będzie zajmować 2 bajty.

#### 9. Czy można przechowywać liczby jako `text`?

Tak, ale nie należy tego robić, typy danych dla liczb np. `int` działają dużo szybciej w przypadku sortowania i pobierania danych.

#### 10. Jakiego typu danych użyć do przechowania ceny?

**Zdecydowanie** `decimal` ponieważ przechowuje on dokładną wartość i nie wynikną problemy w przypadku operacji arytmetycznych.
Definicja `decimal(6,2)` oznacza, iż liczba w sumie (przed i po przecinku) ma mieć `6` cyfr a tylko po przecinku `2`.

#### 11. Jak wykonać backup bazy danych?

**Backup pojedynczej bazy danych**
```Shell
mysqldump -u root -pPASSWORD DB_NAME > backup.sql
```
Syntax
```Shell
mysqldump -u root -p[root_password] [database_name] > dumpfilename.sql
```

**Backup wielu bazy danych**
```Shell
mysqldump -u root -pPASSWORD --databases DB_NAME_1 DB_NAME_2 > backup_multi.sql
```
**Backup wszystkich baz danych**
```Shell
mysqldump -u root -pPASSWORD --all-databases > backup_all.sql
```
**Backup pojedynczej tabeli**
```Shell
mysqldump -u root -pPASSWORD DB_NAME TABLE_NAME > backup_table_in_db.sql
```    

#### 12. Jak przywrócić backup bazy danych?
```Shell
mysql -u root -pPASSWORD DB_NAME < /tmp/backup.sql
```
Syntax
```Shell
mysql -u root -p[root_password] [database_name] < dumpfilename.sql
```

#### 13. Jak wygenerować kod `sql` tworzący wybraną tabelę?

```SQL
SHOW CREATE TABLE table_name;
```

#### 14. Jak masowo zamienić string we wszystkich rekordach w kolumnie?

```SQL
UPDATE   TABLE
SET      COLUMN = REPLACE(COLUMN, search_string, replace_string)
WHERE    COLUMN LIKE '%search_string%'
```
np.
```SQL
UPDATE   DatabaseName.TableName
SET      PDF_NAME = REPLACE(PDF_NAME, '+', '_')
WHERE    PDF_NAME LIKE '%+%'
```

#### 15. Jak w `where` dodać warunek `x dni` temu?

```SQL
WHERE my_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 5 DAY)
```


#### 16. Jak usunąć rekordy o zduplikowanej wartości wybranej kolumny, pozostawiając jeden rekord z daną wartością?

Założenie, nasza tabela wygląda następująco:
```SQL
+----+--------+
| id | name   |
+----+--------+
| 1  | google |
| 2  | yahoo  |
| 3  | msn    |
| 4  | google | <-- duplikat
| 5  | google | <-- duplikat
| 6  | yahoo  | <-- duplikat
+----+--------+
```

Chcemy osiągnąć:
```SQL
+----+--------+
| id | name   |
+----+--------+
| 1  | google |
| 2  | yahoo  |
| 3  | msn    |
+----+--------+
```

Wykonujemy zapytanie:
```SQL
DELETE n1 FROM names n1, names n2 WHERE n1.id > n2.id AND n1.name = n2.name
```

Gdzie:
```
n1, n2 - aliasy tej samej tabeli
n1.name = n2.name - porównanie wartości rekordów czy są takie same, name to nazwa kolumny, w której szukamy duplikatów
n1.id > n2.id - usuwa rekordy, pozostawiając pojedynczy rekord z najniższym id
```

#### 17. Jak pobierać unikalny rekord?

Jeśli chcemy sprawdzić czy istnieje w naszej tabeli jakikolwiek `user` gdzie `city` to `Warsaw`
Zamiast
```SQL
SELECT * FROM user WHERE city = 'Warsaw';
```
Wydajniej zadziała
```SQL
SELECT * FROM user WHERE city = 'Warsaw' LIMIT 1;
```

`LIMIT 1` spowoduje zatrzymanie dalszego przeszukiwania tabeli po znalezieniu pierwszego rekordu spełniającego warunek `WHERE`.

#### 18. Jak wykonywać zapytania na kolumnach tekstowych z indexem?
 
 Jeśli dodaliśmy indeks do kolumny tekstowej, indeks zostanie użyty jedynie jeśli w zapytaniu `LIKE` na początku wzorca nie znajdzie się znak dowolnego znaku czyli `%`.
 
 Nie użyje indeksu:
```SQL
SELECT * FROM user WHERE city LIKE '%War%';
```
Użyje indeksu:
```SQL
SELECT * FROM user WHERE city LIKE 'War%';
```

#### 19. Czy istnieje różnica przy użyciu `varchar(10)` a `text` dla stringów mających max. 10 znaków?

Tak, zawsze używaj najmniejszego możliwego zakresu danych, w których mieści się zakładana wartość.  
Mniejszy zakres to mniej użytej pamięci jak również szybsze wyszukiwanie.

#### 20. Jak wybrać losowe rekordy?

W `MySQL` istnieje funkcja `RAND()`, której możemy użyć następująco:
```SQL
SELECT username FROM user ORDER BY RAND() LIMIT 1
```

Takie zapytanie z użyciem `RAND()` jest bardzo nie wydajne i przy dużych zbiorach danych spowoduje długie wykonywanie zapytania.

Lepiej użyć poniższego sposobu:
```PHP
$r = mysql_query("SELECT count(*) FROM user");
$d = mysql_fetch_row($r);
$rand = mt_rand(0,$d[0] - 1);
 
$r = mysql_query("SELECT username FROM user LIMIT $rand, 1");
```

#### 21. Jak prawidłowo pobierać dane z tabel?

Jeśli to możliwe, nie pobierajmy wszystkich kolumn z tabeli a więc zamiast:
```SQL
SELECT * FROM users
```
użyj
```SQL
SELECT col1, col2, col3 FROM users
```

Dzięki temu przesłane będzie mniej danych, co zoptymalizuje szybkość działania.

#### 22. Jakiego typu użyć dla kolumny statusu zamówienia?
 
 Jeśli nasza kolumna przechowuje kilka stałych wartości np. statusu zamówienia:
 * złożone
 * opłacone
 * realizowane
 * wysłane  
 
Możemy użyć typu `varchar` ale zdecydowanie lepszym i wydajniejszym będzie tutaj typ `enum`
 
#### 23. Jak przechować adres IP użytkownika w bazie danych?
 
 Adres IP składa się minimalnie z 7 znaków `1.1.1.1` a maksymalnie z 15 znaków `192.168.154.199`.  
 Pierwszym typem, który przychodzi na myśl do użycia w kolumnie jest `varchar`.  
 Lepszym rozwiązaniem będzie tutaj użycie typu `int` i funkcji `MySQL` `INET_ATON`, która zamieni adres IP z formy tekstowej na liczbę całkowitą oraz `INET_NTOA`, która zamieni liczbę całkowitą na adres IP.  
 Wartość liczbowa jest zawsze wydajniejsza przy sortowaniu i wyszukiwaniu.
 
#### 24. Narzędzia do analizy baz danych w celu optymalizacji.
* https://github.com/major/MySQLTuner-perl
* https://github.com/RootService/tuning-primer