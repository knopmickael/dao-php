<?php

    spl_autoload_register(function($className){

        $fileName = "class" . DIRECTORY_SEPARATOR . $className . ".php";

        if (file_exists($fileName)){
            require_once($fileName);
        }

    });

?>