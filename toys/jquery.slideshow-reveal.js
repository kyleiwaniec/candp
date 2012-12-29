(function($) {
    jQuery.fn.slideshow = function(o) {
        // Define default settings.
        var options = {
            width:800,
            height:600,
            images : [],
            pathToImgs : "",
            duration : 2500,
            speed : 500,
            effect : "reveal",
            pauseOnHover : true
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
        function Slide(img){
            var slide = $("<div>", {
                css:{
                    position : "absolute",
//                    width    : w,
//                    height   : h,
                    opacity  : o.effect == "fade" ? 0 : 1,
                    left     : o.effect == "slide" ? o.width : 0,
                    background: "url("+o.pathToImgs+img+") 0px 0px no-repeat"
                },
                rel: img    
            });
            return slide;
        };
   
        for(var i = 0; i < numImages; i++){
   
            // slides.push(Slide(o.width, o.height, o.images[i]));
            slides[i] = Slide(o.images[i]); // supposedly faster
    
        }
   
        // to create a new slide object:
        // var s1 = new Slide(sw, sh, "image.jpg");
   
   
        slideshow.html(slides[0]);
        slideshow.prepend(slides[1]);
        
        slides[0].css({opacity : 1});
        slides[0].css({left : 0});
   
        var dotheslide = function(){
       
        switch (o.effect){
            case "reveal" : 
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
                break;
                
            case "slide" : 
                    
                    
                    
                    slideshow.children("div").first().animate({"left": 0}, {queue:false});
                    slideshow.children("div").last().animate({"left": -o.width}, o.speed, function(){
           
                    slides.push(slides[0]);
                    slides.shift();
                    slideshow.html(slides[0]);
                    slideshow.prepend(slides[1]);

                    slideshow.children("div").first().css({"left": o.width});
                    });
            break;
            
            case "fade":
                slideshow.children("div").first().animate({opacity : 1}, {queue:false});
                slideshow.children("div").last().animate({opacity : 0}, o.speed, function(){

                slides.push(slides[0]);
                slides.shift();
                slideshow.html(slides[0]);
                slideshow.prepend(slides[1]);

                slideshow.children("div").first().css({opacity : 1});
                }); 
            break;
            
            }
        }
       

   
        var inter;
   
        inter = setInterval (function(){
            dotheslide();
        }, o.duration);
   
   
        if(o.pauseOnHover == true){
            slideshow.on("mouseenter", function(){
                clearInterval(inter);

            }).mouseleave(function(){
                inter = setInterval (function(){
                    dotheslide();
                }, o.duration);
            });
        }
   
    } 
})(jQuery);