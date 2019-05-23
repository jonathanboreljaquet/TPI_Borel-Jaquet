<?php
/*
  Projet: SOS INFOBOBO
  Description: Classe MaillerManager contenant les fonctions permettant d'envoyer un email
               en utilisant la librairie externe Swift Mailer.
  Auteur: Borel-Jaquet Jonathan
  Version: 1.0
  Date: Mai 2019
*/
class MailerManager
{
    /**
     * Envoie un email au réparateur décrivant les informations de la demande du client en utilisant la librairie Swift Mailer
     *
     * @param string $contactFirstName Le nom du client
     * @param string $contactSecondName Le prénom du client
     * @param string $contactEmail L'email du client
     * @param string $contactPhoneNumber Le numéro de téléphone du client
     * @param string $contactDescription La description du problème informatique du client
     * 
     * @throws Swift_TransportException
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE si l'email a bien été envoyé
     */
    public static function SendMailToRepairer($contactFirstName, $contactSecondName, $contactEmail, $contactPhoneNumber, $contactDescription)
    {
        $transport = Swift_SmtpTransport::newInstance(EMAIL_SERVER, EMAIL_PORT, EMAIL_TRANS)
            ->setUsername(EMAIL_USERNAME)
            ->setPassword(EMAIL_PASSWORD);
        try {
            // Création d'une nouvelle instance de mail en utilisant le transport créé précédemment
            $mailer = Swift_Mailer::newInstance($transport);
            // Création du message
            $message = Swift_Message::newInstance();
            // Le sujet du message
            $message->setSubject("[SOS INFOBOBO] Nouvelle demande de réparation reçu");
            // Qui envoie le message 
            $message->setFrom(array('infoboboTPI@gmail.ch' => 'SOS Infobobo réparation informatique'));
            // A qui on envoie le message
            $message->setTo(array(EMAIL_USERNAME));
            //Création du message html à envoyer
            $body =
                "<html>" .
                " <head></head>" .
                " <body>" .
                "  <p>Une nouvelle demande de réparation informatique vient d'être créée.</p>" .
                "  <h4>Details de la demande de réparation informatique :</h4>" .
                "<table border='1'>" .
                "<tr>" .
                "<td>Nom :</td>" .
                "<td>" . $contactFirstName . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Prénom :</td>" .
                "<td>" . $contactSecondName . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Email :</td>" .
                "<td>" . $contactEmail . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Numéro de téléphone :</td>" .
                "<td>" . $contactPhoneNumber . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Description du problème :</td>" .
                "<td>" . $contactDescription . "</td>" .
                "</tr>" .
                "</table>" .
                " </body>" .
                "</html>";
            //Asignation du message et tu type à envoyer
            $message->setBody($body, 'text/html');
            //Envoie du mail
            $mailer->send($message);
            return true;
        } catch (Swift_TransportException $e) {
            echo "Problème d'envoi de message: " . $e->getMessage();
            exit();
        }
    }
    /**
     * Envoie un email au client décrivant les informations de sa demande et le nouveau statut
     * attribué à celle-ci en utilisant la librairie Swift Mailer.
     *
     * @param string $newStatus Le nouveau statut de la demande
     * @param string $client Un objet Client
     * @param string $request Un objet Request
     * 
     * @throws Swift_TransportException
     * @author Jonathan Borel-Jaquet <jonathan.brljq@eduge.ch>
     * @return bool Retourne TRUE si l'email a bien été envoyé
     */
    public static function SendMailToClient($newStatus, $client, $request)
    {
        $transport = Swift_SmtpTransport::newInstance(EMAIL_SERVER, EMAIL_PORT, EMAIL_TRANS)
            ->setUsername(EMAIL_USERNAME)
            ->setPassword(EMAIL_PASSWORD);
        try {
            // On crée un nouvelle instance de mail en utilisant le transport créé précédemment
            $mailer = Swift_Mailer::newInstance($transport);
            // Création du message
            $message = Swift_Message::newInstance();
            // Le sujet du message
            $message->setSubject("[SOS INFOBOBO] Changement de statut");
            // Qui envoie le message 
            $message->setFrom(array('infoboboTPI@gmail.ch' => 'SOS Infobobo réparation informatique'));
            // A qui on envoie le message
            $message->setTo(array($client->email));

            //Création du message html à envoyer
            $body =
                "<html>" .
                " <head></head>" .
                " <body>" .
                "  <p>Bonjour,</p>" .
                "  <p>Le statut de votre demande de réparation informatique a été modifié en : " . $newStatus . " </p>" .
                "  <h4>Details de la demande de réparation informatique :</h4>" .
                "<table border='1'>" .
                "<tr>" .
                "<td>Nom :</td>" .
                "<td>" . $client->email . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Prénom :</td>" .
                "<td>" . $client->firstName . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Email :</td>" .
                "<td>" . $client->email . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Numéro de téléphone :</td>" .
                "<td>" . $client->phoneNumber . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>Description du problème :</td>" .
                "<td>" . $request->description . "</td>" .
                "</tr>" .
                "</table>" .
                " </body>" .
                "</html>";
            //Asignation du message et tu type à envoyer
            $message->setBody($body, 'text/html');
            //Envoie du mail
            $mailer->send($message);
            return true;
        } catch (Swift_TransportException $e) {
            echo "Problème d'envoi de message: " . $e->getMessage();
            exit();
        }
    }
}
