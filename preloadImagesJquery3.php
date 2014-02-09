<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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


        <!--<link rel="stylesheet" href="css/styles2.css"/>  you dont need this -->

        <style>
            body { padding:0; margin:0; text-align:center; font:normal 11px/normal arial; color:#666;}
		#wrapper { width:650px; margin:0px auto; padding:50px 5px 5px 5px; display:block; }
                
                .prodDiv{position:relative;}
                
                
		ul#product {margin:0; padding:0;}
                
                ul#product li { position:absolute; margin:0; width:200px; height:200px; list-style:none; }
                
		ul#product li img{width:200px; height:200px;}
                ul#product li.loading { background: url(images/loading.gif) no-repeat center center; }
		div.clear { display:block; clear:both; height:1px; }
		
		a:hover { color:black; }
		#loadnote { position:absolute; top:0px; left:0px; background:red; padding:10px 15px; color:white; }
		#footer { display:block; clear:both; margin:5px 0; }
                img.button{width:200px; height:200px; }
        </style>



    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>

        <div id="wrapper">
                <img class="button" src="http://www.kyle-hamilton.com/EE/images/green-1.jpg" alt="" />
           
        </div><!-- #wrapper -->



        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>  
        <script src="http://baliwebsitedesign.com/resources/jquery-php-flickr/jquery.timer.js"></script>
        <script>
                
              
		
		$(".button").bind("click", function(){	
			
			
		var images =[
                              "http://2black.files.wordpress.com/2007/08/digital_photos_of_nature.jpg",
                              "http://3.bp.blogspot.com/-DDVlCy7Zilw/Ti_my1gTuKI/AAAAAAAACX8/WDzdYY-3nHA/s1600/pictures+of+nature-2.jpg",
                              "http://2black.files.wordpress.com/2007/08/digital_photos_of_nature-1.jpg"
                              ];
	
			var max = images.length;
			
			if(max>0){
				var ul = $('<ul id="product"></ul>');
				$(ul).appendTo($('#wrapper'));
				//var loadnote = $('<div id="loadnote" style="display:none"></div>');
				//$(loadnote).appendTo($('body'));
				LoadImage(0,max);
			}
			
                     
                        
			function LoadImage(index,max)
				{
					if(index<max)
						{
							//$('#loadnote').html("Loading "+(index+1)+" of "+max).fadeIn("fast");
							
						var list = $('<li id="product_'+index+'"></li>').attr('class','loading');
							   $('ul#product').append(list);	
									   
                                                var img = new Image();					
							
						var curr = $("ul#product li#product_"+index);					
							
					        
                                                $(img).load(function () {
                                                    //var that = $(this);
					            $(this).css('opacity','0'); // since .hide() failed in safari
					            $(curr).removeClass('loading').append(this);
						
					            $(this).stop(true, true).animate({opacity:1}, 1000, function(){
                                                    
								
                                                                LoadImage(index+1,max);
                                                                        
								});
					        })
                                                .error(function () {
							$(curr).remove();
							LoadImage(index+1,max);
                                                        //alert("not loaded properly");
					        })
                                                .attr('src', images[index]);										   
						}
                                                
                            }
                                
			}).mouseleave(function(){
                           $("#product").detach();
                       }); 		
		
    </script>
    </body>
</html>
