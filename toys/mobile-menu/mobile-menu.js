/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 * http://benalman.com/projects/jquery-throttle-debounce-plugin/
 *
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function(b,c){var $=b.jQuery||b.Cowboy||(b.Cowboy={}),a;$.throttle=a=function(e,f,j,i){var h,d=0;if(typeof f!=="boolean"){i=j;j=f;f=c}function g(){var o=this,m=+new Date()-d,n=arguments;function l(){d=+new Date();j.apply(o,n)}function k(){h=c}if(i&&!h){l()}h&&clearTimeout(h);if(i===c&&m>e){l()}else{if(f!==true){h=setTimeout(i?k:l,i===c?e-m:e)}}}if($.guid){g.guid=j.guid=j.guid||$.guid++}return g};$.debounce=function(d,e,f){return f===c?a(d,e,false):a(d,f,e!==false)}})(this);


/**
 * jQuery Plugin to obtain touch gestures from iPhone, iPod Touch and iPad, should also work with Android mobile phones (not tested yet!)
 * Common usage: wipe images (left and right to show the previous or next image)
 *
 * @author Andreas Waltl, netCU Internetagentur (http://www.netcu.de)
 * @version 1.1.1 (9th December 2010) - fix bug (older IE's had problems)
 * @version 1.1 (1st September 2010) - support wipe up and wipe down
 * @version 1.0 (15th July 2010)
 */
(function($){$.fn.touchwipe=function(settings){var config={min_move_x:20,min_move_y:20,wipeLeft:function(){},wipeRight:function(){},wipeUp:function(){},wipeDown:function(){},preventDefaultEvents:true};if(settings)$.extend(config,settings);this.each(function(){var startX;var startY;var isMoving=false;function cancelTouch(){this.removeEventListener('touchmove',onTouchMove);startX=null;isMoving=false}function onTouchMove(e){if(config.preventDefaultEvents){e.preventDefault()}if(isMoving){var x=e.touches[0].pageX;var y=e.touches[0].pageY;var dx=startX-x;var dy=startY-y;if(Math.abs(dx)>=config.min_move_x){cancelTouch();if(dx>0){config.wipeLeft()}else{config.wipeRight()}}else if(Math.abs(dy)>=config.min_move_y){cancelTouch();if(dy>0){config.wipeDown()}else{config.wipeUp()}}}}function onTouchStart(e){if(e.touches.length==1){startX=e.touches[0].pageX;startY=e.touches[0].pageY;isMoving=true;this.addEventListener('touchmove',onTouchMove,false)}}if('ontouchstart'in document.documentElement){this.addEventListener('touchstart',onTouchStart,false)}});return this}})(jQuery);

/* ------------------------[ MOBILE MENU ]----------------------------------- */

  // var isEmpty = function(obj) {return Object.keys(obj).length === 0;} // ES5 only :(


var isEmpty = function(obj){var r = 0;for (var p in obj)if(obj.hasOwnProperty( p ))r++;if(r == 0)return true;};
  var section_data = {}, path = '';



  var getSections = (function(){

    function writeSections(){
         var section_markup = '',
             classified_markup = '',
             sectionObj = section_data.section,
             classifiedObj = section_data.classifieds;

         for (var sec in sectionObj){
             section_markup += '<li class="bm_sli">'+
                               '<a class="bm_slia" href="'+ sectionObj[sec].link +'">'+ sectionObj[sec].title +'<\/a>';
             if(sectionObj[sec].subsection){
             section_markup += '<span class="bm_nav_btn_btn" id="'+sec+'" data-btn="2"><\/span>';
                               }
             section_markup += '<\/li>';

         }
         $(".adv_bm_sec_nav").html(section_markup);

         for (var clas in classifiedObj){
             classified_markup += '<li class="bm_csli"><a class="bm_cslia" href="'+classifiedObj[clas].link+'">'+classifiedObj[clas].title+'<\/a>';

             if(classifiedObj[clas].subsection){
             classified_markup += '<span class="bm_nav_btn_btn" id="'+clas+'" data-btn="2"><\/span>';
                               }
             classified_markup += '<\/li>';
         }
         $(".adv_bm_class_nav").html(classified_markup);

     };


     if(!isEmpty(section_data)){
            writeSections();
        }else{
                        $.ajax({
                                url: path,
				dataType: 'jsonp',
				jsonp: false,
				jsonpCallback: 'mobileMenu',
				beforeSend: function(){$(".adv_bm_sec_nav").html("<li class='sections-loading'>Loading...</li>");},
                                error: function(jqXHR, exception) {
                                    if (jqXHR.status === 0) {
                                        console.log('Not connect.\n Verify Network.');
                                    } else if (jqXHR.status == 404) {
                                        console.log('Requested page not found. [404]');
                                    } else if (jqXHR.status == 500) {
                                        console.log('Internal Server Error [500].');
                                    } else if (exception === 'parsererror') {
                                        console.log('Requested JSON parse failed.');
                                    } else if (exception === 'timeout') {
                                        console.log('Time out error.');
                                    } else if (exception === 'abort') {
                                        console.log('Ajax request aborted.');
                                    } else {
                                        console.log('Uncaught Error.\n' + jqXHR.responseText);
                                    }
                                },
				success: function(data){
                                        section_data = data;
					writeSections();
				}
                            });
                        }
 });

