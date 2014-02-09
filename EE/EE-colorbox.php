<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<title>ColorBox Example</title>
	<style>
		body{font:12px/1.2 Verdana, sans-serif; padding:0 10px;}
		a:link, a:visited{text-decoration:none; color:#416CE5; border-bottom:1px solid #416CE5;}
		h2{font-size:13px; margin:15px 0 0 0;}
	</style>
	<link rel="stylesheet" href="http://jacklmoore.com/colorbox/example4/colorbox.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<script src="http://jacklmoore.com/colorbox/colorbox/jquery.colorbox.js"></script>
	<script>
		$(function(){
			
			$(".inline").colorbox({inline:true, width:"300px", height:"250px"});
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
                        
//                        $("body").bind("DOMSubtreeModified load", function(){
//                        var slide_img = $(".slideshow").outerHeight(true);
//                        alert(slide_img); // the height of the slide including margin and padding
//                        $(".slideshow").height(slide_img); // explicitly set the height to the calculated height
//                        });
                        
                        
                        var resizeTimer = 0;
                        $(window).resize(function(evt) {
                          clearTimeout( resizeTimer );
                          resizeTimer = setTimeout( function() { onResize(evt); }, 200 );
                        });

                        function onResize(evt) {
                          // do math here to calculate slider height

                                       var slide_img = $(".slideshow img").outerHeight(true);
                                       alert(slide_img); // the height of the slide including margin and padding
                                       $(".slideshow").height(slide_img); // explicitly set the height to the calculated height

                        };

                        $('.slideshow')
                        .after('<div id="nav">')
                        .cycle({
                                        fx: 'fade',
                                        sync: true,
                                        speedIn:  500,  
                                        speedOut:  500,  
                                        timeout: 10000,
                                        pager:  '#nav',
                                        next:   '.slideshow',
                                        slideResize: true

                                        });
                        
                        
                        
                        
                        $("#brd ul li").each(function(){
                            var that = $(this);    
                            var link = $("a");
                            if(!that.html().match(/<a href/)){
                                    $("<br/>").insertBefore(that);
                                }
                            })
                            
                            
                        //
		});
	</script>
</head>
<body>
	
	<p><a class='inline' href="#inline_content">Inline HTML</a></p>
        <div class="slideshow">
            <img src="http://i.istockimg.com/file_thumbview_approve/4200305/2/stock-photo-4200305-merry-christmas-cat.jpg" class="a" alt="Japan 11/03: Title page" />
               <p>hi</p>         
        </div>
        <div id="brd">
        <ul>
            <li><a href="#">link</a></li>
            <li><a href="#">link</a></li>
            <li><a href="#">link</a></li>
            <li></li>
        </ul>
        </div>
	<!-- This contains the hidden content for inline calls -->
	<div style='display:none'>
		<div id='inline_content' style='padding:10px; background:#fff; '>
		<p><strong>This content comes from a hidden element on this page.</strong></p>
		<p>The inline option preserves bound JavaScript events and changes, and it puts the content back where it came from when it is closed.</p>
		<p><a id="click" href="#" style='padding:5px; background:#ccc;'>Click me, it will be preserved!</a></p>
		
		<p><strong>If you try to open a new ColorBox while it is already open, it will update itself with the new content.</strong></p>
		<p>Updating Content Example:<br />
		<a class="ajax" href="../content/flash.html">Click here to load new content</a></p>
		</div>
	</div>
</body>
</html>


                       
