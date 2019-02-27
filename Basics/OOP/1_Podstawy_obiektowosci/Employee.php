<?php
//poniżej napisz kod definiujący klasę
class Employee{

    private $id;
    private $firstName;
    private $lastName;
    private $salary;

    public function __construct($id, $firstName, $lastName, $salary)
    {
        if(is_int($id)){
            $this->id=$id;
        }
        else{
            echo "ID musi składać się wyłącznie z cyfr";
        }
        $this->id=$id;
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setSalary($salary);
    }


    public function setSalary($salary)
    {
        $this->salary = $salary;
    }


    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function raiseSalary($percent)
    {
        if(is_numeric($percent) && $percent>=0){
          $this->salary+=($percent/100)*$this->salary;
        }
    }

}
//
//$empl1 = new Employee(1, 'Tom', 'Hof', 10);
//var_dump($empl1);
//$empl1->raiseSalary(20);
//var_dump($empl1);
//
//echo "<hr>";
//
//$empl2 = new Employee(2,'Dea', 'Mon', 20);
//var_dump($empl2);
//$empl2->raiseSalary(50);
//var_dump($empl2);
