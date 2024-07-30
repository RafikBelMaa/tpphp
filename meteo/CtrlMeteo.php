<?php

class CtrlMeteo
{
    private $vue;
    private $model;


    public function __construct()
    {
        $this->vue = new ViewMeteo();
        $this->model = new ModelMeteo();
    }

    function getMeteo()
    {
        $data = $this->model->selectMeteo($_POST['ville']);
        if (!$data) {
            $this->vue->afficherMeteo("Erreur Serveur", true);
        } elseif (isset($data["errors"])) {
            $this->vue->afficherMeteo($data["errors"][0]["text"], true);
        } else {
            $this->vue->afficherMeteo($data);
        }
    }

    function apiMeteo(){
        echo json_encode(Session::getMeteo(date("G")));
    }
}
