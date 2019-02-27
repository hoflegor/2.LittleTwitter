# OOP - zadania domowe
> Wszystkie zadania rozwiązuj w przygotowanych do tego plikach.

>Zadania z dopiskiem "dodatkowe" są dla chętnych

**WAŻNE -  nie zmieniaj struktury/nazw plików oraz korzystaj z przygotowanych zmiennych**
 
#### Zadanie 1

Stwórz klasę `FullTimeCourse`, która dziedziczy po klasie `Course`.  
Użyj `require()` z odpowiednim plikiem z działu [Dzien_1][Dzien_1], a nie kopiuj kodu klasy `Course`.  
Hint jak prawidłowo dodawać względnie pliki znajduje się w dziale [3_Snippety][dirname_file]

1. Dodaj prywatną własność `location`, przechowującą adres odbywania się kursu
2. Dodaj prywatną własność `lecturer`, przechowującą imię i nazwisko wykładowcy
3. Dodaj prywatną własność `duration`, czas w godzinach trwania kursu
4. Dodaj setery i getery do wszystkich własności

#### Zadanie 2

Stwórz klasę `OnlineCourse`, która dziedziczy po klasie `Course`.  
Użyj `require()` z odpowiednim plikiem z działu [Dzien_1][Dzien_1], a nie kopiuj kodu klasy `Course`. 

1. Dodaj **stałą** `TOKEN_LENGTH`, przechowującą długość tokena, o wartości `8`
2. Dodaj prywatną własność `link`, przechowującą link do kursu
3. Dodaj prywatną własność `accessToken`, przechowującą token dostępowy - hint [random_string][random_string]
4. Dodaj prywatną własność `accessTime`, data w formacie `YYYY-MM-DD HH:MM:SS` dostępu online do kursu - hint [php_date][php_date]
5. Dodaj setery i getery do wszystkich własności

#### Zadanie 3

Do klasy `OnlineCourse`:  

1. Dodaj metodę `generateAccessToken()`, generującą string o długości `TOKEN_LENGHT` i zapisującą do własności `accessToken`
2. Metoda `generateAccessToken` powinna być wywołana w konstruktorze.

#### Zadanie 4

Stwórz klasę `DivHTML`, która dziedziczy po klasie `HTML`.  
Użyj `require()` z odpowiednim plikiem z działu [Dzien_1][Dzien_1], a nie kopiuj kodu klasy `Course`. 

1. Ustaw domyślną wartość własności `type` na `block`
2. Dodaj prywatną własność `width`, przechowującą szerokość elementu, domyślnie `null`
3. Dodaj prywatną własność `height`, przechowującą wysokość elementu, domyślnie `null`
4. Dodaj setery i getery do wszystkich własności

#### Zadanie 5

Stwórz klasę `LinkHTML`, która dziedziczy po klasie `HTML`.  
Użyj `require()` z odpowiednim plikiem z działu [Dzien_1][Dzien_1], a nie kopiuj kodu klasy `Course`. 

1. Ustaw domyślną wartość własności `type` na `inline`
2. Dodaj prywatną własność `href`, przechowującą adres linku, domyślnie `#`
3. Dodaj prywatną własność `target`, przechowującą sposób przejścia do linku, domyślnie `_blank`
4. Dodaj setery i getery do wszystkich własności

#### Zadanie 6

Stwórz klasę `InputHTML`, która dziedziczy po klasie `HTML`.  
Użyj `require()` z odpowiednim plikiem z działu [Dzien_1][Dzien_1], a nie kopiuj kodu klasy `Course`. 

1. Ustaw domyślną wartość własności `type` na `inline`
2. Dodaj prywatną własność `inputType`, przechowującą typ inputa, domyślnie `text`
3. Dodaj prywatną własność `value`, przechowującą wartość inputa, domyślnie `null`
4. Dodaj prywatną własność `disabled`, przechowującą czy input ma stan `disabled`, domyślnie `false`
5. Dodaj setery i getery do wszystkich własności

#### Zadanie 7 - dodatkowe

W php mamy możliwość używania tzw. metod magicznych, które są automatycznie wywoływane w odpowiednich sytuacjach.  
W tym zadaniu zajmiemy się metodą `__set()` oraz `__get()`.

Metody te są wywoływane automatycznie przy próbie pobrania lub zapisu nie istniejącej własności w naszym obiekcie.  
Załóżmy, iż mamy obiekt `$input = new InputHTML()`, który nie ma zdefiniowanej własności `checked`.  
W momencie wywołania kodu `$input->checked = 'fooBar'`, php automatycznie wywoła metode magiczną `__set()` o ile została ona zdefiniowana, z następującymi argumentami (zostaną one przekazane automatycznie):  
`__set('checked', 'fooBar')` a naszym zadaniem jest obsłużyć w dowolny sposób dane w tej metodzie.

