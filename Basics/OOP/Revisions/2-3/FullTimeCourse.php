<?php
//poniżej napisz kod definiujący klasę
 require_once (__DIR__ . '/../Dzien_1/Course.php');

class FullTimeCourse extends Course {

    private $location;
    private $lecturer;
    private $duration;
    private $days = [];

    public function getDays()
    {
        return $this->days;
    }

    public function __set($name, $value)
    {
        $this->days[$name]=$value;
    }

    public function __get($name)
    {
     return (isset($this->days[$name]) ? $this->days[$name] : null);
    }


    public function setLocation($location)
    {
        if(!is_string($location)){
            echo "<br>Wrong input<br>";
            return false;
        }
        $this->location=$location;
    }

    public function setLecturer($lecturer)
    {
        if(!is_string($lecturer)){
        echo "<br>Wrong input!!<br>";
        return false;
    }
        $this->lecturer = $lecturer;
    }

    public function setDuration($duration)
    {
        if (!is_numeric($duration) || $duration<=0){
            echo "<br>Wrong input<br>";
            return false;
        }
        $this->duration=$duration;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getLecturer()
    {
        return $this->lecturer;
    }

    public function getDuration()
    {
        return $this->duration;
    }

}

$course2 = new FullTimeCourse;
$course2->setDuration(100);
$course2->setLecturer("lecturer");
$course2->setLocation("location");
$course2->setDuration(20);
//var_dump($course2);
//$course3 = new FullTimeCourse;
//$course3->setDuration(-10);
//$course3->setLecturer(1);
//$course3->setLocation(2);
//$course3->setDuration(20);
//var_dump($course3);
$course2->monday = 'php';
$course2->thursday = "workshop";
var_dump($course2);
echo "<hr><hr>";
echo $course2->monday;
var_dump($course2->someday);












































