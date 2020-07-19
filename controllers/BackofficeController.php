<?php
spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

function connectionAction()
{
    session_start();
    if (isset($_POST['formconnection'])) {

        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['Password']);

        if (!empty($_POST['email']) and !empty($_POST['Password'])) {
            $bdd        = new Bdd();
            $connection = $bdd->getConnection();
            $admin = new Admin();
            $reqmail = $admin->verifMail($connection, $email);
            $userexist = $reqmail->fetch();
            if ($userexist && password_verify($pass, $userexist['mdp'])) {

                $_SESSION['adminid'] = $userexist['id'];
                header('Location:' . BASE_URL . 'backoffice/listehistoire');
            } else {
                $erreur = 'Mauvais mots de passe';
            }
        } else {
            $erreur = 'veuillez remplir tous les champs';
        }
    }
    require('views/backoffice/connection.php');
}
function listehistoireAction()
{

    session_start();
    if (isset($_SESSION['adminid'])) {
        $bdd        = new Bdd();
        $connection = $bdd->getConnection();
        $histoire = new Histoire();
        $listehistoire = $histoire->listeHistoire($connection);
        $categorie = new Categorie();
        require('views/backoffice/listehistoire.php');
    } else {
        header('Location:' . BASE_URL . 'backoffice/connection');
    }
}

function histoiremodifAction()
{

    session_start();
    if (isset($_SESSION['adminid'])) {
        $requestUri    = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
        $requestParams = explode('/', $requestUri);
        $histoireId     = isset($requestParams[2]) ? $requestParams[2] : null;
        $bdd        = new Bdd();
        $connection = $bdd->getConnection();
        $histoire       = new Histoire();
        $titre = $histoire->trouverHistoire($connection, $histoireId);
        $titre = $titre->fetch();
        $paragraphe = new Paragraphe();
        $position = 1;
        $paragraphes1 = $paragraphe->trouverParagraphe($connection, $histoireId,$position);
        $paragraphes1 = $paragraphes1->fetch();
        $position = 2;
        $paragraphes2 = $paragraphe->trouverParagraphe($connection, $histoireId,$position);
        $paragraphes2 = $paragraphes2->fetch();
        $position = 3;
        $paragraphes3 = $paragraphe->trouverParagraphe($connection, $histoireId,$position);
        $paragraphes3 = $paragraphes3->fetch();

        if (isset($_POST['modifhistoire'])) {
            $titreupdate =htmlspecialchars($_POST["titre"]);
            
            $histoire->updateHistoire($connection, $histoireId, $titreupdate);


            header('Location:' . BASE_URL . 'backoffice/histoiremodif/'. $histoireId );
        }
        
        
        require('views/backoffice/histoiremodif.php');
    } else {
        header('Location:' . BASE_URL . 'backoffice/connection');
    }
}

function supprimerhistoireAction()
{

    session_start();
    $requestUri    = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
    $requestParams = explode('/', $requestUri);
    $histoireId     = isset($requestParams[2]) ? $requestParams[2] : null;
    $bdd        = new Bdd();
    $connection = $bdd->getConnection();
    $histoire = new Histoire();
    $histoire->supprimerHistoire($connection, $histoireId);
    header('Location:' . BASE_URL . 'backoffice/listehistoire');
}
