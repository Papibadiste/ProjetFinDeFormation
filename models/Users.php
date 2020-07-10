<?php
class Users
{
    public function verifMail($bdd, $email)
    {
        $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
        $reqmail->execute(array($email));
        
        return $reqmail;
    }
    public function inscription($connection, $email, $pseudo, $hashedpass)
    {
        $req = $connection->prepare("INSERT INTO utilisateur (mail, pseudo, mdp) VALUES(:mail, :pseudo, :mdp)");
        $req->execute(array(
            'mail' => $email,
            'pseudo' => $pseudo,
            'mdp' => $hashedpass
        ));
    }
    public function trouverAuteur($connection, $id_user){
        $auteur = $connection->prepare("SELECT * FROM utilisateur WHERE id = ?");
        $auteur->execute(array($id_user));
        
        return $auteur;
    }
    
}
