(function($) {
    jQuery.fn.slideshow = function(o) {
        // Define default settings.
        var options = {
            width:400,
            height:300,
            images : [],
            pathToImgs : "",
            duration : 2500,
            speed : 500
        };
        
        o = o || {};
        o = $.extend(options, o);
            
            
        
        var slideshow = this; // slideshow container element
   
   
        slideshow.css({
            width: o.width, 
            height: o.height, 
            "position":"relative", 
            "overflow":"hidden"
        });
   
        var numImages = o.images.length;
   
        var slides = [];
   
        // make a slide object
        function Slide(w, h, img){
            var slide = $("<div>", {
                css:{
                    position : "absolute",
                    width    : w,
                    height   : h,
                    left     : 0,
                    background: "url("+o.pathToImgs+img+") 0px 0px no-repeat"
                },
                rel: img    
            });
            return slide;
        };
   
        for(var i = 0; i < numImages; i++){
   
            //slides.push(Slide(o.width, o.height, o.images[i]));
            slides[i] = Slide(o.width, o.height, o.images[i]);
    
        };
   
        // to create a new slide object:
        // var s1 = new Slide(sw, sh, "image.jpg");
   
   
        slideshow.html(slides[0]);
        slideshow.prepend(slides[1]);
   
   
   
        var dotheslide = function(){
       
       
            slideshow.children("div").last().animate({
                "left": -o.width
                }, o.speed, function(){
           
                slides.push(slides[0]);
                slides.shift();
                slideshow.html(slides[0]);
                slideshow.prepend(slides[1]);

                slideshow.children("div").first().css({
                    "left": 0
                });
            });   
       
       
        };
   

   
        var inter;
   
        inter = setInterval (function(){
            dotheslide();
        }, o.duration);
   
        slideshow.on("mouseenter", function(){
            clearInterval(inter);
      
        }).mouseleave(function(){
            inter = setInterval (function(){
                dotheslide();
            }, o.duration);
        });
   
   
    };
})(jQuery);