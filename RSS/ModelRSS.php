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

  function selectListe()
  {
    $request = $this->dao->requete("SELECT fluxrss.id_flux, fluxrss.titre, fluxrss.url FROM fluxrss");
    $data = [];
    for ($row_no = 0; $row_no < $request->num_rows; $row_no++) {
      $request->data_seek($row_no);
      $row = $request->fetch_assoc();
      $data[] = $row;
    }
    return $data;
  }

  function selectRSS($data)
  {
  }

  function enregRSS()
  {
  }
}
