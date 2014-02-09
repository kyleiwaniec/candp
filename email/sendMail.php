<?php 
$boundary = md5(date_default_timezone_set("U"));

$to = $email;
$subject = "PLEIN AIR PAINTING... AND MORE";

$headers = "From: kyleih@optonline.net" . "\r\n".
		   "X-Mailer: PHP/".phpversion() ."\r\n".
		   "MIME-Version: 1.0" . "\r\n".
		   "Content-Type: multipart/alternative; boundary=$boundary". "\r\n".
		   "Content-Transfer-Encoding: 7bit". "\r\n";

$text = "PLEIN AIR PAINTING... AND MORE

		DRUCH STUDIO GALLERY Artists & Friends Painting Exhibition
		SKULSKI ART GALLERY of the Polish Cultural Foundation, Clark, NJ

		SEPTEMBER 13 – OCTOBER 4, 2013
		OPENING RECEPTION: FRIDAY, SEPTEMBER 13, 8:00 - 10:00 P.M.";  

$html = '<!DOCTYPE HTML>
			<html>
			<head>
			<title>
			PLEIN AIR PAINTING... AND MORE
			</title>
			<meta CHARSET="utf-8">

			</head>

			<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
			<table border="0" cellspacing="0" cellpadding="20" align="center">
			  <tr><td>
			    <table border="0" cellspacing="0" cellpadding="0" align="center">
			    <tr>
			        <td>
			            <h1>PLEIN AIR PAINTING... AND MORE</h1>

			            <p style="font-family:helvetica, sans-serif;"><b>DRUCH STUDIO GALLERY</b> Artists & Friends Painting Exhibition<br>
			            <b>SKULSKI ART GALLERY</b> of the Polish Cultural Foundation, Clark, NJ</p>

			            <p style="font-family:helvetica, sans-serif;"><b>SEPTEMBER</b> 13 – OCTOBER 4, 2013<br>
			            <b>OPENING RECEPTION:</b> FRIDAY, SEPTEMBER 13, 8:00 - 10:00 P.M.</p>
			            <p>&nbsp;</p>
			        </td>
			    </tr>
			    <tr><td>
			        <img src="http://candpgeneration.com/skulski/EMAIL/art.jpg" alt="">
			    </td>
			    </tr>
			</table>
			</td></tr></table>
			</body>
			</html>
			';

$message = "Multipart Message coming up" . "\r\n\r\n".
	   "--".$boundary.
	   "Content-Type: text/plain; charset=\"iso-8859-1\""."\r\n".
	   "Content-Transfer-Encoding: 7bit"."\r\n".
	   $text."\r\n". 
	   "--".$boundary."\r\n". 
	   "Content-Type: text/html; charset=\"iso-8859-1\""."\r\n". 
	   "Content-Transfer-Encoding: 7bit"."\r\n". 
	   $html."\r\n".
	   "--".$boundary."--";



mail("kyleih@optonline.net", $subject, $message, $headers);
echo "message sent";

