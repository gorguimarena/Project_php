<?php
class Emprunt {
    private $date_emprunt;
    private $date_retour;
    private $livre;
    private $utilisateur;

    public function __construct($date_emprunt,$date_retour,Livre $livre,Utilisateur $utilisateur)
    {
        $this->date_emprunt=$date_emprunt;
        $this->date_retour=$date_retour;
        $this->livre=$livre;
        $this->utilisateur=$utilisateur;
    }
}
?>