<?php
//poniżej napisz kod definiujący klasę
require_once (__DIR__ . '/../../Dzien_1/1_Podstawy_obiektowosci/File.php');

class ImageFile extends File {

    protected $ext;
    protected $width;
    protected $height;

    public function getExt()
    {
        return $this->ext;
    }

    public function setExt($ext)
    {
        $this->ext = $ext;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function resize($scale){
        $this->width=($this->width)*$scale;
        $this->height=($this->height)*$scale;
    }

    public function pxpkb(){
        $size=$this->getSize();
        $area=($this->width)*($this->height);
        $pxpkb=$area/$size;
        return $pxpkb;
    }

}


$image = new ImageFile("/docs",500);
var_dump($image);
$image -> setWidth(300);
$image -> setHeight(500);
var_dump($image);
echo $image -> pxpkb() . "<br>";
$image2 = new ImageFile("/docs",0.5);
$image2 -> setWidth(250);
$image2 -> setHeight(250);
var_dump($image2);
echo $image2 -> pxpkb();
