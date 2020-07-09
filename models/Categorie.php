<?php
class Categorie
{
    public function trouverCategorie($connection,$categorie){
        $reqcategorie = $connection->prepare("SELECT * FROM categorie WHERE sport = ? ");
        $reqcategorie->execute(array($categorie));
        
        return $reqcategorie;
    }

    
    public function ajoutCategorie($connection,$id_histoire,$categorieid){
        $req = $connection->prepare("INSERT INTO histoire_categorie (id_histoire, id_categorie) VALUES(:id_histoire, :id_categorie)");
        $req->execute(array(
            'id_histoire' => $id_histoire,
            'id_categorie' => $categorieid
        ));
    }
    
}