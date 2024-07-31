<?php
class ViewRSS
{
  private $partials = "rss/partials/";


  function afficherListe()
  {
  }

  function afficherRSS($data)
  {
    $partial = $this->partials . "rss.html";
    include Conf::$templates . "template.html";
  }

  function afficherNotRSS()
  {
  }
}
