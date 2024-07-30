<?php
class ViewPage {
    
    private $partials = "page/partials/";
    function __construct()
    {
    }
    function afficherPage($page){
        $file = $this->partials . "{$page}.html";
        if(file_exists($file)){
            $partial = $file;
        }
        else{
            $partial = $this->partials . "404.html";
        }
        include Conf::$templates . "template.html";
    }
}