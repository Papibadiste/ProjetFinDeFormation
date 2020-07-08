<?php
spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

function ajouterhistoireAction()
{
    session_start();
    if (isset($_POST['ajouthistoire'])) {

        if (!empty($_POST['titre']) and !empty($_POST['categorie']) and !empty($_POST['paragraphe1']) and !empty($_FILES['photop1']) and !empty($_POST['chek'])) {
            $bdd        = new Bdd();
            $connection = $bdd->getConnection();
            $target_dir = "assets/imghistoire/";
            $target_file = $target_dir . basename($_FILES['photop1']["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $users = new Photo();
            $reqphoto = $users->verifPhoto($connection,$target_file);
            $photoexist = $reqphoto->rowCount();
                if($photoexist == 0){
                    echo 'la photo nexiste pas';
                    $titre = htmlspecialchars($_POST['titre']);
                    $categorie = htmlspecialchars($_POST['categorie']);
                    $paragraphe1 = htmlspecialchars($_POST['paragraphe1']);
                    $histoire = new Histoire();
                    $histoire->ajoutHistoire($connection,$titre,$categorie,$paragraphe1);
                    

                }else{
                    $erreur = "veuillez changer le nom de l'image";
                }

            // La suite pour la paragraphe2
            if (!empty($_POST['paragraphe2']) and !empty($_FILES['photop2'])) {
                $paragraphe2 = htmlspecialchars($_POST['paragraphe2']);
                $target_dir = "assets/imghistoire/";
                $target_file = $target_dir . basename($_FILES['photop2']["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                echo "P2";
            }
            // La suite pour la paragraphe3
            if (!empty($_POST['paragraphe3']) and !empty($_FILES['photop3'])) {
                $paragraphe3 = htmlspecialchars($_POST['paragraphe3']);
                $target_dir = "assets/imghistoire/";
                $target_file = $target_dir . basename($_FILES['photop3']["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                echo "P3";
            }
        } else {
            $erreur = "veuillez remplir tous les champs";
        }
    }

    require('views/histoire/ajouterhistoire.php');
}
