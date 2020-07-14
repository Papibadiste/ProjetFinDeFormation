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
                                    <input class="ligne" type="text" name="titre" id="titre" value="<?php echo $titre;?>">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label class="ligne" for="categorie">Catégorie:<?php echo $categorie; ?></label>
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
                            <textarea class="ligne" name="paragraphe1" id="paragraphe1" rows="4" maxlength="280"><?php echo $paragraphe1; ?></textarea>
                            <label for="photop1">Choisir une image</label>
                            <input type="file" class="form-control-file" id="photop1" name="photop1">

                        </div>

                        <div class="form-group">
                            <h3>Paragraphe2</h3>
                            <label class="ligne" for="paragraphe2">Texte du paragraphe2 (280 caractere max):</label> <br>
                            <textarea class="ligne" name="paragraphe2" id="paragraphe2" rows="4" maxlength="280"><?php if (isset($paragraphe2)) {
                                                                                                                        echo $paragraphe2;
                                                                                                                    } ?></textarea>
                            <label for="photop2">Choisir une image</label>
                            <input type="file" class="form-control-file" id="photop2" name="photop2">


                        </div>
                        <div class="form-group">
                            <h3>Paragraphe3</h3>
                            <label class="ligne" for="paragraphe3">Texte du paragraphe3 (280 caractere max):</label> <br>
                            <textarea class="ligne" name="paragraphe3" id="paragraphe3" rows="4" maxlength="280"><?php
                                                                                                                    if (isset($paragraphe3)) {
                                                                                                                        echo $paragraphe3;
                                                                                                                    } ?></textarea>
                            <label for="photop3">Choisir une image</label>
                            <input type="file" class="form-control-file" id="photop3" name="photop3">

                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="chek" class="form-check-input" id="Validation">
                            <label class="form-check-label" for="Validation">Je valide les changements</label>
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

        </div>
    </main>

</body>

</html>