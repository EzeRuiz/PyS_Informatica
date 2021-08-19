<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\User;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class SendEmailController extends Controller
{
    //
public function __invoke()
{   
        $usuario = User::find(1)->latest()->first();;

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ingenieria.pys1@gmail.com';                     // SMTP username
        $mail->Password   = '32341454';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ingenieria.pys1@gmail.com', 'PYS Ingenieria');
        $mail->addAddress($usuario->email, $usuario->name);     // Add a recipient
        /* $mail->addAddress('your-recipient@gmail.com');   */             // Name is optional

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Registro exitoso';
        $mail->Body    = '<h1>Su cuenta se a registrado de forma exitosa.</h1><br><h3>Saludos y Gracias. </h3><br>Equipo de soporte tecnico.';
        /* $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; */

        $mail->send();
 
}
}