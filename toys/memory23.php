<?php

$stylesheet = "card-flip-flex23.css";
$title = "CSS3 - Card Flip Example";
require_once ("sandbox-header.php");
?>


<style>
    .wrapper{
      max-width:1400px !important;
    }
   
</style>
<script type="text/javascript">
    $(function(){
	
        
        // the flipping actions //
        var panel = $('.container');
        var wrapper = $('.wrapper');
        var state = 0;
        var counter = 0;
        
        var w = $(window).width();
        var h = $(window).height();
        
        var ww = wrapper.width();
        var wh = wrapper.height();
        
        
        var panelWid = (w/4 - 50) < 300 ? (w/4 - 50) : 300;
        var panelHei = ((h-150)/3 - 30) < 200 ? ((h-150)/3 - 30) : 200;
        
        var centerHor = w/2 - 100;
        var centerVert = h/2 - 150;
        
        $(window).resize(function(){
            w = $(window).width();
            h = $(window).height();
            panelWid = (w/4 - 50) < 300 ? (w/4 - 50) : 300;
            panelHei = ((h-150)/3 - 30) < 200 ? ((h-150)/3 - 30) : 200;
            centerHor = w/2 - 100;
            centerVert = h/2 - 150;
            // can't use cached the panels ??
            $('.container, .front').css({width  : panelWid, 
                                     height : panelHei});
            $('.done').css({left  : centerHor, 
                            top   : centerVert});                     
        }).trigger('resize');
        
       
        
        panel.live('click', function(e){
            
            var that = $(this);
            if(window.HTMLAudioElement) flip.play();
            that.addClass('flip open');
            // $('.panel').not(this).removeClass('flip');
            state ++;
            //console.log(state);
            
            if(that.find('.back').attr('rel') == $('.open').not(this).find('.back').attr('rel')){
                //console.log("it's a match!");
                setTimeout (function(){
                    $('.open').each(function(){
                        $(this).removeClass('open').animate({opacity: .3});
                        if(window.HTMLAudioElement) btnClick.play();
                        counter++;
                        
                        if(counter == cards.length){
                            $('body').append(done);
                            if(window.HTMLAudioElement) happy.play();
                            }
                    });
                }, 500);
                
                state = 0;
                }
                
            
            });
        

        panel.live('mouseleave', function(){
            
            
            if(state == 2){
                $('.open').each(function(){
                    $(this).removeClass('open flip');
                    state = 0;
                });
            }
        });
        
//         

        
         
         
        $('.back').live('click', function(e){
            e.stopPropagation();
            //console.log("back clicked");
        }); 
        
//        $('.panelLink').live('click', function(e){
//            e.stopPropagation();
//        });
        
        // end flipping actions //
        
        var cards = [];
        
        var cardimg = [ "url(images/memory/image1.jpg)",
                        "url(images/memory/image2.jpg)",
                        "url(images/memory/image3.jpg)",
                        "url(images/memory/image4.jpg)",
                        "url(images/memory/image5.jpg)",
                        "url(images/memory/image6.jpg)"
                    ];
        
        
        cardimg.shuffle();
        
        // card objects //
                 
        
        for(var i = 0; i < cardimg.length; i++){
            var card = $('<div>', {
                'class': 'container',
                css: {
                    width: panelWid, 
                    height: panelHei
                    }
                });
            var card_inner = $('<div>', {
                'class': 'click panel',
                css: {
                    width: panelWid, 
                    height: panelHei
                    }
                }).appendTo(card);

            var front = $('<div />', { 
                'class': 'front',
                css: {} 
            }).appendTo(card_inner);

            var back = $('<div />', { 
                'class': 'back',
                css: {background:cardimg[i]},
                rel: i
            }).appendTo(card_inner);
            
            cards.push(card);
            
            
            var duplicate = card.clone();
            cards.push(duplicate);
            
        }
        // end card objects //
        
        // render cards //
        cards.shuffle();
        for(var i = 0; i < cards.length; i++){
            wrapper.append(cards[i]);
        }
        
         
        // end render cards //
        
        var done = $('<div>', {
            'class' :  'done',
            html    :  "<p>Good on ya!</p>\n\
                        <button id='playagain'>Play Again</button>",
            css     :  {
                        backgroundColor: "white",
                        width: 200,
                        height: 100,
                        top: centerVert,
                        padding: 25,
                        position: "absolute",
                        left: centerHor,
                        textAlign: 'center',
                        border: '1px dashed black',
                        "box-shadow": "10px 10px 20px rgba(0,0,0,0.3)"
                    }
            });
            
            $('#playagain').live('click', function(){
                location.reload();
            })
            
       checkWebKit();
            
        if(window.HTMLAudioElement)   { 
            var happy = new Audio();
            happy.src = "sounds/happykids.wav";

            var btnClick = new Audio();
            btnClick.src = "sounds/CLICK18C.WAV";
            
            var flip = new Audio();
            flip.src = "sounds/flip3.wav";
        }
    });
    
    function getRandomNum(lbound, ubound) {
        return (Math.floor(Math.random() * (ubound - lbound)) + lbound);
    }
    
    Array.prototype.shuffle = function() {
 	var len = this.length;
	var i = len;
	 while (i--) {
	 	var p = parseInt(Math.random()*len);
		var t = this[i];
  	this[i] = this[p];
  	this[p] = t;
 	}
    };
    
    function checkWebKit() {
                var result = /AppleWebKit\/([\d.]+)/.exec(navigator.userAgent);
                if (result) {
                    //return parseFloat(result[1]);
                    //alert("Congratulations! You're using webkit!");
                }else{
                //return null;
                $('.wrapper').prepend("<p style='text-align:center;'>Webkit browsers have more fun - <a href='https://www.google.com/intl/en/chrome/browser/'>Download CHROME</a> - it's good for you!</p>");
                //alert("You should download chrome!");
                }     
            }
    
</script>




<?php

require_once ("sandbox-footer.php");
?>