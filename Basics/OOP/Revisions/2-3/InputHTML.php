<?php
//poniżej napisz kod definiujący klasę

require_once (__DIR__ . '/../Dzien_1/HTML.php');

class InputHTML extends HTML{

    private $inputType = 'text';
    private $value = null;
    private $diasbled = false;

    public function __construct($id)
    {
        parent::__construct($id);
        $this->setInline();
    }

    public function setInputType($inputType)
    {
        if(!is_string($inputType)){
            echo "**Wrong input - inputType!!<br>";
            return false;
        }
        echo "inputType set: $inputType<br>";
        return $this->inputType = $inputType;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setDiasbled($diasbled)
    {
        if (!is_bool($diasbled)){
            echo "**Wrong input - param disabled!!";
            return;
        }
        echo "Param disabled set";
        return $this->diasbled = $diasbled;
    }

    public function getInputType()
    {
        return $this->inputType;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getDiasbled()
    {
        return $this->diasbled;
    }

}

$iH1=new InputHTML(2);
$iH1->setInputType("mail");
$iH1->setDiasbled(true);


$iH2=new InputHTML(4);
$iH2->setInputType(2);
$iH2->setDiasbled('dwdwe');