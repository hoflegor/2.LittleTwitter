# OOP - zadania domowe
> Wszystkie zadania rozwiązuj w przygotowanych do tego plikach.

>Zadania z dopiskiem "dodatkowe" są dla chętnych

**WAŻNE -  nie zmieniaj struktury/nazw plików oraz korzystaj z przygotowanych zmiennych**
 
#### Zadanie 1

W pliku `Course.php`, stwórz klasę `Course`, reprezentującą kurs, która:  

1. Posiada prywatną własność `name`, nazwę kursu - maksymalna długość 10 znaków
2. Posiada prywatną własność `hours`, przechowującą ilość godzin kursu - liczba całkowita, większa od `0`, maksymalna wartość `50`
3. Posiada prywatną własność `startDate`- data w formacie `YYYY-MM-DD` - hint [php_date][php_date]
4. Pamiętaj o dodaniu seterów i geterów, gdzie nazwa setera i getera to `setWlasnosc`, `getWlasnosc` np. `setStartDate`, `getStartDate`, inny format nazwy setera i getera będą odrzucone 
5. Setery powinny **zwrócić** `false`, jeśli ustawiana wartość nie spełnia warunku.

#### Zadanie 2

W pliku `Course.php` z zadania 1 dodaj:  

1. Prywatną własność `students`, **tablicę** przechowującą listę kursantów w formie imienia i nazwiska
2. Geter do własności `students`.
3. Metodę `addStudent($name)`, która doda kursanta, metoda nie może pozwolić na dodanie więcej niż `6` kursantów na kurs, w przypadku próby dodania 7go kursanta metoda ma zwrócić `false`
4. Metodę `removeStudent($name)`, która usunie kursanta.

#### Zadanie 3 

W pliku `Course.php` z zadania 1 i 2 dodaj:  

1. Metodę `daysToStart()`, której zadaniem jest wyświetlenie ile dni pozostało do startu kursu:  
 * jeśli data kursu nie jest ustawiona metoda powinna zwrócić string `startDate not set`
 * jeśli kurs ma ustawiony start na `2020-07-17` a dziś jest `2020-07-12` to metoda powinna zwrócić `5`  
 * jeśli czas startu kursu jest w przeszłości metoda powinna zwrócić string `Course started`
 
#### Zadanie 4

W pliku `HTML.php`, stwórz klasę `HTML`, reprezentującą element html, która:  

1. Posiada chronioną własność `id`, dla ułatwienia zakładamy, że nie będzie 2 obiektów klasy `HTML` z takim samym `id`
2. Konstruktor, przyjmujący 1 argument, `id` elementu
3. Posiada chronioną własność `type`, type elementu `inline` lub `block`
4. Posiada chronioną własność `class`, tablicę zawierającą listę klas elementu, domyślnie pusta, seter nie powinien zezwolić na przekazanie innej wartości niż tablicy, w przypadku próby przekazania innej wartości niż tablicy metoda powinna zwrócić `false`
5. Posiada chronioną własność `style`, string zawierający styl css elementu, domyślnie `null`
6. Posiada chronioną własność `content`, string zawierający tekst w elemencie, domyślnie `null`
7. Dodaj metode `setInline()`, która ustawi `type` na wartość `inline`
8. Dodaj metode `setBlock()`, która ustawi `type` na wartość `block`
9. Dodaj getery i setery do własności, zachowując nazewnictwo jak w zadaniu 1, do `type` oraz `id` dodaj tylko geter.

#### Zadanie 5 - dodatkowe

Do klasy `HTML` dodaj:  

1. Chronioną własność `children`, **tablicę** zawierającą obiekty dzieci w środku elementu html.
2. Metodę `addChildren(HTML $obj)`, dodającą do tablicy dzieci obiekt dziecka (inny element html, **musi być klasy HTML**)
3. Metodę `removeChildren(HTML $obj)`, usuwającą z tablicy dzieci obiekt dziecka (inny element html, **musi być klasy HTML**), najlepszym sposobem na znalezienie elementu jest sprawdzenie jego id z id przekazanego elementu.
4. Metodę `listChildren()`, zwracającą tablicę obiektów dzieci (inny/e element/y html)

#### Zadanie 6 - dodatkowe

Do klasy `HTML` dodaj:

1. Metodę `addStyle($array)`, która jako argument przyjmie tablicę styli, z których wygenerowany zostanie string i wstawiony do własności `style`  

Przykładowe wywołanie:  
```php
$obj->addStyle([ 'background-color'=>'red','font-size'=>'10px' ])
```
spowoduje wygenerowanie stringa `background-color: red; font-size: 10px;` i wstawienie tej wartości do własności `style`

<!-- Links -->
[mysql_concat]: https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_concat
[php_date]: https://secure.php.net/manual/en/function.date.php