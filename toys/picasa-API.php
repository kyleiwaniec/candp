<?php

$stylesheet = "card-flip-flex.css";
$title = "CSS3 - Card Flip Example";
require_once ("sandbox-header.php");
?>


<style>

   
</style>
                <?php


$albums = file_get_contents("https://picasaweb.google.com/data/feed/base/all?kind=photo&q=dogs");

//     <gphoto:numphotos>22</gphoto:numphotos>


$albumsxml = <<<EOT
$albums
EOT;

$gphoto = new SimpleXMLElement($albumsxml);
$gphoto->registerXPathNamespace('gphoto', 'http://schemas.google.com/photos/2007');
$albumid = $gphoto->xpath('//gphoto:id');
$albumname = $gphoto->xpath('//gphoto:name');
$numphotos = $gphoto->xpath('//gphoto:numphotos');


$media = new SimpleXMLElement($albumsxml);
$media->registerXPathNamespace('media', 'http://search.yahoo.com/mrss/');
$albumimage = $media->xpath('//media:content');
$albumthumb = $media->xpath('//media:thumbnail');
$albumtitle = $media->xpath('//media:title');

$num = count($albumimage);

for($i=0; $i<$num; $i++){
    
    echo "<div class='galleryItem'><a class='open-cb-iframe' href='picassa/album-cycle.php?id=".$albumid[$i]."' title='".$albumtitle[$i]."'><img class='inline-img' src='".$albumimage[$i]['url'] ."'/></a><br/>".$albumtitle[$i]."<br/>[ ".$numphotos[$i]." Photos ]</div>"; // - ".$numphotos." Photos
}



?>




<?php

require_once ("sandbox-footer.php");
?>