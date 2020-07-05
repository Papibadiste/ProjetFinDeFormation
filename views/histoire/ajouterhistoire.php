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

    <main class="container-fluid ">
        <div class="row">
            <div class="col-sm-8 col-10 offset-sm-2 offset-1 histoire">
                <h2>Ajouter une histoire</h2>
                <div>
                    <form method="post" action="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <label class="ligne" for="titre">Titre:</label>
                                    <input class="ligne" type="text" name="titre" id="titre">
                                </div>
                                <div class="col-sm-6 col-12">
                                <label class="ligne" for="categorie">Categorie:</label>
                                    <select class="form-control-sm ligne" name="categorie" id="categorie">
                                        <option>Default select</option>
                                        <option>Default select</option>
                                        <option>Default select</option>
                                        <option>Default select</option>
                                        <option>Default select</option>
                                        <option>Default select</option>
                                        <option>Default select</option>
                                        <option>Default select</option>
                                        <option>Default select</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Paragraphe1</h3>
                            <label class="ligne" for="Paragraphe1">Texte du paragraphe1 (??? caractere max):</label> <br>
                            <textarea class="ligne" name="Paragraphe1" id="Paragraphe1" rows="8"></textarea>
                            <label for="photop1">Choisir une image</label>
                            <input type="file" class="form-control-file" id="photop1" name="photop1">

                        </div>

                        <div class="form-group">
                            <h3>Paragraphe2</h3>
                            <label class="ligne" for="Paragraphe2">Texte du paragraphe2 (??? caractere max):</label> <br>
                            <textarea class="ligne" name="" id="Paragraphe2" rows="8"></textarea>
                            <label for="photop2">Choisir une image</label>
                            <input type="file" class="form-control-file" id="photop2" name="photop2">


                        </div>
                        <div class="form-group">
                            <h3>Paragraphe3</h3>
                            <label class="ligne" for="Paragraphe3">Texte du paragraphe3 (??? caractere max):</label> <br>
                            <textarea class="ligne" name="" id="Paragraphe3" rows="8"></textarea>
                            <label for="photop3">Choisir une image</label>
                            <input type="file" class="form-control-file" id="photop3" name="photop3">

                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="chek" class="form-check-input" id="Validation">
                            <label class="form-check-label" for="Validation">En décidant de m'inscrire j'accepte de partager mon histoire </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="formconnection" class="btn btn-valider">Valider</button>
                        </div>
                        <?php if (isset($erreur)) { ?> <div class="d-flex justify-content-center ">
                                <div class="erreur"> <?php echo $erreur;   ?> </div> <?php } ?>
                            </div>


                    </form>
                </div>



            </div>
        </div>
    </main>

    <?php
    include "views/templates/footer.php"
    ?>

</body>

</html>