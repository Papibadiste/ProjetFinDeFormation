<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jeCPA</title>
    <meta name="description" content="LETSEAT Le goût par l'image">

    <link rel="icon" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/styles.min.css">
</head>

<body>

    <?php
    include "views/templates/header.php"
    ?>

    <main class="container-fluid accueil">
        <div class="row ">

            <!-- systeme de recherche -->
            <div class="col-lg-2 col-12 recherche">
                sdfsdf
            </div>
            <div class="col-lg-8 col-10 offset-1 ">
                <div class="row">
                    <!-- un article -->

                    <?php

                    if ($nombrehistoire->rowCount() > 0) {

                        // output data of each row
                        while ($row = $listehistoire->fetch(PDO::FETCH_BOTH)) {
                            $position = 1;
                            $image = $photo->trouverPhoto($connection, $row['id']);
                            $image = $image->fetch();
                            $text = $paragraphe->trouverParagraphe($connection, $row['id']);
                            $text = $text->fetch();
                            $text = str_split($text['texte'], 185);
                            $auteur = $user->trouverAuteur($connection, $row['id_utilisateur']);
                            $auteur = $auteur->fetch();
                            $categorie2 = $categorie->recupCategorie($connection, $row['id']);
                            $categorie2 = $categorie2->fetch();
                    ?>


                            <div class="col-12 histoirevue">
                                <div class="row">
                                    <div class="col-lg-2 col-12 d-flex flex-column ">
                                        <div class=" text-center categorie">
                                            <?php echo $categorie2['sport']; ?>
                                        </div>
                                        <div class=" d-flex justify-content-center ">
                                            <img class="img" src="<?php echo $image['source']; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-12 d-flex justify-content-between flex-column">

                                        <div class="d-flex justify-content-between">
                                            <h3><?php echo $row['titre']; ?></h3>
                                            <div class="d-flex justify-content-center flex-column ">
                                                ?/5
                                            </div>

                                        </div>
                                        <div class="resume">
                                            <p class="resume">
                                                <?php echo $text[0]; ?>...
                                            </p>
                                        </div>


                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-center flex-column ">
                                                Par <?php echo $auteur['pseudo']; ?>
                                            </div>

                                            <a href="<?php echo BASE_URL; ?>histoire/histoirecomplete/<?php echo $row['id']; ?>" class="liens d-flex justify-content-center flex-column">Voir la suite</a>
                                        </div>
                                    </div>

                                </div>

                            </div>



                    <?php   }
                    }
                    ?>

                </div>
            </div>
        </div>

        </div>
    </main>

    <?php
    include "views/templates/footer.php"
    ?>

</body>

</html>