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
            <div class="col-12 col-lg-10  offset-lg-1 pagehistoire">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2><?php echo $infohistoire['titre']; ?></h2>
                    </div>
                    <div class="col-6">Cree le <?php echo $infohistoire['date_creation']->format('d/m/Y'); ; ?> par <?php echo $auteur['pseudo']; ?></div>
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
                                Moyenne:
                            </div>
                            <div class="col-12 col-sm-6 text-center">
                                <form method="POST">
                                    <label class="ligne" for="Note">Choisir une note:</label>
                                    <select class="form-control-sm ligne" name="Note" id="Note">
                                        <option selected disabled hidden>Note</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>

                                    </select>
                                    <input type="submit" class="btn">
                                </form>

                            </div>
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