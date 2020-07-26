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



function indexAction()
{
    session_start();
    $bdd        = new Bdd();
    $connection = $bdd->getConnection();
    $histoire = new Histoire();
    $nombrehistoire = $histoire->listeHistoire($connection);
    $photo = new Photo();
    $paragraphe = new Paragraphe();
    $user = new Users();
    $categorie = new Categorie();
    $Note = new Note();
    $randomhistoire = ramdomHistoire();

    // pagination
    $requestUri    = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
    $requestParams = explode('/', $requestUri);
    $pageCourante  = isset($requestParams[2]) ? $requestParams[2] : null;
    $histoireParPage =12;
    $histoireTotal= $histoire->listeHistoire($connection);
    $histoireTotal= $histoireTotal->rowCount();
    $pagesTotal=$histoireTotal/$histoireParPage;
    $pagesTotal=ceil($pagesTotal);
    if(!empty($pageCourante)){
        $pageCourante  = intval($pageCourante);
    }else{
        $pageCourante =1;
    }
    $pageS = $pageCourante+1;
    $pageP = $pageCourante-1;
    $depart = ($pageCourante-1)*$histoireParPage;
    $listehistoire= $histoire->listeHistoirePourPagination($connection,$depart,$histoireParPage);

  


    

    require('views/homepage/index.php');
    
}
