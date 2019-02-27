#  Modyfikacja i usuwanie tabel

Wszystkie zapytania do bazy wykonuj w **konsoli**, dodatkowo zapisz treść zapytań do plików ``php`` przygotowanych do każdego zadania.

#### Zadanie 1 - rozwiązywane z wykładowcą

Praca na bazie `cinemas_ex`  

1. Dodaj do tabeli `Tickets` kolumnę `priceUSD`, przechowującą cenę biletu w `USD`. 
2. Dodaj do tabeli `Movies` kolumnę `director` typ `char(80)`, przechowującą imię i nazwisko reżysera.
3. Zmień w tabeli `Movies` kolumnę `director` na typ `varchar(50)`.
4. Usuń kolumnę `priceUSD` z tabeli `Tickets`.
 
#### Zadanie 2 - rozwiązywane z wykładowcą

Praca na bazie `cinemas_ex`  

Napisz następujące zapytania do bazy:

1. Zmieniające adres na `Stadion Narodowy` dla kin których nazwa kończy się na `Z`. 
2. Usuwające płatności, których data jest starsza niż `4` dni od aktualnego czasu z dokładnością do sekundy.
3. Zmieniające rating filmu na `5.4` dla filmów gdzie opis jest dłuższy niż `40` znaków - poszukaj funkcji `MySQL`, która sprawdza ilość znaków.
4. Zmieniające cenę biletu o `50%` jeśli ilość jest większa niż `10`, jako pojedyncze zapytanie `SQL`.

-------------------------------------------------------------------------------

#### Zadanie 3

Praca na bazie `cinemas_ex`  

Napisz następujące zapytania do bazy:

1. Dodające do tabeli `Movies` kolumnę `watchCount`, przechowującą ilość wyświetleń filmu.
2. Dodające do tabeli `Movies` kolumnę `isTop`, przechowującą wartość `tinyint` (domyślnie wartość `0`) o tym czy film jest hitem.
3. Aktualizujące tabelę `Movies` tak, że kolumna `isTop` ma mieć wartość `1` jeśli `watchCount > 100`, w przeciwnym wypadku `0`.
4. Dodające do tabeli `Cinemas` kolumnę `openTime`, przechowującą godzinę otwarcia. 
5. Dodające do tabeli `Cinemas` kolumnę `closeTime`, przechowującą godzinę zamknięcia.

#### Zadanie 4

Praca na bazie `cinemas_ex`  

**Formularz w tym zadaniu jest wysyłany pod adres zewnętrznego pliku `action="zadanie4_form.php"`.**

1. W pliku do zadania znajduje się formularz w `html`, w którym w polu `select` możliwy jest wybór kolumn z tabeli `Movies`. 
2. Dodatkowo w formularzu znajdują się 2 pola `input` z nazwą nowej kolumny oraz typem kolumny.
3. Formularz zawiera również 2 przyciski `REMOVE` oraz `ADD`, pierwszy ma usuwać wybraną kolumnę z tabeli a drugi dodawać nową kolumnę w tabeli `Movies` zgodnie z danymi z pól `input`.
4. Dopisz kod `php`, który spowoduje obsługę akcji dodania i usuwania kolumny w tabeli `Movies` w zależności od klikniętego przycisku.  
   W zadaniach z wczorajszego dnia znajdziesz opis jak odróżnić, który guzik został wciśnięty. 
