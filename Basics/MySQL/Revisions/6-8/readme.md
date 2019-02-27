# MySQL - zadania domowe
> Wszystkie zadania rozwiązuj w przygotowanych do tego plikach. Zapytania do bazy powinny być przypisane do przygotowanych do tego zmiennych.

>Zadania z dopiskiem "dodatkowe" są dla chętnych

**WAŻNE -  nie zmieniaj struktury/nazw plików oraz korzystaj z przygotowanych zmiennych**  

**Do połączenia z bazą w każdym pliku z zdaniem użyj wcześniej przygotowanego pliku `config.php` i stałych tam zawartych, dołącz go do pliku z zadaniem**  

**Zadania z dnia drugiego bazują na bazie i tabelach z dnia pierwszego**

#### Przygotowanie i informacje  

W pliku `config.php` znajdują się przygotowane stałe z ustawieniami bazy danych, uzupełnij je swoimi danymi.  

**Do połączenia z bazą w każdym pliku z zdaniem użyj wcześniej przygotowanego pliku `config.php` i stałych tam zawartych**    

W zapytaniach zapisanych do zmiennych nie musisz na końcu usmieszczać znaku średnika `;`, w zapytaniach nie musisz dodawać nazwy bazy danych, jedynie nazwę tabeli np.  
```php
$q1= 'SELECT * FROM baza1.tabela1';// -- ŹLE - podana nazwa bazy bezpośrednio w zapytaniu
$q2 = 'SELECT * FROM tabela1;';// - ŹLE - średnik na końcu
$q3 = 'SELECT * FROM tabela1';// - DOBRZE - brak nazwy bazy
$q4 = 'SELECT * FROM ' . DB_DB . '.tabela1';// - DOBRZE - nazwa bazy przekazana jako stała z pliku config.php
```

#### Zadanie 1

Do `2` tabel z dnia pierwszego dodaj odpowiednie relacje opisane poniżej. 
```SQL
* images (relacja 1 do wielu do tabeli offers [offer_id]):
  * offer_id: int unsigned -> foreign key
* users_companies (relacja 1 do 1 do tabeli users [user_id]):
  * user_id: int unsigned -> foreign key -> pamiętaj, iż jest to relacja 1 do 1
```

Zapytania zapisz do odpowiednich zmiennych przygotowanych w pliku `zadanie1.php```
 
#### Zadanie 2

**Wyświetlane komunikaty/teksty muszą być w pełni identyczne z tymi z polecenia**  

1. W pliku `zadanie2.php` napisz formularz (`POST`) dodawania użytkownika do bazy danych (tylko pole `name` oraz `email`). Atrybuty `name` pól `input` mają być **identyczne** jak nazwy kolumn w tabeli.
2. Pole `salt` wygeneruj jako `6` losowych znaków, a `password` jako skrót `sha-256` ze stringu łączącego `name` i `salt`, generowanie wykonaj w `php` już po przesłaniu formularza - hint `hash('sha256', 'string_to_hash')`
3. Po dodaniu użytkownika do bazy (pamiętaj o dodaniu do bazy `password` oraz `salt`) na stronie ma pojawić sie komunikat np. `Dodano użytkownika id: 34`, id powinno być zgodne z wstawionym `id` w bazie danych.

#### Zadanie 3

**Wyświetlane komunikaty/teksty muszą być w pełni identyczne z tymi z polecenia**  

1. Dodaj w `php` kod, który spowoduje, iż po wywołaniu strony z zadaniem i przesłaniu parametru `GET` `showUser` jako `id` użytkownika w bazie, wyświetlona na stronie zostanie nazwa użytkownika oraz jego mail w formacie `Aleks Olszewski (natasza11@interia.pl)`.
2. W przypadku jeśli `showUser` nie jest liczbą wyświetl komunikat `Błędny parametr showUser`.
3. W przypadku jeśli w tabeli nie istnieje user o `id` takim jak parametr `showUser` wyświetl komunikat `Brak użytkownika w bazie`.

#### Zadanie 4 

**Wyświetlane komunikaty/teksty muszą być w pełni identyczne z tymi z polecenia**  

1. Napisz formularz (`POST`), dodający linki do obrazków w ofertach, nazwy atrybutu `name` pól w formularzu mają być **identyczne** jak nazwy kolumn w tabeli.
2. Dodaj do formularza pole `select` z listą ofert pobranych z tabeli `offers`, jako `option` znaleźć się ma pojedyncza oferta, użyj tutaj pętli w `php`, w polu `option` ma być widoczny **jedynie** tytuł oferty a wartość tego pola to `id` oferty np. `<option value="42">Przykładowy tytuł</option>`  
   Dodaj na początku jako pierwszy element `<option value=""> -- Wybierz --</option>`  
