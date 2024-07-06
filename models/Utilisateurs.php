<?php
require "../Config/database.php";

class Utilisateurs
{
    public function connect($email, $pwd)
    {
        $con = database();
        $smt = $con->prepare("SELECT * FROM compte WHERE email=? AND password=?");

        if ($smt === false) {
            return false; // Requête incorrecte
        }


        $smt->bind_param("ss", $email, $pwd);
        $smt->execute();
        $smt->store_result(); // Nécessaire pour obtenir le nombre de lignes affectées

        if ($smt->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deconnect()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        header("Location: utilisateur.php");
        exit; // Assurez-vous de sortir après la redirection
    }

    public function sup_compte($id)
    {
        $con = database();
        $smt = $con->prepare("DELETE FROM compte WHERE id=?");

        if ($smt === false) {
            return false; // Requête incorrecte
        }

        $smt->bind_param('i', $id);
        $smt->execute();
        $smt->store_result(); // Nécessaire pour obtenir le nombre de lignes affectées

        if ($smt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

}