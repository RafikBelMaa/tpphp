<?php
class ViewAuthentification
{
    private $partials = "authentification/partials/";

    function __construct() {}


    function afficherLogin($error = false){
        $partial = $this->partials . "login.html";
        include Conf::$templates . "template.html";
    }

    function afficherLoginOk(){
        $partial = $this->partials . "loginOk.html";
        include Conf::$templates . "template.html";
    }
}


