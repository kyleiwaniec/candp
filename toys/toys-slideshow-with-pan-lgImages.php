<?php
require_once ("sandbox-header.php");
?>
<style>
    .wrapper{
        max-width: 800px;
    }
</style>
<script src="jquery.slideshow-pan.js"></script>
<script>
$(function(){
    
    $(".myslideshow").slideshow({
        width: 800,
        height: 300,
        duration : 3500,
        speed : 500,
        images : [  "http://www.theblogismine.com/wp-content/uploads/2010/12/2010-Hubble-Space-Telescope-Advent-Calendar-18.jpg",
                    "http://gillannie.files.wordpress.com/2011/11/galaxy_ngc_pic23941.jpg",
                    "http://www.purplebackgrounds.net/wp-content/uploads/2011/10/cool-purple-backgrounds.jpg",
                    "http://www.thefutureschannel.com/img/pics/second_skin/buzz_aldrin_moon_space_suit.jpg"
                 ],
        pathToImgs : "",
        effect : "fade",
        pan : true,
        panSpeed : 3000
        });
}); 
    
</script>
<h2>A simple continuous jQuery Slideshow plugin.</h2>
<p>Effects include: Slide, Reveal, and Fade (with pan option). </p>


<div class="myslideshow"></div>

<p>Usage:</p>
<pre>

&lt;div class="myslideshow"&gt;&lt;/div&gt;


$(".myslideshow").slideshow({
// optional //
        width:800,
        height:300,
        duration : 3500, // time between slides
        speed : 500, // speed of the transition - must be 500 or greater if using pan
        effect : "fade", // slide, reveal
        pan : true, // only applicable to fade effect
        panSpeed : 3000 // must be at least 500 ms less than duration
// mandatory //
        images : [  "image1.jpg",
                    "image2.jpg",
                    "image3.jpg",
                    "image4.jpg",
                    "image5.jpg"
                 ],
        pathToImgs : "images/"
        });
</pre>
<button><a href="http://candpgeneration.com/toys/jquery.slideshow-pan.js">Download Plugin</a></button>

<?php

require_once ("sandbox-footer.php");
?>
