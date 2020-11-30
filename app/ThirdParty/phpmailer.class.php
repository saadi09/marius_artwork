<?php 

class emailSender {



public static function sendmail($to='aqayyum@plego.com',$rec_name,$artwork_title)  {

  require_once('mails/class.smtp.php');
  require_once('mails/class.phpmailer.php');


  $body = "";
  $body .= "Congratulations ". ucfirst($rec_name);
  $body .= "<p>Your project ".$artwork_title."</p>";
  $body .= "<p>has been approved</p>";
  $body .= "<p>Thank you</p>";
  $body .= "<p>Regards,</p>";
  $body .= "<p>technologicx</p>";

  $from  = "admin@technologicx.com";
  $namefrom = "";
  $mail = new PHPMailer();  
  $mail->CharSet = 'UTF-8';
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
  //$mail->SMTPDebug = 2;
  $mail->isSMTP();   // by SMTP
  $mail->SMTPAuth   = true;   // user and password
  $mail->Host       = "mail.technologicx.com";
  $mail->Port       = 465;
  $mail->Username   = $from;  
  $mail->Password   = "saadi123*";
  $mail->SMTPSecure = "ssl";    // options: 'ssl', 'tls' , ''  
  $mail->setFrom($from,'AQS'); 
    //$mail->addCC($from,$namefrom);      // There is also addBCC
  $mail->Subject  = "Congrats";
  $mail->AltBody  = "";
  $mail->Body = $body;
  $mail->isHTML();   // Set HTML type
  //$mail->addAttachment("attachment");  
  $mail->addAddress($to, 'yasir Ali');
  return $mail->send();
    //print_r($mail->send());

}

}

?>