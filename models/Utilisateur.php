<?php
 
class Utilisateur
{
    
    private $nom;
    private $prenom;
    private $email;
    private $password

 public function __construct($nom, $prenom) {
    $this->nom = $nom;
    $this->prenom = $prenom;
    }
    
 public function __construct($email, $password) {
    $this->email= $email;
    $this->password = $password;
    }


 public function consulter_livre($email, $password) {
        $con = database(); if ($con) {
            
            $stmt = $con->prepare("UPDATE Utilisateur SET email = ?, pass = ? WHERE id = ?");
            $stmt->bind_param(" ", $email, $pasword, $this->id);
            if ($stmt->execute()) {

            $this->email = $email;
            $this->password = $password;
                return true;
            } else {
                return false;
            }
        } else {
                return false;
        }
 }
 
}

 public function consulter_livre($email,$password){
    echo "votre".$this->email;
    echo "votre".$this->password;

    public function getemail(){
        return $this->email;
    }


 public function getpassword(){

           return $this->password;
    }
       
 public function setemail(string $email){
    $this->email = $email;
}

 public function setpassword(string $password){
    $this->password = $password;
}

}

public function demande_emprunt($email, $password) {
    $con = database(); if ($con) {
        
        $stmt = $con->prepare("UPDATE Utilisateur SET email = ?, pass = ? WHERE id = ?");
        $stmt->bind_param(" ", $email, $pasword, $this->id);
        if ($stmt->execute()) {

        $this->email = $email;
        $this->password = $password;
            return true;
        } else {
            return false;
        }
    } else {
            return false;
    }
}

public function demande_emprunt($email,$password){
    echo "votre".$this->email;
    echo "votre".$this->password;

}


?>
