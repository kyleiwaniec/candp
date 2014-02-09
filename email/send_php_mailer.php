<?php
  
  // sends valid headers (hidden info about email)
  // to prevent getting put in spam directory
  
  require_once('class.phpmailer.php');
  
    $mail = new PHPMailer();
    
    $mail->From = "kyle@candpgeneration.com";
    
    $mail->FromName = "Kyle Hamilton";
    
    $mail->Subject = "php-mailer for Snap test";
    $mail->AltBody = "this is the plain text version";
    
    $mail->Body = "<html><head><body bgcolor='#cccccc'>this the html version</body></head></html>";
    
    // add as many addresses as you want
    
    $mail->AddAddress("SnapOne@emailonacid.com", "Kyle Hamilton");
    
    if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "Message Sent";
    }
  
  