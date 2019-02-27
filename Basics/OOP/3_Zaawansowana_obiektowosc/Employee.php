<?php
//poniżej napisz kod definiujący klasę

require_once (__DIR__ . '/../../Dzien_1/1_Podstawy_obiektowosci/Employee.php');

class HourlyEmployee extends Employee {

    private $hours;
    private $seniority = 0;
    const RATIO = 1.05;

    public function setSeniority($seniority) {
        if (is_numeric($seniority) && ($seniority > 0)) {
            $this->seniority = $seniority;
        } else {
            echo "Wrong input <br>";
            return;
        }
    }

    public function setHours($hours) {
        if (is_numeric($hours) && ($hours > 0)) {
            $this->hours = $hours;
        } else {
            echo "Wrong input <br>";
            return;
        }
    }

    public function getSeniority() {
        return $this->seniority;
    }

    public function getHours() {
        return $this->hours;
    }

    public function computePayment() {
        $result = $this->getHours() * $this->getSalary();
        return $result;
    }

    public function computeSeniorityPayment($hours){
        $result = $hours * ($this->getSalary() * (pow(self::RATIO, $this->getSeniority())));
        return $result;
    }
    static public function computeEmployeePayment($hours, $salary, $seniority){
        $employee = new HourlyEmployee(mt_rand(1000000, 10000000), "", "", $salary);
        $employee->setSeniority($seniority);
        $result = $employee->computeSeniorityPayment($hours);
        return $result;
    }
}
$hourlyEmployee1 = new HourlyEmployee(1, "Paweł", "Krakowiak", 100);
$hourlyEmployee1->setSeniority(5);
echo $hourlyEmployee1->computeSeniorityPayment(168) . "<br>";
$hourlyEmployee2 = new HourlyEmployee(2, "John", "Smith", 8);
$hourlyEmployee2->setSeniority(1);
echo $hourlyEmployee2->computeSeniorityPayment(24) . "<br>";
$hourlyEmployee3 = new HourlyEmployee(3, "Jack", "Brown", 25);
$hourlyEmployee3->setSeniority(10);
echo $hourlyEmployee3->computeSeniorityPayment(84) . "<br>";
echo HourlyEmployee::computeEmployeePayment(168, 100, 5) . "<br>";
echo HourlyEmployee::computeEmployeePayment(24, 8, 1) . "<br>";
echo HourlyEmployee::computeEmployeePayment(84, 25, 10) . "<br>";