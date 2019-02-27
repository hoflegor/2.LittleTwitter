#  Dziedziczenie

Pamiętaj aby rozwiązania do zadań umieszczać w odpowiednich plikach `php`, przygotowanych do zadań.  

#### Zadanie 1 - rozwiązywane z wykładowcą

Stwórz klasę ```AdvancedCalculator```, która dziedziczy po klasie ```Calculator```.  
Użyj `require()` z odpowiednim plikiem z działu [1_Podstawy_obiektowosci][podstawy_obiektowosci], a nie kopiować kodu klasy `Calculator`.  
Hint jak prawidłowo dodawać względnie pliki znajduje się w dziale [3_Snippety][dirname_file]

Klasa powinna implementować następujące metody:

1. ```pow($num1, $num2)``` - metoda ma **zwracać** ```num1``` do potęgi ```num2```. Dodatkowo w tablicy operacji ma zapamiętać napis: "```num1```^```num2``` equals ```result```".
2. ```root($num1, $num2)``` - metoda ma **zwracać** pierwiastek ```num2``` stopnia z ```num1```. Dodatkowo w tablicy operacji ma zapamiętać napis: "root ```num2``` of ```num1``` equals ```result```".  

**Pamiętaj, aby zmienić na odpowiednie modyfikatory dostępu dla metod i własności dla klas z pierwszego dnia, jeśli to konieczne.**  
**Napisz w komentarzu, dlaczego należy to zrobić.**  

Stwórz kilka zaawansowanych kalkulatorów i przetestuj ich działanie.

#### Zadanie 2 - rozwiązywane z wykładowcą

Stwórz klasę `TextFile`, która dziedziczy po klasie `File`.  
Użyj `require()` z odpowiednim plikiem z działu [1_Podstawy_obiektowosci][podstawy_obiektowosci], a nie kopiować kodu klasy `File`. 

1. Klasa powinna posiadać dodatkowe własności oraz setery i getery do nich:
 * `encoding` - przechowująca kodowanie znaków np.`utf-8` lub `iso-8859-2`
 * `language` - przechowująca kod języka w jakim znajduje się tekst w pliku, domyślnie `pl`
 * `content` - zawierająca zawartość pliku tekstowego
2. Mieć metodę `countWords()`, zwracającą ilość wyrazów w pliku tekstowym - własność `content`.
3. Mieć metodę `countChars()`, zwracającą ilość znaków **bez spacji** w pliku tekstowym - własność `content`.
4. Mieć metodę `truncate()`, która wyzeruje zawartość pliku - własność `content`.  

Stwórz kilka plików tekstowych i przetestuj ich działanie.

-------------------------------------------------------------------------------

#### Zadanie 3 

Stwórz klasę `ImageFile`, która dziedziczy po klasie `File`.  

1. Klasa powinna posiadać dodatkowe własności oraz setery i getery do nich:  
 * `ext` - przechowująca rozszerzenie pliku np. `jpg`, `gif`, `bmp` lub `png`
 * `width` - przechowująca szerokość obrazka
 * `height` - przechowująca wysokość obrazka
2. Mieć metodę `resize($scale)`, która zwiększy wartość szerokości i wysokości mnożąc **aktualną** wartość przez skalę  
3. Mieć metodę `pxpkb()`, (pixels per kilobyte), obliczającą ile pikseli mieści `1kB` obrazka, w tym celu wykonaj następujące kroki:  
 * pobierz rozmiar obrazka
 * oblicz iloczyn wysokości i szerokości
 * oblicz `pxpkb`, pamiętając, że obrazek może mieć rozmiar mniejszy niż `1kB`, wtedy oblicz `pxpkb` z proporcji  

Stwórz kilka obiektów plików obrazków i przetestuj ich działanie.

#### Zadanie 4

Stwórz klasę `HourlyEmployee`, reprezentującą pracownika, któremu pracodawca płaci za godziny. Klasa ma spełniać następujące wymogi:

1. Dziedziczyć po klasie `Employee`.  
2. Mieć dodatkową metodę `computePayment($hours)`, która będzie zwracała kwotę do wypłacenia pracownikowi za ilość wypracowanych godzin.    

Stwórz kilku pracowników godzinowych i przetestuj ich działanie.
 
#### Zadanie 5

Stwórz klasę `SalariedEmployee`, reprezentującą pracownika, z którym pracodawca ma umowę miesięczną. Klasa ma spełniać następujące wymogi:

1. Dziedziczyć po klasie `Employee`.  
2. Mieć dodatkową metodę `computePayment()` która będzie zwracała kwotę do wypłacenia pracownikowi za miesiąc (dla uproszczenia możemy założyć, że w każdym miesiącu jest 160 godzin pracujących).   

Stwórz kilku pracowników miesięcznych i przetestuj ich działanie.
 
<!--Links-->
[podstawy_obiektowosci]: ../../Dzien_1/1_Podstawy_obiektowosci
[dirname_file]: ../../../3_Snippety#12-jak-prawidłowo-używać-include-i-require-z-użyciem-__dir__