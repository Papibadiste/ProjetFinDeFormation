<!DOCTYPE html>
<html lang="fr">


<?php
include "views/templates/headback.php"
?>

<body>





    <main class="container-fluid ">
        <div class="row">


            <div class="col-12 histoireback">
                <div class="col-12 retour"><a href="<?php echo BASE_URL; ?>backoffice/listehistoire/">Retour à la liste</a></div>
                <h2>Modifier une histoire</h2>
                <div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <label class="ligne" for="titre">Titre:</label>
                                    <input class="ligne" type="text" name="titre" id="titre" value="<?php echo $titre['titre'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Paragraphe1</h3>
                            <label class="ligne" for="paragraphe1">Texte du paragraphe1 (280 caractere max):</label> <br>
                            <textarea class="ligne" name="paragraphe1" id="paragraphe1" rows="4" maxlength="280"><?php echo $paragraphes1['texte'] ?></textarea>


                        </div>
                        <?php if (isset($paragraphes2['texte'])) { ?>
                        <div class="form-group">
                            <h3>Paragraphe2</h3>
                            <label class="ligne" for="paragraphe2">Texte du paragraphe2 (280 caractere max):</label> <br>
                            <textarea class="ligne" name="paragraphe2" id="paragraphe2" rows="4" maxlength="280"><?php echo $paragraphes2['texte'] ?></textarea>



                        </div>
                        <?php } ?>
                        <?php if (isset($paragraphes3['texte'])) { ?>
                        <div class="form-group">
                            <h3>Paragraphe3</h3>
                            <label class="ligne" for="paragraphe3">Texte du paragraphe3 (280 caractere max):</label> <br>
                            <textarea class="ligne" name="paragraphe3" id="paragraphe3" rows="4" maxlength="280"><?php echo $paragraphes3['texte'] ?></textarea>


                        </div>
                        <?php } ?>
                        <div class="form-check">
                            <input type="checkbox" name="chek" class="form-check-input" id="Validation">
                            <label class="form-check-label" for="Validation">Je valide les changements</label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="modifhistoire" class="btn btn-valider">Valider</button>
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

        </div>
    </main>

</body>

</html>