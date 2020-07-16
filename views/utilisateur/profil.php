<!DOCTYPE html>
<html lang="fr">

<?php
include "views/templates/head.php"
?>
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
                    <div class="col-6 text-center brake"> <?php echo $_SESSION['pseudo'] ?></div>
                    <div class="col-6 text-center info">Votre Mail:</div>
                    <div class="col-6 text-center brake"> <?php echo $_SESSION['mail'] ?></div>
                    <div class="col-12 text-center info info2">Vos Histoires:</div>
                    <table class="table table-striped table-dark table-sm">
                        <tr>
                            <th scope='col'>Titre</th>
                            <th scope='col'>Date de création</th>
                            <th scope='col'>Liens</th>
                        </tr>
                       <?php while ($row = $listehistoire->fetch(PDO::FETCH_BOTH)) { 
                          $row["date_creation"] = DateTime::createFromFormat('Y-m-d', $row["date_creation"]); ?>
                        <tr>
                            <td scope="row"> <?php echo $row["titre"] ?>  </td>
                            <td> <?php echo $row["date_creation"]->format('d/m/Y'); ?> </td>
                            <td ><a href="<?php echo BASE_URL; ?>histoire/histoirecomplete/<?php echo $row['id']; ?>"><i class="fas fa-arrow-circle-right"></i></a></td>
                        </tr>
                       <?php } ?>
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