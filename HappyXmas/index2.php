<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Rudolf Shooter!</title>

        <meta name="author" content="Kyle Hamilton">
        <link rel="stylesheet" media="screen" href="christmaslights.css" />
        <script type="text/javascript" src="soundmanager2-nodebug-jsmin.js"></script>
        <script type="text/javascript" src="http://yui.yahooapis.com/combo?2.6.0/build/yahoo-dom-event/yahoo-dom-event.js&2.6.0/build/animation/animation-min.js"></script>
        <script type="text/javascript" src="christmaslights.js"></script>
        <script type="text/javascript">
            var urlBase = './';
            soundManager.url = './';
        </script>

        <script src="snowstorm.js"></script>
        <!-- Mobile -->
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0;" /> 
        <meta name="apple-mobile-web-app-capable" content="yes" /> 
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 

        <link rel="stylesheet" href="aki-web-font/stylesheet.css"/>
        <style>
            #lights{z-index:110;}
            *{
                -webkit-user-select : none;
                -moz-user-select : none;
                user-select : none;
            }
            a img{border:0; outline:none;}
            body, html{
                overflow:hidden;
                margin:0;
                padding:0;
                background:url(images/background.jpg) 0 110px repeat-x;
            }
            #ie{display:none;}
            #wrapper, #field{position:relative;}

            #scoreBoard, #santa, #overlay, #shooter{position:absolute;}

            #scoreBoard{height:110px; width:100%; background:url(images/woodPaneling.jpg) 0 0 repeat-x; z-index:100; border-bottom:3px solid black;}


            #field{top:110px; text-align: center;  padding-top:10px;}
            p{font-family: 'AckiPreschoolRegular'; font-size:150%; margin-top:0; color:white; font-weight:bold;}
            .goagain{color:red; cursor:pointer;}

            #overlay, #shooter{
                width:100px;
                height:200px;
                z-index:90;
                bottom:0;
            }

            #overlay{
                z-index:120;
            }



            .bullet{
                width:6px;
                height:6px;
                border-radius:3px;
                background-color:red;
                position:absolute;
                display:none;
            }
            .deerheads{
                background:url(images/deerhead.png) 0 0 repeat-x;
                width:0;
                height:100px;
            }

        </style>
        <!--[if IE ]>
   <style>
   #ie{display:block;}
   #wrapper{display:none;}
        body, html{text-align:center;}
        p{color:black; margin-top:20px;}
   </style>
   <![endif]-->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script>
            jQuery.noConflict();
            (function($) { 
              $(function() {
   
                
              
                // audio sniffing:
                var myAudio = document.createElement('audio'); 
    
                if (myAudio.canPlayType) {

                    // Currently canPlayType(type) returns: "", "maybe" or "probably" 

                    var canPlayMp3 = !!myAudio.canPlayType && "" != myAudio.canPlayType('audio/mpeg');
                    var canPlayOgg = !!myAudio.canPlayType && "" != myAudio.canPlayType('audio/ogg; codecs="vorbis"');
                    //var canPlayMp4 = !!myAudio.canPlayType && "" != myAudio.canPlayType('audio/mp4');
                }
                
                var audio_ext;
                
                if(canPlayMp3){
                    audio_ext = "mp3";
                }
                
                if(canPlayOgg){
                    audio_ext = "ogg";
                }
                
                //                if(canPlayMp4){
                //                    audio_ext = "iphone.mp4";
                //                }
                
                // end audio sniffing
                
                
                
                
                
                var w = $(window).width();
                var h = $(window).height();
                
                            
                var body = $("#body");
                var wrapper = $("#wrapper");
                var shooter = $("#shooter");
                var rifle = $("#rifle");
                var overlay = $("#overlay");
                var field = $("#field");
                var santa = $("#santa");
                var scoreBoard = $("#scoreBoard");
                
                var wid = 0;
                var deerhead = $(".deerheads");
                
                
        
                body.css({height:h});
                wrapper.css({height:h});
                field.css({height:h-320});
                
                $(".goagain").live("click touchstart", function(){
                    
                    location.reload(); 
                });
                
                $(window).resize(function(){ // a more efficient way of writing this?
                    
                    w = $(window).width();
                    h = $(window).height();
                    
                    body.css({height:h});
                    wrapper.css({height:h});
                    field.css({height:h-320});
                                       
                });
                
                var jingle = new Audio("sounds/369126_SleighBells."+audio_ext);
                //jingle.src = "sounds/369126_SleighBells."+audio_ext;
                
                $(window).load(function(){
                   
                    jingle.play(); 
                    jingle.loop = true;
                });
                
                
                var shotgun = new Audio("sounds/cocshoot."+audio_ext);
                //shotgun.src = "sounds/cocshoot."+audio_ext;
                
                var deer = new Audio("sounds/Horsescream3."+audio_ext);
                //deer.src = "sounds/Horsescream3."+audio_ext;
                
                
                var santaInt = setInterval(moveSanta, 30);
          
                var xposSanta = 0;
                
                function moveSanta(){
          
                    santa.css({
                        left:xposSanta
                    });
                    if(xposSanta>w){
                        xposSanta=-200;
                    }else{
                        xposSanta+=5;
                    }
                   
                };
                
                if (typeof Touch == "object"){
          
                    document.ontouchstart = function(e){
                        e.preventDefault();
                        var touch = e.touches[0];

                    }
                    document.ontouchmove = function(e){

                        e.preventDefault();
                        var touch = e.touches[0];

                        shooter.css({left:touch.pageX-50});
                        overlay.css({left:touch.pageX-50});
                    }
                    document.ontouchend = function(){

                    }
                }else{
                
                    var down = false;
                    overlay.bind("mousedown", function(e){
                        down = true;
                        
                    });
        
                    $(document).bind("mousemove", function(e){
                        if (down){
                            shooter.css({left:e.pageX-50});
                            overlay.css({left:e.pageX-50});
                        }
                    }).bind("mouseup", function(e){
                        down = false;
                    });
        
                };
                
                overlay.bind("click touchstart", function(e){
                    // make it shoot
                   
                    var bullet = $("<div class='bullet'/>");
                    bullet.appendTo(field);
                    
                    
                    try
                    {
                        if(shotgun != undefined)
                        {
                            shotgun.pause();
                        }
                        shotgun = new Audio("sounds/cocshoot."+audio_ext);
                        shotgun.play();
                    }
                    catch(v)
                    {
                        //alert(v.message);
                    }
                    
                    
                    
                    var bulletInt = setInterval(moveBullet, 30);
                    var ypos = 0; 
                    var xpos = $(this).offset().left;
                    
                    
                    function moveBullet(){

                        bullet.css({
                            left:xpos,
                            bottom:ypos,
                            display:"block"
                        });
                        
                        var h = field.height() - 70;
                        var rudolfPos = santa.position().left + 150;
                        var rangeLeft = rudolfPos - 30;
                        var rangeRight = rudolfPos + 30;
                        
                        //alert(rudolfPos);
                        
                        if(ypos<h || xpos<=rangeLeft || xpos>=rangeRight){
                            ypos += 30;
                            
                        }else if(ypos>(h+60)){
                            bullet.detach();
                            
                        }else{
                            //clearInterval(santaInt);
                            //clearInterval(bulletInt);
                             
                            xposSanta=-200;
                            
                            bullet.detach();
                            deer.play();
                            
                            wid += 91;
                            deerhead.css({width:wid});
                           
                            if(wid>=w){
                                clearInterval(santaInt);
                                clearInterval(bulletInt); 
                                overlay.unbind();
                                santa.detach();
                              
                                field.html("<p>CONGRATULATIONS! <br/>YOU STOPPED CHRISTMAS FROM COMING!</p><p class='goagain'>You wanna go again?</p>")
                            }
                        }
                        
                        
                    };
        
                });
                
                
            });
            })(jQuery);
        </script>

    </head>
    <body>
        <div id="ie"><p>Seriously? IE?<br> 
                Get a real browser:<br/>
                <a href="https://www.google.com/chrome"><img src="images/chr.jpg" title="recommended" alt="Download Chrome"/></a><a href="http://www.mozilla.org/en-US/firefox/new/"><img src="images/ff.jpg" title="Firefox" alt="Download Firefox"/></a>
            </p></div>
<!--        <div id="loading">
            <h1>Christmas Light Smashfest 2008: Prototype</h1>
            <h2>Rendering...</h2>
        </div>-->

        <div id="lights">
            <!-- lights go here -->
        </div>
        <div id="wrapper">


            <div id="scoreBoard"> <!-- as you shoot deer or santa, heads will be appended here -->
                <div class='deerheads'></div>
            </div>
            <div id="field">
                <img src="images/santa.png" alt="" id="santa"/>

            </div> 
            <div id="overlay"></div>
            <div id="shooter">
                <img src="images/rifle.png" alt="" id="rifle"/>
            </div>
        </div><!-- !#wrapper -->
    </body>
</html>