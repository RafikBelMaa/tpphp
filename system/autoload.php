<?php

include "system/Conf.php";

spl_autoload_register(function ($class_name) {

    foreach(Conf::$modules as $module){
        if(file_exists("{$module}/" . $class_name . '.php')){
            include_once "{$module}/" . $class_name . '.php';
        }
    }

});



// http://tpphp.test:9000/index.php?c=CtrlContact&m=getForm
// https://x9k5f33g-3000.uks1.devtunnels.ms/?c=CtrlContact&m=getForm
// http://tpphp.test:9000/index.php?c=CtrlPage&m=getPage&a=accueil

// /CtrlContact/delete/1