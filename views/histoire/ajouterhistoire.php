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
            <?php if (isset($bravo)) { ?>
                <div class="col-sm-8 col-10 offset-sm-2 offset-1 histoire">

                    <h3> Felicitation l'histoire a bien été ajouté </h3>


                </div>

            <?php } else { ?>
                <div class="col-sm-8 col-10 offset-sm-2 offset-1 histoire">
                    <h2>Ajouter une histoire</h2>
                    <div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <label class="ligne" for="titre">Titre:</label>
                                        <input class="ligne" type="text" name="titre" id="titre" value="<?php if (isset($titre)) {
                                                                                                            echo $titre;
                                                                                                        } ?>">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="ligne" for="categorie">Catégorie:</label>
                                        <select class="form-control-sm ligne" name="categorie" id="categorie">
                                            <option selected disabled hidden>Catégorie</option>
                                            <option value="Sport Collectif">Sport Collectif</option>
                                            <option value="Sport Individuel">Sport Individuel</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Paragraphe1</h3>
                                <label class="ligne" for="paragraphe1">Texte du paragraphe1 (280 caractere max):</label> <br>
                                <textarea class="ligne" name="paragraphe1" id="paragraphe1" rows="8" maxlength="280"><?php if (isset($paragraphe1)) {
                                                                                                                            echo $paragraphe1;
                                                                                                                        } ?></textarea>
                                <label for="photop1">Choisir une image</label>
                                <input type="file" class="form-control-file" id="photop1" name="photop1">

                            </div>

                            <div class="d-flex justify-content-center">
                                <input type="button" id="btn1" class="btn btn-light" value="Ajouter un paragraphe" onclick="modifParagraphe()">
                            </div>

                            <div class=" form-group none1" id="paragraphejs2">
                                <h3>Paragraphe2</h3>
                                <label class="ligne" for="paragraphe2">Texte du paragraphe2 (280 caractere max):</label> <br>
                                <textarea class="ligne" name="paragraphe2" id="paragraphe2" rows="8" maxlength="280"><?php if (isset($paragraphe2)) {
                                                                                                                            echo $paragraphe2;
                                                                                                                        } ?></textarea>
                                <label for="photop2">Choisir une image</label>
                                <input type="file" class="form-control-file" id="photop2" name="photop2">


                            </div>

                            <div class="d-flex justify-content-center">
                                <input type="button" id="btn2" class="btn btn-light none1" value="Ajouter un paragraphe" onclick="modifParagraphe2()">
                                <input type="button" id="btn3" class="btn btn-dark none1" value="Enlever un paragraphe" onclick="modifParagraphe()">
                            </div>

                            <div class="form-group none1" id="paragraphejs3">
                                <h3>Paragraphe3</h3>
                                <label class="ligne" for="paragraphe3">Texte du paragraphe3 (280 caractere max):</label> <br>
                                <textarea class="ligne" name="paragraphe3" id="paragraphe3" rows="8" maxlength="280"><?php
                                                                                                                        if (isset($paragraphe3)) {
                                                                                                                            echo $paragraphe3;
                                                                                                                        } ?></textarea>
                                <label for="photop3">Choisir une image</label>
                                <input type="file" class="form-control-file" id="photop3" name="photop3">

                            </div>

                            <div class="d-flex justify-content-center">
                                <input type="button" id="btn4" class="btn btn-dark none1" value="Enlever un paragraphe" onclick="modifParagraphe2()">
                            </div>

                            <div class="form-check">
                                <input type="checkbox" name="chek" class="form-check-input" id="Validation">
                                <label class="form-check-label" for="Validation">En décidant de m'inscrire j'accepte de partager mon histoire </label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="ajouthistoire" class="btn btn-valider">Valider</button>
                            </div>
                            <?php if (isset($erreur)) { ?>
                                <div class="d-flex justify-content-center ">
                                    <div class="erreur">
                                        <?php echo $erreur;    ?>
                                    </div>
                                </div>
                            <?php } ?>


                        </form>
                    </div>



                </div>
            <?php } ?>
        </div>
    </main>

    <?php
    include "views/templates/footer.php"
    ?>

</body>
<script src="<?php echo BASE_URL; ?>assets/js/ajouthistoire.js"></script>

</html>