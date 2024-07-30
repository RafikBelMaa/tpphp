<?php

class ModelAuthentification
{

    private $dao;

    function __construct()
    {
        $this->dao = new DAO_MySqli();
    }
    function selectUser($login, $password)
    {
        $sql = "SELECT id_user, login, role FROM user WHERE login = '$login' AND password ='" . md5($password . Conf::$salt) . "'";
        //die($sql);
        $result = $this->dao->requete($sql);
        return $result->fetch_object();
        
    }
}
