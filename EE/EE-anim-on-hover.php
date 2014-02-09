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
                <div class="product"> 
                    <img class="still img1" src="http://www.kyle-hamilton.com/EE/images/green-1.jpg" alt="" />

                    <img class="thumb img2" src="http://www.kyle-hamilton.com/EE/images/green-2.jpg" alt="" />   
                    <img class="thumb img3" src="http://www.kyle-hamilton.com/EE/images/green-3.jpg" alt="" />
                    <img class="thumb img4" src="http://www.kyle-hamilton.com/EE/images/green-4.jpg" alt="" />
                    <img class="thumb img5" src="http://www.kyle-hamilton.com/EE/images/green-5.jpg" alt="" />
                    
                </div>
                
                <div class="product"> 
                    <img class="still img1" src="EE/images/blue-1.jpg" alt="" />

                    <img class="thumb img2" src="http://www.kyle-hamilton.com/EE/images/blue-2.jpg" alt="" />   
                    <img class="thumb img3" src="http://www.kyle-hamilton.com/EE/images/blue-3.jpg" alt="" />
                    <img class="thumb img4" src="http://www.kyle-hamilton.com/EE/images/blue-4.jpg" alt="" />
                    <img class="thumb img5" src="http://www.kyle-hamilton.com/EE/images/blue-5.jpg" alt="" />
                    
                </div>
                
                
            </div><!-- content -->
        </div><!-- #wrapper -->


        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script src="js/jquery-ui-1.8.13.custom.min.js"></script> 
        <!-- <script src="js/jquery.tools.min.js"></script> -->
        <script src="js/jquery.imageLoader.min.js"></script>
        <script src="EE/getimages.js"></script>
       
       
        <script>
            $(function(){
                $(".thumb").css({"opacity":"0"});
                $(".still").css({"opacity":"1"});
                
                
                var interval;
                $(".product").mouseenter(function(){
                    
                            
                            var that = $(this);
                            var numImgs = that.children().length; // so you can have as many images as you want in each product
                            //console.log(numImgs);
                            var i = 1;
                            interval = setInterval(
                                        function() { 
                                                that.children(".img"+i+"").stop().animate({opacity:0}, {duration:200, queue: false}).next("img").stop().animate({opacity: 1}, 200);
                                                i++; 
                                                if( i >= numImgs) clearInterval(interval);
                                        } , 500); // time between fades in miliseconds

                          }).mouseleave(function(){
                                clearInterval(interval);
                                $(".img1").css({opacity:1}).siblings().css({opacity:0});
                          
                     });
            });
        </script>
    </body>
</html>
