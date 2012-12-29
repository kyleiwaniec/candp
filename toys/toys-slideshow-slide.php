<?php

require_once ("../includes/header.php");
?>

<h2>Here we'll play!</h2>

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
   
   
   slideshow.css({width: sw, height: sh, "position":"relative", "overflow":"hidden"});
   
   var images = ["img1.jpg", 
                 "img2.jpg",
                 "img3.jpg",
                 "img4.jpg"];
             
   var numImages = images.length;
   
   var slides = [];
   
   // make a slide object
   function Slide(w, h, img){
        var slide = $("<div>", {
            css:{
                    position : "absolute",
                    width    : w,
                    height   : h,
                    left     : 400,
                    background: "url(../images/"+img+") 0px 0px no-repeat"
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
   
   slides[0].css({"left": 0});
   
   var dotheslide = function(){
       
       slideshow.children("div").first().animate({"left": 0}, {queue:false});
       slideshow.children("div").last().animate({"left": -sw}, 500, function(){
           
            slides.push(slides[0]);
            slides.shift();
            slideshow.html(slides[0]);
            slideshow.prepend(slides[1]);

            slideshow.children("div").first().css({"left": 400});
       });   
       
       
   }
   
   
   var inter;
   
   inter = setInterval (function(){
       dotheslide();
   }, 1500);
   
   slideshow.on("mouseenter", function(){
       clearInterval(inter);
      
   }).mouseleave(function(){
        inter = setInterval (function(){
        dotheslide();
        }, 1500);
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
