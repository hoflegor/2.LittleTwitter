<?php
//poniżej napisz kod definiujący klasę

require_once (__DIR__ . '/../../Dzien_1/1_Podstawy_obiektowosci/Employee.php');

class SalariedEmployee extends Employee{

    public function computePayment(){
        $computePayment = $this->getSalary()*160;
        return $computePayment;
    }

}

echo "<hr><hr>";

$emp8=new SalariedEmployee(2,'Tom', 'Hof', 16);
var_dump($emp8);
var_dump($emp8->computePayment());