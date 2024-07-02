<?php
class Utilisateur {
    
    private $id;
    private $nom;
    private $prenom;
    private $conn;

    // Constructeur de la classe Utilisateur
    public function __construct($conn, $id) {
        $this->conn = $conn;
        $this->id = $id;
        $this->consulter_info();
    }

    // Getters
    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    // Setters
    public function setNom(string $nom){
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom){
        $this->prenom = $prenom;
    }

    // Méthode pour consulter les informations de l'utilisateur
    public function consulter_info() {
        $query = "SELECT nom, prenom FROM utilisateurs WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $stmt->bind_result($nom, $prenom);

        if ($stmt->fetch()) {
            $this->nom = $nom;
            $this->prenom = $prenom;
            echo "Informations de l'utilisateur récupérées avec succès";
        } else {
            echo "Aucune information trouvée pour cet utilisateur";
        }
    }
}


?>
