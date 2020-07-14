<?php
class Admin
{

    public function verifMail($bdd, $email)
    {
        $reqmail = $bdd->prepare("SELECT * FROM admin WHERE mail = ?");
        $reqmail->execute(array($email));
        
        return $reqmail;
    }

}