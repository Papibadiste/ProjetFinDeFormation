<?php

spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

function ramdomHistoire(){
    $bdd        = new Bdd();
    $connection = $bdd->getConnection();
    $histoire = new Histoire();
    $randomhistoire = $histoire->trouverRandomHistoire($connection);
    $randomhistoire = $randomhistoire->fetch();
    return $randomhistoire;
}

function indexAction(){
    $randomhistoire = ramdomHistoire();
    require('views/presentation/index.php');
}