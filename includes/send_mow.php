<?php
  
  // sends valid headers (hidden info about email)
  // to prevent getting put in spam directory
  
  require_once('class.phpmailer.php');
  
   $_POST["email"] = "kyleih@optonline.net";
  

    
   
    $website = $_SERVER['HTTP_HOST'];

    $mail = new PHPMailer();
    $mail->IsHTML(true);
    $mail->From = "kyleih@optonline.net";
    
    $mail->FromName = "me";
    
    $mail->Subject = "MOW 8";
    
    $mail->Body = '<html><head></head><body>' .
                  '<p><a href="https://www.facebook.com/memoriesofwarsaw"><img src="http://candpgeneration.com/warsaw_postcard.jpg" alt="Invitation"/></a></p>' .
                  '<h2>Like:<a href="http://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fmemoriesofwarsaw&send=false&layout=standard&width=450&show_faces=true&font&colorscheme=light&action=like&height=80&appId=413750075390158"><img src="http://www.candpgeneration.com/facebooklike.jpg" width=200 height="74" alt="Facebook Like Button"/></a>' .
                  'Share: ' .
                  '<!-- AddThis Button BEGIN -->' .
                  '<a href="http://api.addthis.com/oexchange/0.8/forward/facebook/offer?pco=tbx32nj-1.0&amp;url=https%3A%2F%2Fwww.facebook.com%2Fmemoriesofwarsaw&amp;pubid=xa-51bcbd02463b922d" target="_blank" ><img src="http://cache.addthiscdn.com/icons/v1/thumbs/32x32/facebook.png" border="0" alt="Facebook" /></a> ' .
                  '<a href="http://api.addthis.com/oexchange/0.8/forward/twitter/offer?pco=tbx32nj-1.0&amp;url=https%3A%2F%2Fwww.facebook.com%2Fmemoriesofwarsaw&amp;pubid=xa-51bcbd02463b922d" target="_blank" ><img src="http://cache.addthiscdn.com/icons/v1/thumbs/32x32/twitter.png" border="0" alt="Twitter" /></a> ' .
                  '<a href="http://www.addthis.com/bookmark.php?source=tbx32nj-1.0&amp;=300&amp;pubid=xa-51bcbd02463b922d&amp;url=https%3A%2F%2Fwww.facebook.com%2Fmemoriesofwarsaw " target="_blank" ><img src="http://cache.addthiscdn.com/icons/v1/thumbs/32x32/more.png" border="0" alt="More..." /></a> ' .
                  '<!-- AddThis Button END --></h2></body></html>';


    // add as many addresses as you want
    
    $mail->AddAddress("kyleiwaniec@gmail.com", "Kyle Hamilton");
    
    if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "Message Sent";
    }
  
  