<?php

spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

function indexAction(){
    require('views/presentation/index.php');
}