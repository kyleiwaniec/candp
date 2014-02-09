<?php
require_once ("sandbox-header.php");
?>
<style>
    .wrapper{
        max-width: 800px;
    }
</style>
<script src="jquery.slideshow-reveal-plg.js"></script>
<script>
$(function(){
    
    $(".myslideshow").slideshowing({
        width: 800,
        height: 600,
        images : [  "Soul2of37.jpg",
                    "broken.jpg",
                    "church-and-state.jpg",
                    "church-and-state2.jpg",
                    "largeDemon2.jpg"
                 ],
        pathToImgs : "images/"
        });
}); 
    
</script>
<h2>A simple continuous jQuery Slideshow plugin.</h2>
<p>Effects include: Slide, Reveal, and Fade. </p>
<p>Usage:</p>
<pre>
$(".myslideshow").slideshowing({
        width: 800,
        height: 600,
        images : [  "image1.jpg",
                    "image2.jpg",
                    "image3.jpg",
                    "image4.jpg",
                    "image5.jpg"
                 ],
        pathToImgs : "images/"
        });
</pre>

<div class="myslideshow"></div>


<?php

require_once ("sandbox-footer.php");
?>
