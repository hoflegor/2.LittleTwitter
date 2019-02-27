#  Relacje jeden do wielu

Wszystkie zapytania do bazy wykonuj w **konsoli**, dodatkowo zapisz treść zapytań do plików ```php``` przygotowanych do każdego zadania.

**Część zadań w swoim poleceniu ma utworzenie relacji między tabelami, w takiej sytuacji możesz a nawet musisz zmodyfikować strukturę tabel i dodać nowe kolumny lub nowe tabele**

#### Zadanie 1 - rozwiązywane z wykładowcą

W bazie danych o nazwie ```products_ex``` stwórz następującą tabele:
```SQL
* Opinions:
  * description: string
```

1. Tabela ```Opinions``` ma być połączona z tabelą ```Products``` relacją jeden do wielu (produkt ma wiele opinii, opinia jest przypisana do jednego produktu).
2. Napisz po `5` zapytań, które dodadzą opinie do `3` istniejących produktów.  
3. W przygotowanym pliku `zadanie1_product_opinions.php`, dodaj kod wyświetlający wszystkie produkty. Pod każdym produktem mają wyświetlić się opinie do niego.

-------------------------------------------------------------------------------

#### Zadanie 2

W bazie danych o nazwie ```products_ex``` stwórz następującą tabele:
```SQL
* Categories:
  * id: int
  * name: string
* Categories_sub:
  * id: int
  * main_id: int -- relacja z id głównej kategorii
  * name: string
```
Połącz tabele `Categories` i `Categories_sub` za pomocą relacji wiele do jednego (jedna kategoria może mieć wiele podkategorii, jedna podkategoria ma jedną kategorię nadrzędną).

#### Zadanie 3

Praca na bazie `products_ex`  

**Formularz w tym zadaniu jest wysyłany pod adres zewnętrznego pliku `action="zadanie3_add_main.php"`.**

1. W pliku **zadanie3.php** przygotowany jest formularz z `1` polem `input` na nazwę kategorii - przeanalizuj go.
2. Dodaj obsługę dodawania kategorii w bazie.

#### Zadanie 4

Praca na bazie `products_ex`  

**Formularz w tym zadaniu jest wysyłany pod adres zewnętrznego pliku `action="zadanie4_add_sub.php"`.**

1. W pliku **zadanie4.php** przygotowany jest częściowo formularz dodawania podkategorii.
2. Dopisz odpowiedni kod generujący elementy `option` z kategoriami głównymi jakie znajdują się w bazie.
3. Dodaj obsługę dodawania podkategorii do bazy danych.
