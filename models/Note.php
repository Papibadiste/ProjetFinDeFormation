<?php
class Note
{
    public function trouverNote($connection, $note){
        $reqNote = $connection->prepare("SELECT * FROM note WHERE note = ? ");
        $reqNote->execute(array($note));
        
        return $reqNote;
    }
    public function ajouterNote($connection, $note, $id_histoire){
        $req = $connection->prepare("INSERT INTO utilisateur_histoire_note (id_histoire, id_utilisateur, id_note) VALUES(:id_histoire, :id_utilisateur, :id_note)");
        $req->execute(array(
            'id_histoire' => $id_histoire,
            'id_utilisateur' => $_SESSION['id'],
            'id_note' => $note
        ));

    }
    public function verifNote($connection, $id_histoire){
        $reqNote = $connection->prepare("SELECT * FROM utilisateur_histoire_note WHERE id_histoire = ? AND id_utilisateur = ? ");
        $reqNote->execute(array($id_histoire,$_SESSION['id']));
        
        return $reqNote;
    }

}