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
            <div class="col-6 offset-3 inscription">
                <h2 class="text-center">
                    Inscription
                </h2>
                <div>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="ex:monmail@gmail.com" value="<?php if(isset ($email)){ echo $email;} ?>">
                        </div>
                        <div class="form-group">
                            <label for="pseudo">Identifiant</label>
                            <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="ex: PapiBadiste" value="<?php if(isset ($pseudo)){ echo $pseudo; } ?>">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="Password">Mot de passe</label>
                                    <input type="password" name="Password" class="form-control" id="Password" placeholder="Password">
                                </div>
                                <div class="col-6">
                                    <label for="VPassword">Verification du mot de passe</label>
                                    <input type="password" name="VPassword" class="form-control" id="VPassword" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="chek" class="form-check-input" id="Validation">
                            <label class="form-check-label" for="Validation">En décidant de m'inscrire j'accepte de participer à ce projet </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="forminscription" class="btn btn-valider">Valider</button>
                        </div>
                        <?php if(isset ($erreur)){ ?> <div class="d-flex justify-content-center ">
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