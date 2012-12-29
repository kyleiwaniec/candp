<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>copy &amp; paste generation - portfolio</title>
<script src="js/jquery.tools.min.js"></script> 
<script src="js/jquery-ui-1.8.13.custom.min.js"></script> 
<script src="js/jquery.imageLoader.min.js"></script>
<script>

$(function(){
var req = new XMLHttpRequest();
req.open('GET', 'http://www.candpgeneration.com/get_images_in_dir.php?dir=images/portfolio/rtr/', true);
req.onreadystatechange = function (aEvt) {
  if (req.readyState == 4) {
     if(req.status == 200){
      
      var imgArr = req.responseText;
      var newImgArr = imgArr.split(",");
      
      console.log(newImgArr);
      
      var images = [ ];
        for ( var i = 0; i < newImgArr.length; i++ ) { 
	    images.push( "http://www.candpgeneration.com/images/portfolio/rtr/" + newImgArr[i]);
        }      

     $({}).imageLoader({
        images: images,
        async: true,
        allcomplete: function(e, ui) {
            console.log("all images have finished uploading");
            }
        });
      
     }else
      dump("Error loading page\n");
  }
};
req.send(null);


});
</script>
</head>
<body>
</body>
</html>

