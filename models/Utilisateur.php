<?php

class Utilisateur
{
    private $nom;
    private $prenom;


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

?>
