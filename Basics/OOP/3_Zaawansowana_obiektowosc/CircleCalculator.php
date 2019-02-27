<?php
//poniżej napisz kod klasy
require_once (__DIR__ . '/../../Dzien_1/1_Podstawy_obiektowosci/Calculator.php');

class CircleCalculator extends Calculator{

    static public $PI=3.14;

    static public function computeCircleArea ($r){
        $result = self::$PI*pow($r,2);
        return $result;
    }
}

var_dump (CircleCalculator::computeCircleArea(10));
//nie można dopisać obliczeń do tablicy, ponieważ wykonujemy je na klasie a nie na danym obiekcie z tablicą;
