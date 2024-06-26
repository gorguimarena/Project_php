<?php

require_once 'Config/database.php';
class Administrateur
{
    //methode pour inscrire un admin ou bibliothequaire
    public function inscrire_admin_or_bibliothequaire($nom,$prenom,$email,$password,$status)
    {
        //on recupere la connection
        $con=database();
        if ($con){
            //on prepare la requete
            $stmt=$con->prepare("INSERT INTO utilisateur VALUES (?,?,?)");
            //on donne les parametre de la requete
            $stmt->bind_param('sss',$prenom,$nom,$status);
            //on execute la requete
            $stmt->execute();
            //on verifie si l'insertio est faite
            if ($stmt->affected_rows>0){
                //on recupere l'id de l'utilisatur
                $id=$stmt->insert_id;
                //on creer un compte
                $this->creerCompte($id,$con,$password,$email);
            }else{
                return false;
            }
        }else{
            echo 'error';
        }

    }

    public function inscrire_bibliothecaire()
    {

    }

    public function modifier_info_user()
    {

    }

    public function supp_user()
    {

    }
}