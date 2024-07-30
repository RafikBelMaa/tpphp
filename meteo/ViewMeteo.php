<?php
class ViewMeteo
{
    private $partials = "meteo/partials/";

    function __construct(){

    }
    function afficherMeteo($data, $error = false){
        $partial = $this->partials . "meteo.html";
        include Conf::$templates . "template.html";
    }
}