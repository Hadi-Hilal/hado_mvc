<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{

     function send_email( $email_sender , $name_sender  , $email_receiver , $subject ,$body ){
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.mailtrap.io';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'a19adc2857575f';
            $mail->Password   = '448cea0166ac09';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 2525;
            $mail->setFrom($email_sender , $name_sender);
            $mail->addAddress($email_receiver);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            $mail->send();
            return 1;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return 0;
        }
    }
}
