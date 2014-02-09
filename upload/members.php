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
    die("incorrect login. <a href='index.php'>Try again</a>");
  }
  
  ?>

<!DOCTYPE html>
<html>
    <head><title>Upload Files</title>
        <style>
            body, html{text-align: center;}
        </style>
    </head>
    <body>
        <h3>Upload your image or pdf  - up to 100 MB: </h3>
        <form action="upload_file.php" method="post"
              enctype="multipart/form-data">
            <label for="file">Filename:</label>
            <input type="file" name="file" id="file" /> 
            
            <input type="submit" name="submit" value="Submit" />
        </form>

    </body>
</html>