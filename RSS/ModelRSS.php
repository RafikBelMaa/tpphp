<?php
class ModelRSS
{
  private $dao;
  private $daorss;
  function __construct()
  {
    $this->dao = new DAO_MySqli();
    $this->daorss = new DAO_RSS();
  }

  function selectListe($data)
  {
  }

  function selectRSS($data)
  {
  }

  function enregRSS()
  {
  }
}
