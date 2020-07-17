<?php
class Paragraphe
{
    public function ajoutParagraphe($connection,$id_histoire,$text,$emplacement){
        $req = $connection->prepare("INSERT INTO paragraphe (id_histoire, emplacement, texte) VALUES(:id_histoire, :emplacement, :texte)");
        $req->execute(array(
            'id_histoire' => $id_histoire,
            'emplacement' => $emplacement,
            'texte' => $text
        ));
    }

    public function listerParagraphe($connection, $id_histoire){
        $texthistoire = $connection->prepare("SELECT * FROM paragraphe WHERE id_histoire = ?");
        $texthistoire->execute(array($id_histoire));
        
        return $texthistoire;
    }
    public function trouverParagraphe($connection, $id_histoire,$position){
        
        $texthistoire = $connection->prepare("SELECT * FROM paragraphe WHERE id_histoire = ? AND emplacement = ?");
        $texthistoire->execute(array($id_histoire,$position));
        
        return $texthistoire;
    }

    
}