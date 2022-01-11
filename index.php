<?php
    function my_autoloader($class) {
        if (file_exists('./classes/' . $class . '.php')){
            include './classes/' . $class . '.php';
        } else if (file_exists('./Controllers/' . $class . '.php')){
            include './Controllers/' . $class . '.php';
        }
        
    }
    
    spl_autoload_register('my_autoloader');
    
    require_once('Routes.php');


    