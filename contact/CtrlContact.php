<?php
class CtrlContact
{

    private $vue;
    private $model;

    function __construct()
    {
        $this->model = new ModelContact();
        $this->vue = new ViewContact();
    }

    function index()
    {
        $this->getForm();
    }

    function getForm($data = false)
    {
        $civilites = $this->model->selectCivilites();
        $objets = $this->model->selectObjets();

        if (!$data) {
            $this->vue->afficherForm($civilites, $objets);
        } else {
            $contact = $data;
            $this->vue->afficherForm($civilites, $objets, $contact, true);
        }
    }

    function enregForm()
    {
        if ($this->verifierChamps($_POST)) {
            $r = $this->model->inserer($_POST);
            if ($r) {
                $this->vue->afficherFormOk();
            } else {
                $this->vue->afficherFormNotOk();
            }
        } else {
            $this->getForm($_POST);
        }
    }

    function listeDesContacts()
    {
        if (Session::getUser() && Session::getUser()->role == "admin") {
            $contacts = $this->model->selectContacts();
            $this->vue->afficherContacts($contacts);
        } else {
            header("Location: /CrtlPage/404");
            die();
        }
    }

    function getStatistiques()
    {
        if (Session::getUser() && (Session::getUser()->role == "admin" || Session::getUser()->role == "user")) {
            $genres = $this->model->nbParGenre();
            $contacts = $this->model->contactsParObjects();
            $data = array('genres' => $genres, 'contacts' => $contacts);
            $this->vue->afficherStats($data);
        } else {
            header("Location: /CrtlPage/404");
            die();
        }
    }

    function getCsvContacts()
    {
        if (Session::getUser() && (Session::getUser()->role == "admin" || Session::getUser()->role == "user")) {
            $data = $this->model->getContacts();
            $this->vue->afficherCsv($data);
        }
    }

    function getJsonContacts()
    {
        if (Session::getUser() && (Session::getUser()->role == "admin" || Session::getUser()->role == "user")) {
            $data = $this->model->getContacts();
            $this->vue->afficherJson($data);
        }
    }

    function delete($id)
    {
        $valid = isset($_POST['valid']) ? $_POST['valid'] : false;
        if ($valid === $id) {
            $retour = $this->model->deleteContact($id);
        }
        $this->listeDesContacts();
    }

    function modifier($id, $data = false)
    {
        $civilites = $this->model->selectCivilites();
        $objets = $this->model->selectObjets();
        if (!$data) {
            $contact = $this->model->selectContact($id);
            $this->vue->afficherForm($civilites, $objets, $contact);
        } else {
            $contact = $data;
            $this->vue->afficherForm($civilites, $objets, $contact, true);
        }
    }

    function modifierForm($id)
    {

        if ($this->verifierChamps($_POST)) {
            $r = $this->model->updateContact($id, $_POST);
            if ($r) {
                $this->vue->afficherFormOk();
            } else {
                $this->vue->afficherFormNotOk();
            }
        } else {
            $data = $_POST;
            $data['id_contact'] = $id;
            $this->modifier($id, $data);
        }
    }


    function verifierChamps($data)
    {
        $alpha = '/^([a-z\ -]{3,}+)$/i';
        $retour = true;

        if (!preg_match($alpha, $data['nom'])) {
            $retour = false;
        }
        if (!preg_match($alpha, $data['prenom'])) {
            $retour = false;
        }
        if (!$data['message'] != "") {
            $retour = false;
        }
        return $retour;
    }
}
