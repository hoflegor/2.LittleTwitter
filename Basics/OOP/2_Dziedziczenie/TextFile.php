<?php
//poniżej napisz kod definiujący klasę

require_once (__DIR__ . '/../../Dzien_1/1_Podstawy_obiektowosci/File.php');

class TextFile extends File {

    protected $encoding;
    protected $language ='pl';
    protected $content;

    public function getEncoding()
    {
        return $this->encoding;
    }

    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function countWords()
    {
        return str_word_count("this->content");
    }

    public function countChars(){
        $textWthoutSpaces = explode(" ","$this->content");
        $count=0;
        foreach ($textWthoutSpaces as $key => $value){
            $count += strlen($value);
        }
        return $count;
    }

    public function truncate(){
        if (isset($this->content)){
            $this->setContent("");
        }
    }

}


$myText = "Bla Bla Bla Bla";
$textFile = new TextFile ("/doc",200);
$textFile -> setContent($myText);
var_dump ($textFile);
echo $textFile ->getContent() . "<br>";
echo $textFile -> countWords() . "<br>";
echo $textFile -> countChars() . "<br>";
$textFile -> truncate();
var_dump ($textFile);
