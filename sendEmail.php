<?php

// See PHPMailer documentation for troubleshooting

require_once('../../protected/emailConfig.php');
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require_once('class.phpmailer.php');

//Load composer's autoloader
require ('vendor/autoload.php');

function sendEmail($msg, $from, $firstN, $lastN){
	$msg = $msg . ' - ' .$firstN.' '.$lastN.'('.$from.')';
	$msg = wordwrap($msg, 70);
	
	$mail = new PHPMailer(true);  // Passing `true` enables exceptions
	try {
		
    //Server settings
    $mail->SMTPDebug = 0;                                 // Disable debugging output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = EMAILHOST;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAILUSER;                 // SMTP username
    $mail->Password = EMAILPASS;                           // SMTP password
    $mail->SMTPSecure = EMAILSECURE;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = EMAILPORT;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($from, $firstN.' '.$lastN);
    $mail->addAddress('blake.tacweb@gmail.com');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = 'New TAC Inquiry';
    $mail->Body    = $msg;
    // $mail->AltBody = $msg;

    $mail->send();
    // echo 'Message has been sent';
		return TRUE;
	} 
	catch (Exception $e) {
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
		return FALSE;
	}

}