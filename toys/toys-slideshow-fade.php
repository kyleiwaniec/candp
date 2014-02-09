<?php

require_once ("../includes/header.php");
?>

<h2>Continuous FadeIn/FadeOut</h2>

<div class="myslideshow"></div>
<script>
$(function(){
   var shoutitout = function(){
       alert("Shout!");
   };
   // shoutitout();
   
   // slideshow
   
   var sw = 400; // slideshow width
   var sh = 300; // slideshow height
   var slideshow = $(".myslideshow"); // slideshow container element
   
   var images = ["img1.jpg", 
                 "img2.jpg",
                 "img3.jpg",
                 "img4.jpg"];
             
   var imagePath = "../images/";   
   var speed = 500; // how quickly it fades
   var slideInterval = 2500; // time between slide fades
   
   slideshow.css({width: sw, height: sh, "position":"relative", "overflow":"hidden"});
             
   var numImages = images.length;
   
   var slides = [];
   
   // make a slide object
   function Slide(w, h, img){
        var slide = $("<div>", {
            css:{
                    position : "absolute",
                    width    : w,
                    height   : h,
                    opacity  : 0,
                    background: "url("+imagePath+img+") 0px 0px no-repeat"
                },
            rel: img    
                });
                return slide;
   };
   
   for(var i = 0; i < numImages; i++){
   
    slides.push(new Slide(sw, sh, images[i]));
    
   }
   
   slideshow.html(slides[0]);
   slideshow.prepend(slides[1]);
   
   slides[0].css({opacity : 1});
   
   var dotheslide = function(){
       
       slideshow.children("div").first().animate({opacity : 1}, {queue:false});
       slideshow.children("div").last().animate({opacity : 0}, speed, function(){
           
            slides.push(slides[0]);
            slides.shift();
            slideshow.html(slides[0]);
            slideshow.prepend(slides[1]);

            slideshow.children("div").first().css({opacity : 1});
       });   
       
       
   }
   
   
   var inter;
   
   inter = setInterval (function(){
       dotheslide();
   }, slideInterval);
   
   slideshow.on("mouseenter", function(){
       clearInterval(inter);
      
   }).mouseleave(function(){
        inter = setInterval (function(){
        dotheslide();
        }, slideInterval);
   });
   
   
   
});    
  // Array Remove - By John Resig (MIT Licensed)
Array.prototype.remove = function(from, to) {
  var rest = this.slice((to || from) + 1 || this.length);
  this.length = from < 0 ? this.length + from : from;
  return this.push.apply(this, rest);
};  
    
</script>

<?php

require_once ("../includes/footer.php");
?>
