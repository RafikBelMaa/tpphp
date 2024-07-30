<?php
class CtrlPage
{
    private $vue;
    //private $model;

    function __construct()
    {
        //$this->model = new ModelContact();
        $this->vue = new ViewPage();
    }

    function index()
    {
        $this->getPage('accueil');
    }

    function getPage($page = "404")
    {
        $this->vue->afficherPage($page);
    }
}
