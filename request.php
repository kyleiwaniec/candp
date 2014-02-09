<?php
    
    //$data = explode(",", $_POST['data']);
   

    $ip = $_POST['ip'];
    $date = $_POST['date'];
    $usrAgent = $_POST['usrAgent'];
   
    $message = 'IP: '.$ip . "\n".'Date: ' . $date . "\n".'Agent: ' . $usrAgent;
    
    
    $file = fopen("downloadLog.txt", "a"); // append mode
   
    if (!$file) die("error");

    fwrite($file, $message . "\n"); 

    fclose($file);
    
    mail('kyleih@optonline.net','somebody downloaded resizer',$message);
 ?>