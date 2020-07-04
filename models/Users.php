<?php
class Users
{
    public function verifMail($bdd, $email)
    {
        $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
        $reqmail->execute(array($email));
        $mailexist = $reqmail->rowCount();
        return $mailexist;
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
    public function verifMailConnection($bdd, $email)
    {
        $reqmail = $bdd->query('SELECT * FROM utilisateur WHERE mail = "'. $email .'"');
        $userexist = $reqmail->fetch();
        return $userexist;
    }
    
}
