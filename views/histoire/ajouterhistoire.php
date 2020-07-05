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
                            <h3>Paragraphe1</h3>
                            <label for="Paragraphe1">Texte du paragraphe1 (??? caractere max:</label>
                            <textarea name="" id="" cols="30" rows="10"></textarea>

                        </div>

                        <div class="form-group">
                            <h3>Paragraphe2</h3>
                            <label  for="">Texte du paragraphe2 (??? caractere max):</label> <br>
                            <textarea name="" id="" cols="30" rows="10"></textarea>

                        </div>
                        <div class="form-group">
                            <h3>Paragraphe3</h3>
                            <label for="Password">Texte du paragraphe3 (??? caractere max):</label>
                            <textarea name="" id="" cols="30" rows="10"></textarea>

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