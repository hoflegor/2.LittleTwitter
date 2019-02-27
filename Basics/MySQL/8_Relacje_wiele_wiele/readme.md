#  Relacje wiele do wielu

Wszystkie zapytania do bazy wykonuj w **konsoli**, dodatkowo zapisz treść zapytań do plików ```php``` przygotowanych do każdego zadania.

**Część zadań w swoim poleceniu ma utworzenie relacji między tabelami, w takiej sytuacji możesz a nawet musisz zmodyfikować strukturę tabel i dodać nowe kolumny lub nowe tabele**

#### Zadanie 1 - rozwiązywane z wykładowcą

Praca na bazie `products_ex`  

Połącz tabele ```Products``` i ```Orders``` relacją wiele do wielu.  
Nową tabelę nazwij `Products_Orders`.  
Napisz kilka zapytań, które połączą istniejące już produkty z zamówieniami.

Napisz stronę, w pliku **zadanie1_ord_prod.php**, na której będą widoczne:
* wszystkie zamówienia,
* wszystkie produkty należące do zamówienia (pod odpowiednim zamówieniem), np:
```
Zamówienie o id 6:
* Produkt o id 1
* Produkt o id 3
* Produkt o id 7
```

Napisz stronę, w pliku **zadanie1_prod_ord.php**, na której będą widoczne:
* wszystkie produkty,
* zamówienia, w których ten produkt się pojawił (pod odpowiednim produktem), np:
```
Produkt o id 12:
* Zamówienie o id 5
* Zamówienie o id 6
* Zamówienie o id 11
```

#### Zadanie 2 - rozwiązywane z wykładowcą

Praca na bazie `products_ex`  

1. W pliku **zadanie2_new_order.php** znajduje się formularz służący do dodawania nowych zamówień poprzez wpisanie opisu danego zamówienia i wybrania z listy produktów, które mają się znaleźć w tym zamówieniu (Produkty powinny być wyświetlone jako checkboxy).
2. Przeanalizuj kod i dopisz brakujący kod ``php`` który umożliwi wybranie produktów.
3. Następnie dopisz kod ``php`` który obsłuży formularz (doda do bazy danych zarówno nowe zamówienie jak i wszystkie relacje pomiędzy tym zamówieniem, a wybranymi produktami).

-------------------------------------------------------------------------------

#### Zadanie 3

Praca na bazie `cinemas_ex`  

**Formularz w tym zadaniu jest wysyłany pod adres pliku, z którego jest wywoływany `action=""`**

1. Połącz tabele `Cinemas` i `Movies` poprzez relację wiele do wielu (film może być wyświetlany w wielu kinach, kino może mieć wiele filmów). Dodatkowo stworzoną tabelę nazwij `Screenings`.
2. W pliku **zadanie3_new_screening.php** znajduje się formularz służący do dodawania nowych seansów poprzez wybranie kina i filmu - drop-down kina i filmu (dane pobrane z bazy).
3. Przeanalizuj kod i dopisz brakujący kod ``php`` który umożliwi wybieranie kin i filmów.
4. Następnie dopisz kod ``php`` który obsłuży formularz (doda seans do bazy danych).

#### Zadanie 4

Praca na bazie `cinemas_ex`  

**Formularze w tym zadaniu są wysyłane pod adres pliku, z którego są wywoływane `action=""`**

1. W pliku **zadanie4_show_cinemas_by_movie.php** znajduje się formularz w którym można wybrać dowolny film znajdujący się w bazie danych.  
   Przeanalizuj go i dopisz brakujący kod ``php`` który umożliwi wybieranie filmów.  
   Następnie dopisz kod, który obsłuży formularz (wyświetli wszystkie kina w których wyświetlany jest dany film).
2. W pliku **zadanie4_show_movies_by_cinema.php** znajduje się formularz w którym można wybrać dowolne kino znajdujące się w bazie danych.  
   Przeanalizuj go i dopisz brakujący kod ``php`` który umożliwi wybieranie kin.  
   Następnie dopisz kod, który obsłuży formularz (wyświetli wszystkie filmy które można obejrzeć w danym kinie).



