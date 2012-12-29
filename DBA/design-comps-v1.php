<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>DBA design comps V1 - graphic design and technology services - copy &amp; paste generation</title>


<meta name="description" content="">
<meta name="author" content="">
  
 <!-- Mobile -->
 <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0;" /> 
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
    <link rel="apple-touch-startup-image" href="/startup.png">
    
    
 
    <link rel="stylesheet" href="../css/styles2.css"/>
    <link rel="stylesheet" href="style.css"/>
    <script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>
<script src="../js/jquery-ui-1.8.13.custom.min.js"></script> 
<script>
$(function(){
    
    var next = $(".next");
    var prev = $(".prev");
    
    var layer = 0;
    
    var img = $(".comps img");
    
    //img.first().siblings().hide();
    
    img.click(function(){
        
        var that = $(this);
        that.hide();
        that.prev("img").show();
        
        
    });
    var fancyInt;
    
$("html").removeClass("no-js");  


//$(".listingSummary:last-child").css({"background":"none", "padding-bottom":"20px"});

//  gallery
$(".scrollable").scrollable({ vertical: true, mousewheel: true }).navigator();


$(".fancyloader").show();
$(".scroller .items img").click(function() {
    //alert("clicked");
        
        var mainImg = $(this).parents("#contentblock").children(".galleryMainImg");
        //alert(mainImg.html());
        
	// see if same thumb is being clicked
	//if ($(this).hasClass("active")) { return; }

	// calclulate large image's URL based on the thumbnail URL 
	var url = $(this).attr("src").replace("", "");
        
        
	// get handle to element that wraps the image and make it semi-transparent
	var wrap = mainImg.fadeTo("medium", 0.5);
        
        
        
        // fancy loader
        $(".fancyloader").show();

        function fancyLoader(){
           var i = 0;
           fancyInt = setInterval(function(){
              if(i>-480){
                $(".fancyloader").css({"background-position":"0 "+i+"px"});
                //alert(i);
                i-=40;
                }else{
                 i=0;
                }
                
            }, 30);
        }
        
        fancyLoader();
        
	// the large image 
	var img = new Image();


	// call this function after it's loaded
	img.onload = function() {

		// make wrapper fully visible
		wrap.fadeTo("fast", 1);

		// change the image
		wrap.find("img").attr("src", url);
                
                //console.log("finished loading");
                $(".fancyloader").hide();
                clearInterval(fancyInt);
	};

	// begin loading the image 
	img.src = url;

	// activate item
	$(".scroller .items img").removeClass("active");
	$(this).addClass("active");


}).filter(":first").click();

$(".nextimg").live("click", function(){
    
    var lastImg = $(".items img").filter(":last");
    var lastInSec = $(".active").parent("div").children("img").filter(":last");
    //alert(lastInSec);
    if (lastImg.hasClass("active")){
        $(".items img").filter(":first").click();
        $(".navi a").filter(":first").click();
        
        }else if(lastInSec.hasClass("active")){
            $(".items img").filter(".active").parent().next().children("img:first").click();
            $(".next").click();
        }else{
            $(".items img").filter(".active").next().click();
        }
});
$(".previmg").live("click", function(){
     var firstImg = $(".items img").filter(":first");
     var firstInSec = $(".active").parent("div").children("img").filter(":first");
     if (firstImg.hasClass("active")){
        $(".items img").filter(":last").click();
        $(".navi a").filter(":last").click();
        }else if(firstInSec.hasClass("active")){
            $(".items img").filter(".active").parent().prev().children("img:last").click();
            $(".prev").click();
        }else{
            $(".items img").filter(".active").prev().click();
        }
});


// end the scroller
    
});
</script>
<style>
   .comps{position:relative;}
   .comps img{position:absolute;}
</style>


</head>

<body>
<?php include_once("../analyticstracking.php") ?>

<div id="wrapper">
<!--    <div class="navi">   <div class="prev">Prev</div>  |  <div class="next">Next</div></div>-->
<!--    <div class="comps">
        <img src="comps/dba-events1.jpg"/>
        <img src="comps/dba-home1c-megaHistory.jpg"/>
        <img src="comps/dba-home1c-megaMembers.jpg"/>
        <img src="comps/dba-home1c-no-feature.jpg"/>
        <img src="comps/dba-home1c.jpg"/>
        
        
        
        
    
    </div> .comps -->
    
    <div class="navi"></div>
        <div class="scroller">
        <div id="actions">
	<a class="next"></a><a class="prev"></a>
        </div>  
           
            <!-- root element for scrollable -->
            <div class="scrollable vertical">   

                <!-- root element for the items -->
                <div class="items">


                    <?php
                    $filenames = glob("comps/*.jpg");

                    $numbOffiles = count($filenames);
                    $t = 6; // thumbsPerDiv

                    for ($i = 0, $j = 0; $i < $numbOffiles / $t; $i++, $j + $t) {
                        echo "<div>";

                        for ($h = 0; $h < $t; $h++, $j++) {

                            if (file_exists($filenames[$j])) {
                                echo "<img src='{$filenames[$j]}'/>";
                            }
                        }

                        echo "</div>";
                    }
                    ?>

                </div>

            </div>

           
        </div><!-- end Scroller --> 
        <div class="galleryMainImg imgBorder"><div class="previmg"></div><img src="images/gallery/a-02-Front-3.jpg" width="" height=""/><div class="nextimg"></div></div>
    <div class='fancyloader'></div>
</div><!-- #wrapper -->


</body>
</html>
