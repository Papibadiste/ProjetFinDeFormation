<!DOCTYPE html>
<html lang="fr">


<?php
include "views/templates/headback.php"
?>

<body>

    <main class="container-fluid ">
        <div class="row">
            <div class="col-12 profil">
                <h2 class="text-center">
                    Liste des histoires
                </h2>
                <div class="row">
                    <table class="table table-striped table-dark">
                        <tr>
                            <th scope='col'>Titre</th>
                            <th scope='col'>Date de création</th>
                            <th scope='col'>Categorie</th>
                            <th scope='col'>Liens</th>
                            <th scope='col'>Supprimer</th>
                        </tr>
                       <?php while ($row = $listehistoire->fetch(PDO::FETCH_BOTH)) { 
                           $lacategorie = $categorie->recupCategorie($connection,$row['id']);
                           $lacategorie = $lacategorie->fetch();
                          $row["date_creation"] = DateTime::createFromFormat('Y-m-d', $row["date_creation"]); ?>
                        <tr>
                            <td scope='col'> <?php echo $row["titre"] ?>  </td>
                            <td scope='col'> <?php echo $row["date_creation"]->format('d/m/Y'); ?> </td>
                            <td scope='col'> <?php echo $lacategorie['sport']; ?> </td>
                            <td scope='col'><a href="<?php echo BASE_URL; ?>backoffice/histoiremodif/<?php echo $row['id']; ?>"><i class="fas fa-arrow-circle-right"></i></a></td>
                            <td scope='col'><a href="<?php echo BASE_URL; ?>backoffice/supprimerhistoire/<?php echo $row['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                       <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </main>


</body>
 <script src="https://kit.fontawesome.com/be20f2a41d.js" crossorigin="anonymous"></script>
</html>