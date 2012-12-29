/* ********** slideshow *************** 

Author:  Kyle Hamilton
website: http://candpgeneration.com/toys/toys-slideshow-with-pan.php

USAGE:

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
                 
********************************************* */

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
            pan : true,
            panSpeed : 3000,
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
        function Slide(w, h, img){
            var slide = $("<div>", {
                css:{
                    position : "absolute",
                    width    : w,
                    height   : h,
                    opacity  : o.effect == "fade" ? 0 : 1,
                    left     : o.effect == "slide" ? o.width : 0
                    //,background: "url("+o.pathToImgs+img+") 0px 0px no-repeat"
                },
                rel: img    
            });
            var image = $("<img>", {
                src: o.pathToImgs+img, 
                css:{
                    position : "absolute",
                    bottom: 0
                }
            });
            slide.append(image);
            return slide;
        };
   
        for(var i = 0; i < numImages; i++){
   
            slides[i] = Slide(o.width, o.height, o.images[i]);
    
        }
   
        // to create a new slide instance:
        // var s1 = new Slide(sw, sh, "image.jpg");
   
   
        slideshow.html(slides[0]);
        
        slideshow.prepend(slides[1]);
        
        slides[0].css({opacity : 1});
        slides[0].css({left : 0});
        //slides[0].children("img").animate({bottom: -200});
        
        // pan the first image if using pan
        if(o.pan == true){
                    var img = slides[0].children("img");
                    setTimeout( function(){
                    pan(img);
                    }, 100);
                }
   
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
                if(o.pan == true){
                    var img = slideshow.children("div").first().children("img");
                    pan(img);
                }
                slideshow.children("div").first().animate({opacity : 1}, {queue:false});
                slideshow.children("div").last().animate({opacity : 0}, o.speed, function(){

                slides.push(slides[0]);
                slides.shift();
                slideshow.html(slides[0]);
                slideshow.prepend(slides[1]);

                slideshow.children("div").first().css({opacity : 1});
                slideshow.children("div").first().children("img").css({bottom : 0});
                }); 
            break;
            
            }
        }
       
        var pan = function(img){
            var sh = img.height();
            img.delay(400).animate({bottom: (o.height - sh)}, {duration:o.panSpeed});
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