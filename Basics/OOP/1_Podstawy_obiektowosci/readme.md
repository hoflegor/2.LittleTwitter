#  Podstawy obiektowości

Pamiętaj aby rozwiązania do zadań umieszczać w odpowiednich plikach `php`, przygotowanych do zadań.  

W zadaniach dodane są warunki sprawdzające przekazywane dane, jeśli dane nie spełniają warunku, dana metoda powinna zwrócić `false`.

#### Zadanie 1 - rozwiązywane z wykładowcą

Stwórz klasę ```Calculator```. Konstruktor ma nie przyjmować żadnych danych.  
Każdy nowo stworzony obiekt powinien mieć pustą tablicę, w której będzie trzymać historię wywołanych operacji (stwórz ją w konstruktorze).
Następnie dodaj do klasy następujące metody:

1. ```add($num1, $num2)``` - metoda ma dodać do siebie dwie zmienne i **zwrócić** wynik. Dodatkowo w tablicy operacji ma zapamiętać napis: "added ```num1``` to ```num2``` got ```result```".
2. ```multiply($num1, $num2)``` - metoda ma pomnożyć przez siebie dwie zmienne i **zwrócić** wynik. Dodatkowo w tablicy operacji ma zapamiętać napis: "multiplied ```num1``` with ```num2``` got ```result```".  
3. ```subtract($num1, $num2)``` - metoda ma odjąć od siebie dwie zmienne i **zwrócić** wynik. Dodatkowo w tablicy operacji ma zapamiętać napis: "subtracted ```num1``` from ```num2``` got ```result```".
4. ```divide($num1, $num2)``` - metoda ma podzielić przez siebie dwie zmienne i **zwrócić** wynik. Dodatkowo w tablicy operacji ma zapamiętać napis: "divided ```num1``` by ```num2``` got ```result```". Pamiętaj, że nie można dzielić przez zero.
5. ```printOperations()``` - metoda ma wypisać wszystkie zapamiętane operacje.
6. ```clearOperations()``` - metoda ma wyczyścić wszystkie zapamiętane operacje.

Pamiętaj o używaniu ```$this```.  
Stwórz kilka kalkulatorów i przetestuj ich działanie.

#### Zadanie 2 - rozwiązywane z wykładowcą

Stwórz klasę `File`, która ma spełniać następujące wymogi:

1. Mieć chronione (protected) własności:
 * `path` - przechowującą ścieżkę bezwzględną do pliku
 * `size` - przechowującą wielkość pliku w `kB` jako liczba całkowita
2. Posiadać konstruktor przyjmujący argumenty określające `path` i `size`.
3. Posiadać getery i setery do atrybutów `path`, `size`.
4. Pamiętaj o sprawdzeniu czy:
 * wielkość pliku jest wartością numeryczną i większą lub równą 0
 * czy ścieżka do pliku rozpoczyna się od znaku `/`
5. Mieć metodę `calculateSize($unit)`, przeliczającą i zwracającą rozmiar pliku do `MB` lub `B`, np. `calculateSize('MB')` ma **zwrócić** `string`  
`Wielkość w MB to: 0.234`, sposoby przeliczania znajdziesz w dziale [3_Snippety][bit_bytes]

Pamiętaj o używaniu ```$this```.  
Stwórz kilka plików i przetestuj ich działanie.

-------------------------------------------------------------------------------

#### Zadanie 3 

Stwórz klasę `Member`, która ma spełniać następujące wymogi:

1. Mieć prywatne własności:
 * `username` - przechowującą login użytkownika
 * `password` - przechowującą hasło użytkownika
 * `accessLevel` - przechowującą poziom dostępu użytkownika, domyślnie 0
2. Posiadać konstruktor przyjmujący argumenty określające wartości `username` i `password`.
3. Konstruktor powinien używać setterów do zapisania własności oraz wypisywać informacje o właśnie stworzonym obiekcie.
4. Pamiętaj o sprawdzeniu:
 * czy typ przekazanych atrybutów to `string` o długości co najmniej 5 znaków
 * jeśli własność nie spełnia warunków, ustaw ją na losowe 5 znaków - hint [stackoverflow][random_string]
