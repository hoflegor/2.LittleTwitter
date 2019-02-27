<?php

include 'Url.php';

class standardUrl implements Url
{
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getParam($name)
    {
        $url = explode("?", $this->url);
        $allParams = explode("&", $url[1]);
        foreach ($allParams as $key => $value) {
            $paramName = explode("=", $value)[0];
            if ($paramName == $name) {
                $paramVal = explode("=", $value)[1];

                return $paramVal;
            }
        }

        return false;
    }

    public function getAllParameters()
    {
        $url = explode("?", $this->url);
        $allParams = explode("&", $url[1]);
        $paramTable = [];
        $i = 1;
        foreach ($allParams as $key => $value) {
            $paramName = explode("=", $value)[0];
            $paramVal = explode("=", $value)[1];
            $paramTable[$i]['name'] = $paramName;
            $paramTable[$i]['value'] = $paramVal;
            $i++;
        }

        return $paramTable;
    }
}
/*
$url= new standardUrl("url_example.php?param1=99&param2=string");
var_dump($url->getAllParameters() );
*/
