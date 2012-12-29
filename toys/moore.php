
<?php

$stylesheet = "Mobile Menu Moore Machine";
$title = "CSS3 - Card Flip Example";
require_once ("sandbox-header.php");
?>
  <link href="adv.css" rel="stylesheet">

  <link href="media_queries.css" rel="stylesheet">
  <link href="mobile-toprail-5.css" rel="stylesheet">
  <script src="jquery.touchwipe.1.1.1.js"></script>

<script type="text/javascript">
    $(function(){   
        
        $('.bm_nav_sub').touchwipe({
            wipeLeft: function() { doSlide(0); },
            wipeRight: function() { alert("right"); },
            wipeUp: function() { alert("up"); },
            wipeDown: function() { alert("down"); },
            min_move_x: 20,
            min_move_y: 20,
            preventDefaultEvents: true
        });
        
        
        
        
        
               var getSubsections = (function(id){
                $.ajax({
				url: 'sections.json',
				dataType: 'jsonp',
				jsonp: false,
				jsonpCallback: 'mobileMenu',
				beforeSend: function(){},
                                
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
                                        
					var subsections_markup = '';
					
                                        var that = data.section[id].subsection;
                                        
                                        for(var i = 0, l = that.length; i < l; i++){
                                            
                                            var objID =  that[i].objectID ? 'onclick="s.objectID=\''+that[i].objectID+'\';"' : '';
                                            
                                            if(i%2==0){
                                               subsections_markup += '<li class="bm_ssli even"><a  class="bm_sslia" href="' + that[i].link + '" '+objID+'>' + that[i].title + '</a></li>';
                                            }else{
                                               subsections_markup += '<li class="bm_ssli odd"><a  class="bm_sslia" href="' + that[i].link + '" '+objID+'>' + that[i].title + '</a></li>';
                                            }
                                            
                                        }
                                        $(".bm_ssul").html(subsections_markup);
					}
			});

                });
            
                
                var SlideNav = (function(){
                    

        
                    // cache the elements
                    var nav_bar = $('.adv_bm_bar');
                        var menu_btn = $("#bm_menu_btn");
                        var search_btn = $('#bm_search_btn');
                    
                    
                    var nav_outer = $('#adv_bm_nav_outer'); // outer wrapper
                        var nav_inner = $('#adv_bm_nav_inner'); // inner wrapper
                            var nav_main = $('.bm_nav_main'); // sections and classifieds
                            var nav_sub = $('.bm_nav_sub'); // sub-sections
                    
                    
                    var search_outer = $('#adv_bm_search_outer');
                    
                    
                    // start the Machine (states are transitions, NOT end result)
                    var state = 0;
                    var statesArray = [[1,2],[3,4,5],[8,0],[1,2],[8,0],[6,7],[3,4,5],[8,0],[3,4,5]]; 
                    // nextState = statesArray[currState][button];
                    // menu button = 0, search button = 1, subsection button = 2
                    
                    nav_bar.on('click', '.bm_btn', function(){
                        doSlide($(this).data('btn'));
                    });
                    nav_main.on('click', '.bm_slide_btn', function(){
                        // get ajax for this.id
                        getSubsections(this.id);
                        
                        
                        doSlide($(this).data('btn'));
                    });
                    
                    
                    
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
                                     window.scrollTo(0, 0);
                            menu_btn.addClass('bm_back_icon');
                            },
                        6 : function(){
                            action.close(nav_inner);
                            action.open(menu_btn);
                            menu_btn.removeClass('bm_back_icon');
                            },
                        7 : function(){
                            action.close(nav_inner, nav_outer);
                            action.open(search_outer, search_btn);
                            menu_btn.removeClass('bm_back_icon');
                            },
                        8 : function(){
                            action.close(search_outer, search_btn);
                            action.open(nav_outer, menu_btn);
                        }
                    }
                    
                    
                    var action = {
                        open : function(){
                                    var args = Array.prototype.slice.call(arguments);
                                    var i = args.length;  
                                    while (i--) {  
                                        args[i].addClass('open');  
                                    }
                                },
                        close : function(){
                                    var args = Array.prototype.slice.call(arguments);
                                    var i = args.length;  
                                    while (i--) {  
                                        args[i].removeClass('open');  
                                    }
                                }   
                       }
               })();
            });
