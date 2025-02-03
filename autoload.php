<?php
/*cargar automáticamente las clases cuando son instanciadas o referenciadas*/
    spl_autoload_register(function($clase){

        $archivo= __DIR__."/".$clase.".php";
        $archivo=str_replace("\\","/",$archivo);

        if(is_file($archivo)){
            require_once $archivo;
        } 
    });