Dokładniejszy opis znajduje się [tutaj][get_set_magic_methods].  

Celem zadania jest, rozbudowanie klasy `FullTimeCourse` poprzez:  

1. Dodanie prywatnej własności `days`, będącej tablica (domyślnie pustą) przechowującą tematykę kursu danego dnia np. `php`, dodaj geter do własności `days`.
2. Zdefiniowane metody magicznej `__set()`, w ten sposób, by dodawała ona do tablicy `days` odpowiednie dane przy wywołaniu:
 * `$obj->monday = 'php';`, powinno dodać do tablicy `days` klucz `monday` i wartość `php`
 * `$obj->thursday = 'workshop'`, powinno dodać dane analogicznie jak w punkcie powyżej
3. Zdefiniowanie metody magicznej `__get()`, która zwróci odpowiednie dane przy wywołaniu:
 * `echo $obj->thursday;`, powinno wyświetlić temat zajęć czwartkowych
 * jeśli własność nie była wcześniej ustawiona, metoda magiczna powinna zwrócić `null`

#### Zadanie 8 - dodatkowe

Zadanie ma na celu stworzenia **generowania kodu html** elementu który reprezentuje jedną z klas `DivHTML`, `LinkHTML`, `InputHTML`.  
W tym celu skorzystamy z kolejnej metody magicznej `__toString()`, metoda ta, jeśli zdefiniowana, zostanie wywołana automatycznie w momencie próby zamiany naszego obiektu na napis.  
Stanie się tak np. w sytuacji w której będziemy próbowali wyświetlić obiekt za pomocą funkcji `echo`, ale też jeżeli będziemy dodawać nasz obiekt do napisu za pomocą operatora kropki (konkatenacja).  