</script>

<!-- http://www-dev.nj.com/fed/khamilton/NJO/index-mobile-toprail5.html -->
<pre id="pre">

    ---------------------------------------------------------------
    |                                                              |
    |    LEAN MEAN STATE MACHINE                                   |
    |    "LOOK MA! - NO CONDITIONALS!"                             |
    |                                                              |
    | A menu system built using a Moore State Machine, for mobile. |
    | Responsive - reduce the width of your browser to view.       |
    | (webkit of course - don't waste your time with IE)           |                               |
    |                                                              |
    ---------------------------------------------------------------

var SlideNav = (function(){
                    
                    // a little help from jquery for older devices
                    $(".bm_ssli:even").css({"clear":"left"});
                    $(".bm_ssli:even .bm_sslia").css({"border-right":"1px solid #aaa"});
        
                    // cache the elements
                    var nav_bar = $('.adv_bm_bar');
                        var menu_btn = $("#bm_menu_btn");
                        var search_btn = $('#bm_search_btn');
                    
                    
                    var nav_outer = $('#adv_bm_nav_outer'); // outer wrapper
                        var nav_inner = $('#adv_bm_nav_inner'); // inner wrapper
                            var nav_main = $('.bm_nav_main'); // sections and classifieds
                            var nav_sub = $('.bm_nav_sub'); // sub-sections
                    
                    
                    var search_outer = $('#adv_bm_search_outer');
                    
                    
                    // start the Machine (states are transitions, NOT end result)
                    var state = 0;
                    var statesArray = [[1,2],[3,4,5],[8,0],[1,2],[8,0],[6,7],[3,4,5],[8,0],[3,4,5]]; 
                    // nextState = statesArray[currState][button];
                    // menu button = 0, search button = 1, subsection button = 2
                    
                    nav_bar.on('click', '.bm_btn', function(){
                        doSlide($(this).data('btn'));
                    });
                    nav_main.on('click', '.bm_slide_btn', function(){
                        // TODO: ajax for this.id
                        doSlide($(this).data('btn'));
                    });
                    
                    
                    
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
                                     window.scrollTo(0, 0);
                            menu_btn.addClass('bm_back_icon');
                            },
                        6 : function(){
                            action.close(nav_inner);
                            action.open(menu_btn);
                            menu_btn.removeClass('bm_back_icon');
                            },
                        7 : function(){
                            action.close(nav_inner, nav_outer);
                            action.open(search_outer, search_btn);
                            menu_btn.removeClass('bm_back_icon');
                            },
                        8 : function(){
                            action.close(search_outer, search_btn);
                            action.open(nav_outer, menu_btn);
                        }
                    }
                    
                    
                    var action = {
                        open : function(){
                                    var args = Array.prototype.slice.call(arguments);
                                    var i = args.length;  
                                    while (i--) {  
                                        args[i].addClass('open');  
                                    }
                                },
                        close : function(){
                                    var args = Array.prototype.slice.call(arguments);
                                    var i = args.length;  
                                    while (i--) {  
                                        args[i].removeClass('open');  
                                    }
                                }   
                       }
               })();
