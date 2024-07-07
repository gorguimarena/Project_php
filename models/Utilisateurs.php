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
        header("Location:index.php"); //redirection vers la page principal
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

    public function modifier_info($prenom, $nom) {    

        // Connexion à la base de données
           $con = database(); if ($con) {
               // On prépare la requête de mise à jour
               $stmt = $con->prepare("UPDATE utilisateur SET prenom = ?, nom = ? WHERE id = ?");
               // On lie les paramètres
               $stmt->bind_param(" ", $prenom, $nom, $this->id);
               // On exécuter la requête
               if ($stmt->execute()) {
                   // Si la mise à jour est réussie, met à jour les propriétés de l'objet
   
                   $this->prenom = $prenom;
                   $this->nom = $nom;
                   return true;
               } else {
                   // En cas d'erreur
                   return false;
               }
           } else {
               // En cas d'erreur de connexion
               return false;
           }
    }
       
    public function consulter_info($prenom, $nom) {   
       echo "votre".$this->prenom;
       echo "votre".$this->nom;
       }
   
       
    public function getprenom() {  
       
       return $this->prenom;
       }
   
   public function getnom() {
       return $this->nom;
       }
   

}