<?php

//$subject= ((string)$_SERVER['HTTP_HOST']);
//if (preg_match('/\\b(https?|ftp):\/\/www\.(?P<domain>[-A-Z0-9.]+)\\z/i', $subject, $regs)) {
//      $result = $regs['domain'];
//      }
//echo $result;
//echo ((string)$_SERVER['HTTP_HOST']);
      
      $domain = str_replace("www.","", $_SERVER['HTTP_HOST']); 
echo $domain;
?>
