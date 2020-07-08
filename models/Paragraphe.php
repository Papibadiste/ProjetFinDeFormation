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
}