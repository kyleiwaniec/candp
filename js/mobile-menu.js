/**
 * jQuery Plugin to obtain touch gestures from iPhone, iPod Touch and iPad, should also work with Android mobile phones (not tested yet!)
 * Common usage: wipe images (left and right to show the previous or next image)
 * 
 * @author Andreas Waltl, netCU Internetagentur (http://www.netcu.de)
 * @version 1.1.1 (9th December 2010) - fix bug (older IE's had problems)
 * @version 1.1 (1st September 2010) - support wipe up and wipe down
 * @version 1.0 (15th July 2010)
 */
(function($){$.fn.touchwipe=function(settings){var config={min_move_x:20,min_move_y:20,wipeLeft:function(){},wipeRight:function(){},wipeUp:function(){},wipeDown:function(){},preventDefaultEvents:false};if(settings)$.extend(config,settings);this.each(function(){var startX;var startY;var isMoving=false;function cancelTouch(){this.removeEventListener('touchmove',onTouchMove);startX=null;isMoving=false}function onTouchMove(e){if(config.preventDefaultEvents){e.preventDefault()}if(isMoving){var x=e.touches[0].pageX;var y=e.touches[0].pageY;var dx=startX-x;var dy=startY-y;if(Math.abs(dx)>=config.min_move_x){cancelTouch();if(dx>0){config.wipeLeft()}else{config.wipeRight()}}else if(Math.abs(dy)>=config.min_move_y){cancelTouch();if(dy>0){config.wipeDown()}else{config.wipeUp()}}}}function onTouchStart(e){if(e.touches.length==1){startX=e.touches[0].pageX;startY=e.touches[0].pageY;isMoving=true;this.addEventListener('touchmove',onTouchMove,false)}}if('ontouchstart'in document.documentElement){this.addEventListener('touchstart',onTouchStart,false)}});return this}})(jQuery);


/** ------------------------[ MOBILE MENU ]----------------------------------- **
 * 
 * @author Kyle Hamilton, candpgeneration.com
 * @version 1.0.0 (3rd January 2013) - first release
 * 
 * You are free to borrow and steal, but please remember to attribute.
 */  

//var isEmpty = function(obj) {return Object.keys(obj).length === 0;}
var isEmpty = function(obj){var r = 0;for (var p in obj)if(obj.hasOwnProperty( p ))r++;if(r == 0)return true;};
// var section_data = {}, path = '';
var ua = navigator.userAgent.toLowerCase();
var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
                    
var cls = isAndroid ? 'openAndroid' : 'open';
var action = {
                        
                         open : function(){
                                    var args = Array.prototype.slice.call(arguments);
                                    var i = args.length;  
                                    while (i--) {  
                                        args[i].addClass(cls);  
                                    }
                                },
                        close : function(){
                                    var args = Array.prototype.slice.call(arguments);
                                    var i = args.length;  
                                    while (i--) {  
                                        args[i].removeClass(cls);  
                                    }
                                }   
                       }  
var zindex = 1000;

var slidePage = ( function(){
    
                    function getPanel(){
                        var hash = location.hash;
                        $("#inner-content")[ hash != '' ? 'addClass' : 'removeClass' ]( 'open' );
                        $('.sub-panel[data-panel="'+( hash.replace( /^#/, '' ))+'"]').css({'z-index':zindex});
                    }
                    $(window).hashchange(getPanel);
                    $(window).hashchange();
    
                    var mp_lia = $(".mp-li a");
                    mp_lia.on("click", function(){
                        zindex += 1;
                    });
                    
                    $(".sub-panel").touchwipe({
                            wipeRight: function() { 
                                window.history.back();
                            }
                        });
}());




var openSubsection = ( function (id) {
                        zindex += 1;
                        $('.mb_nav_sub[data-subnav="'+id+'"]').css({'z-index':zindex});
                     });
var slideNav = ( function () {
                    
                    var nav_bar = $('.mb_bar'),
                        menu_btn = $("#mb_menu_btn"),
                        search_btn = $('#mb_search_btn');
                    
                    var nav_outer = $('#mb_nav_outer'), // outer wrapper
                        nav_inner = $('#mb_nav_inner'), // inner wrapper
                        nav_main = $('.mb_nav_main'), // sections and classifieds
                        nav_sub = $('.mb_nav_sub'); // sub-sections
                    
                    
                    
                    
                    var search_outer = $('#mb_search_outer');
                    
                    // start the Machine (Moore: states are transitions, NOT end result)
                    var state = 0,
                        statesArray = [[1,2],[3,4,5],[8,0],[1,2],[8,0],[6,7],[3,4,5],[8,0],[3,4,5]]; 
                        // nextState = statesArray[currState][button];
                        // menu button = 0, search button = 1, subsection button = 2
                    
                    nav_bar.on('click', '.mb_btn', function(){
                        doSlide($(this).data('btn'));
                        return false;
                    });
                    
                    nav_main.on('click', '.mb_slide_btn', function(){
                        
                        openSubsection($(this).data("id"));
                        doSlide($(this).data('btn'));
                        return false;
                    });
                    
                    try{ 
                        if(!$.fn.touchwipe){throw 'touchwipe plugin was not loaded'}
                        nav_sub.touchwipe({
                            wipeRight: function() { doSlide(0); }
                        });
                        
//                        nav_main.touchwipe({
//                            wipeDown: function() { doSlide(0); }
//                        });
                        
                        
                    }catch(e){
                        console.log("Error: " + e);
                    }
                    
                    
                    
                    function doSlide(button){
                        state = statesArray[state][button];
                        transition[state]();
                        }
                        
                    var transition = {
                        0 : function(){
                            action.close(search_outer, search_btn);
                            },
                        1 : function(){
                            action.open(nav_outer, menu_btn);
                            //getSections();
                            },
                        2 : function(){
                            action.open(search_outer, search_btn);
                            },
                        3 : function(){
                            action.close(nav_outer, menu_btn);
                            },
                        4 : function(){
                            action.close(nav_outer, menu_btn);
                            action.open(search_outer, search_btn);
                            },
                        5 : function(){
                            action.close(menu_btn);
                            action.open(nav_inner);
                                    // window.scrollTo(0, 106);
                            menu_btn.addClass('mb_back_icon');
                            },
                        6 : function(){
                            action.close(nav_inner);
                            action.open(menu_btn);
                            menu_btn.removeClass('mb_back_icon');
                            },
                        7 : function(){
                            action.close(nav_inner, nav_outer);
                            action.open(search_outer, search_btn);
                            menu_btn.removeClass('mb_back_icon');
                            },
                        8 : function(){
                            action.close(search_outer, search_btn);
                            action.open(nav_outer, menu_btn);
                            //getSections();
                        }
                    }
                    
                    
               })();
  

/* ------------------------[ END MOBILE MENU ]------------------------------- */