<?php

spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

function inscriptionAction()
{
    session_start();
    if (isset($_POST['forminscription'])) {

       

        if (!empty($_POST['email']) and !empty($_POST['pseudo']) and !empty($_POST['Password']) and !empty($_POST['VPassword'])) {
            $email = htmlspecialchars($_POST['email']);
            $pseudo = htmlspecialchars($_POST['pseudo']);

            if (!empty($_POST['chek'])) {

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $bdd        = new Bdd();
                    $connection = $bdd->getConnection();
                    $users = new Users();
                    $cmail = $users->verifMail($connection,$email);
                    if($cmail == 0){
                        $pass = htmlspecialchars($_POST['Password']);
                        $vpass = htmlspecialchars($_POST['VPassword']);
                        if ($pass == $vpass){
                            $hashedpass = password_hash($pass, PASSWORD_DEFAULT);

                            $users->inscription($connection,$email,$pseudo,$hashedpass);
                            header('Location: ' . BASE_URL . 'user/connection');


                        }else{
                            $erreur = "Les mots de passe ne sont pas identiques";
                        }

                    }else{
                        $erreur = 'Email deja utilisé';
                    }

                        
                } else {
                    $erreur = "Veuillez rentrer un email valide";
                }
            } else {
                $erreur = 'Merci de cocher la chekbox';
            }
        } else {
            $erreur = 'veuillez remplir tous les champs';
        }
    }
    require('views/utilisateur/inscription.php');
}

function connectionAction()
{
    session_start();
    if (isset($_POST['formconnection'])) {

        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['Password']);
        
        if (!empty($_POST['email']) and !empty($_POST['Password'])) {
            $bdd        = new Bdd();
            $connection = $bdd->getConnection();
            $users = new Users();
            $userexist = $users->verifMailConnection($connection,$email);
            if($userexist && password_verify($pass, $userexist['mdp'])){  
                
                $_SESSION['id']= $userexist['id'];
                $_SESSION['mail'] = $userexist['mail'];
                $_SESSION['pseudo'] = $userexist['pseudo'];
                header('Location:' . BASE_URL .' ');
                

            }else{
                $erreur = 'Mauvais mots de passe';
            }

        }else{
            $erreur = 'veuillez remplir tous les champs';
        }
    }
    require('views/utilisateur/connection.php');
}