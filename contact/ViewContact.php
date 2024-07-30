<?php
class ViewContact
{

    private $partials = "contact/partials/";
    function __construct()
    {
    }
    function afficherForm($civilites, $objets, $contact = false, $error = false)
    {
        $partial = $this->partials . "form.html";
        include Conf::$templates . "template.html";
    }

    function afficherContacts($contacts)
    {
        $partial = $this->partials . "contacts.html";
        include Conf::$templates . "template.html";
    }

    function afficherFormOk()
    {
        $partial = $this->partials . "formok.html";
        include Conf::$templates . "template.html";
    }
    function afficherFormNotOk()
    {
        $partial = $this->partials . "formnotok.html";
        include Conf::$templates . "template.html";
    }

    function afficherStats($data)
    {
        $partial = $this->partials . "statistiques.html";
        include Conf::$templates . "template.html";
    }

    function afficherCsv($data)
    {
        include $this->partials . "csv.php";
    }
    function afficherJson($data)
    {
        include $this->partials . "json.php";
    }
}
