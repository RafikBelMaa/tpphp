<?php
class Session
{
    public static function setUser($u)
    {
        $_SESSION['user'] = serialize($u);
    }

    public static function getUser()
    {
        if (isset($_SESSION['user'])) {
            return unserialize($_SESSION['user']);
        } else {
            return false;
        }
    }

    public static function destroyUser()
    {
        unset($_SESSION['user']);
    }

    public static function getMeteo($heure = false)
    {
        if (isset($_SESSION['meteo'])) {
            $meteo = unserialize($_SESSION['meteo']);
            if ($heure === false) {
                return $meteo;
            } else {
                return array('ville'=> $meteo['ville']['name'], 'heure' => $meteo['heures'][$heure]);
            }
        } else {
            return false;
        }
    }
    public static function setMeteo($meteo)
    {
        $_SESSION['meteo'] = serialize($meteo);
    }

    public static function destroyMeteo()
    {
        unset($_SESSION['meteo']);
    }
}
