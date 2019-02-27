#  Relacje jeden do jednego

Wszystkie zapytania do bazy wykonuj w **konsoli**, dodatkowo zapisz treść zapytań do plików ``php`` przygotowanych do każdego zadania.

**Część zadań w swoim poleceniu ma utworzenie relacji między tabelami, w takiej sytuacji możesz a nawet musisz zmodyfikować strukturę tabel i dodać nowe kolumny lub nowe tabele**

#### Zadanie 1 - rozwiązywane z wykładowcą

W bazie danych o nazwie ```products_ex``` stwórz następującą tabele:
```SQL
* ClientAddress:
  * client_id: int
  * city: string
  * street: string
  * house_nr: string
```

Tabela ```ClientAddress``` ma być połączona relacją jeden do jednego z tabelą ```Clients```.  
Napisz 5 zapytań SQL, które wprowadzą adresy dla istniejących już użytkowników.

-------------------------------------------------------------------------------

#### Zadanie 2 - import bazy danych

Jeżeli nie masz bazy danych `cinemas_ex` albo masz ją niekompletną, to usuń ją i stwórz nową bazę danych o nazwie ```cinemas_ex```.  
Następnie zaimportuj do niej dane z pliku **cinema.sql**. Są to tabele powypełniane dużą ilością danych. Takie jak wczoraj, brakuje tylko tabeli płatności.

#### Zadanie 3

Praca na bazie `products_ex`  

Stwórz tabelę do płatności.  
Ma mieć takie same dane jak w zadaniach z poprzedniego dnia.  ,
```SQL
 * Payments:
   * id: int
   * type: string
   * date: date
 ```

Dodatkowo z tabelą `Tickets` ma być powiązana relacją jeden do jednego.  
Relacja między biletem a płatnością jest następująca:  
* bilet ma `1` lub `0` płatności (jest wtedy nieopłacony)
* płatność musi być przypisana do biletu **(dodaj odpowiednią kolumnę do tabeli `Payments` podczas jej tworzenia)**

#### Zadanie 4

Praca na bazie `cinemas_ex`  

**Formularz w tym zadaniu jest wysyłany pod adres pliku, z którego jest wywoływany `action=""`**

    W pliku **zadanie4.php** znajduje się formularz kupna biletu, gdzie można wpisać ilość i cenę a także wybrać sposób płatności (może go nie być). Napisz kod ``php`` który obsłuży ten formularz. Pamiętaj, żeby w przypadku, w którym użytkownik wybrał płatność utworzyć dwa wpisy do bazy danych:
* Jeden do tabeli **Tickets**,
* Drugi do tabeli **Payments**, zachowując relację z dopiero co utworzonym biletem (id biletu w tabeli `tickets` powinno być takie samo jak id utworzonego biletu).

#### Zadanie 5

Praca na bazie `cinemas_ex`  

W pliku **zadanie5.php** napisz kod ``php`` dzięki któremu użytkownik będzie mógł zobaczyć wszystkie bilety opłacone za pomocą:
* karty,
* gotówki,
* przelewu,
* nieopłacone (czyli takie, które nie mają płatności w systemie).  

Spróbuj wykonać zadanie w sposób analogiczny jak w zadaniach nr `5` i `6` z działu `2_Dodawanie_pobieranie_danych`.  
Przyciski są już przygotowane.
