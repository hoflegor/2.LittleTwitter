<?php
//poniżej napisz kod definiujący klasę
class File {

    protected $path;
    protected $size;

    public function __construct($argPath, $argSize) {
        $this->setPath($argPath);
        $this->setSize($argSize);
    }

    public function setPath($argPath) {
        if (substr($argPath, 0, 1) == '/') {
            $this->path = $argPath;
        }
    }

    public function getPath() {
        return $this->path;
    }

    public function setSize($argSize) {
        if (is_numeric($argSize) && $argSize >= 0) {
            $this->size = $argSize;
        }
    }

    public function getSize() {
        return $this->size;
    }

    public function calculateSize($unit) {
        switch ($unit) {
            case "MB":
                $result = $this->getSize() / 1024;
                break;
            case "B":
                $result = $this->getSize() * 1024;
                break;
            default:
                return "Nieznana jednostka";
        }
        return "Wielkość w $unit to: $result";
    }

}

//$file1 = new File("/image.jpg", 1800);
//$file2 = new File("/video.mp4", 200);
//
//echo $file1->getPath();
//
//var_dump($file1);
//var_dump($file2);
//
//echo $file1->calculateSize('MB') . "<br>";
//echo $file2->calculateSize('B');