<?php 
require_once('mails/class.smtp.php');
require_once('mails/class.phpmailer.php');

//----------------------------------------------
// Send an e-mail. Returns true if successful 
//
//   $to - destination
//   $nameto - destination name
//   $subject - e-mail subject
//   $message - HTML e-mail body
//   altmess - text alternative for HTML.
//----------------------------------------------
function sendmail($to='aqayyum@plego.com',$nameto='AQ',$subject='Test Subject',$message='Test support@trcoocfo.com',$altmess='')  {

  $from  = "";
  $namefrom = "";
  $mail = new PHPMailer();  
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();   // by SMTP
  $mail->SMTPAuth   = true;   // user and password
  $mail->Host       = "smtp.gmail.com";
  $mail->Port       = 587;
  $mail->Username   = $from;  
  $mail->Password   = "";
  $mail->SMTPSecure = "tls";    // options: 'ssl', 'tls' , ''  
  $mail->setFrom($from,$namefrom);   // From (origin)
  //$mail->addCC($from,$namefrom);      // There is also addBCC
  $mail->Subject  = $subject;
  $mail->AltBody  = $altmess;
  $mail->Body = $message;
  $mail->isHTML();   // Set HTML type
//$mail->addAttachment("attachment");  
  $mail->addAddress($to, $nameto);
  //return $mail->send();
  print_r($mail->send());
}



if(count($_POST) > 0){
  
  $sponsor_email =  $_POST['sponsor'];
  $subject = "TR Synergy Contact Form Submission";

  $body = "";
  $body .= "TR Synergy Contact Form Submission";
  $body .= "<p>First Name: ".$_POST['custom_U2349']."</p>";
  $body .= "<p>Last Name:  ".$_POST['custom_U2358']."</p>";
  $body .= "<p>Company: ".$_POST['custom_U2345']."</p>";
  $body .= "<p>Email: ".$_POST['Email']."</p>";
  $body .= "<p>Phone: ".$_POST['custom_U2362']."</p>";
  $body .= "<p>Message: ".$_POST['custom_U2366']."</p>";
  
  sendmail($to=$sponsor_email,$nameto='',$subject=$subject,$message=$body,$altmess='');

}

//sendmail();

?>