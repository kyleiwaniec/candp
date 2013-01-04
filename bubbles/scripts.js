var touchSupport = "createTouch" in document;

var icons = {
                lightBulb : "M15.5,2.833c-3.866,0-7,3.134-7,7c0,3.859,3.945,4.937,4.223,9.499h5.553c0.278-4.562,4.224-5.639,4.224-9.499C22.5,5.968,19.366,2.833,15.5,2.833zM15.5,28.166c1.894,0,2.483-1.027,2.667-1.666h-5.334C13.017,27.139,13.606,28.166,15.5,28.166zM12.75,25.498h5.5v-5.164h-5.5V25.498z",
                spanner   : "M26.834,14.693c1.816-2.088,2.181-4.938,1.193-7.334l-3.646,4.252l-3.594-0.699L19.596,7.45l3.637-4.242c-2.502-0.63-5.258,0.13-7.066,2.21c-1.907,2.193-2.219,5.229-1.039,7.693L5.624,24.04c-1.011,1.162-0.888,2.924,0.274,3.935c1.162,1.01,2.924,0.888,3.935-0.274l9.493-10.918C21.939,17.625,24.918,16.896,26.834,14.693z",
                heart     : "M24.132,7.971c-2.203-2.205-5.916-2.098-8.25,0.235L15.5,8.588l-0.382-0.382c-2.334-2.333-6.047-2.44-8.25-0.235c-2.204,2.203-2.098,5.916,0.235,8.249l8.396,8.396l8.396-8.396C26.229,13.887,26.336,10.174,24.132,7.971z",
                scull     : "M25.947,11.14c0-5.174-3.979-9.406-10.613-9.406c-6.633,0-10.282,4.232-10.282,9.406c0,5.174,1.459,4.511,1.459,7.43c0,1.095-1.061,0.564-1.061,2.919c0,2.587,3.615,2.223,4.677,3.283c1.061,1.062,0.961,3.019,0.961,3.019s0.199,0.796,0.564,0.563c0,0,0.232,0.564,0.498,0.232c0,0,0.265,0.563,0.531,0.1c0,0,0.265,0.631,0.696,0.166c0,0,0.431,0.63,0.929,0.133c0,0,0.564,0.53,1.194,0.133c0.63,0.397,1.194-0.133,1.194-0.133c0.497,0.497,0.929-0.133,0.929-0.133c0.432,0.465,0.695-0.166,0.695-0.166c0.268,0.464,0.531-0.1,0.531-0.1c0.266,0.332,0.498-0.232,0.498-0.232c0.365,0.232,0.564-0.563,0.564-0.563s-0.1-1.957,0.961-3.019c1.062-1.061,4.676-0.696,4.676-3.283c0-2.354-1.061-1.824-1.061-2.919C24.488,15.651,25.947,16.314,25.947,11.14zM10.333,20.992c-1.783,0.285-2.59-0.215-2.785-1.492c-0.508-3.328,2.555-3.866,4.079-3.683c0.731,0.088,1.99,0.862,1.99,1.825C13.617,20.229,11.992,20.727,10.333,20.992zM16.461,25.303c-0.331,0-0.862-0.431-0.895-1.227c-0.033,0.796-0.63,1.227-0.961,1.227c-0.332,0-0.83-0.331-0.863-1.127c-0.033-0.796,1.028-4.013,1.792-4.013c0.762,0,1.824,3.217,1.791,4.013S16.794,25.303,16.461,25.303zM23.361,19.5c-0.195,1.277-1.004,1.777-2.787,1.492c-1.658-0.266-3.283-0.763-3.283-3.35c0-0.963,1.258-1.737,1.99-1.825C20.805,15.634,23.869,16.172,23.361,19.5z",
                envelope  : "M4.495,7.593l22.996,0.023c1.1,0.001,1.217,0.446,0.261,0.989l-10.014,5.682c-0.957,0.543-2.521,0.542-3.478-0.002L4.233,8.581C3.277,8.036,3.395,7.592,4.495,7.593z M28.63,10.554c0,0-10.286,5.897-11.021,6.255s-2.415,0.392-3.221,0S3.37,10.554,3.37,10.554C2.891,10.282,2.5,10.51,2.5,11.06v12.773c0,0.55,0.45,1,1,1h25c0.55,0,1-0.45,1-1V11.06C29.5,10.51,29.109,10.282,28.63,10.554z",
                home      : "M16.181,1.182c-0.241-0.242-0.637-0.242-0.879,0L2.677,13.807c-0.242,0.242-0.242,0.638,0,0.879l1.994,1.996c0.242,0.242,0.44,0.72,0.44,1.062v11.737c0,0.342,0.28,0.622,0.623,0.622h5.963c0.342,0,0.622-0.28,0.622-0.622v-7.044c0-0.342,0.28-0.622,0.622-0.622h5.603c0.342,0,0.622,0.28,0.622,0.622v7.044c0,0.342,0.28,0.622,0.623,0.622h5.963c0.342,0,0.622-0.28,0.622-0.622V17.744c0-0.342,0.198-0.82,0.44-1.062l1.996-1.996c0.242-0.242,0.242-0.638,0-0.879L16.181,1.182z",
                dropdown  : "M85.222,93.744c-5.576-6.133-79.647-6.133-85.222,0C5.575,87.611,5.575,6.133,0,0c5.575,6.133,79.646,6.133,85.222,0C79.646,6.133,79.646,87.611,85.222,93.744z"
            };
            
            
            
            
            
            ( function scribble () {
            
//            if(touchSupport){ return } else {
            if($("#background").length === 0){ return } else {
            var w = $(window).width()-10, // -10 accommodates scrollbars
                h = $(document).height()-10,
            
                bg = Raphael("background", w, h),
            
                pencilLine = "",
                clickstate = false,
                x,y; x=y=0;
                
            $(document).on('click touchstart', function(ev){
                //ev.stopPropagation();

                x = getPosition(ev)[0];
                y = getPosition(ev)[1];
                
                var stroke = Math.random()*2;
                var dl = bg.path().attr({stroke: "#ccc", "stroke-width": stroke, "stroke-linecap": "round"});
                
                clickstate = !clickstate;
                
                if(clickstate){
                    pencilLine = "M"+x+","+y+",S";
                    
                    $(document).on('mousemove touchmove', function(e){
                        e.preventDefault(); 
                        
                        x = getPosition(e)[0];
                        y = getPosition(e)[1];
                        
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
                
            
            var boy = Raphael("boy", 130,150);
            
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
            //giggle.src= '../sounds/giggle.m4a';
           
                if (document.createElement('audio').canPlayType('audio/mpeg')) {
                    giggle.src= '../sounds/giggle.mp3';
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
            
            
            
            // bubbles and icons
            ( function bubbles () {
            
            var paper = Raphael("circles", 600, 60);
        
            var b = paper.path("[M30,80], [C30,55, 55,47.5, 55,30], [C55,16, 45,5, 30,5], [C16,5, 5,16, 5,30], [C5,47.5,30,55,30,80z]")
                   .attr({stroke: "#c0e", "stroke-width": 0, "stroke-linecap": "round", fill:"#f06"}) //fc059c
                   .transform("s0");
                    
            var buttonId = {
                "about"     : paper.path(icons.lightBulb).attr({fill: "#eee", stroke: "none"}).transform("s0"),	
                "services"  : paper.path(icons.spanner).attr({fill: "#eee", stroke: "none"}).transform("s0"),
                "portfolio" : paper.path(icons.heart).attr({fill: "#eee", stroke: "none"}).transform("s0"),
                "contact"   : paper.path(icons.envelope).attr({fill: "#eee", stroke: "none"}).transform("s0"),	
                "sandbox"   : paper.path(icons.scull).attr({fill: "#eee", stroke: "none"}).transform("s0")	
            }

            var tmr; 		
            $(".home #nav li a").on({
                  mouseenter : function(e){
                    
                    var that = $(this),
                     leftPos = that.position().left,
                           w = that.width(),
                      offset = leftPos + w/2 - 30,
                          id = that.attr("id");
                        
                    clearTimeout(tmr);
                    tmr = setTimeout ( function(){			
                        b.transform("t"+offset+",0s0");
                        b.animate({path: "[M30,55], [C44,55, 55,44, 55,30], [C55,16, 44,5, 30,5], [C16,5, 5,16, 5,30], [C5,44,16,55,30,55z]", transform: "t"+offset+",0s1"}, 900, "bounce", 
                        function(){
                            buttonId[id].transform("t"+(offset+14.5)+",14.5s1");			
                        });
                        b.touchstart(function(){
//                          $("#outer-wrapper").load(that.attr("href")+' #outer-wrapper', function(){
//                              $("body").attr("class", id);
//                              $("#background").remove();
//                          });

                        });
                    }, 100 );
                },
                mouseleave : function(){
                    var leftPos = $(this).position().left,
                        w = $(this).width(),
                        offset = leftPos + w/2 - 30;
                        
                    clearTimeout(tmr); 
                    
                    for(button in buttonId){
                        buttonId[button].transform("s0");
                        }
                    
                    b.animate({path: "[M30,80], [C30,55, 55,47.5, 55,30], [C55,16, 45,5, 30,5], [C16,5, 5,16, 5,30], [C5,47.5,30,55,30,80z]", transform: "t"+offset+",0s0"}, 600, ">"); 
                },
                click : function(){
                    $(this).toggleClass("disabled");
                    $(this).parent('li').siblings().children('a').removeClass("disabled");
                    if(touchSupport){
                       if($(this).hasClass("disabled")){
                            return false
                        }else{
                          //  animate back
                          $(this).trigger("mouseleave");
                        }
                     };
                     
                }
            });	
            
            // draw the icons in the nav bar, and toggle fill color on mouse hover
            $("#top li a").each(function(){
                
                   var that = $(this),
                    leftPos = that.position().left,
                          w = that.width(),
                     offset = leftPos + w/2 - 30,
                         id = that.attr("id");
                    
                    buttonId[id].attr({fill: "#ccc"}).transform("t"+(offset+14.5)+",14.5s1");
                    
                            that.on({
                                mouseenter : function(){
                                    buttonId[id].attr({fill: "#f06"});
                                    },
                                mouseleave : function(){
                                    buttonId[id].attr({fill: "#ccc"});
                                    }
                            })
                });
         }());	// end bubbles
         
        ( function ui_elements() {
          
          var button_icons = {}
          
                 if ($("#homebutton").length === 0){ ; } else {
                    var homebutton = Raphael("homebutton", 30,50);
                        button_icons.homebutton = homebutton.path(icons.home).attr({fill: "#f06", stroke: "none"}).transform("t0,5s.8");
                    }
                 if ($("#mb_about_icon").length === 0){ ; } else {  
                    var mb_about_icon = Raphael("mb_about_icon", 30,30);
                        button_icons.mb_about_icon = mb_about_icon.path(icons.lightBulb).attr({fill: "#ccc", stroke: "none"}).transform("s.8");
                 }
                 if ($("#mb_services_icon").length === 0){ ; } else {  
                    var mb_services_icon = Raphael("mb_services_icon", 30,30);
                        button_icons.mb_services_icon = mb_services_icon.path(icons.spanner).attr({fill: "#ccc", stroke: "none"}).transform("s.8");
                 }
                 if ($("#mb_contact_icon").length === 0){ ; } else {  
                    var mb_contact_icon = Raphael("mb_contact_icon", 30,30);
                        button_icons.mb_contact_icon = mb_contact_icon.path(icons.envelope).attr({fill: "#ccc", stroke: "none"}).transform("s.8");
                 }
                 if ($("#mb_portfolio_icon").length === 0){ ; } else {  
                    var mb_portfolio_icon = Raphael("mb_portfolio_icon", 30,30);
                        button_icons.mb_portfolio_icon = mb_portfolio_icon.path(icons.heart).attr({fill: "#ccc", stroke: "none"}).transform("s.8");
                 }
                 if ($("#mb_sandbox_icon").length === 0){ ; } else {  
                    var mb_sandbox_icon = Raphael("mb_sandbox_icon", 30,30);
                        button_icons.mb_sandbox_icon = mb_sandbox_icon.path(icons.scull).attr({fill: "#ccc", stroke: "none"}).transform("s.8");
                 }
//                 if ($("#dropdown").length === 0){ ; } else {  
//                    var dropdown = Raphael("dropdown", 86,94);
//                        button_icons.dropdown = dropdown.path(icons.dropdown).attr({fill: "#f06", stroke: "none"}).transform("s1");
//                 }
//                 
//                 $("#nav #portfolio").on({
//                     mouseenter : function(){
//                         
//                         //button_icons.dropdown.transform("s1");
//                     },
//                     mouseleave : function(){
//                         
//                        // button_icons.dropdown.transform("s0");
//                     }
//                 })
                 
                 $(".mb_nav_main li").on({
                     mouseenter : function(){
                         var icon_id = $(this).children(".mb_icon").attr("id");
                         button_icons[icon_id].attr({fill: "#f06"});
                     },
                     mouseleave : function(){
                         var icon_id = $(this).children(".mb_icon").attr("id");
                         button_icons[icon_id].attr({fill: "#ccc"});
                     }
                 })
                 
            }());
            

     
 //   $("#page-title").text($("title").text());  


 
 // helper functions:
 function getPosition(event){
                var x, y, pos = [];
                //if(touchSupport){
                    if(event.type == "touchstart" || event.type == "touchmove"){
                            var touches = event.originalEvent.touches;
                            var l = touches.length;
                            for (var i = 0; i < l; i++) {
                                x = touches[i].pageX;
                                y = touches[i].pageY;
                            }
                        }else{
                            x = event.pageX;
                            y = event.pageY;
                        }
                        pos = [x,y];
                        return pos;
            }
            
//setTimeout(function(){
//          window.scrollTo(0, 1);
//        }, 100);
//        
//Raphael(function () {
//    var img = document.getElementById("photo");
//    img.style.display = "none";
//    var r = Raphael("holder", 600, 540);
//    
//    r.image(img.src, 140, 140, 320, 240);
//    r.image(img.src, 140, 380, 320, 240).attr({
//        transform: "s1-1",
//        opacity: .5
//    });
//    r.rect(0, 380, 600, 160).attr({
//        fill: "90-#333-#333",
//        stroke: "none",
//        opacity: .5
//    });
//});


    


  
