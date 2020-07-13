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
            <div class="col-10 offset-1 col-sm-8 offset-sm-2 presentation">
                <div class="row">

                    <div class="col-12 col-lg-7"><img src="<?php echo BASE_URL; ?>assets\img\badmintonl.jpg" alt=""></div>
                    <div class="col-12 col-lg-5"><h5>Presentation</h5>Aliquam non lacus id nibh rutrum tempus semper ut tellus. Cras ullamcorper metus tempus mi porta, non finibus quam tincidunt. Phasellus sed lorem eleifend, dapibus eros eget,
                     mollis quam. </div>
                    
                    <div class="col-12 col-lg-5"><h5>Qui suis-je?</h5>Aliquam non lacus id nibh rutrum tempus semper ut tellus. Cras ullamcorper metus tempus mi porta, non finibus quam tincidunt. Phasellus sed lorem eleifend, dapibus eros eget,
                     mollis</div>
                    <div class="col-12 col-lg-7"><img src="<?php echo BASE_URL; ?>assets\img\How-to-Enable-your-Full-Potential-in-Crossfit-800x400.jpg" alt=""></div>
                    <div class="col-12 col-lg-6"><img src="<?php echo BASE_URL; ?>assets\img\P1-BO282_ROCKYJ_G_20131208201225.jpg" alt=""></div>
                    <div class="col-12 col-lg-6"><h5>Palmares</h5> non lacus id nibh rutrum tempus semper ut tellus. Cras ullamcorper metus tempus mi porta, non finibus quam tincidunt. Phasellus sed lorem eleifend, dapibus eros eget,
                     mollis quam. 
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