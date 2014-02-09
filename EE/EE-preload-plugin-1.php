
<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>preload on hover - copy &amp; paste generation</title>

        <meta name="description" content="jQuery rollover animation effect, including image preloading script."/>
        <meta name="author" content="Kyle Hamilton"/>


        <style>
            #content{margin-top:50px;} /* you dont need this */
            .product{position:relative; display:block; background-color: lightgray; padding:10px; width:250px; height:250px;} /* you need this. adjust size/padding etc.. as desired */
            .still, .thumb, #Prod1 img{position:absolute; width:250px; height:250px; } /* you need this. adjust size/padding etc.. as desired */
            .thumb{display:none;}
            .loading {position:absolute; width:250px; height:250px; background: url(images/loading.gif) no-repeat center center; }

        </style>


    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>

        <div id="indicator">Loading...</div>
                <div class="product" id="Prod1"> 
                    <img class="still img0" src="http://www.kyle-hamilton.com/EE/images/green-1.jpg" alt="" />


                    
                </div>
                
                <div class="product" id="Prod2"> 
                    <img class="still img0" src="http://www.kyle-hamilton.com/EE/images/blue-1.jpg" alt="" />

                 
                </div>
        
	


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>  
        
        <script>
            
      (function($) {
          
          
          
          
	var imgList = [];
	$.extend({
              preload:  function(imgArr, option) {
			var setting = $.extend({
				init: function(loaded, total) {},
				loaded: function(img, loaded, total) {},
				loaded_all: function(loaded, total) {}
			}, option);
			var total = imgArr.length;
			var loaded = 0;
			
			setting.init(0, total);
			for(var i in imgArr) {
                            
                                var j = parseInt(i);
                                j++;
                                
                                imgList.push($("<img />")
					.attr("src", imgArr[i])
                                        .addClass("thumb img"+j)
					.load(function() {
						loaded++;
						setting.loaded(this, loaded, total);
						if(loaded == total) {
							setting.loaded_all(loaded, total);
						}
					})
                                        
				);
			}
			
		}
	});
})(jQuery);
</script>
<script>
$(function() {

            $.ajaxSetup({
            async: false
            });

      var interval;
	
      $(".product").live("mouseenter", function(){
          
        var that = $(this);
        
	$.preload([
                "http://3.bp.blogspot.com/-DDVlCy7Zilw/Ti_my1gTuKI/AAAAAAAACX8/WDzdYY-3nHA/s1600/pictures+of+nature-2.jpg",
                "http://www.imagegossips.com/wp-content/uploads/2011/01/552506858fotocollection.jpg",
                "http://3.bp.blogspot.com/-GH9TdpVL2K8/Ti_mzvovHaI/AAAAAAAACYA/lhMHgy4Qm1U/s1600/pictures+of+nature-3.jpg",
                "http://farm3.static.flickr.com/2661/3792282714_90584b41d5_b.jpg",
		"http://farm2.static.flickr.com/1266/1402810863_d41f360b2e_o.jpg"
	], {
		init: function(loaded, total) {
			that.append("<div class='loading'></div>");
		},
		loaded: function(img, loaded, total) {
			$("#indicator").html("Loaded: "+loaded+" of "+total);
                        that.append(img);
                        
		},
		loaded_all: function(loaded, total) {
                        //$("#Prod1 img").removeClass("loading");
                        $(".loading").detach();
                        
			// fadeinout:
                        
                        
                        $(".thumb").css({"opacity":"0", "display":"block"});
                        $(".still").css({"opacity":"1"});
                
                
                           // var that = $(this);
                            //var numImgs = that.children("img").length; 
                            
                            //console.log(numImgs);
                            var i = 0;
                            
                            interval = setInterval(
                                        function() {
                                                that.children(".img"+i).stop().animate({opacity:0}, {duration:700, queue: false}).next("img").stop().animate({opacity: 1}, 700);
                                                i++; 
                                                   if( i == total) {
                                                       //alert("i is big");
                                                        clearInterval(interval);
                                                    };
                                       }, 500); // time between fades in miliseconds
                             

                } // end loaded_all
	});
    }).mouseleave(function(){
                            clearInterval(interval);
                            $(this).html("<img class='still img0' src='http://www.kyle-hamilton.com/EE/images/green-1.jpg' alt=''' />");
                            $(".img0").css({opacity:1}).siblings().css({opacity:0});
                           });
    
});
    </script>
    </body>
</html>
