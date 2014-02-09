<?php
  
  
  if (isset($_GET["u"])){
     $file = file_get_contents($_GET["u"]);
   
     if (!$file) die("there was an error");
    
     echo $file; 
    
  }
 
  ?>