<?php

class CtrlRSS
{
  private $vue;
  private $model;
  function __construct()
  {
    $this->model = new ModelRSS();
    $this->vue = new ViewRSS();
  }

  function regRSS()
  {
  }

  function getRSS()
  {
    $data = $this->model->selectListe();

    var_dump($_POST);

    $this->vue->afficherRSS($data);
  }
}
