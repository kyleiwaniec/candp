<?php
require_once ("sandbox-header.php");
?>
<style>
    .wrapper{
        max-width: 800px;
        margin-bottom:70px;
    }
    .myslideshow div{
        width:inherit;
        height:inherit;
    }
</style>
<script src="jquery.slideshow-reveal.js"></script>
<script>
$(function(){
    
    $(".myslideshow").slideshow({
        width: 800,
        height: 600,
        duration : 3500,
        speed : 500,
        images : [  "Soul2of37.jpg",
                    "broken.jpg",
                    "church-and-state.jpg",
                    "church-and-state2.jpg",
                    "largeDemon2.jpg"
                 ],
        pathToImgs : "images/",
        effect : "reveal"
        });
}); 
    
</script>
<h2>A simple continuous jQuery Slideshow plugin ~1kb</h2>
<button><a href="http://candpgeneration.com/toys/jquery.slideshow.min.js">Download Plugin</a></button>
<p>Effects include: Slide, Reveal, and Fade. </p>
<p>Usage:</p>
<pre>
&lt;div class="myslideshow"&gt;&lt;/div&gt; 

$(".myslideshow").slideshow({
// optional //
        width:800,
        height:600,
        duration : 2500,
        speed : 500,
        effect : "reveal" // slide, fade,
        pauseOnHover : true

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

<div class="myslideshow"></div>


<?php

require_once ("sandbox-footer.php");
?>
