#  Zaawansowana obiektowość

Pamiętaj aby rozwiązania do zadań umieszczać w odpowiednich plikach `php`, przygotowanych do zadań.  

#### Zadanie 1 - rozwiązywane z wykładowcą

Stwórz klasę `CircleCalculator`, która dziedziczy po klasie `Calculator` i posiada:

1. **Statyczną** własność ```PI```, który będzie miała przypisaną wartość **3.14**.  
2. **Statyczną** metodę ```computeCircleArea($r)```, która będzie zwracała pole koła.  
Ta metoda nie będzie dopisywać obliczeń do tablicy (**napisz w komentarzu, dlaczego nie może tego robić**).

#### Zadanie 2 - rozwiązywane z wykładowcą

Zmodyfikuj klasę `BankAccount` (skopiuj kod klasy stworzonej pierwszego dnia) w taki sposób, aby konstruktor sam nadawał numer konta bankowego.  
Dla uproszczenia będziemy nadawać kolejne liczby całkowite zaczynając od `1`.  
Aby to zrobić:

1. Dodaj do klasy **statyczną** prywatną własność `nextAccNumber`.  
2. Ustaw jego wartość na 1.  
3. Zmodyfikuj konstruktor w taki sposób, aby nie przyjmował numeru konta, ale przypisywał wartość własności `nextAccNumber` do swojej własności `number`, a następnie zwiększał `nextAccNumber` o jeden.  

Stwórz kilka kont i przetestuj jak generowane są ich numery.

-------------------------------------------------------------------------------

#### Zadanie 3 

Zmodyfikuj klasę `HourlyEmployee` (skopiuj kod klasy, pamiętaj, że dziedziczy ona z klasy `Employee`) w taki sposób, aby obliczać wynagrodzenie zależnie od stażu pracy, w tym celu:

1. Dodaj prywatną własność `seniority` - domyślnie `0` - przechowującą staż pracy, dodaj do niej geter i seter.  
2. Dodaj **stałą** `ratio` - przechowującą współczynnik o wartości `1.05`  
3. Dodaj metodę `computeSeniorityPayment($hours)`, która będzie **zwracała** kwotę do wypłacenia pracownikowi za ilość wypracowanych godzin, z uwzględnieniem stażu:
 * przelicz stawkę godzinową jako `stawka godzinowa * (ratio ^ staż pracy)`
 
#### Zadanie 4

Zmodyfikuj klasę `HourlyEmployee` z poprzedniego zadania w taki sposób, aby można było obliczyć wynagrodzenie dla dowolnych danych:

1. Dodaj **statyczną** metodę `computeEmployeePayment($hours, $salary, $seniority)` gdzie:
 * `$hours` - to ilość przepracowanych godzin
 * `$salary` - stawka godzinowa
 * `$seniority` - staż pracy - domyślnie `0`
2. W metodzie statycznej utwórz obiekt `HourlyEmployee`, przekazując do konstruktora id, imię i nazwisko jako `null`, oraz stawkę godzinową
3. Na obiekcie za pomocą setera ustaw staż pracy.
4. Na obiekcie wywołaj odpowiednią metodę, która obliczy zarobek zależy od stażu pracy.
5. **Zwróć** z metody **statycznej** obliczony zarobek.

Wywołaj kilkukrotnie metode **statyczną** `computeEmployeePayment` i wyświetl wynik aby sprawdzić czy obliczenia są prawidłowe.  
Pamiętaj o tym, iż metody statyczne można wywołać bezpośrednio na klasie, bez tworzenia instancji obiektu.