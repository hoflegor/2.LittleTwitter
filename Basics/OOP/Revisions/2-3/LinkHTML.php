<?php
//poniżej napisz kod definiujący klasę

require_once (__DIR__ . '/../Dzien_1/HTML.php');

class LinkHTML extends HTML{

    private $href = "#";
    private $target = "_blank";

    public function __construct($id)
    {
        parent::__construct($id);
        $this->setInline();
    }

    public function setHref( $href)
    {
        if(!is_string($href)){
            echo "**Wrong input - href<br>";
            return false;
        }
        echo "href set: $href<br>";
        return $this->href = $href;
    }

    public function setTarget( $target)
    {
        if (!is_string($target)){
            echo "**Wrong input - target<br>";
            return false;
        }
        echo "Target set: $target<br>";
        return $this->target = $target;
    }

    public function getHref(){
        return $this->href;
    }

    public function getTarget()
    {
        return $this->target;
    }

}

$lh1=new LinkHTML(666);
$lh1->setHref('mksmksm');
$lh1->setTarget('smsmksm');
var_dump($lh1);

$lh2=new LinkHTML(60);
$lh2->setTarget(2);
$lh2->setHref(8);


