<?php
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
    }
} 

?>
