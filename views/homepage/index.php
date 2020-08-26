<!DOCTYPE html>
<html lang="fr">

<?php
include "views/templates/head.php"
?>

<body>

    <?php
    include "views/templates/header.php"
    ?>

    <main class="container-fluid accueil">
        <div class="row ">

            <!-- systeme de recherche -->
            <div class="col-lg-2 col-12 recherche">
                <div class="text-center suite"> A venir </div>
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
                            $position = 1;
                            $text = $paragraphe->trouverParagraphe($connection, $row['id'], $position);
                            $text = $text->fetch();
                            $text = str_split($text['texte'], 185);
                            $auteur = $user->trouverAuteur($connection, $row['id_utilisateur']);
                            $auteur = $auteur->fetch();
                            $categorie2 = $categorie->recupCategorie($connection, $row['id']);
                            $categorie2 = $categorie2->fetch();
                            $notelliste = $Note->listNote($connection, $row['id']);
                            $calculnote['row'] = 0;

                            if ($notelliste->rowCount() > 0) {

                                while ($liste = $notelliste->fetch(PDO::FETCH_BOTH)) {
                                    $noteid = $Note->trouverViaIdNote($connection, $liste['id_note']);
                                    $note =  $noteid->fetch();
                                    $calculnote['row'] = $calculnote['row'] + $note['note'];
                                }
                            }
                            $notelliste = $notelliste->rowCount();
                            if ($notelliste > 0) {
                                $calculnote['row'] = $calculnote['row'] / $notelliste;
                            }

                    ?>


                            <div class="col-12 histoirevue">
                                <div class="row">
                                    <div class="col-lg-2 col-12 d-flex flex-column ">
                                        <div class=" text-center categorie">
                                            <?php echo $categorie2['sport']; ?>
                                        </div>
                                        <div class=" d-flex justify-content-center ">
                                            <img class="img" src="<?php echo BASE_URL . $image['source']; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-12 d-flex justify-content-between flex-column">

                                        <div class="d-flex justify-content-between">
                                            <h3><?php echo $row['titre']; ?></h3>
                                            <div class="d-flex justify-content-center flex-column ">
                                                <?php if (!empty($calculnote['row'])) {
                                                    echo $calculnote['row'];
                                                } else {
                                                    echo 'non noté';
                                                } ?>/5
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
                    <div class="col-12 pagination d-flex justify-content-around">
                        <a href="<?php echo BASE_URL ?>Homepage/Index/1">
                            <button class="btn">|<</button>
                        </a> 
                        <?php if ($pageCourante == $histoireTotal) {
                        echo '<a href="' . BASE_URL . 'Homepage/Index/1">
                            <button class="btn"><</button>
                        </a>';
                    } else {
                        echo '<a href="' . BASE_URL . 'Homepage/Index/' . $pageP . '">
                            <button class="btn" button><</button>
                        </a>';
                    } ?>
                        </a> 
                                        <div class="d-flex justify-content-around width">
                                            <?php
                                            for ($i = 1; $i <= $pagesTotal; $i++) {
                                                echo '<a class="lien" href="' . BASE_URL . 'Homepage/Index/' . $i . '">' . $i . '</a>';
                                            }
                                            ?>
                    </div>
                    <?php if ($pageCourante == $histoireTotal) {
                        echo '<a href="' . BASE_URL . 'Homepage/Index/' . $histoireTotal . '">
                            <button class="btn">></button>
                        </a>';
                    } else {
                        echo '<a href="' . BASE_URL . 'Homepage/Index/' . $pageS . '">
                            <button class="btn" button>></button>
                        </a>';
                    } ?>

                    <a href="<?php echo BASE_URL ?>Homepage/Index/<?php echo $histoireTotal ?>">
                        <button class="btn">>|</button>
                    </a>

                </div>

            </div>
        </div>
        </div>

        </div>
    </main>

    <?php
    include "views/templates/footer.php"
    ?>

</body>
<script src="<?php echo BASE_URL; ?>assets/js/pagination.js"></script>

</html>