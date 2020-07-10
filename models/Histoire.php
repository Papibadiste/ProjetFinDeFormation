<?php
class Histoire
{
    public function ajoutHistoire($connection,$titre,$id_utilisateur,$date){
        $req = $connection->prepare("INSERT INTO histoire (id_utilisateur, titre, date_creation) VALUES(:id_utilisateur, :titre, :date_creation)");
        $req->execute(array(
            'id_utilisateur' => $id_utilisateur,
            'titre' => $titre,
            'date_creation' => $date
        ));
    }
    public function tableauUtilisateur($connection,$titre, $id_utilisateur){
        $reqtitre = $connection->prepare("SELECT * FROM histoire WHERE titre = ? AND id_utilisateur = ?");
        $reqtitre->execute(array($titre,$id_utilisateur));
        
        return $reqtitre;
    }
    public function listeHistoire($connection){
        $reqtitre = $connection->prepare("SELECT * FROM histoire");
        $reqtitre->execute();
        
        return $reqtitre;
    }
    
    
}