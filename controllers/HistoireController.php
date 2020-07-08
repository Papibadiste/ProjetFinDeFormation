<?php
spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

function ajouterhistoireAction()
{
    session_start();
    if (isset($_POST['ajouthistoire'])) {

        if (!empty($_POST['titre']) and !empty($_POST['categorie']) and !empty($_POST['paragraphe1']) and !empty($_FILES['photop1']) and !empty($_POST['chek'])) {
            $emplacement = 1;
            $bdd        = new Bdd();
            $connection = $bdd->getConnection();
            $target_dir = "assets/imghistoire/";
            $target_file = $target_dir . basename($_FILES['photop1']["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" and $_FILES["photoplat"]["size"] > 1000000) {


                $photo = new Photo();
                $reqphoto = $photo->verifPhoto($connection, $target_file);
                $photoexist = $reqphoto->rowCount();
                if ($photoexist == 0) {
                    $titre = htmlspecialchars($_POST['titre']);
                    $histoire = new Histoire();
                    $reqtitre = $histoire->tableauUtilisateur($connection, $titre, $_SESSION['id']);
                    $titreexist = $reqtitre->rowCount();
                    if ($titreexist == 0) {
                        $categorie = htmlspecialchars($_POST['categorie']);
                        $paragraphe1 = htmlspecialchars($_POST['paragraphe1']);
                        $date_creation = date('Y/m/d');
                        $histoire->ajoutHistoire($connection, $titre, $_SESSION['id'], $date_creation);
                        $reqiduser = $histoire->tableauUtilisateur($connection, $titre, $_SESSION['id']);
                        $userexist = $reqiduser->fetch();
                        $photo->ajoutPhoto($connection, $userexist['id'], $target_file, $emplacement);
                        move_uploaded_file($_FILES["photop1"]["tmp_name"], $target_file);
                        $paragraphe = new Paragraphe();
                        $paragraphe->ajoutParagraphe($connection,$userexist['id'],$paragraphe1,$emplacement);
                        $categorie = new Categorie;
                        $categorie -> trouverCategorie();
                        $categorie -> ajoutCategorie($connection,$userexist['id'],$categorie);
                    } else {
                        $erreur = "veuillez changer le titre de votre histoire car vous en avez deja une à ce nom";
                    }
                } else {
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
            }else{
                $erreur = "veuillez changer le type d'image en jpg,png ou jpeg";
            }
        } else {
            $erreur = "veuillez remplir tous les champs";
        }
    }

    require('views/histoire/ajouterhistoire.php');
}
