<?php
//recuperation des donne venant de formulaire
$email = $_POST['email'];
$message = $_POST['commentaire'];
$sujet = "Pour le secretaire";

$message = " Email: " . $email . "\n\n" . "Message \n " . $message;         //definition de l'affichage du message

//importation des classes pour la manipulation du methode et controle des exception

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//inclusion des fichier necessaire pour le bon fonctionnement de l'app
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//instanciation d'un objet de la classe PHPMailer avec un parametre true pour l'activation
$mail = new PHPMailer(true);


try {
    //definition des parametre du serveur
    $mail->isSMTP();                                            //specifier si le courier sortant doit etre envoyer via SMTP
    $mail->Host = 'smtp.gmail.com';                     //definir le nom de domaine du serveur SMTP pour l'envoi
    $mail->SMTPAuth = true;                                   //activation de l'authentification du SMTP
    $mail->Username = 'gorguimarena@gmail.com';                     //nom d'utilisateur du SMTP
    $mail->Password = 'rqeoecmjgrzriqbj';                               //le mot de passe utiliser par le serveur SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //definition de cryptage des donnees
    $mail->Port = 465;                              //le numero de port l'envoi du mail par le serveur

    //les informations du destinataire et de l'expediteur
    $mail->setFrom('gorguimarena@gmail.com', 'gorgui');
    $mail->addAddress($email);     //l'adresse du destinataire


    //Contenu du message test
    $mail->Subject = $sujet;
    $mail->Body = $message;

    $mail->send();
    echo "Envoi Reussi";

} catch (Exception $e) {
    echo "Une erreur est survenue lors de l\'envoi \n Veiller reessayer\n Les details : \n";
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}