<?php
class DAO_MySqli implements DAO
{

    private $mysqli;

    function __construct()
    {
        // connexion
        $this->mysqli = new mysqli(Conf::$bdd['host'], Conf::$bdd['user'], Conf::$bdd['pass'], Conf::$bdd['database'], Conf::$bdd['port']);
    }

    function requete($sql)
    {
        // echo $sql;
        try {
            return $this->mysqli->query($sql);
        } catch (Exception) {
            return false;
        }
    }
}
