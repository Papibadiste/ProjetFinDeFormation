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
        header('Location:' . BASE_URL . 'user/connection');
    }
}

function histoiremodifAction()
{

    session_start();
    if (isset($_SESSION['adminid'])) {
        require('views/backoffice/histoiremodif.php');
    } else {
        header('Location:' . BASE_URL . 'user/connection');
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
    require('views/backoffice/listehistoire.php');
}
