<?php

class emailService extends Service {

    private $connection = null;

    function __construct($config) {
    }

    function sendUserToken($email, $token) {

        $to = $email;
        $sujet = 'Activation de votre compte';
        $body = '
        Bonjour, veuillez activer votre compte en cliquant ici ->
        <a href="activate?token='.$token.'&email='.$to.'">Activation du compte</a>';
        $entete = "MIME-Version: 1.0\r\n";
        $entete .= "Content-type: text/html; charset=UTF-8\r\n";
        $entete .= 'From: CreatiQ.FR ::' . "\r\n" .
        'Reply-To: contact@creatiq.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        /*$header = "From:abc@somedomain.com \r\n";
         $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";*/
         
        if (mail($to,$sujet,$body,$header))
            return true;
        else
            return false;
    }

    function sendUserTokenPassword($email, $token) {

        $to = $email;
        $sujet = 'Retrouver son mot de passe';
        $body = '
        Bonjour, veuillez reinitialiser votre mot de passe en cliquant ici ->
        <a href="changePassword?token='.$token.'&email='.$to.'">Activation du compte</a>';
        $entete = "MIME-Version: 1.0\r\n";
        $entete .= "Content-type: text/html; charset=UTF-8\r\n";
        $entete .= 'From: CreatiQ.FR ::' . "\r\n" .
        'Reply-To: contact@creatiq.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        if (mail($to,$sujet,$body,$entete))
            return $body;
        else
            return false;
    }

    function sendUserNewComment($emailPhoto, $emailComment, $comment) {

        $to = $emailPhoto;
        $sujet = 'Un nouveau commentaire a ete posté';
        $body = ' Bonjour, voici le nouveau commentaire posté par' . $emailComment . ' : </ br> ' . $comment;
        $entete = "MIME-Version: 1.0\r\n";
        $entete .= "Content-type: text/html; charset=UTF-8\r\n";
        $entete .= 'From: CreatiQ.FR ::' . "\r\n" .
        'Reply-To: contact@creatiq.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        if (mail($to,$sujet,$body,$entete))
            return true;
        else
            return false;
    }

}
