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

        public function recupCategorie($connection,$id_histoire){
        $reqcategorie = $connection->prepare("SELECT * FROM histoire_categorie WHERE id_histoire = ? ");
        $reqcategorie->execute(array($id_histoire));
        $reqcategorie = $reqcategorie->fetch();
        $reqcategorie2 = $connection->prepare("SELECT * FROM categorie WHERE id = ? ");
        $reqcategorie2->execute(array($reqcategorie["id_categorie"]));
        
        return $reqcategorie2;
    }
}