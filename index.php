<?php
session_start();
date_default_timezone_set('Europe/Paris');
//date_default_timezone_set('America/Bogota');
include "system/autoload.php";

$controleur = isset($_GET['c']) ? $_GET['c'] : "CtrlPage";
$methode = isset($_GET['m']) ? $_GET['m'] : "index";
$arg = isset($_GET['a']) ? $_GET['a'] : false;

if (!class_exists($controleur)){
    $controleur = "CtrlPage";
    $methode = "getPage";
    $arg = "404";
}

if(!method_exists($controleur, $methode)){
    $controleur = "CtrlPage";
    $methode = "getPage";
    $arg = "404";
}

$ctrl = new $controleur();
if ($arg){
    $ctrl->$methode($arg);
} else {
    $ctrl->$methode();
}


   


exit;

/* if(isset($_GET['p']) && $_GET['p'] == "form"){
    $ctrl = new CtrlContact();
    $ctrl->getForm();
} 
elseif(isset($_GET['p']) && $_GET['p'] == "enregistrer"){
    $ctrl = new CtrlContact();
    $ctrl->enregForm();
}  */
