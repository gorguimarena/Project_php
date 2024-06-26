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
            return false;
        }

    }


    public function creerCompte($id,$con,$password,$email)
    {
        //on prepare la requete
        $stmt=$con->prepare("INSERT INTO compte VALUES (?,?,?)");
        //on donne les parametre de la requete
        $stmt->bind_param('sss',$email,$password,$id);
        //on execute la requete
        $stmt->execute();
        //on verifie si l'insertio est faite
        if ($stmt->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function modifier_info_user($id,$nom,$prenom,$status)
    {
        //on recupere la connection
        $con=database();
        if ($con){
            //on prepare la requete
            $stmt=$con->prepare("UPDATE utilisateur SET (?,?,?) WHERE id_utilisateur=?");
            //on donne les parametre de la requete
            $stmt->bind_param('sssi',$prenom,$nom,$status,$id);
            //on execute la requete
            $stmt->execute();
            //on verifie si l'insertio est faite
            if ($stmt->affected_rows>0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function supp_user($id)
    {
        //on recupere la connection
        $con=database();
        if ($con){
            //on prepare la requete
            $stmt=$con->prepare("DELETE FROM utilisateur WHERE id_utilisateur=?");
            //on donne les parametre de la requete
            $stmt->bind_param('i',$id);
            //on execute la requete
            $stmt->execute();
            //on verifie si l'insertio est faite
            if ($stmt->affected_rows>0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}