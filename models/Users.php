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
    
}
