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
    //methode pour creer un compte
    public function creerCompte($id_user,$connxion,$password,$email)
    {
        //preparationde la requete
        $stmt=$connxion->prepare("INSERT INTO compte VALUES (?,?,?)");
        //donner les parametre de la requete
        $stmt->bind_param('ssi',$email,$password,$id_user);
        //on execute la requete
        $result=$stmt->execute();
        //verifie si la requete est ok
        if ($result->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function modifier_info_user($nom,$prenom,$status,$id)
    {
        //on recupere la connection
        $connexion=database();
        if ($connexion){
            //preparationde la requete
            $stmt=$connexion->prepare("UPDATE compte SET (prenom=?,nom=?,status=?) WHERE id=?");
            //donner les parametre de la requete
            $stmt->bind_param('sss',$nom,$prenom,$status,$id);
            //on execute la requete
            $result=$stmt->execute();
            //verifie si la requete est ok
            if ($result->affected_rows>0){
                return true;
            }else{
                return false;
            }
        }else{
            echo 'error';
        }
    }

    public function supp_user($id)
    {
        //on recupere la connection
        $connexion=database();
        if ($connexion){
            //preparationde la requete
            $stmt=$connexion->prepare("DELETE FROM utilisateur WHERE id_utilisateur=?");
            //donner les parametre de la requete
            $stmt->bind_param('i',$id);
            //on execute la requete
            $result=$stmt->execute();
            //verifie si la requete est ok
            if ($result->affected_rows>0){
                return true;
            }else{
                return false;
            }
        }else{
            echo 'error';
        }
    }
}