**Metoda ta musi zwracać napis**. Napis ten, będzie reprezentacją naszego obiektu.  
Przykład implementacji i użycia tej metody możecie znaleźć tutaj: [http://php.net/manual/en/language.oop5.magic.php#object.tostring][to_string].  

```php
$obj = new DivHTML();// tworzymy instancję obiektu  
echo $obj;// php automatycznie sprawdzi czy nasza klasa posiada metodę magiczną `__toString()` i przekaże do `echo` jej rezultat.
```
Zakładając, iż mamy tablicę z obiektami `$objects`, poniższy przykład również skorzysta z metody magicznej `__toString()`
```php
$resultString = '';// zmienna przechowująca string
foreach($objects as $object){
    $resultString .= $object;// php automatycznie sprawdzi czy nasza klasa posiada metodę magiczną `__toString()` i zwróci jej rezultat, ponieważ użyliśmy konkatenacji
}
```  

W naszym wypadku skorzystamy z tej metody do generowania kodu html naszych obiektów.  

`DivHTML`:
 * metoda magiczna powinna **zwrócić** string zawierający kod elementu `div` z odpowiednimi atrybutami (`id`,`class`, `style`) np.  
   `<div id="foo" class="bar lorem" style="color:red; font-size: 12px;"></div>`  
 * atrybut ma zostać dodany **tylko** jeśli własność go reprezentująca nie ma wartości `null`
 * jeśli własność `width` i `height` nie jest `null` wówczas wygeneruj dodatkowo do atrybutu `style` odpowiednie własności css np.  
   `<div id="foo" class="bar lorem" style="color:red; font-size: 12px; width: 200px; height: 150px;"></div>`
 * własność `content` to tekst w środku naszego elementu `div` np.  
   `<div id="foo" class="bar lorem" style="color:red; font-size: 12px; width: 200px; height: 150px;">lorem ipsum dolor</div>`
 
#### Zadanie 9 - dodatkowe

Analogicznie jak w zadaniu 8 stwórz metodę magiczną generującą kod linku.  

`LinkHTML`:
 * metoda magiczna powinna **zwrócić** string zawierający kod elementu `a` z odpowiednimi atrybutami (`id`,`class`, `style`) np.  
   `<a id="foo" class="bar lorem" style="color:red; font-size: 12px;"></a>`  
 * atrybut ma zostać dodany **tylko** jeśli własność go reprezentująca nie ma wartości `null`
 * własności `href` i `target` mają wartości domyślne więc będą **zawsze** generowane np.  
   `<a id="foo" class="bar lorem" style="color:red; font-size: 12px; width: 200px; height: 150px;" href="#" target="_blank"></a>`
 * własność `content` to tekst w środku naszego elementu np.  
   `<a id="foo" class="bar lorem" style="color:red; font-size: 12px; width: 200px; height: 150px;" href="#" target="_blank">Google</a>`
 
#### Zadanie 10 - dodatkowe

Analogicznie jak w zadaniu 8 i 9 stwórz metodę magiczną generującą kod inputa.  

`InputHTML`:
 * metoda magiczna powinna **zwrócić** string zawierający kod elementu `input` z odpowiednimi atrybutami (`id`,`class`, `style`) np.  
   `<input id="foo" class="bar lorem" style="color:red; font-size: 12px;"></input>`  
 * atrybut ma zostać dodany **tylko** jeśli własność go reprezentująca nie ma wartości `null`
 * jeśli własność `value` nie jest `null` wówczas wygeneruj dodatkowo odpowiedni atrybut np.  
   `<input id="foo" class="bar lorem" style="color:red; font-size: 12px;" value="Marek"></input>`  
 * własność `type` ma wartość domyślną więc będzie **zawsze** generowana np.  
   `<input id="foo" class="bar lorem" style="color:red; font-size: 12px;" type="text"></input>`
 * własność `disabled` ma być generowana jeśli jej wartość jest **różna** od `false` a generowany atrybut ma mieć wartość `disabled` np.  
   `<input id="foo" class="bar lorem" style="color:red; font-size: 12px;" type="text" disabled="disabled"></input>`

#### Zadanie 11 - dodatkowe

**Warunkiem wykonania tego zadania, jest poprawne wykonanie [zadania 5][Dzien_1_zad_5] z poprzedniego dnia**  

Celem zadania jest stworzenie struktury obiektów html i wygenerowanie gotowego kodu html całej struktury.  
We wcześniejszych zadaniach stworzyliśmy kod generujący kod html dla pojedynczego elementu.  

W zadaniu 5 z poprzedniego dnia, stworzona została metoda `addChildren()`, która ma za zadanie przechowywać potomków elementu w tablicy.  
Innymi słowy, nasz algorytm działania będzie następujący:  

1. Tworzymy obiekt elementu np. `DivHTML`, będzie to nasz rodzic
2. Tworzymy 2 obiekty elementów np. `LinkHTML`, będą to dzieci naszego elementu `div` z punktu pierwszego.
3. Po stworzeniu dzieci dodamy je metodą `addChildren()` wywołaną na elemencie rodzica `DivHTML`
4. W tym momencie aby zobrazować Ci co się stało zerknij na kod poniżej, jest to kod poglądowy:  

    ```html
    <div><!-- to jest nasz rodzic z pkt 1-->
       <a></a><!-- to jest nasze dziecko z pkt 2-->
       <a></a><!-- to jest nasze dziecko z pkt 2-->
    </div>
    ```
5. Zmień w każdej klasie dziedziczącej po klasie `HTML` metodę magiczną `__toString`, w taki sposób, aby:
 * generowała znacznik otwierający dany tag (poprawnie generując wszystkie jego atrybuty takie jak `id`, `class` itp.)
 * sprawdzała czy znacznik ma jakieś dzieci (elementy znajdujące się w tablicy `children`)
 * jeśli posiada, to każdy z nich zamieniała w napis (zauważ, że wywoła to metodę `__toString()` w tym obiekcie - dzięki temu elementy będą się wypisywać kaskadowo, możesz tutaj skorzystać z konkatenacji)
 * jeżeli nie ma dzieci to powinien generować zawartość (trzymaną we własności `content`)
 * wygenerowała tag zamykający
 * **pamiętaj, że metoda `__toString()` musi zwracać string**
6. Obrazowo wygląda to następująco, mamy strukturę jak z pkt 4.
 * wywołujemy `echo` na obiekcie `DivHTML`
 * `DivHTML` wywołuje metodę `__toString()`, w której sprawdza czy ma potomków (ma 2 linki), więc nie generuje zawartości `content`
 * metoda `__toString()` iteruje po tablicy potomków i konkatenuje kolejne obiekty `LinkHTML`, generując ich kod html
 * w każdym obiekcie `LinkHTML` jest wywoływana metoda `__toString()` (ponieważ wykonujemy konkatenację), która sprawdza czy link ma potomków (nie), więc generowana jest zwartość `content`
 
W pliku `zadanie11.php`, utwórz obiekt rodzica (dowolny element), stwórz kilka obiektów dzieci i dodaj je do rodzica.  
Następnie spróbuj wygenerować kod html robiąc `echo` rodzica i sprawdź czy Twój kod działa poprawnie.

<!-- Links -->
[Dzien_1]: ../Dzien_1
[Dzien_1_zad_5]: ../Dzien_1#zadanie-5---dodatkowe
[dirname_file]: ../../3_Snippety#12-jak-prawidłowo-używać-include-i-require-z-użyciem-__dir__
[random_string]: http://stackoverflow.com/a/4356295/3668159
[php_date]: https://secure.php.net/manual/en/function.date.php
[get_set_magic_methods]: http://www.php.pl/Wortal/Artykuly/PHP/Podstawy/Programowanie-obiektowe-dla-poczatkujacych/Metody-magiczne
[to_string]: http://php.net/manual/en/language.oop5.magic.php#object.tostring