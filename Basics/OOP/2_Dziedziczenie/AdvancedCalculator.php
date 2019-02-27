<?php
//poniżej napisz kod sdsdefiniujący klasę
require_once (__DIR__ . '/../../Dzien_1/1_Podstawy_obiektowosci/Calculator.php');

class AdvancedCalculator extends Calculator{

    public function pow($num1,$num2){
        $result=$num1**$num2;
        $this->history[]= "$num1^$num2 equals $result";
        return $result;
    }

    public function root($num1, $num2){
        $result=pow($num1, 1/$num2);
        $this->history[]="root $num2 of $num1 equals $result";
        return $result;
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

echo "<hr>";

$calcAdv=new AdvancedCalculator();
$calcAdv->pow(2,8);
$calcAdv->pow(2,8);
$calcAdv->root(27,3);
$calcAdv->printOperations();
