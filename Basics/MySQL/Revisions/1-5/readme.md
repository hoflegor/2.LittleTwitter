# MySQL - zadania domowe
> Wszystkie zadania rozwiązuj w przygotowanych do tego plikach. Zapytania do bazy powinny być przypisane do przygotowanych do tego zmiennych.

>Zadania z dopiskiem "dodatkowe" są dla chętnych

**WAŻNE -  nie zmieniaj struktury/nazw plików oraz korzystaj z przygotowanych zmiennych**  
 
#### Przygotowanie i informacje
W pliku `dump.sql` znajduje się przygotowany zrzut 2 tabel z bazy danych wypełniony już gotowymi danymi na których będziesz pracować, zaimportuj go do swojej bazy.  

Struktura oraz znaczenie poszczególnych kolumn w tabeli.  

Tabela `users`:
* `id` - id użytkownika
* `name` - nazwa użytkownika
* `email` - mail użytkownika
* `password` - hasło użytkownika (hash **sha-256**)
* `salt` - "sól" użyta do generowania hasła użytkownika

Tabela `offers`:
* `id` - id oferty
* `owner` - id użytkownika, relacja z tabelą `users`
* `status` - status oferty - `0` - weryfikacja, `1` - aktywne, `2` - odrzucone
* `price` - cena oferty
* `promoted` - `0/1` - czy oferta jest promowana
* `title` - tytuł oferty
* `description` - opis oferty
* `phone` - telefon do oferty
* `expire` - czas wygaśnięcia oferty - jeśli w przeszłości oferta nie aktywna
* `promoted_to` - czas promowania oferty - jeśli w przeszłości oferta nie promowana
* `activation_token` - token do aktywacji oferty

W pliku `config.php` znajdują się przygotowane stałe z ustawieniami bazy danych, uzupełnij je swoimi danymi.  

**Do połączenia z bazą w każdym pliku z zdaniem użyj wcześniej przygotowanego pliku `config.php` i stałych tam zawartych, dołącz go do pliku z zadaniem**  

W zapytaniach zapisanych do zmiennych nie musisz na końcu usmieszczać znaku średnika `;`, w zapytaniach nie musisz dodawać nazwy bazy danych, jedynie nazwę tabeli np.  
```php
$q1 = 'SELECT * FROM baza1.tabela1';// -- ŹLE - podana nazwa bazy bezpośrednio w zapytaniu
$q2 = 'SELECT * FROM tabela1;';// - ŹLE - średnik na końcu
$q3 = 'SELECT * FROM tabela1';// - DOBRZE - brak nazwy bazy
$q4 = 'SELECT * FROM ' . DB_DB . '.tabela1';// - DOBRZE - nazwa bazy przekazana jako stała z pliku config.php
```

#### Zadanie 1

W przygotowanym do zadania pliku `zadanie1.php` są przygotowane zmienne, do których zapisz zapytania `SQL`, które:

