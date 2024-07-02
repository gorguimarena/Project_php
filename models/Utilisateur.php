<?php

    class utilisateur {
    private $nom;
    private $prenom;

 public function __construct($nom, $prenom) {
    $this->nom = $nom;
    $this->prenom = $prenom;
    }


 public function modifier_info($prenom, $nom) {
    $this->prenom = $prenom;
    $this->nom = $nom;
        return true;
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
