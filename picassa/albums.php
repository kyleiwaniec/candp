<?php
 
  //$file = simplexml_load_file("https://picasaweb.google.com/data/feed/api/user/kyleiwaniec?kind=album&access=public");
  
  $file = file_get_contents("https://picasaweb.google.com/data/feed/api/user/112022186898629807162?kind=album&access=public");
  echo "<hr/><pre>";
  print($file);
  echo "</pre>";