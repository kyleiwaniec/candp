<?php
require_once ("sandbox-header.php");
?>
<style>
    .wrapper{
        max-width: 800px;
    }
</style>
<script src="jquery.slideshow-pan-2.js"></script>
<script>
$(function(){
    
    $(".myslideshow").slideshow({
        width: 800,
        height: 300,
        duration : 3500,
        speed : 500,
        images : [  "Soul2of37.jpg",
                    "broken.jpg",
                    "church-and-state.jpg",
                    "church-and-state2.jpg",
                    "largeDemon2.jpg"
                 ],
        pathToImgs : "images/",
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
$(".myslideshow").slideshow({
// optional //
        width:800,
        height:600,
        duration : 3000, // time between slides
        speed : 500, // speed of the transition - must be 500 or greater if using pan
        effect : "fade", // slide, reveal
        pan : true // only applicable to fade effect

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
