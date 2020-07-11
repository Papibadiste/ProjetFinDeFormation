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
            <div class="col-sm-6 col-10 offset-sm-3 offset-1 profil">
                <h2 class="text-center">
                    Profil
                </h2>
                <div class="row">
                    <div class="col-6 text-center info">Votre identifiant:</div>
                    <div class="col-6 text-center"> <?php echo $_SESSION['pseudo'] ?></div>
                    <div class="col-6 text-center info">Votre Mail:</div>
                    <div class="col-6 text-center"> <?php echo $_SESSION['mail'] ?></div>
                    <div class="col-12 text-center info info2">Vos Histoires:</div>
                    <table class="table table-striped table-dark">
                        <tr>
                            <th scope='col'>Categorie</th>
                            <th scope='col'>Titre</th>
                            <th scope='col'>Liens</th>
                        </tr>
                        <tr>
                            <td scope='col'> " . $donnees["id"] . " </td>
                            <td scope='col'> " . $row["id"] . " </td>
                            <td scope='col'><a class="liensdroite2 " href="<?php echo BASE_URL; ?>user/connection"><i class="fas fa-arrow-circle-right"></i></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php
    include "views/templates/footer.php"
    ?>

</body>
 <script src="https://kit.fontawesome.com/be20f2a41d.js" crossorigin="anonymous"></script>
</html>