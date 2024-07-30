<?php

class DAO_JSON implements DAO {

    function requete($url)
    {
        $json = @file_get_contents($url);
        if (!$json)
        {
            return false;
        }
        else {
            return json_decode($json, true);
        }

    }
}