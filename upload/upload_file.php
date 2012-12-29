<?php
  session_start();
  require_once("users.php");
  
  if (!isset($_SESSION["authorized"])){
    $_SESSION["authorized"] = false;
  }
  
  if (isset($_POST["name"]) && isset($_POST["password"])){
    
    for ($i = 0; $i < count($users); $i++){
      
      if ($users[$i]["name"] == $_POST["name"] && 
          $users[$i]["pass"] == $_POST["password"]){
                                         
             $_SESSION["authorized"] = true;
      }
      
    }
    
  }
   
  if (!$_SESSION["authorized"]) {
    die("You must be logged in to view this page. <a href='index.php'>Login</a>");
  }
  
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>File Upload</title>
        <style>
            body, html{text-align: center;}
        </style>
    </head>
    <body>
<?php

require_once('../includes/class.phpmailer.php');

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "application/pdf"))
&& ($_FILES["file"]["size"] < 1000000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
	

    if (file_exists("uploads/" . $_FILES["file"]["name"]))
      {
      echo "<h3>A file with this name: '". $_FILES["file"]["name"] . "' already exists. Please rename your file and try again.</h3>
            <p><a href='index.php'>To upload another file click here.</a></p>
            ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploads/" . $_FILES["file"]["name"]);
      
      echo "<h3>Your file was successfully uploaded.</h3>";	
//        echo "FIle Name: " . $_FILES["file"]["name"] . "<br />";
//        echo "Type: " . $_FILES["file"]["type"] . "<br />";
//        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br /><br />";
        //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
        
        // send the email
        
          
  
          $_POST["email"] = "kyleih@optonline.net";

          //if (isset($_POST["email"])){

            $email = $_POST["email"];

            $mail = new PHPMailer();

            $mail->From = "info@candpgeneration.com";

            $mail->FromName = "CnP File Upload";

            $mail->Subject = "A file was uploaded to the Uploads Directory";

            $mail->AltBody = "Preview file at: http://www.candpgeneration.com/upload/uploads/" . $_FILES["file"]["name"];
            $mail->MsgHTML("Preview file at: <br/>
                            <a href='http://www.candpgeneration.com/upload/uploads/" . $_FILES["file"]["name"] . "'>" . $_FILES["file"]["name"] . "</a>
                            ");
            // add as many addresses as you want
            $mail->AddAddress($email, "CnP File Upload");

            if(!$mail->Send()) {
              echo "Oops, an error occured while trying to send an email alert to C &amp; P. Please email us to let us know you uploaded a file. <br/>Mailer Error: " . $mail->ErrorInfo . "<br/>";
            } else {
              echo "<h3>And an email message has been sent to C &amp; P</h3>";
            }
        //  }
        
        // end send email
        
        
        
      
      
      echo "You can review your file here: " . "<a href='http://www.candpgeneration.com/upload/uploads/" . $_FILES["file"]["name"] . "'>" . $_FILES["file"]["name"] . "</a>";
      echo "<br/><br/><h2><a href='index.php'>To upload another file click here.</a></h2>";
      }
    }
  }
else
  {
  echo "Invalid file. The allowed file types are: jpg, gif, pdf<br/>
      <a href='index.php'>To upload another file click here.</a>
      ";
  }
?>
</body>
    </html>