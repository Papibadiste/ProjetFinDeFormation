<!DOCTYPE html>
<html lang="fr">

<?php
include "views/templates/head.php"
?>

<body>

    <?php
    include "views/templates/header.php"
    ?>
    <main class="container-fluid ">
        <div class="row">
            <div class="col-12 col-lg-10  offset-lg-1 pagehistoire">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2><?php echo $infohistoire['titre']; ?></h2>
                    </div>
                    <div class="col-6 info">Cree le <?php echo $infohistoire['date_creation']->format('d/m/Y');; ?> par <?php echo $auteur['pseudo']; ?></div>
                    <div class="col-6 d-flex flex-row-reverse ">Categorie: <?php echo $categorie['sport']; ?></div>
                    <!-- Boucle while pour afficher les paragraphes -->
                    <div class="col-12 ">
                        <div class="row ">
                            <?php while ($row = $listeparagraphe->fetch(PDO::FETCH_BOTH)) { ?>
                                <?php while ($rowimg = $listephoto->fetch(PDO::FETCH_BOTH)) { ?>

                                    <div class="col-sm-3 col-12 d-flex justify-content-center justify-content-sm-start">
                                        <img src="<?php echo BASE_URL; ?><?php echo $rowimg['source'] ?>" alt="">
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="text d-flex justify-content-center justify-content-sm-start"> <?php echo $row['texte'] ?> </div>
                                    </div>


                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>


                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center">
                                Moyenne: <?php echo  $notefinal; ?>
                            </div>
                            <?php if (isset($_SESSION["id"]) && (isset($_SESSION["mail"])) && $noteexist == 0) { ?>
                                <div class="col-12 col-sm-6 text-center">
                                    <form method="POST">
                                        <label class="ligne" for="note">Choisir une note:</label>
                                        <select class="form-control-sm ligne" name="note" id="note">
                                            <option selected disabled hidden>Note</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>

                                        </select>
                                        <input type="submit" name="ajoutnote" class="btn">
                                    </form>

                                </div>
                            <?php } elseif(isset($_SESSION["id"]) && (isset($_SESSION["mail"])) && $noteexist != 0)  { ?>
                                <div class="col-12 col-sm-6 text-center ">
                                    <div class="bg">
                                    Merci d'avoir voté
                                    </div>
                                    

                                </div>
                                <?php } else { ?>
                                <div class="col-12 col-sm-6 text-center ">
                                    <div class="bg">
                                    connectez-vous pour pouvoir voter
                                    </div>
                                    

                                </div>

                            <?php } ?>
                        </div>
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

</html>