1. Zwrócą użytkowników których imię to `Julia`
2. Zwrócą listę `5` użytkowników, po posortowaniu ich wg. maila malejąco
3. Zwrócą listę użytkowników, których email jest w domenie `@yahoo.com` oraz imię rozpoczyna się na `L`
4. Zwrócą listę użytkowników, których `SHA2(name.salt)` jest zgodne z kolumną `password` - hint [SHA2()][mysql_sha2], [CONCAT()][mysql_concat]
5. Zwrócą listę **id** i **tytułów** ofert z ceną większą niż `500000`
6. Zwrócą listę **id** i **cenę** ofert, które nie posiadają tokena aktywacyjnego oraz posiadają cenę pomiędzy `2000` a `400000` - hint [BETWEEN()][mysql_between]
7. Zwrócą listę **tytuł**, **cena** i **telefon** ofert, które kończą się w ciągu `10` dni i są aktywne (**których data ważności jest większa niż aktualny czas oraz mają odpowiednią wartość w kolumnie `status`**) - hint [DATE_ADD()][mysql_date_add], [CURRENT_TIMESTAMP()][mysql_current_timestamp], [FROM_UNIXTIME()][mysql_from_unixtime] 
8. Zwrócą listę ofert, których opis zawiera `violent`, telefon zawiera cyfrę `2` i cena jest wyższa niż `50000`
9. Zwrócą listę ofert, które **nie są** promowane a ich cena jest mniejsza niż `300000` oraz tytuł **kończy się** na `LLC`
10. Zwiększą cenę o `1000` w ofertach, których właściciel ma `id` pomiędzy `20` a `25`
11. Usuną oferty, który wygasły więcej lub równo `3` dni temu, przykładowo aktualna data to `2016-11-05 12:45:03`, ma usunąć starsze niż `2016-11-02 12:45:03` - hint [DATE_ADD()][mysql_date_add], [NOW()][mysql_now]
12. Usuną oferty, których numer telefonu rozpoczyna się od `+48` i są promowane (**odpowiednia wartość w kolumnie `promoted`**) oraz aktywne (**których data ważności jest większa niż aktualny czas oraz mają odpowiednią wartość w kolumnie `status`**)
13. Zmienią status promowania na `1` i dodadzą koniec promowania za `23` dni dla ofert, których `3` i `4` cyfra telefonu to `48` oraz nie są aktualnie promowane - hint [SUBSTRING()][mysql_substring]
14. Zwrócą oferty, których cena pomnożona przez `2` jest mniejsza od `50000` oraz oferta jest promowana (**data końca promowania jest w przyszłości oraz mają odpowiednią wartość w kolumnie `promoted`**)
15. Zmienią w opisach ofert słowo `executed` na `founded` ale tylko tych gdzie telefon posiada `(` lub `)` i cena jest większa niż `400000`
16. Zwrócą ilość ofert aktywnych (**których data ważności jest większa niż aktualny czas oraz mają odpowiednią wartość w kolumnie `status`**) jako alias `sum_active` - hint [COUNT()][mysql_count]

    ```
    Przykład
    +------------+
    | sum_active |
    +------------+
    |         59 |
    +------------+
    ```

17. **dodatkowe** Zwrócą ilość aktywnych (**których data ważności jest większa niż aktualny czas oraz mają odpowiednią wartość w kolumnie `status`**) ofert jako alias `sum_user`, posiadanych przez użytkownika, zwrócona lista ma zawierać wszystkich użytkowników - hint `GROUP BY`, `WHERE`, `COUNT()`

    ```
    Przykład
    +-------+----------+
    | owner | sum_user |
    +-------+----------+
    |     2 |        9 |
    |     3 |       21 |
    |     5 |        1 |
    |    10 |        1 |
    |   ... |      ... |
    |    13 |        2 |
    +-------|----------|
    ```

18. **dodatkowe** Zwrócą ilość ofert **tylko aktywnych i odrzuconych** zwróconych jako kolumny `type` oraz `counter`, powinno zwrócić `2` rekordy. 
    
    ```
    Przykład
    +------+---------+
    | type | counter |
    +------+---------+
    |    1 |      14 |
    |    2 |      42 |
    +------+---------+
    ```

19. **dodatkowe** Zwrócą **sumę** cen ofert nie aktywnych (**których czas ważności minął** a były aktywne (`status=1`)) jako alias `sum_nonactive_nopromoted`, które nie były promowane - hint [SUM()][mysql_sum]
20. **dodatkowe** Zwrócą średnią cenę oferty jako `avg_price` zaokrąglone do `2` miejsc po przecinku, biorąc pod uwagę oferty aktywne (**których data ważności jest większa niż aktualny czas oraz mają odpowiednią wartość w kolumnie `status`**) i **promowane** z ceną ponad `44645.04` - hint [AVG()][mysql_avg], [ROUND()][mysql_round]

    ```
    Przykład
    +-----------+
    | avg_price |
    +-----------+
    | 523168.97 |
    +-----------+
    ```

#### Zadanie 2

Zapytania tworzące tabele zapisz do odpowiednich zmiennych w `php`.  

W bazie danych stwórz następujące tabele:
```SQL
* images:
  * id: int unsigned auto_increment primary key
  * offer_id: int unsigned
  * src: varchar(100) (link do zdjęcia)
  * dimension: varchar(10) (np. 400x832)
* users_companies:
  * id: int unsigned auto_increment primary key
  * user_id: int unsigned unique
  * name: varchar(30)
  * nip: int
  * street: varchar(50)
  * street_nr: mediumint
  * phone: char(9)
  * post_code: char(6)
  * capital: decimal(7,2)
  * rate: decimal(5,4)
  * created_at: datetime
```

