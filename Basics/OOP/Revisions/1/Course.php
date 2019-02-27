<?php
//poniżej napisz kod definiujący klasę

class Course
{

    private $name;
    private $hours;
    private $startDate;
    private $students = [];

    public function setName($name)
    {
        if (is_string($name) && strlen($name) <= 10) {
            return $this->name = $name;
        }
        return false;
    }

    public function setHours($hours)
    {
        if (is_int($hours) && $hours <= 50) {
            $this->hours = $hours;
        }
        return false;
    }


    public function setStartDate($startDate)
    {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $startDate) == true) {
            $startDateDT = new DateTime($startDate);
            return $this->startDate = $startDateDT->format('Y-m-d');
        } else {
            return false;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHours()
    {
        return $this->hours;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function addStudent($name){
        if(count($this->students)>=6){
            echo "Maksymalna liczba uczniw wynosi: 6";
            return false;
        }
        else{
        $this->students[]=$name;
        }
    }

    public function removeStudents($name){
        $el= (array_search($name,($this->students)));
        if( $el = false){
            return false;
        }
        else{
            unset($this->students[$name]);
        }
    }

    public function daysToStart(){
        if(!isset($this->startDate)){
            return "startDate not set";
        }

        $courseDate = new DateTime($this->startDate);
        $actualDate = new DateTime();
        $diff = $courseDate->diff($actualDate);

        if($courseDate>$actualDate){
            return $diff->days;
        }
        else{
            return "Course started";
        }


    }

}



$myCourse = new Course();
$myCourse->setHours(32);
$myCourse->setName('CL');
$myCourse->setStartDate('2017-10-06');

$myCourse->addStudent('Chyzio');
$myCourse->addStudent('Dyzio');
$myCourse->addStudent('Zyzio');
$myCourse->addStudent('Jam');
$myCourse->addStudent('hofelegor');
$myCourse->addStudent('Yetz');
//$myCourse->addStudent('Niepowinny');

var_dump($myCourse->daysToStart());
var_dump($myCourse);

//$myCourse = new Course();
//$myCourse->setHours(51);
//$myCourse->setName('CLbackTofront&whatever');
//$myCourse->setStartDate(201e-05-06);
//var_dump($myCourse);