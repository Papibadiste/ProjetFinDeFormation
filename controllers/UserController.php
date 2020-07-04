<?php 
function inscriptionAction () {
    
if (isset($_POST['forminscription'])) {
    echo"oui";
}
    require ('views\utilisateur\inscription.php');
}