#### Zadanie 3

1. Napisz zapytania dodające po `5` rekordów do każdej z tabeli utworzonej w poprzednim zadaniu (pamiętaj aby nie przekroczyć limitu znaków dla kolumn np. `dimension`).  
2. Zapytania umieść w odpowiednich zmiennych w pliku `zadanie3.php`.

#### Zadanie 4 - dodatkowe

**Wyświetlane komunikaty/teksty muszą być w pełni identyczne z tymi z polecenia**  

Zadanie polega na stworzeniu strony gdzie wyświetlana będzie lista użytkowników z tabeli `users` ale z użyciem paginacji,
czyli wyświetlaniem określonej ilości rekordów na stronę w zależności od tego, na której stronie się znajdujemy.  

Domyślnie wyświetlana liczba rekordów to `15` na stronę.  
Strona `1` - rekordy `1-15`  
Strona `2` - rekordy `16-30`  
Strona `3` - rekordy `31-45`  
itd...
W takiej sytuacji na stronie nr `3` powinny pojawić się rekordy od `31` do `45`.

1. Pobierz do zmiennej **wszystkie** rekordy z tabeli `users` posortowane po nazwie **rosnąco**
2. Oblicz ile stron powinno być dla pobranej ilości rekordów.
3. Wygeneruj na dole strony linki zawierające numer kolejnej strony oraz link do pliku z zadaniem, **przykładowy link znajduje się w komentarzu**.
4. Sprawdź czy metodą `GET` przesłano parametr `page`, jeśli nie, domyślną stroną jest strona nr `1` lub ta wybrana za pomocą `GET`.
5. Jeśli wybrano stronę, z pobranej listy rekordów, wybierz te które pasują do danej strony oraz wygeneruj dla nich elementy `li` **wg. wzoru zakomentowanego w kodzie**.
6. Jeśli przekazany parametr nie jest liczbą, pokaż na stronie komunikat `Błędna strona - to nie jest liczba`.
7. Jeśli wybrano stronę mniejsza lub równą `0` **lub** przekazany parametr nie jest liczbą, pokaż na stronie komunikat `Błędna strona - poniżej zakresu`.
8. Jeśli wybrano stronę większą niż możliwa ilość stron pokaż na stronie komunikat `Błędna strona - powyżej zakresu`.
9. Dodatkowe - dodaj możliwość przekazania poprzez `GET` parametru `perPage` wskazującego ile rekordów ma się wyświetlać na stronę, pamiętaj, że od tego będzie wówczas zależna ilość linków do stron wyświetlana na dole strony.
10. Dodatkowe - zamiast pobierać wszystkie rekordy z bazy użyj `LIMIT` w zapytaniu do pobrania wycinka tabeli.

#### Zadanie 5 - dodatkowe

**Wyświetlane komunikaty/teksty muszą być w pełni identyczne z tymi z polecenia**  

1. Napisz formularz (POST) w którym znajdzie się 1 pole `select` o atrybucie `name=domain`, formularz jest już częściowo przygotowany.
2. Pola `option` mają być listą domen z maili pobranych z tabeli `users`, pobierz w tym celu wszystkie maile, wyciągnij z nich wszystko co jest **po** znaku `@`  np. jan.kowalski@**gazeta.pl** a następnie pobierz wartości unikalne i wygeneruj pola `option` za pomocą pętli w `php`.
3. Aby z bazy za pomocą zapytania pobrać od razu wszystkie unikalne domeny, zobacz podpowiedź na [StackOverflow][stack_mysql_domain]
4. Po przesłaniu formularza ma zostać wyświetlona lista użytkowników, którzy posiadają maila w danej domenie, jeden po drugim w formacie `Aleks Olszewski (natasza11@interia.pl)`.
5. Lista użytkowników ma być wyświetlona w miejscu przygotowanym w kodzie.

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
[mysql_now]: https://dev.mysql.com/doc/refman/5.6/en/date-and-time-functions.html#function_now
[stack_mysql_domain]: http://stackoverflow.com/a/2440458/3668159