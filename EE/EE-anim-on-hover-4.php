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
                
                <div class="button">preload</div>
                <div class="product" id="Prod1"> 
                    <img class="still img0" src="http://www.kyle-hamilton.com/EE/images/green-1.jpg" alt="" />


                    
                </div>
                
                <div class="product" id="Prod2"> 
                    <img class="still img0" src="http://www.kyle-hamilton.com/EE/images/blue-1.jpg" alt="" />

                 
                </div>
                
                
            </div><!-- content -->
        </div><!-- #wrapper -->


        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script>
        function preload() {
                                var i = 0, a = arguments, len = a.length;
				for (i; i < len; i++) {
                                    
                                        var images = new Array();
					images[i] = new Image()
					images[i].src = preload.arguments[i]
				}
			}
                        
        var galImgs =[
                      "http://2black.files.wordpress.com/2007/08/digital_photos_of_nature.jpg",
                      "http://3.bp.blogspot.com/-DDVlCy7Zilw/Ti_my1gTuKI/AAAAAAAACX8/WDzdYY-3nHA/s1600/pictures+of+nature-2.jpg",
                      "http://2black.files.wordpress.com/2007/08/digital_photos_of_nature-1.jpg"
                      ];
                      
         $(".product").bind("mouseenter", function(){
             
                        var that = $(this);
                        
                        preload.apply(undefined, galImgs);
                        
                        
                        
                        var len = galImgs.length;
                        // alert(len);
                        var i = 0;
                        
                        
                       // $(galImgs).load(function(){
                            
                        for (i+1; i < len; i++){
                           //alert(galImgs[i]);
                           //$("<img src='"+galImgs[i]+"'/><br/>").appendTo;  
                            $("<img src="+galImgs[i]+" class='thumb img"+i+"'/>").css({"opacity":"0"}).appendTo(that);
                            };
                            
                        // });
                         
                         }).mouseleave(function(){
                             $(".thumb").detach();
                           });
                    
    
        </script>
     <script>
            $(function(){
                $(".thumb").css({"opacity":"0"});
                $(".still").css({"opacity":"1"});
                
                
                var interval;
                $(".product").live("mouseenter", function(){
                    
                            
                            var that = $(this);
                            var numImgs = that.children().length; // so you can have as many images as you want in each product
                            //console.log(numImgs);
                            var i = 0;
                            interval = setInterval(
                                        function() { 
                                                that.children(".img"+i+"").stop().animate({opacity:0}, {duration:700, queue: false}).next("img").stop().animate({opacity: 1}, 700);
                                                i++; 
                                                if( i > numImgs) clearInterval(interval);
                                        } , 700); // time between fades in miliseconds

                          })
                          .mouseleave(function(){
                                clearInterval(interval);
                                 $(".img0").css({opacity:1}).siblings().css({opacity:0});
                            });
            });
        </script> 
        <!-- <script>
        $(function(){
          //var path = "http://www.kyle-hamilton.com/productImages.xml";
        
  
          $.get("http://www.candpgeneration.com/productImages.xml", function(data){
          
              //var xmlDoc = $.parseXML(data);

              var content = $(data);


              
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
                   
                   var that = $(this);
                   //alert(that.siblings().length);
                   var numOfTbs = that.siblings().length;
                   
                  //alert(images);
                   //var i = 0;
                   index += 2;
                   var img = $("<img src="+link+" alt='"+name+"' class='thumb img"+index+"'/>").css({"opacity":"0"}).appendTo(prodDiv);
                   
                   });
                
                }).mouseleave(function(){
                    $(".thumb").detach();
                
                }); 
                
            });
          });
        });
</script> -->
    </body>
</html>


function preload(index) {
                                var i = 0, len = index.length;
				for (i; i < len; i++) {
					images[i] = new Image()
					images[i].src = preload.arguments[i]
				}
			}
                        
                        
                        $(".button").click(function(){
                        preload(
                                http://3.bp.blogspot.com/-ZJvm2f-sQSE/Ti_mwEy89JI/AAAAAAAACX4/yc9ch_apP6U/s1600/pictures+of+nature-1.jpg,
                                http://3.bp.blogspot.com/-DDVlCy7Zilw/Ti_my1gTuKI/AAAAAAAACX8/WDzdYY-3nHA/s1600/pictures+of+nature-2.jpg,
                                http://3.bp.blogspot.com/-GH9TdpVL2K8/Ti_mzvovHaI/AAAAAAAACYA/lhMHgy4Qm1U/s1600/pictures+of+nature-3.jpg
                                );
                        
                        });
                     
    ////////////////                    
                        
                        
function preloadImgs() {
                        var d=document,a=arguments; 
                        
                        if(!d.prodImgs) 
                        
                            d.prodImgs = new Array();
                            var len = a.length;
                            
                            for(var i=0; i < len; i++) { 
                                d.prodImgs[i]=new Image; 
                                d.prodImgs[i].src=a[i]; 
                        }
};
preloadImgs("images"); 



$('<img />')
    .attr('src', 'imageURL.jpg')
    .load(function(){
        $('.profile').append( $(this) );
        // Your other custom code
    });
    
    
    
    

$(function () {

var images = new Array();
    images[0] = 'http://farm4.static.flickr.com/3293/2805001285_4164179461_m.jpg';
    images[1] = 'http://farm4.static.flickr.com/3103/2801920553_656406f2dd_m.jpg';
    images[2] = 'http://farm4.static.flickr.com/3248/2802705514_b7a0ba55c9_m.jpg';
    
    // loop through matching element
    $("ul#portfolio li").each(function(index,el){
    
        // new image object

        var img = new Image();

        // image onload

        $(img).load(function () {

        // hide first

        $(this).css('display','none'); // since .hide() failed in safari

        $(el).removeClass('loading').append(this);
        
        $(this).fadeIn();
        
    }).error(function () {
        $(el).remove();
    }).attr('src', images[index]);
});
 
});       