3. Dodaj odpowiednie pola `input` do linku do obrazka oraz wymiarów.
4. Po przesłaniu formularza, dodaj odpowiedni rekord w bazie oraz wyświetl na stronie komunikat `Obrazek został dodany do oferty ID` jako `ID` podstaw numer `id` oferty.

#### Zadanie 5 - dodatkowe

**Wyświetlane komunikaty/teksty muszą być w pełni identyczne z tymi z polecenia**  

1. Napisz kod `php`, który po wywołaniu pliku z zadania z parametrami `GET` `table` `column` `value` `show`, zwróci listę rekordów spełniających warunki z parametrów.  
2. Przykładowe wywołanie `zadanie6.php?table=users&column=email&value=sonia52@gajewski.pl&show=name`,  
   powinno zwrócić rekord/y z tabeli `users`, **wyświetlić dane z kolumny `name`**, jako listę jeden po drugim, rekordy powinny spełniać warunek gdzie wartość kolumny `email` to `sonia52@gajewski.pl`,  
   szablon listy oraz komentarze znajdują się w pliku do zadania.

#### Zadanie 6 - dodatkowe

**Wyświetlane komunikaty/teksty muszą być w pełni identyczne z tymi z polecenia**  

1. W pliku z zadaniem stworzony jest formularz (`POST`) w którym znajduje się `1` pole `select` o atrybucie `name=daysToEnd` i wartościach `option` `1, 3, 7, 30`.
2. Po przesłaniu formularza na stronie ma pojawić się lista **tytułów ofert**, których data wygaśnięcia jest większa od aktualnej daty ale mniejsza od daty aktualnej + ilość dni przesłana z formularza.
3. Dla przykładu przesłanie wartości `7` ma zwrócić **listę tytułów**, które wygasają w ciągu najbliższych `7` dni,  
   szablon listy oraz komentarze znajdują się w pliku do zadania.

#### Zadanie 7 - dodatkowe

**Wyświetlane komunikaty/teksty muszą być w pełni identyczne z tymi z polecenia**  

1. W pliku z zadaniem stworzony jest formularz (`POST`) w którym znajduje się 1 pole `input` o atrybucie `name=price`.
2. Po przesłaniu formularza na stronie ma pojawić się lista ofert **tylko tytuły**, gdzie cena (kolumna `price`) jest **większa lub równa** od wartości przesłanej w formularzu.
3. Dodatkowo **pod** listą ma znaleźć się informacja o sumie cen ofert, w elemencie `div` o klasie `offersPriceSum`, pobranych w pkt. 2, informacja ma się znaleźć na stronie **tylko** po przesłaniu formularza.
4. Przykładowo przesłanie w formularzu wartości `2543.93` ma wyświetlić komunikat `<div class="offersPriceSum">Obliczona suma ofert: 85879.49zł</div>`, gdzie `85879.49` to suma ofert, których cena jest większa lub równa `2543.93`, sumę możesz policzyć w `php`, lub spróbować zrobić to sa pomocą zapytania do bazy - hint [SUM()][mysql_sum]
5. Suma **ma być zaokrąglona** do `2` miejsc prze przecinku, nawet jeśli wyniesie `0`, suma to `0.00zł`,  
   szablon listy oraz komentarze znajdują się w pliku do zadania.

<!-- Links -->
[mysql_concat]: https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_concat
[mysql_sha2]: https://dev.mysql.com/doc/refman/5.6/en/encryption-functions.html#function_sha2
[mysql_between]: https://dev.mysql.com/doc/refman/5.7/en/comparison-operators.html#operator_between
[mysql_sum]: https://dev.mysql.com/doc/refman/5.7/en/group-by-functions.html#function_sum
[mysql_substring]: https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_substring
[mysql_count]: https://dev.mysql.com/doc/refman/5.7/en/counting-rows.html
[mysql_avg]: https://dev.mysql.com/doc/refman/5.7/en/group-by-functions.html#function_avg
[mysql_round]: https://dev.mysql.com/doc/refman/5.7/en/mathematical-functions.html#function_round
[mysql_date_add]: https://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_date-add
[mysql_current_timestamp]: https://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_current-timestamp
[mysql_from_unixtime]: https://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_from-unixtime
[stack_mysql_domain]: http://stackoverflow.com/a/2440458/3668159