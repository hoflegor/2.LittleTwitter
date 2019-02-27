<?php
//poniżej napisz kod definiujący klasę

require_once (__DIR__ . '/../../Dzien_1/1_Podstawy_obiektowosci/Employee.php');

class HourlyEmployee extends Employee{

    public function computePayment($hours){
        $salary=$this->getSalary();
        return $salary*$hours;
    }

}


$emp1=new HourlyEmployee(22, 'Tom', 'Hof', 14);
var_dump($emp1->computePayment(160));
