<?php
require_once ("sandbox-header.php");
?>
<style>
    .wrapper{
        max-width: 800px;
    }
</style>
<script src="jquery.slideshow-zoom.js"></script>
<script>
$(function(){
    
    $(".myslideshow").slideshow({
        width: 800,
        height: 300,
        duration : 3500,
        speed : 500, // use at least 500 for pan, 
                     // ideal speed for slide and reveal is 400
        images : [  "http://www.theblogismine.com/wp-content/uploads/2010/12/2010-Hubble-Space-Telescope-Advent-Calendar-18.jpg",
                    "http://gillannie.files.wordpress.com/2011/11/galaxy_ngc_pic23941.jpg",
                    "http://www.purplebackgrounds.net/wp-content/uploads/2011/10/cool-purple-backgrounds.jpg",
                    "http://www.thefutureschannel.com/img/pics/second_skin/buzz_aldrin_moon_space_suit.jpg"
                 ],
        pathToImgs : "",
        transition : "fade",
        effect : "pan",

        effectSpeed : 3000
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
                     // ideal speed for slide and reveal is 400
        transition : "fade" | "slide" | "reveal",
        effect : "pan" | "zoom", // only applicable to fade effect
        effectSpeed : 3000 // must be less than duration by at least 500ms

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
<button><a href="http://candpgeneration.com/toys/jquery.cnp-slideshow.js">Download Plugin</a></button>

<?php

require_once ("sandbox-footer.php");
?>
