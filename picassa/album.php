<?php

$id = htmlspecialchars($_GET["id"]);


//$photos = file_get_contents("https://picasaweb.google.com/data/feed/api/user/kyleiwaniec/albumid/".$id."?kind=photo");

$photos = file_get_contents("https://picasaweb.google.com/data/feed/api/user/112022186898629807162/albumid/".$id."?kind=photo");

$photosxml = <<<EOT
$photos
EOT;

$sxe = new SimpleXMLElement($photosxml);

$sxe->registerXPathNamespace('media', 'http://search.yahoo.com/mrss');
$result = $sxe->xpath('//media:content');

foreach ($result as $content) {
   
    $pattern = "/(.*)(\/.*[.jpg || .JPG || .png || .PNG])$/";
   
   $replacement = "$1/s600$2";  // make the image 600px in whatever direction is larger
   
   $link = preg_replace($pattern, $replacement, $content['url']);
   
   //echo $link."<br/>";
   
   echo "<img src='". $link ."'/><br/>";
}
