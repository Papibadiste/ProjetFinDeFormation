<?php

// Récupération de la requête

include "config/base_url.php";

// On sépare les paramètres de la requête
$requestParams = explode('/', $requestUri);

// Définition du contrôleur et de l'action
$controller = (!empty($requestParams[0]) ? ucfirst($requestParams[0])  : 'Homepage'). 'Controller';
$action = (!empty($requestParams[1]) ? $requestParams[1] : 'index'). 'Action';

if (file_exists('controllers/'. $controller . '.php')) {
    require('controllers/' . $controller . '.php');
    if (function_exists($action)) {
        $action();
    } else {
        require('404.php');
    }
} else {
    require('404.php');
}