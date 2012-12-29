<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>Get a file - graphic design and technology services - copy &amp; paste generation</title>



<meta name="description" content="">
<meta name="author" content="">
  

    

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script>
    $(function(){
        
    
    var path = "http://www.wirelessadvocates.com/_careers/careers.htm";
    //var path = "http://pk.candpgeneration.com/get-started.php";
   $.get("getfile.php", {u:path}, function(data){
      
     
     var content = $(data);
     
     
//     content.find("entry").each(function(){
//              var curr = $(this);
//              var photo = curr.children("media:group").text();
//              $(".photo").text(photo);
//     });
     
     alert(data);
     $("body").append(content);
     });
     
     });
</script>





</head>

<body>
  

</body>
</html>