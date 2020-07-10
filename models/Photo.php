<?php
class Photo
{
    public function verifPhoto($bdd, $target_file){
        $reqphoto = $bdd->prepare("SELECT * FROM photo WHERE source = ?");
        $reqphoto->execute(array($target_file));
        
        return $reqphoto;
    }
    public function ajoutPhoto($connection,$id_histoire,$source,$emplacement){
        $req = $connection->prepare("INSERT INTO photo (id_histoire, emplacement, source) VALUES(:id_histoire, :emplacement, :source)");
        $req->execute(array(
            'id_histoire' => $id_histoire,
            'emplacement' => $emplacement,
            'source' => $source
        ));
    }
    public function trouverPhoto($connection, $id_histoire){
        $position = 1;
        $photohistoire = $connection->prepare("SELECT * FROM photo WHERE id_histoire = ? AND emplacement = ?");
        $photohistoire->execute(array($id_histoire,$position));
        
        return $photohistoire;
    }
}