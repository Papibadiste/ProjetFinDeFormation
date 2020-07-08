<?php
class Categorie
{
    public function trouverCategorie(){

    }

    
    public function ajoutCategorie($connection,$categorie,$id_histoire){
        $req = $connection->prepare("INSERT INTO histoire (id_utilisateur, titre, date_creation) VALUES(:id_utilisateur, :titre, :date_creation)");
        $req->execute(array(
            'id_utilisateur' => $id_utilisateur,
            'titre' => $titre,
            'date_creation' => $date
        ));
    }
    
}