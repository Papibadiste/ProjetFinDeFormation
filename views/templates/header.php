<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 d-flex flex-column justify-content-center ">

                <?php if (isset($_SESSION["id"]) && (isset($_SESSION["mail"]))) { ?>
                    <nav class="liens ">
                        <div>
                            <div class="d-flex justify-content-around liensdroite">
                                <a class="liensdroite2 " href="<?php echo BASE_URL; ?>"> Accueil </a>
                                <a class="liensdroite2 " href="<?php echo BASE_URL; ?>">Profil</a>
                            </div>

                        </div>

                    </nav>

                <?php } else {?>
                <nav class="liens">
                    <a href="<?php echo BASE_URL; ?>"> Accueil </a>
                </nav> 
                <?php } ?>
                <nav class="liens ">
                    <a href="">Présentation du site</a>
                </nav>


            </div>
            <div class="col-lg-4 col-md-6 col-12 img">
                <a href="<?php echo BASE_URL; ?>"> <img class="img" src="<?php echo BASE_URL; ?>assets/img/woman-run.jpg"> </a>
            </div>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 col-12 d-flex flex-column justify-content-center ">
                <?php if (isset($_SESSION["id"]) && (isset($_SESSION["mail"]))) { ?>

                    <nav class="liens">
                        <a href="">Ajouter une histoire</a>
                    </nav>

                    <nav class="liens">
                        <a href="">Histoire aleatoire</a>
                    </nav>

                <?php } else { ?>
                    <nav class="liens ">
                        <div>
                            <div class="d-flex justify-content-around liensdroite">
                                <a class="liensdroite2 " href="<?php echo BASE_URL; ?>user/connection"> Connexion </a>
                                <a class="liensdroite2 " href="<?php echo BASE_URL; ?>user/inscription">Inscription</a>
                            </div>

                        </div>

                    </nav>

                    <nav class="liens">
                        <a href="">Histoire aléatoire</a>
                    </nav>

                <?php } ?>
            </div>

        </div>

    </div>


</header>