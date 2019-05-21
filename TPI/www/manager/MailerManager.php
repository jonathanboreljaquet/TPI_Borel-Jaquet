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
     * Envoie un mail en utilisant la librairie Swift Mailer.
     *
     * @param string $receiver L'adresse email de la personne qui reçoit l'email
     * @param string $subject L'objet du mail
     * @param string $textMessage Le contenue du mail
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
            // On crée un nouvelle instance de mail en utilisant le transport créé précédemment
            $mailer = Swift_Mailer::newInstance($transport);
            // On crée un nouveau message
            $message = Swift_Message::newInstance();
            // Le sujet du message

            $message->setSubject("[SOS INFOBOBO] Nouvelle demande de réparation reçu");
            // Qui envoie le message 
            $message->setFrom(array('infoboboTPI@gmail.ch' => 'SOS Infobobo réparation informatique'));
            // A qui on envoie le message
            $message->setTo(array(EMAIL_USERNAME));

            // Un petit message html
            // On peut bien évidemment avoir un message texte
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
            // On assigne le message et on dit de quel type. Dans notre exemple c'est du html
            $message->setBody($body, 'text/html');
            // Maintenant il suffit d'envoyer le message
            $result = $mailer->send($message);
            return true;
        } catch (Swift_TransportException $e) {
            echo "Problème d'envoi de message: " . $e->getMessage();
            exit();
        }
    }
    public static function SendMailToClient($newStatus, $client,$request)
    {
        $transport = Swift_SmtpTransport::newInstance(EMAIL_SERVER, EMAIL_PORT, EMAIL_TRANS)
            ->setUsername(EMAIL_USERNAME)
            ->setPassword(EMAIL_PASSWORD);
        try {
            // On crée un nouvelle instance de mail en utilisant le transport créé précédemment
            $mailer = Swift_Mailer::newInstance($transport);
            // On crée un nouveau message
            $message = Swift_Message::newInstance();
            // Le sujet du message

            $message->setSubject("[SOS INFOBOBO] Changement de statut");
            // Qui envoie le message 
            $message->setFrom(array('infoboboTPI@gmail.ch' => 'SOS Infobobo réparation informatique'));
            // A qui on envoie le message
            $message->setTo(array($client->email));

            // Un petit message html
            // On peut bien évidemment avoir un message texte
            $body =
                "<html>" .
                " <head></head>" .
                " <body>" .
                "  <p>Bonjour,</p>" .
                "  <p>Le statut de votre demande de réparation informatique a été modifié en : ".strtolower($newStatus)." </p>" .
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
            // On assigne le message et on dit de quel type. Dans notre exemple c'est du html
            $message->setBody($body, 'text/html');
            // Maintenant il suffit d'envoyer le message
            $result = $mailer->send($message);
            return true;
        } catch (Swift_TransportException $e) {
            echo "Problème d'envoi de message: " . $e->getMessage();
            exit();
        }
    }
}
