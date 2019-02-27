<?php
//poniżej napisz kod definiujący klasę
class Calculator {
    protected $history;

    public function __construct() {
        $this->history = array();// mogło by być = [];
    }
    public function add($num1, $num2) {
        $result = $num1 + $num2;
        $this->history[] = "added $num1 to $num2 got $result";
        return $result;
    }

    public function subtract($num1, $num2) {
        $result = $num1 - $num2;
        $this->history[] = "subtracted $num1 to $num2 got $result";
        return $result;
    }
    public function multiply($num1, $num2) {
        $result = $num1 * $num2;
        $this->history[] = "multiplied $num1 to $num2 got $result";
        return $result;
    }
    public function divide($num1, $num2) {
        if ($num2 == 0) {
            echo "Nie można dzielić przez 0!";
            return false;
        } else {
            $result = $num1 / $num2;
            $this->history[] = "divided $num1 to $num2 got $result";
            return $result;
        }
    }
    public function printOperations() {
        foreach ($this->history as $historyElement) {
            echo "* $historyElement. * <br>";
        }
    }
    public function clearOperations() {
        $this->history = array(); //lub = [];
    }
}
$calc = new Calculator();
echo $calc->add(2, 7) . "<br>";
echo $calc->multiply(5, 12) . "<br>";
echo $calc->divide(7, 122) . "<br>";
$calc->printOperations();
$calc->clearOperations();
echo "<hr>";
$calc->printOperations();
echo "<hr>";
$calc2 = new Calculator();
echo $calc2->add(2, 7) . "<br>";
echo $calc2->multiply(5, 12) . "<br>";
echo $calc2->divide(7, 122) . "<br>";
