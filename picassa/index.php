<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>about us - graphic design and technology services - copy &amp; paste generation</title>



<meta name="description" content="">
<meta name="author" content="">
  

    

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script>
    $(function(){
        
    
    var albumpath = "https://picasaweb.google.com/data/feed/api/user/kyleiwaniec?kind=album&access=public";
    var photopath = "https://picasaweb.google.com/data/feed/api/user/kyleiwaniec/albumid/5626033668331415745?kind=photo";    

   $.get("getfile.php", {u:albumpath}, function(data){
      
     var xmlDoc = $.parseXML(data);
     var content = $(data);
     
     
//     content.find("entry").each(function(){
//              var curr = $(this);
//              var photo = curr.children("media:group").text();
//              $(".photo").text(photo);
//     });
     
     
     $("body").append(content);
     });
     
     });
</script>





</head>

<body>
    <div class="photo"></div>
<hr/>

</body>
</html>