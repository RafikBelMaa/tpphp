<?php

class ModelMeteo
{
    private $dao;


    function __construct()
    {
        $this->dao = new DAO_JSON();
    }

    function selectMeteo($ville)
    {
        $array = $this->dao->requete(Conf::$url . $ville);
        if ($array != false) {
            if (isset($array['city_info'])) {

                $hourly = [];
                $hourly['ville'] = array(
                    'name' => $array['city_info']['name']
                );
                $hourly['heures'] = [];
                foreach ($array['fcst_day_0']['hourly_data'] as $hourlyData) {
                    $hourly['heures'][] = array(
                        'icon' => $hourlyData['ICON'],
                        'condition' => $hourlyData['CONDITION'],
                        'temp' => $hourlyData['TMP2m'],
                        'humidite' => $hourlyData['HUMIDEX'],
                        'windspeed' => $hourlyData['WNDSPD10m'],
                        'pression' => $hourlyData['PRMSL'],


                    );
                }
                Session::setMeteo($hourly);
            }
            else {
                /**
                 * errors
                 */
            }
        }
        return $array;
    }
}
