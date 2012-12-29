<?php
  session_start();

  if (isset($_SESSION["authorized"])){
      if ($_SESSION["authorized"]){
          header("Location: members.php");
      }
  }
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <script>
    </script>
    <style>
      input{
        display:block;
        margin-bottom : 10px; 
      }
    </style>
  </head>
  <body>
    <h1>Login</h1>
    <form action="members.php" method="post">
      <input type="text" name="name" placeholder="name"/>
      <input type="password" name="password" placeHolder="password"/>
      <input type="submit" value="Login"/> 
    </form>
  </body>
</html>