<?php
class DAO_RSS implements DAO
{

  function requete($url)
  {
    //$rss_xml = file_get_contents($url);
    $rss_xml = simplexml_load_file($url);
    if (!empty($rss_xml)) {
      return $rss_xml;
    } else {

      return false;
    }
  }
}
