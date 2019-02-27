<?php
//poniżej napisz kod definiujący klasę

require_once (__DIR__ . '/../Dzien_1/HTML.php');

class DivHTML extends HTML
{

    private $width = null;
    private $height = null;

    public function __construct($id)
    {
        parent::__construct($id);
        $this->setBlock();
    }

    public function setWidth($width)
    {
        if (!(is_numeric($width)) || $width <= 0) {
            echo "**Wrong input - width!!<br>";
            return false;
        }
        echo "Width set: $width<br>";
        return $this->width = $width;
    }


    public function setHeight($height)
    {
        if (!(is_numeric($height)) || $height <= 0) {
            echo "**Wrong input - height!!<br>";
            return false;
        }
        echo "Height set: $height<br>";
        return $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }



}

echo "<hr><hr>";

//$obj = new DivHTML();
//echo $obj;

//
//$divHTML1 = new DivHTML(2);
//$divHTML1->setWidth(1);
//$divHTML1->setHeight(2);
//var_dump($divHTML1);
//
//
//$divHTML2 = new DivHTML(4);
//$divHTML2->setWidth(0);
//$divHTML2->setHeight(0);
//var_dump($divHTML2);