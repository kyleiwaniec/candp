<?php
  function isAllowedExtension($fileName, $allowedExtensions) {
        return in_array(end(explode(".", $fileName)), $allowedExtensions);
    }

    $exts = array("jpg", "gif", "png");

    $fileList = scandir('images/portfolio/');
	
    foreach ($fileList as $image){
         if (isAllowedExtension($image, $exts)){
         $arr = explode(".", $image);
         //$arr[0] holds name and $arr[1] holds extension
		 
		  echo "images/portfolio/$arr[0].$arr[1], '";
      }
}
?>
