<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


// Si usamos composer // // Import PHPMailer classes into the global namespace
// Si usamos composer // // These must be at the top of your script, not inside a function
// Si usamos composer // use PHPMailer\PHPMailer\PHPMailer;
// Si usamos composer // use PHPMailer\PHPMailer\SMTP;
// Si usamos composer // use PHPMailer\PHPMailer\Exception;
// Si usamos composer // 
// Si usamos composer // // Load Composer's autoloader
// Si usamos composer // require 'vendor/autoload.php';

function enviarMail($correo, $asunto, $cuerpo){
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
	
	try {
		//Server settings
		$mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                 // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'carballo.crespo.samuel@gmail.com';                     // SMTP username
		$mail->Password   = 'gzxqrgekguluusmz';                               // SMTP password
		$mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		$mail->Port       = 587;                                    // TCP port to connect to
	
		//Recipients
		//$mail->setFrom('carballo.crespo.samuel@gmail.com', 'Samuel');
		
		$mail->setFrom($correo, $correo);
		
		$mail->addAddress('carballo.crespo.samuel@gmail.com', 'Samuel');     // Add a recipient
		//$mail->addAddress('m.e.gutierrezamarista@gmail.com');               // Name is optional
	
	//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
	
		// Attachments
	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	
		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $asunto;
		$mail->Body    = $cuerpo;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
		$mail->send();
		$ok=true;
	} catch (Exception $e) {
		//echo "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
		$ok=false;
	}
	return $ok;
}