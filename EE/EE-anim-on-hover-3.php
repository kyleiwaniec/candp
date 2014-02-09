<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>Animate on hover - copy &amp; paste generation</title>

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    		<![endif]--> 

        <meta name="description" content="jQuery rollover animation effect, including image preloading php script.">
        <meta name="author" content="Kyle Hamilton">

       
        <link rel="stylesheet" href="css/styles2.css"/> <!-- you dont need this -->

        <style>
            #content{margin-top:50px;} /* you dont need this */
            .product{position:relative; display:block; background-color: lightgray; padding:10px; width:250px; height:250px;} /* you need this. adjust size/padding etc.. as desired */
            .still, .thumb{position:absolute; width:250px; height:250px; } /* you need this. adjust size/padding etc.. as desired */
            


        </style>



    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>
        
        <div id="wrapper">


            <div id="content">
                <div class="product" id="Prod1"> 
                    <img class="still img1" src="http://www.kyle-hamilton.com/EE/images/green-1.jpg" alt="" />


                    
                </div>
                
                <div class="product" id="Prod2"> 
                    <img class="still img1" src="http://www.kyle-hamilton.com/EE/images/blue-1.jpg" alt="" />

                 
                </div>
                
                
            </div><!-- content -->
        </div><!-- #wrapper -->


        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
      
       <script>
            $(function(){
                $(".thumb").css({"opacity":"0"});
                $(".still").css({"opacity":"1"});
                
                
                var interval;
                $(".product").live("mouseenter", function(){
                    
                            
                            var that = $(this);
                            var numImgs = that.children().length; // so you can have as many images as you want in each product
                            //console.log(numImgs);
                            var i = 1;
                            interval = setInterval(
                                        function() { 
                                                that.children(".img"+i+"").stop().animate({opacity:0}, {duration:700, queue: false}).next("img").stop().animate({opacity: 1}, 700);
                                                i++; 
                                                if( i >= numImgs) clearInterval(interval);
                                        } , 700); // time between fades in miliseconds, probably should not be less than duration

                          })
                          .mouseleave(function(){
                                clearInterval(interval);
                                $(".img1").css({opacity:1}).siblings().css({opacity:0});
                          
                            });
            });
        </script> 
        <script>
        $(function(){
          var path = "http://www.kyle-hamilton.com/productImages.xml";
        
  
          $.get("getfile.php", {u:path}, function(data){
          
              var xmlDoc = $.parseXML(data);

              var content = $(xmlDoc);


              
              content.find("product").each(function(){
                var curr = $(this);
                var name = curr.children("name").text();
                var url =  curr.children("link");
                
                //var len = url.length;
                //alert(len);
                   
                
               $("#"+name+"").mouseenter(function(){
                   var prodDiv = $(this);
                   curr.find("name").siblings().each(function(index){
                   var link = $(this).text();
                   
                   var images = [];
                   
                   images.push(link);
                    
                   //alert(images);
                   //var i = 0;
                   index += 2;
                   var img = $("<img src="+link+" alt='"+name+"' class='thumb img"+index+"'/>").css({"opacity":"0"}).appendTo(prodDiv);
                   
                   });
                
                }).mouseleave(function(){
                    $(".thumb").detach();
                
                }); //end mouseenter
                
            });
          });
        });
</script>
    </body>
</html>
