<?php
//poniżej napisz kod definiujący klasę

class HTML{

    protected $id;
    protected $type;
    protected $class = [];
    protected $style = null;
    protected $content = null;
    protected $children = [];

    public function __construct($id)
    {
        $this->id=$id;
        echo "<strong>Create new HTML object:</strong><br>ID: $id";
    }

    public function setInline(){
        $this->type = 'inline';
    }

    public function setBlock(){
        $this->type = 'block';
    }

    public function getClass(): array
    {
        return $this->class;
    }

    public function setClass($class)
    {
        if (!is_array($class)) {
            return false;
        } else {
            $this->class = $class;
        }
    }

    public function getStyle()
    {
        return $this->style;
    }

    public function setStyle($style)
    {
        $this->style = $style;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function addChildren (HTML $obj){
        if(is_a($obj, 'HTML')){
        $this->children[]=$obj;
        }
    }

    public function removeChildren(HTML $obj){
        if(is_a($obj,'HTML')) {
            foreach ($this->children as $key => $val) {
                if($obj===$val){
                    unset($this->children[$key]);
                }
            }
        }
    }

    public function listChildren(){
        return $this->children;
    }

    public function addStyle($array){
        foreach ($array as $key=>$val){
            $this->style .= "$key: $val; ";
        }
    }

}

$html1 = new HTML(2);
$html1->setBlock();

$p1 = '<p>paragraf 1</p>';

$html1->setContent($p1);

echo "<br><--><hr>";

$html2 = new HTML(4);
$html2->setBlock();

$h1 = '<p>nagłówek 1</p>';

$html2->setContent($h1);

$html2->addChildren($html1);

echo "<pre>";
print_r($html2->listChildren());
echo "</pre>";

$html2->removeChildren($html1);

echo "<pre>";
print_r($html2->listChildren());
echo "</pre>";

echo "<br><--><hr>";

$html1->addStyle([ 'background-color'=>'red','font-size'=>'10px' ]);

var_dump($html1);