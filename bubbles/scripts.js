var touchSupport = "createTouch" in document;

setTimeout(function(){
          window.scrollTo(0, 1);
        }, 100);


var icons = {
                lightBulb : "M15.5,2.833c-3.866,0-7,3.134-7,7c0,3.859,3.945,4.937,4.223,9.499h5.553c0.278-4.562,4.224-5.639,4.224-9.499C22.5,5.968,19.366,2.833,15.5,2.833zM15.5,28.166c1.894,0,2.483-1.027,2.667-1.666h-5.334C13.017,27.139,13.606,28.166,15.5,28.166zM12.75,25.498h5.5v-5.164h-5.5V25.498z",
                spanner : "M26.834,14.693c1.816-2.088,2.181-4.938,1.193-7.334l-3.646,4.252l-3.594-0.699L19.596,7.45l3.637-4.242c-2.502-0.63-5.258,0.13-7.066,2.21c-1.907,2.193-2.219,5.229-1.039,7.693L5.624,24.04c-1.011,1.162-0.888,2.924,0.274,3.935c1.162,1.01,2.924,0.888,3.935-0.274l9.493-10.918C21.939,17.625,24.918,16.896,26.834,14.693z",
                heart : "M24.132,7.971c-2.203-2.205-5.916-2.098-8.25,0.235L15.5,8.588l-0.382-0.382c-2.334-2.333-6.047-2.44-8.25-0.235c-2.204,2.203-2.098,5.916,0.235,8.249l8.396,8.396l8.396-8.396C26.229,13.887,26.336,10.174,24.132,7.971z",
                scull : "M25.947,11.14c0-5.174-3.979-9.406-10.613-9.406c-6.633,0-10.282,4.232-10.282,9.406c0,5.174,1.459,4.511,1.459,7.43c0,1.095-1.061,0.564-1.061,2.919c0,2.587,3.615,2.223,4.677,3.283c1.061,1.062,0.961,3.019,0.961,3.019s0.199,0.796,0.564,0.563c0,0,0.232,0.564,0.498,0.232c0,0,0.265,0.563,0.531,0.1c0,0,0.265,0.631,0.696,0.166c0,0,0.431,0.63,0.929,0.133c0,0,0.564,0.53,1.194,0.133c0.63,0.397,1.194-0.133,1.194-0.133c0.497,0.497,0.929-0.133,0.929-0.133c0.432,0.465,0.695-0.166,0.695-0.166c0.268,0.464,0.531-0.1,0.531-0.1c0.266,0.332,0.498-0.232,0.498-0.232c0.365,0.232,0.564-0.563,0.564-0.563s-0.1-1.957,0.961-3.019c1.062-1.061,4.676-0.696,4.676-3.283c0-2.354-1.061-1.824-1.061-2.919C24.488,15.651,25.947,16.314,25.947,11.14zM10.333,20.992c-1.783,0.285-2.59-0.215-2.785-1.492c-0.508-3.328,2.555-3.866,4.079-3.683c0.731,0.088,1.99,0.862,1.99,1.825C13.617,20.229,11.992,20.727,10.333,20.992zM16.461,25.303c-0.331,0-0.862-0.431-0.895-1.227c-0.033,0.796-0.63,1.227-0.961,1.227c-0.332,0-0.83-0.331-0.863-1.127c-0.033-0.796,1.028-4.013,1.792-4.013c0.762,0,1.824,3.217,1.791,4.013S16.794,25.303,16.461,25.303zM23.361,19.5c-0.195,1.277-1.004,1.777-2.787,1.492c-1.658-0.266-3.283-0.763-3.283-3.35c0-0.963,1.258-1.737,1.99-1.825C20.805,15.634,23.869,16.172,23.361,19.5z",
                envelope : "M28.516,7.167H3.482l12.517,7.108L28.516,7.167zM16.74,17.303C16.51,17.434,16.255,17.5,16,17.5s-0.51-0.066-0.741-0.197L2.5,10.06v14.773h27V10.06L16.74,17.303z"
            };
            
            ( function ui_elements(){
                if($("#contact-button").length === 0){ return } else {
                    var cb = Raphael("contact-button", 30,30);
                    cb.path(icons.envelope).attr({fill: "#eee", stroke: "none"});
                 }
            }());
            
            
            
            ( function scribble () {
            
//            if(touchSupport){ return } else {
            if($("#background").length === 0){ return } else {
            var w = $(window).width()-10, 
                h = $(document).height()-10,
            
                bg = Raphael("background", w, h),
            
                pencilLine = "",
                clickstate = false,
                x,y; x=y=0;
                
            
            
            $(document).on('click touchstart', function(ev){
                //ev.stopPropagation();
                if(ev.type == "touchstart"){
                            var touches = ev.originalEvent.touches;
                            var l = touches.length;
                            for (var i = 0; i < l; i++) {
                                x = touches[i].pageX;
                                y = touches[i].pageY;
                            }
                        }else{
                            x = ev.pageX;
                            y = ev.pageY;
                        }

                
                var stroke = Math.random()*2;
                var dl = bg.path().attr({stroke: "#ccc", "stroke-width": stroke, "stroke-linecap": "round"});
                
                clickstate = !clickstate;
                
                if(clickstate){
                    pencilLine = "M"+x+","+y+",S";
                    
                    $(document).on('mousemove touchmove',function(e){
                        e.preventDefault();
                        
                        if(e.type == "touchmove"){
                            var touches = e.originalEvent.touches;
                            var l = touches.length;
                            for (var i = 0; i < l; i++) {
                                x = touches[i].pageX;
                                y = touches[i].pageY;
                            }
                        }else{
                            x = e.pageX;
                            y = e.pageY;
                        }
                         
                            pencilLine += x+","+y+",";
                           
                            dl.attr({path: pencilLine});
                    });
                    
                    
                }else{
                    if(ev.type != "touchstart"){
                    $(document).off('mousemove touchmove');
                    }
                }
               });
               
               $(document).on("dblclick", function(){bg.clear();});
             // } // touchsupport
            }
            }()); // end scribble
            
            
            ( function laughingBoy () { 
                
            
            if($("#boy").length === 0){ return } else {
                
            
            var boy = Raphael("boy", 130,200);
            
            var tail = "M58,111c14.782,26.955,44,16.25,44,16.25c6.25-3.25,8.5,3.75,6.5,5.25s-6.25,5.75-24,5S49,121,47,113.5S53.75,103.25,58,111z";
            var body = "M78.75,46.25C78.75,59.367,65.542,70,49.25,70s-29.5-10.633-29.5-23.75S32.958,22.5,49.25,22.5S78.75,33.133,78.75,46.25z M31.5,91.5c1.5,0-2.879,41.734-3,43.25c-0.377,4.734,10.75,5.75,11.25,1s1.785-13.747,2-16c0.5-5.25,10.5-5.75,11,1.5s0.39,12.754,0.25,15c-0.25,4,11.11,5.243,11.5-1c0.25-4-1.75-42.502,0.331-43.541c0.388-0.194,5.354,3.835,8.919,8.291c3,3.75,9.25-0.25,6.75-5c-1.872-3.556-7.668-11.735-18.855-15.938C78.317,74.322,93.25,61.833,93.25,41c0-27.476-25.454-39.478-44.698-39.499C29.347,0.249,3.14,10.55,1.333,37.976c-1.42,21.558,13.954,36.116,31.137,41.238c-10.682,5.357-15.665,14.142-17.152,17.875c-1.986,4.987,4.65,8.307,7.238,4.262C25.633,96.544,30.822,91.227,31.5,91.5z";
            var bodyLaugh = "M78.75,46.25C78.75,59.367,65.542,70,49.25,70s-29.5-10.633-29.5-23.75S32.958,22.5,49.25,22.5S78.75,33.133,78.75,46.25z M32.47,79.214C23,79.25,11.75,69.5,9.25,67C6.945,64.695-1.25,68.5,4,75c8.115,10.047,27.5,16.5,27.5,16.5c1.5,0-2.879,41.734-3,43.25c-0.377,4.734,10.75,5.75,11.25,1s1.785-13.747,2-16c0.5-5.25,10.5-5.75,11,1.5s0.39,12.754,0.25,15c-0.25,4,11.11,5.243,11.5-1c0.25-4-1.75-42.502,0.331-43.541c0,0,15.27-6.967,26.919-16.459c6.75-5.5-0.25-10.5-3.75-7.75C84.746,70.057,67.5,81,61.645,79.062C78.317,74.322,93.25,61.833,93.25,41c0-27.476-25.454-39.478-44.698-39.499C29.347,0.249,3.14,10.55,1.333,37.976C-0.087,59.534,15.288,74.092,32.47,79.214z";
            
            var boy_set = boy.set();
                boy_set.push(
                boy.path(tail),
                boy.ellipse(29.125,48.375,5.625,7.625),
                boy.ellipse(70.5,48.375,5.625,7.625),
                boy.path(body)
            );
            boy_set.attr({stroke: "#c0e", "stroke-width": 0, "stroke-linecap": "round", fill:"90-#f68ca8-#f06"}); 
				
            var boy_set_laugh = boy.set();
                boy_set_laugh.push(
                boy.path(tail).attr({stroke: "#f06", "stroke-width": 0, "stroke-linecap": "round", fill:"90-#f68ca8-#f06", transform:"s0"}),
                boy.path("M33.5,48.333c-2-0.167-8,2.667-9.167,4.167").attr({stroke: "#f06", "stroke-width": 2, "stroke-linecap": "round", transform:"s0"}),
                boy.path("M74.962,51.683c-1.297-1.531-7.543-3.771-9.429-3.535").attr({stroke: "#f06", "stroke-width": 2, "stroke-linecap": "round", transform:"s0"}),
                boy.path(bodyLaugh).attr({stroke: "#f06", "stroke-width": 0, "stroke-linecap": "round", fill:"90-#f68ca8-#f06", transform:"s0"})
            );
            
            
            var giggle = new Audio();
            
           
                if (document.createElement('audio').canPlayType('audio/mpeg')) {
                    giggle.src= '../sounds/giggle.m4a';
                } else {
                    giggle.src= '../sounds/giggle.ogg';
                }
            
            
               
            
            var giggleState = false;
            
            $("#boy").on("click", function(e){
            	e.stopPropagation();
                giggleState = !giggleState;
                
                if(giggleState){
                        giggle.play();
                        boy_set.transform("s0");
                        boy_set_laugh.transform("s1");
                }else{
                        giggle.pause();
                        boy_set.transform("s1");
                        boy_set_laugh.transform("s0");
                      }
                });
            }
            }()); // end laughingBoy
            
            
            
            
            ( function bubbles () {
            
            var paper = Raphael("circles", 600, 60);
        
            var b = paper.path("[M30,80], [C30,55, 55,47.5, 55,30], [C55,16, 45,5, 30,5], [C16,5, 5,16, 5,30], [C5,47.5,30,55,30,80z]")
            .attr({stroke: "#c0e", "stroke-width": 0, "stroke-linecap": "round", fill:"#f06"}) //fc059c
            .transform("s0");
            

            var tmr; //timer			
            $("#nav li a").on({
                mouseenter : function(e){
                    var leftPos = $(this).position().left,
                        w = $(this).width(),
                        offset = leftPos + w/2 - 30,
                        id = $(this).attr("id"),
                        that = $(this);
                        
                    clearTimeout(tmr);
                    tmr = setTimeout ( function(){			
                        b.transform("t"+offset+",0s0");
                        b.animate({path: "[M30,55], [C44,55, 55,44, 55,30], [C55,16, 44,5, 30,5], [C16,5, 5,16, 5,30], [C5,44,16,55,30,55z]", transform: "t"+offset+",0s1"}, 900, "bounce", 
                        function(){
        						
                            switch(id){
                                case "contact" :
                                    contact.transform("t"+(offset+14.5)+",14.5s1");
                                    //contact.attr({fill:"#888"});
                                    break;
                                case "portfolio" :
                                    portfolio.transform("t"+(offset+14.5)+",18s1");
                                    break;
                                case "info" :
                                    info.transform("t"+(offset+14.5)+",14.5s1");
                                    break;
                                case "services" :
                                    services.transform("t"+(offset+14.5)+",14.5s1");
                                    break;
                                case "sandbox" :
                                    sandbox.transform("t"+(offset+14.5)+",14.5s1");
                                    break;									
                            }
                        });
                        b.touchstart(function(){
                          $("#container").load(that.attr("href"));
                        });
                    }, 100 );
                },
                mouseleave : function(){
                    var leftPos = $(this).position().left,
                        w = $(this).width(),
                        offset = leftPos + w/2 - 30;
                        
                    clearTimeout(tmr); 
                      
                    contact.transform("s0");
                    portfolio.transform("s0");
                    info.transform("s0");
                    services.transform("s0");
                    sandbox.transform("s0");
                    
                    b.animate({path: "[M30,80], [C30,55, 55,47.5, 55,30], [C55,16, 45,5, 30,5], [C16,5, 5,16, 5,30], [C5,47.5,30,55,30,80z]", transform: "t"+offset+",0s0"}, 600, ">"); 
                },
                click : function(){
                    if(touchSupport){return false};
                }
            });	
            
            
            var info = paper.path(icons.lightBulb).attr({fill: "#eee", stroke: "none"}).transform("s0");	
            var services = paper.path(icons.spanner).attr({fill: "#eee", stroke: "none"}).transform("s0");
            var portfolio = paper.path(icons.heart).attr({fill: "#eee", stroke: "none"}).transform("s0");
            var contact = paper.path(icons.envelope).attr({fill: "#eee", stroke: "none"}).transform("s0");	
            var sandbox = paper.path(icons.scull).attr({fill: "#eee", stroke: "none"}).transform("s0");	
            
            
            $("#top li a").each(function(){
                var leftPos = $(this).position().left,
                        w = $(this).width(),
                        offset = leftPos + w/2 - 30,
                        id = $(this).attr("id");
                    
                switch(id){
                                case "contact" :
                                    contact.attr({fill: "#ccc"}).transform("t"+(offset+14.5)+",14.5s1");
                                   
                                    break;
                                case "portfolio" :
                                    portfolio.attr({fill: "#ccc"}).transform("t"+(offset+14.5)+",18s1");
                                   
                                    break;
                                case "info" :
                                    info.attr({fill: "#ccc"}).transform("t"+(offset+14.5)+",14.5s1");
                                    break;
                                case "services" :
                                    services.attr({fill: "#ccc"}).transform("t"+(offset+14.5)+",14.5s1");
                                    break;
                                case "sandbox" :
                                    sandbox.attr({fill: "#ccc"}).transform("t"+(offset+14.5)+",14.5s1");
                                    //sandbox.mouseover(function(){sandbox.attr({fill: "#f06"});});
                                    break;									
                            }
                
            });
            
            
            
         }());	// end bubbles
 