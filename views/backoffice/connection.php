<!DOCTYPE html>
<html lang="fr">


<?php
include "views/templates/headback.php"
?>

<body>

    <main class="container-fluid ">
        <div class="row">
            <div class="col-sm-6 col-10 offset-sm-3 offset-1 inscription">
                <h2 class="text-center">
                    Connection admin
                </h2>
                <div>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="email1">Email:</label>
                            <input type="email" name="email" class="form-control" id="email1" placeholder="ex:monmail@gmail.com" value="<?php if (isset($email)) {
                                                                                                                                            echo $email;
                                                                                                                                        } ?>">
                        </div>

                        <div class="form-group">
                            <label for="Password">Mot de passe</label>
                            <input type="password" name="Password" class="form-control" id="Password" placeholder="Password">
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


</body>

</html>