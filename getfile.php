<?php
  
  //echo $_GET["name"];
  
  if (isset($_GET["u"])){
     $file = file_get_contents($_GET["u"]);
   
     if (!$file) die("there was an error");
    
     echo $file; 
    
  }
  
  //echo file_get_contents("http://www.google.com/");
  
  
  
  /*if (isset($_GET["name"])){
  echo "Your name is " . $_GET["name"]; 
  }else{
  echo "You have no name"; 
  }
  */
  ?>