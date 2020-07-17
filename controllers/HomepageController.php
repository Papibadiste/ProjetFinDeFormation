<?php

spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});


function indexAction()
{
    session_start();
    $bdd        = new Bdd();
    $connection = $bdd->getConnection();
    $histoire = new Histoire();
    $nombrehistoire = $histoire->listeHistoire($connection);
    $listehistoire = $histoire->listeHistoire($connection);
    $photo = new Photo();
    $paragraphe = new Paragraphe();
    $user = new Users();
    $categorie = new Categorie();
    $Note = new Note();
    

    require('views/homepage/index.php');
}
