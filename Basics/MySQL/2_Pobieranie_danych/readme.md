#  Pobieranie danych

Wszystkie zapytania do bazy wykonuj w **konsoli**, dodatkowo zapisz treść zapytań do plików **php** przygotowanych do każdego zadania.

#### Zadanie 1 - rozwiązywane z wykładowcą

1. Napisz stronę, która wyświetli wszystkie produkty znajdujące się w bazie danych o nazwie ```products_ex```.  
2. Jeśli opis produktu jest dłuższy niż 20 znaków, strona ma pokazywać pierwsze 20 znaków i na końcu ```...```.  
3. Dodaj produkt z długim opisem do Twojej bazy aby przetestować działanie.

#### Zadanie 2 - rozwiązywane z wykładowcą

1. Napisz stronę, która wyświetli ranking filmów.
2. Ranking ma wyświetlać filmy, których rating jest większy, niż średni rating wszystkich filmów.
3. Oblicz najpierw średni rating filmów a następnie pobierz filmy z ratingiem większym niż średni.
4. Wykładowca pokaże, jak można obliczyć średni rating z pomocą zapytania SQL i funkcji `AVG()`
5. Zauważ, iż pobierając drugim sposobem rozwiązania tego zadania jest pobranie wszystkich filmów do tablicy,  
   następnie obliczenie średniego ratingu i przefiltrowanie tablicy aby posiadała tylko interesujące nas filmy.

-------------------------------------------------------------------------------

#### Zadanie 3

W pliku **zadanie3.php** napisz zapytania SQL, które:

1. Wybiorą wszystkie filmy na literę W.  
2. Wybiorą wszystkie bilety, których cena jest większa niż **15.30**.  
3. Wybiorą wszystkie bilety, których ilość (liczba) jest większa niż **3**.  
4. Wybiorą wszystkie filmy, które mają rating większy niż **6.5**.  

#### Zadanie 4

1. W pliku **zadanie4.php** znajduje się częściowo przygotowany kod ``html`` oraz ``php`` - przeanalizuj go.  
2. Napisz skrypt, który wyświetli na stronie wszystkie filmy, kina, bilety i płatności, oczywiście tylko wtedy kiedy zostaną przekazane odpowiednie dane GET.  
3. Każdy wpis z każdej tabeli ma być wyświetlany jako linki, które prowadzą do pliku **zadanie5_table_info.php**, gdzie za pomocą `GET` prześlij nazwę tabeli oraz id wiersza, którego dane chcesz pobrać.  

Przykładowe linki:  
```HTML
<a href="zadanie5_table_info.php?table=cinemas&id=43" target="_blank">Kino o id 43</a>
<a href="zadanie5_table_info.php?table=tickets&id=11" target="_blank">Bilet o id 11</a>
``` 

#### Zadanie 5

1. W pliku **zadanie5_table_info.php** napisz kod ``php`` który odbierze dane wysyłane metodą `GET` z linków z zadania 4.
2. Następnie wyświetl wszystkie informacje o elemencie którego `id` zostało przesłane.  
   Pamiętaj o tym żeby dane wczytać z odpowiedniej tabeli (jej nazwa jest również przesyłana przez `GET`).


[ref-multiple-forms]: http://stackoverflow.com/a/14071321