var getSubsections = (function(id){

                        var sub_section_markup = '';

                        if(section_data.section[id]){
                            var sub_section = section_data.section[id].subsection;
                        }else{
                            var sub_section = section_data.classifieds[id].subsection;
                        };


                        for(var i = 0, l = sub_section.length; i < l; i++){
                        var objID =  sub_section[i].objectID ? 'onclick="s.objectID=\''+sub_section[i].objectID+'\';"' : '';
                        var parity = i%2==0 ? 'even' : 'odd';
                            sub_section_markup += '<li class="bm_ssli '+parity+'"><a  class="bm_sslia" href="' + sub_section[i].link + '" '+objID+'>' + sub_section[i].title + '</a></li>';
                        }
                        $(".bm_ssul").html(sub_section_markup);
             });

$(function(){


            var nav_btnNav = (function(){

                    var mobile_menu =   $("#menu_wrapper"),
                        menu_btn =      $("#menu_button"),
                        nav_outer =     $('#nav_outer'), 
                        nav_inner =     $('#nav_inner'), 
                        nav_main =      $('.front'),
                        nav_sub =       $('.back'),


                        search_outer =  $('#search_outer'),
                        search_btn =    $('#search_button'),

                        extra_outer =   $('#extra_outer'),
                        extra_btn =     $("#extra_button");

                    // start the Machine (Moore: states are transitions, NOT end result)
                    var state = 0,
                        statesArray = [                                                                  // btn0:menu                           btn1:search                                 btn2:section item       btn3:extra
                                        [1,2,null,9],       // currentState 0  ( everything is closed       btn0 -> open nav                    btn1 -> open search                         btn2 -> null            btn3 -> open extra )
                                        [3,4,5,12],         // currentState 1  ( nav is open                btn0 -> close nav                   btn1 -> close nav, open search              btn2 -> open subnav     btn3 -> open extra, close nav )
                                        [8,0,null,13],      // currentState 2  ( search is open             btn0 -> open nav and close search   btn1 -> close search                        btn2 -> null            btn3 -> open extra, close search )
                                        [1,2,null,9],       // currentState 3  ( everything is closed       btn0 -> open nav                    btn1 -> open search                         btn2 -> null            btn3 -> open extra )
                                        [8,0,null,13],      // currentState 4  ( search is open             btn0 -> open nav and close search   btn1 -> close search                        btn2 -> null            btn3 -> open extra, close search )
                                        [6,7,null,15],      // currentState 5  ( subnav is open             btn0 -> close subnav                btn1 -> close nav,close subnav,open search  btn2 -> null            btn3 -> open extra, close nav,close subnav )
                                        [3,4,5,12],         // currentState 6  ( nav is open                btn0 -> close nav                   btn1 -> close nav, open search              btn2 -> open subnav     btn3 -> open extra, close nav )
                                        [8,0,null,13],      // currentState 7  ( search is open             btn0 -> open nav and close search   btn1 -> close search                        btn2 -> null            btn3 -> open extra, close search )
                                        [3,4,5,12],         // currentState 8  ( nav is open                btn0 -> close nav                   btn1 -> close nav, open search              btn2 -> open subnav     btn3 -> open extra, close nav )
                                        [10,11,null,14],    // currentState 9  ( extra is open              btn0 -> open nav and close extra    btn1 -> open search, close extra            btn2 -> null            btn3 -> close extra )
                                        [3,4,5,12],         // currentState 10 ( nav is open                btn0 -> close nav                   btn1 -> close nav, open search              btn2 -> open subnav     btn3 -> close nav, open extra )
                                        [8,0,null,13],      // currentState 11 ( search is open             btn0 -> open nav and close search   btn1 -> close search                        btn2 -> null            btn3 -> open extra, close search )
                                        [10,11,null,14],    // currentState 12 ( extra is open              btn0 -> open nav and close extra    btn1 -> open search, close extra            btn2 -> null            btn3 -> close extra )
                                        [10,11,null,14],    // currentState 13 ( extra is open              btn0 -> open nav and close extra    btn1 -> open search, close extra            btn2 -> null            btn3 -> close extra )
                                        [1,2,null,9],       // currentState 14 ( everything is closed       btn0 -> open nav                    btn1 -> open search                         btn2 -> null            btn3 -> open extra )
                                        [10,11,null,14]     // currentState 15 ( extra is open              btn0 -> open nav and close extra    btn1 -> open search, close extra            btn2 -> null            btn3 -> close extra )
                                     ];
                        // nextState = statesArray[currState][button];
                        // menu button = 0, search button = 1, subsection button = 2, extra button = 3

                    $('.btn', mobile_menu).on('click', function(){
                        doSlide($(this).data('btn'));
                        return false;
                    });

                    // For links which do no go anywhere, trigger opening the subsection:
                    $("a", nav_inner).each(function(){
                        var that = $(this);
                        if(that.attr("href")==""){
                            that.on("click", function(e){
                                e.preventDefault();
                                that.next("span").trigger("click");
                            });
                        };
                    });


                    $(".nav_btn", nav_inner).on('click', function(){
                       // try{getSubsections(this.id);}catch(e){}
                        doSlide($(this).data('btn'));

                        return false;
                    });
                    try{
                        if(!$.fn.touchwipe){throw 'touchwipe plugin was not loaded'}
                        nav_sub.touchwipe({
                            wipeRight: function() { doSlide(0); }
                        });
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
                            menu_btn.addClass('back_icon');
                            },
                        6 : function(){
                            action.close(nav_inner);
                            action.open(menu_btn);
                            menu_btn.removeClass('back_icon');
                            },
                        7 : function(){
                            action.close(nav_inner, nav_outer);
                            action.open(search_outer, search_btn);
                            menu_btn.removeClass('back_icon');
                            },
                        8 : function(){
                            action.close(search_outer, search_btn);
                            action.open(nav_outer, menu_btn);
                            //getSections();
                            },
                        9 : function(){
                            action.open(extra_outer, extra_btn);
                            },
                        10 : function(){
                             action.close(extra_outer, extra_btn);
                             action.open(nav_outer, menu_btn);
                             //getSections();
                             },
                        11 : function(){
                             action.close(extra_outer, extra_btn);
                             action.open(search_outer, search_btn);
                             },
                        12 : function(){
                             action.close(nav_outer, menu_btn);
                             action.open(extra_outer, extra_btn);
                             },
                        13 : function(){
                             action.close(search_outer, search_btn);
                             action.open(extra_outer, extra_btn);
                             },
                        14 : function(){
                             action.close(extra_outer, extra_btn);
                             },
                        15 : function(){
                             action.close(nav_outer, nav_inner);
                             menu_btn.removeClass('back_icon');
                             action.open(extra_outer, extra_btn);
                        }
                    }
                    var ua = navigator.userAgent.toLowerCase();
                    var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

                    var cls = isAndroid ? 'openAndroid' : 'open';
                    var action = {

                         open : function(){
                                    var args = Array.prototype.slice.call(arguments);
                                    var i = args.length;
                                    while (i--) { args[i].addClass(cls); }
                                },
                        close : function(){
                                    var args = Array.prototype.slice.call(arguments);
                                    var i = args.length;
                                    while (i--) { args[i].removeClass(cls); }
                                }
                       }
               })();
            });


  /* ------------------------[ END MOBILE MENU ]------------------------------- */