</pre>
<div id="adv_banner_mobile_wrapper">
        <div id="Leaderboard" class="adunit nofullad"></div>
            <div id="adv_bm_masthead">
                <div class="adv-logo"><a href="http://www.nj.com">nj.com</a></div>	
                <span id="adv-edition-chooser" class="adv-chooser" data-selected="nj">
                    <span class="adv-chooser-title"><span></span>

                    </span>
                </span>
            </div>
            <div id="adv_banner_mobile">

                <div class="adv_bm_bar">
                    <div class="bm_bar-left bm_btn bm_menu_icon" id="bm_menu_btn" data-btn="0"></div>
                    <!--            <div class="bm_bar-left bm_back_btn"><span>back</span></div>-->
                    <div class="bm_bar-center">
                        <div class="adv-weather" data-json="weather.json">
                            <div class="adv-weather-inner adv_mobile">
                                <span class="adv-temp adv_mobile"></span>
                            </div>
                        </div>
                        
                        <div class="adv_bm_display_name_container">
                            <h1 class="adv-display_name adv_mobile"><esi:vars>$(display)</esi:vars></h1>
                        </div>

                    </div>

                    <div class="bm_bar-right">
                        <!--                                    <div class="bm_btn">Sign In</div>-->
                        <div class="bm_btn bm_search_icon" id="bm_search_btn" data-btn="1"></div>
                    </div>
                </div>


            </div>
            <div id="adv_bm_nav_outer">
                <div id="adv_bm_nav_inner">
                    <div class="bm_nav_main">
                        <ul class="adv_bm_sec_nav">
                            <li class="bm_sli"><a class="bm_slia" href="/">Home</a></li>
                            <li class="bm_sli"><a class="bm_slia" href="http://www.nj.com/news/">N.J. News</a><span class="bm_slide_btn" id="News" data-btn="2"></span></li>
                            <li class="bm_sli"><a class="bm_slia" href="http://www.nj.com/local/">Local News</a><span class="bm_slide_btn" id="LocalNews" data-btn="2"></span></li>
                            <li class="bm_sli"><a class="bm_slia" href="http://www.nj.com/politics/">N.J. Politics</a><span class="bm_slide_btn" id="Politics" data-btn="2"></span></li>
                            <li class="bm_sli"><a class="bm_slia" href="http://www.nj.com/sports/">Sports</a><span class="bm_slide_btn" id="Sports" data-btn="2"></span></li>
                            <li class="bm_sli"><a class="bm_slia" href="http://highschoolsports.nj.com/">H.S. Sports</a><span class="bm_slide_btn" id="hssports" data-btn="2"></span></li>
                            <li class="bm_sli"><a class="bm_slia" href="http://www.nj.com/entertainment/">Entertainment</a><span class="bm_slide_btn" id="Entertainment" data-btn="2"></span></li>
                            
                        </ul>

                        <ul class="adv_bm_class_nav">
                            <li class="bm_csli"><a class="bm_cslia" href="http://www.nj.com/jobs/">Jobs</a></li>
                            <li class="bm_csli"><a class="bm_cslia" href="http://autos.nj.com/">Autos</a></li>
                            <li class="bm_csli"><a class="bm_cslia" href="http://realestate.nj.com/">Real Estate</a></li>
                            <li class="bm_csli"><a class="bm_cslia" href="http://realestate.nj.com/for-rent/">Rentals</a></li>
                            <li class="bm_csli"><a class="bm_cslia" href="http://classifieds.nj.com/">Classifieds</a></li>
                            <li class="bm_csli"><a class="bm_cslia" href="http://www.nj.com/obituaries/">Obituaries</a></li>
                            <li class="bm_csli"><a class="bm_cslia" href="http://findnsave.nj.com/">Find N Save</a></li>
                            <li class="bm_csli"><a class="bm_cslia" href="http://businessfinder.nj.com/NJ-New-Brunswick">Local Businesses</a></li>
                            <li class="bm_csli"><a class="bm_cslia" href="http://www.nj.com/placead/">Place An Ad</a></li>
                        </ul>
                    </div>
                    <div class="bm_nav_sub">
                        <ul class="bm_ssul">
                        </ul>
                    </div>
                </div>
            </div> <!-- !container -->

            <div id="adv_bm_search_outer">
                <div class="adv_bm_search_inner">
                    <form method="get" action="http://search.nj.com/sp">
                        <input placeholder="Search..." type="text" id="adv-site-search" name="keywords" />
                        <input type="submit" id="adv-site-search-submit" value="" />
                    </form>
                </div>
            </div>
            
        </div> <!-- end mobile banner wrapper -->

<?php

require_once ("sandbox-footer.php");
?>