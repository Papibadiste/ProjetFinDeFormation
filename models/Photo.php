<?php
class Photo
{
    public function verifPhoto($bdd, $target_file){
        $reqphoto = $bdd->prepare("SELECT * FROM photo WHERE source = ?");
        $reqphoto->execute(array($target_file));
        
        return $reqphoto;
    }
}