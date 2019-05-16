<?php
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
    public static function SendMail($receiver, $subject, $textMessage)
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
         
            $message->setSubject($subject);
            // Qui envoie le message 
            $message->setFrom(array('infoboboTPI@gmail.ch' => 'Infobobo réparation informatique'));
            // A qui on envoie le message
            $message->setTo(array($receiver));

            // Un petit message html
            // On peut bien évidemment avoir un message texte
            $body =
                '<html>' .
                ' <head></head>' .
                ' <body>' .
                '  <p>' . $textMessage . '</p>' .
                ' </body>' .
                '</html>';
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