5. Mieć destruktor **wypisujący** informacje o niszczonym użytkowniku (`Obiekt użytkownika username został zniszczony`).
6. Mieć metodę `info()` **wypisującą** informacje o użytkowniku, wypisującą jego `username` i `password`.

Pamiętaj o używaniu ```$this```.  
Stwórz kilku użytkowników i przetestuj ich działanie.

Sprawdź, co się dzieje, kiedy zmieniasz dostęp do metody z publicznych na prywatne.  
Zobacz, co stanie się jeżeli zmienisz atrybuty dostępu do konstruktora i destruktora.

#### Zadanie 4

Stwórz klasę `BankAccount`, która ma spełniać następujące wymogi:

1. Mieć prywatne własności:  
 * `number` - własność ta powinna przechowywać numer identyfikacyjny konta,
 * `balance` - określająca ilość pieniędzy na koncie (saldo). Ma to być liczba zmiennoprzecinkowa. 
2. Posiadać konstruktor przyjmujący tylko numer konta. Własność `balance` powinna mieć zawsze wartość domyślną `0` dla nowo tworzonego konta.  
3. Posiadać getery do własności `number` i `balance`, ale **NIE posiadać** do nich seterów (nie chcemy aby raz stworzone konto mogło zmienić swój numer, a do własności `balance` dodamy specjalne metody modyfikujące jej wartość).  
4. Posiadać metodę `depositCash($amount)`, której rolą będzie zwiększenie wartości atrybutu `balance` o podaną wartość. Pamiętaj o sprawdzeniu czy podana wartość jest:  
 * Wartością numeryczną,
 * Wartością większą od 0
5. Posiadać metodę `withdrawCash($amount)`, której rolą będzie zmniejszenie wartości atrybutu `balance` o podaną wartość.  
Metoda ta powinna **zwracać** ilość wypłaconych pieniędzy oraz zmniejszać saldo `balance` o wypłaconą kwotę.
Dla uproszczenia zakładamy, że **saldo na koncie nie może być ujemne**, np. jeżeli z konta, na którym jest `320zł` próbujemy wypłacić `530zł` to metoda **zwróci** nam tylko `320zł`. 
Pamiętaj o sprawdzeniu czy podana wartość jest:
 * Wartością numeryczną,
 * Wartością większą od 0
6. Posiadać metodę `printInfo()` nie przyjmującą żadnych parametrów. Metoda ta ma **wyświetlić** informację o numerze konta i jego stanie w formacie `ID konta: 43, Saldo: 123.87zł`.  

Pamiętaj o używaniu ```$this```.  
Stwórz kilka kont i przetestuj ich działanie.

#### Zadanie 5

Stwórz klasę `Employee`, która ma spełniać następujące wymogi:

1. Mieć prywatne własności:  
 * `id` - własność ta powinna przechowywać numer identyfikacyjny pracownika, 
 * `firstName` - określa imię pracownika,
 * `lastName` - określa nazwisko pracownika,
 * `salary` - określa ile pracownik zarabia za godzinę.
2. Posiadać konstruktor przyjmujący id, imię, nazwisko i zarobki za godzinę.  
3. Posiadać getery i setery do atrybutów `firstName`, `lastName` i `salary`. Do atrybutu `id` będzie potrzebny tylko geter.  
4. Posiadać metodę `raiseSalary($percent)`, której rolą będzie zwiększenie wartości atrybutu `salary` **o podany procent**.  
Pamiętaj o sprawdzeniu czy podana wartość jest:
 * Wartością numeryczną,
 * Wartością większą lub równą 0
 
Pamiętaj o używaniu ```$this```.  
Stwórz kilku pracowników i przetestuj ich działanie.

<!--Links-->
[random_string]: http://stackoverflow.com/a/4356295/3668159
[bit_bytes]: ../../../3_Snippety#11-bity-i-bajty