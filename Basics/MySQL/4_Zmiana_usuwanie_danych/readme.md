#  Zmiana i usuwanie danych

Wszystkie zapytania do bazy wykonuj w **konsoli**, dodatkowo zapisz treść zapytań do plików ``php`` przygotowanych do każdego zadania.

#### Zadanie 1 - rozwiązywane z wykładowcą

Praca na bazie `cinemas_ex`  

1. W pliku do zadania **zadanie1.php** pobierz z bazy `id` i `tytuł` filmu, a następnie wygeneruj listę linków do pliku **zadanie1_getmovie.php** przekazując `id` filmu jako parametr `GET`.
2. Po przejściu metodą `GET` do odpowiedniego przygotowanego pliku, pobierz dane wybranego filmu do przygotowanych zmiennych, dane zostaną podstawione jako wartości formularza edycji filmu.
3. Po przesłaniu formularza edycji, metodą `POST`, edytuj odpowiedni wpis w bazie danych, **pamiętając aby nie zmienić danych wszystkich filmów**, następnie wyświetl stosowny komunikat na stronie.

#### Zadanie 2 - rozwiązywane z wykładowcą

Praca na bazie `cinemas_ex`  

1. W pliku do zadania znajduje się formularz usuwania filmu.
2. Formularz ma pole `select` gdzie z listy możemy wybrać dostępne filmy, pola `option` mają być generowane w `php` na podstawie listy filmów w bazie.
3. Po przesłaniu formularza, wybrany film ma zostać usunięty oraz wyświetlony odpowiedni komunikat.
4. Przesłanie formularza bez wybranego pola `select` ma wyświetlić komunikat błędu.

-------------------------------------------------------------------------------

#### Zadanie 3

Praca na bazie `cinemas_ex`  

**Formularz w tym zadaniu jest wysyłany pod adres pliku, z którego jest wywoływany `action=""`, kod obsługujący formularz jest includowany do głównego pliku**

1. W pliku **zadanie3.php** pobierz id i nazwy wszystkich kin znajdujących się w bazie, a następnie wygeneruj listę linków do pliku **zadanie3_getcinema.php** przekazując `id` kina jako parametr `GET`.
2. Wykonaj analogiczne kroki do pobrania i edycji kina jak w zadaniu 1.

#### Zadanie 4

Praca na bazie `cinemas_ex`  

**Formularz w tym zadaniu jest wysyłany pod adres zewnętrznego pliku `action="zadanie4_remove.php"`, kod obsługujący formularz jest w zewnętrznym pliku i to tam następuje jego obsługa, to kolejny sposób na obsługę formularzy**

1. W pliku do zadania znajduje się formularz z polem `select` do wyboru tabeli z bazy danych
2. Dodatkowo w formularzu znajduje się pole `input` z `id`. 
3. Napisz kod `php`, który odbierze dane z formularza i usunie rekord o podanym `id` z wybranej tabeli.  
   Po usunięciu kod powinien wyświetlić id usuniętego elementu, **lub informacja, że elementu o podanym id nie ma w bazie danych**.
4. Przesłanie formularza bez wybranego pola `select` lub nie wpisanego `id` ma wyświetlić komunikat błędu.
 
