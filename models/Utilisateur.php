<?php
class Utilisateur {
    private $id;
    private $prenom;
    private $nom;
    private $email;
    private $motPasse;
    private $confMotPasse;
public function inscrire($prenom, $nom, $email, $motPasse, $confMotPasse) { 
    // Connexion à la base de données 
    $con = database(); 
    if ($con) { 
        // On préparer la requête d'insertion 
        $stmt = $con->prepare("INSERT INTO utilisateur (prenom, nom, email, motPasse, confMotPasse) VALUES (?, ?, ?, ?, ?)"); 
        // Hachage du mot de passe 
        $hashedPassword = password_hash($motPasse, PASSWORD_BCRYPT); 
        // Liaison des paramètres 
        $stmt->bind_param("sssss", $prenom, $nom, $email, $hashedPassword, $confMotPasse); 
        // Exécution de la requête 
        if ($stmt->execute()) { 
            return true;
         } 
         else 
         { 
            return false;
         } 
        } 
        else 
        { 
            return false; 
        } 
    }
}

?>
