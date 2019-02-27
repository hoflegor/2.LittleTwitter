#  Dodawanie danych

Wszystkie zapytania do bazy wykonuj w **konsoli**, dodatkowo zapisz treść zapytań do plików **php** przygotowanych do każdego zadania.

#### Zadanie 1 - rozwiązywane z wykładowcą

1. W pliku **zadanie1.php** napisz zapytania SQL, żeby wypełnić każdą tabelę w bazie danych o nazwie ```products_ex``` 5 wpisami, wykonaj w konsoli zapytania aby dodać wpisy do bazy danych.  
2. W pliku **zadanie1.php** znajduje się formularz ```html```, który dodaje nowe **produkty** do bazy danych - przeanalizuj jego kod.  
3. Kod ```php``` obsługujący formularz i dodający nowy produkt do bazy, dodaj do pliku **zadanie1_form.php** a następnie podepnij ten plik w odpowiednim miejscu pliku **zadanie1.php**  
   Kod powinien wyświetlać stosowny komunikat (tylko jeśli przesłano formularz) o dodaniu lub błędzie dodania produktu do bazy.

#### Zadanie 2 - rozwiązywane z wykładowcą

1. W pliku **zadanie2.php** znajdują się zapytania do bazy danych.  
2. Zapytania zawierają błędy, znajdź je oraz zapisz poprawne zapytanie do przygotowanych zmiennych.  
3. Zapytania dotyczą stworzonych wcześniej baz i tabel w zadaniach `1_Tworzenie_baz_i_tabel`.  

-------------------------------------------------------------------------------

#### Zadanie 3

1. W pliku **zadanie3.php** napisz zapytania SQL, żeby wypełnić **każdą** tabelę w bazie danych o nazwie ```cinemas_ex``` 5 wpisami.
2. W pliku **zadanie3_form.php** znajduje się formularz służący do tworzenia nowych rekordów w tabelach. Przeanalizuj kod ```html```. **Formularz w tym zadaniu jest wysyłany pod adres pliku, z którego jest wywoływany (zauważ, że atrybut `action` jest pusty - jest to jedna z praktyk przetwarzania formularzy)**  
3. Napisz kod ``php``, który będzie dodawał przesyłane informacje do odpowiednich tabel w MySQL.  
   Kod powinien wyświetlać stosowny komunikat (tylko jeśli przesłano formularz) o dodaniu lub błędzie dodania produktu do bazy.  
4. Przeprowadź walidację wpisywanych danych w ```php```:
  * Dla `Filmu` rating musi być w zakresie od **0.00** do **10.00**.
  * Dla `Biletu` cena musi być większa niż **0**.
  * Dla `Płatności` typ musi być jednym z podanych napisów:
    * Card,
    * Cash,
    * Transfer.

Hint:  
Zauważ, że możesz rozróżniać, który formularz został wysłany, dzięki temu, że pola submit o nazwie ```submit``` mają różne wartości dla każdego formularza (hint: użyj ```switch```).

Jeżeli chcesz przeczytać o innych sposobach rozróżniania wielu formularzy na jednej stronie zajrzyj [tutaj][ref-multiple-forms].

[ref-multiple-forms]: http://stackoverflow.com/a/14071321
