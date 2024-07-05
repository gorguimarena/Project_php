<?php
<<<<<<< HEAD
class Utilisateur { 
    private $id; 
    private $prenom; 
    private $nom; 
    private $email; 
    private $motPasse; 
    private $confMotPasse; 
    public function __construct($id, $prenom, $nom, $email, $motPasse, $confMotPasse) 
    { 
        $this->id = $id; 
        $this->prenom = $prenom; 
        $this->nom = $nom; 
        $this->email = $email; 
        $this->password = $motPasse; 
        $this->status = $confMotPasse; 
    } 
    public function inscrire($prenom, $nom, $email, $password, $confMotPasse) 
    { 
        // Connexion à la base de données 
        $con = database(); 
        if ($con) 
        { 
            // on préparer la requête d'insertion 
            $stmt = $con->prepare("INSERT INTO utilisateur (prenom, nom, email, motPasse,confMotPasse) VALUES (?, ?, ?, ?,?)"); 
            // hachage du mot de passe 
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
            // liaison des paramètres 
            $stmt->bind_param("sssss", $prenom, $nom, $email, $hashedPassword); 
            // exécution de la requête 
            if ($stmt->execute()) 
            { 
                return true; 
            } else 
            { 
                return false; 
            } 
        } 
        else 
        { 
            return false; 
        } 
=======

class Utilisateur
{
    private $nom;
    private $prenom;

 public function __construct($nom, $prenom) {
    
    $this->nom = $nom;
    $this->prenom = $prenom;
>>>>>>> 740684b51fad0b9a89b7ead1001513a8d90043e1
    }
} 

<<<<<<< HEAD
?>
=======
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
>>>>>>> 740684b51fad0b9a89b7ead1001513a8d90043e1
