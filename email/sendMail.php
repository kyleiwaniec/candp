<?php 
$boundary = md5(date_default_timezone_set("U"));

$to = $email;
$subject = "My test php email";

$headers = "From: SnapOne@emailonacid.com" . "\r\n".
		   "X-Mailer: PHP/".phpversion() ."\r\n".
		   "MIME-Version: 1.0" . "\r\n".
		   "Content-Type: multipart/alternative; boundary=$boundary". "\r\n".
		   "Content-Transfer-Encoding: 7bit". "\r\n";

$text = "You really ought remember the birthdays";     
$html = '<html>
	<head>
	  <title>Birthday Reminders for August</title>
	</head>
	<body>
	  <p>Here are the birthdays upcoming in August!</p>
	  <table>
	    <tr>
	      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
	    </tr>
	    <tr>
	      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
	    </tr>
	    <tr>
	      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
	    </tr>
	  </table>
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