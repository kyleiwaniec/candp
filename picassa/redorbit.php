<?php
   
  $doc = file_get_contents("http://www.redorbit.com/feeds/mars_iod.xml");
  
  
  // SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out 
  $xmlString = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $doc); 
  $file = simplexml_load_file($xmlString);
  
//  $items = $xmlString->channel[0]->item;
//  
//  foreach($items as $item){
//    $img = $item->mediacontent["url"];
//    echo "<img width=500 src='$img' />";
//  }
  
  echo "<hr/><pre>";
  print_r($file);
  echo "</pre>";