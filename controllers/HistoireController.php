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

function ajouterhistoireAction()
{
    session_start();
    $randomhistoire = ramdomHistoire();
    if (isset($_SESSION['id'])) {
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


                            //histoire
                            $date_creation = date('Y/m/d');
                            $histoire->ajoutHistoire($connection, $titre, $_SESSION['id'], $date_creation);

                            //Trouver l'id histoire de l'histoire qui vient d'etre ajouté
                            $reqiduser = $histoire->tableauUtilisateur($connection, $titre, $_SESSION['id']);
                            $histexist = $reqiduser->fetch();

                            //Categorie
                            $categorie = htmlspecialchars($_POST['categorie']);
                            $categorieclass = new Categorie;
                            $categorieid = $categorieclass->trouverCategorie($connection, $categorie);
                            $categorieid = $categorieid->fetch();
                            $categorieclass->ajoutCategorie($connection, $histexist['id'], $categorieid['id']);

                            //Photo
                            $photo->ajoutPhoto($connection, $histexist['id'], $target_file, $emplacement);
                            move_uploaded_file($_FILES["photop1"]["tmp_name"], $target_file);

                            //Paragraphe
                            $paragraphe1 = htmlspecialchars($_POST['paragraphe1']);
                            $paragraphe = new Paragraphe();
                            $paragraphe->ajoutParagraphe($connection, $histexist['id'], $paragraphe1, $emplacement);
                        } else {
                            $erreur = "veuillez changer le titre de votre histoire car vous en avez deja une à ce nom";
                        }
                    } else {
                        $erreur = "veuillez changer le nom de l'image";
                    }




                    // La suite pour la paragraphe2
                    if (!empty($_POST['paragraphe2']) and !empty($_FILES['photop2'])) {
                        $emplacement = 2;
                        $paragraphe2 = htmlspecialchars($_POST['paragraphe2']);
                        $target_dir = "assets/imghistoire/";
                        $target_file = $target_dir . basename($_FILES['photop2']["name"]);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        if ($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" and $_FILES["photoplat"]["size"] > 1000000) {
                            $photo = new Photo();
                            $reqphoto = $photo->verifPhoto($connection, $target_file);
                            $photoexist = $reqphoto->rowCount();
                            if ($photoexist == 0) {

                                //Photo
                                $photo->ajoutPhoto($connection, $histexist['id'], $target_file, $emplacement);
                                move_uploaded_file($_FILES["photop2"]["tmp_name"], $target_file);

                                //Paragraphe
                                $paragraphe2 = htmlspecialchars($_POST['paragraphe2']);
                                $paragraphe = new Paragraphe();
                                $paragraphe->ajoutParagraphe($connection, $histexist['id'], $paragraphe2, $emplacement);
                            } else {
                                $erreur = "veuillez changer le nom de l'image numero 2";
                            }
                        } else {
                            $erreur = "veuillez changer le type d'image numero 2 en jpg,png ou jpeg";
                        }
                    }




                    // La suite pour la paragraphe3
                    if (!empty($_POST['paragraphe3']) and !empty($_FILES['photop3'])) {
                        $emplacement = 3;
                        $target_dir = "assets/imghistoire/";
                        $target_file = $target_dir . basename($_FILES['photop3']["name"]);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        if ($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" and $_FILES["photoplat"]["size"] > 1000000) {
                            $photo = new Photo();
                            $reqphoto = $photo->verifPhoto($connection, $target_file);
                            $photoexist = $reqphoto->rowCount();
                            if ($photoexist == 0) {

                                //Photo
                                $photo->ajoutPhoto($connection, $histexist['id'], $target_file, $emplacement);
                                move_uploaded_file($_FILES["photop3"]["tmp_name"], $target_file);

                                //Paragraphe
                                $paragraphe3 = htmlspecialchars($_POST['paragraphe3']);
                                $paragraphe = new Paragraphe();
                                $paragraphe->ajoutParagraphe($connection, $histexist['id'], $paragraphe3, $emplacement);
                            } else {
                                $erreur = "veuillez changer le nom de l'image numero 3";
                            }
                        } else {
                            $erreur = "veuillez changer le type d'image numero 3 en jpg,png ou jpeg";
                        }
                    }

                    $bravo = "bravo";
                } else {
                    $erreur = "veuillez changer le type d'image en jpg,png ou jpeg";
                }
            } else {
                $erreur = "veuillez remplir tous les champs";
            }
        }
    } else {
        header('Location:' . BASE_URL . 'user/connection');
    }
    require('views/histoire/ajouterhistoire.php');
}

function histoirecompleteAction()
{
    session_start();
    $randomhistoire = ramdomHistoire();
    $requestUri    = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
    $requestParams = explode('/', $requestUri);
    $histoireId     = isset($requestParams[2]) ? $requestParams[2] : null;
    $bdd        = new Bdd();
    $connection = $bdd->getConnection();
    $histoire = new Histoire();
    $infohistoire = $histoire->trouverHistoire($connection, $histoireId);
    $infohistoire = $infohistoire->fetch();
    $infohistoire['date_creation'] = DateTime::createFromFormat('Y-m-d', $infohistoire['date_creation']);
    $users = new Users();
    $auteur = $users->trouverAuteur($connection, $infohistoire['id_utilisateur']);
    $auteur = $auteur->fetch();
    $categoriec = new Categorie();
    $categorie = $categoriec->recupCategorie($connection, $histoireId);
    $categorie = $categorie->fetch();
    $paragraphe = new Paragraphe();
    $listeparagraphe = $paragraphe->listerParagraphe($connection, $histoireId);
    $photo = new Photo();
    $listephoto = $photo->listerPhoto($connection, $histoireId);
    
    $Note = new Note();
    $notelliste = $Note->listNote($connection, $histoireId);
    $calculnote = 0 ;

    if ($notelliste->rowCount() > 0) {

        while ($liste = $notelliste->fetch(PDO::FETCH_BOTH)) {
            $noteid = $Note->trouverViaIdNote($connection, $liste['id_note']);
            $note =  $noteid->fetch();
            $calculnote = $calculnote + $note['note'];
           
        }
    }
    if (!empty($note)){
        $notefinal = $calculnote/$notelliste->rowCount();
    }

    


    if (isset($_SESSION['id'])) {
        $noteverif = $Note->verifNote($connection, $histoireId);
        $noteexist = $noteverif->rowCount();
    }


    if (isset($_POST['ajoutnote'])) {
        $note = $_POST['note'];
        $noteid = $Note->trouverNote($connection, $note);
        $noteid =  $noteid->fetch();
        $Note->ajouterNote($connection, $noteid['id'],$histoireId );
        header('Location:' . BASE_URL . 'histoire/histoirecomplete/'.$histoireId );
    }


    require('views/histoire/histoirecomplete.php');
}
