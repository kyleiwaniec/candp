<?php

//$albums = file_get_contents("https://picasaweb.google.com/data/feed/api/user/kyleiwaniec?kind=album&access=public");

$albums = file_get_contents("https://picasaweb.google.com/data/feed/api/user/112022186898629807162?kind=album&access=public");


$albumsxml = <<<EOT
$albums
EOT;

$gphoto = new SimpleXMLElement($albumsxml);
$gphoto->registerXPathNamespace('gphoto', 'http://schemas.google.com/photos/2007');
$albumid = $gphoto->xpath('//gphoto:id');


$media = new SimpleXMLElement($albumsxml);
$media->registerXPathNamespace('media', 'http://search.yahoo.com/mrss/');
$albumimage = $media->xpath('//media:content');

$num = count($albumimage);

for($i=0; $i<$num; $i++){
    
    echo "<a href='album.php?id=".$albumid[$i]."'><img src='".$albumimage[$i]['url'] ."'/></a><br/>".$albumid[$i]."<br/><br/>";
}



?>
