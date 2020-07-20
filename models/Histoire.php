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
        $reqhistoire = $connection->prepare("SELECT * FROM histoire WHERE titre = ? AND id_utilisateur = ?");
        $reqhistoire->execute(array($titre,$id_utilisateur));
        
        return $reqhistoire;
    }
    public function listeHistoire($connection){
        $reqhistoire = $connection->prepare("SELECT * FROM histoire");
        $reqhistoire->execute();
        
        return $reqhistoire;
    }
    public function trouverHistoire($connection, $id_histoire){
        $reqhistoire = $connection->prepare("SELECT * FROM histoire WHERE id = ?");
        $reqhistoire->execute(array($id_histoire));
        
        
        return $reqhistoire;
    }
    public function trouverListeHistoire($connection, $id_utilisateur){
        $reqhistoire = $connection->prepare("SELECT * FROM histoire WHERE id_utilisateur = ?");
        $reqhistoire->execute(array($id_utilisateur));
        
        
        return $reqhistoire;
    }
    public function supprimerHistoire($connection, $histoireId){
        $req = $connection->prepare("DELETE FROM histoire  WHERE id= $histoireId ");
        $req->execute();
    }
    public function updateTitre($connection, $histoireId, $titre){
        $req = $connection->prepare("UPDATE histoire SET  titre = :titre  WHERE id= $histoireId ");
        $req->execute(array(
            'titre' => $titre
        ));
    }
    public function listeHistoirePourPagination($connection,$depart,$histoireParPage){
        $reqhistoire = $connection->prepare("SELECT * FROM histoire ORDER BY id DESC LIMIT $depart,$histoireParPage");
        $reqhistoire->execute();
        
        return $reqhistoire;
    }
    
    
}