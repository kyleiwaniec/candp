<?php

    if (isset($_GET["u"])){
     $file = file_get_contents($_GET["u"]);
   $jfile = json_decode($file);
     if (!$jfile) die("there was an error");
    
     echo $jfile; 
    
  }
 