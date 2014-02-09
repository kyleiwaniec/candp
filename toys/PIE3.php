<?php
$title = "Raphael.js - Animated Pie Chart";
require_once ("sandbox-header.php");
?>
        <style>
           
            .valu{
                margin-bottom: 4px;
            }
            .container{
                position:relative;
                overflow:hidden;
            }
            #canvas, .values, #wedgevalue{
                display:block;
                float:left;
            }
            input{
                width:25px;
                font-family: Arial, Helvetica, sans-serif;
                font-size:.75em;
                color:	#ffffff;
                background-color:#bbbbbb;
                border: 2px solid #dddddd;
                border-radius:5px;
                -webkit-border-radius:5px;
                -moz-border-radius:5px;
                -o-border-radius:5px;
                padding:5px;
                text-align:center;

            }
            .delete, #add{
               
                width:23px;
                height:23px;
                color:white;
                float:right;
                border:0;
                padding:0;
                margin:4px 0 0 4px;
                cursor:pointer;
                background:url(images/plus-minus.png) no-repeat;
            }

            #add{
                float:left;
                background-position: -28px 0;
            }
            #wedgevalue{
                background-color: white;
                border-radius:3px;
                width:25px;
                height:20px;
                text-align: center;
                line-height:20px;
                border:2px solid #eee;
            }
        </style>
        <script src="../js/raphael-1.5.2-min.js"></script>

        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script>
  
            // Override:

            //Raphael.easing_formulas = {
            //    
            //  
            //    easybounce: function (n) {
            //            //return Math.pow(n, .3);
            //            
            //            return 1/(1 + Math.pow(Math.E, -n));
            //    }
            //};
 
            // Augment:

            Raphael.easing_formulas.easysin =  function (n) {
                // return Math.pow(n, .3);
                return Math.sin(n*1.5);
                //return Math.pow(Math.E, n-1)/(1 + Math.pow(Math.E, -2.7));
            }
    
            // extend Array    
            Array.prototype.max = function(){
                return Math.max.apply({},this)
            };
            Array.prototype.min = function( array ){
                return Math.min.apply({},this)
            };

            $(function(){

                var valContainer = $(".values");
                var input = $("input");

                var archtype = Raphael("canvas", 250, 225);


                archtype.customAttributes.arc = function (xloc, yloc, value, total, R) {
	  
                    var alpha = 360 / total * value,
                    a = (90 - alpha) * Math.PI / 180,
                    x = xloc + R * Math.cos(a),
                    y = yloc - R * Math.sin(a),
                    path;
                    if (total == value) {
                        path = [["M", xloc, yloc - R], ["A", R, R, 0, 1, 1, xloc - .01, yloc - R]];
                    } else
                        path = [["M", xloc, yloc],["L", xloc, yloc - R], ["A", R, R, 0, +(alpha > 180), 1, x, y], ["L", xloc, yloc]];
			
                    return {path: path};
			
                };
        
                function drawPie(){
                    var colors =['#74b54d','#f2b613','#f2138c','#3045c1','#fe0551','#fe6e05','#b5e450','#7da7d9','#bd8cbf'];
				
                    var angArr = [];
                                
                    valContainer.children(".valu").each(function(){
                                    
                        angArr.push(parseFloat($(this).val()));
                    });
                    var numOfAngles = angArr.length;
                    var wedgeArr = [angArr[0]]; // start off with the first angle to enable the loop
                                
                    for(var i = 0; i < numOfAngles-1; i++){
                        wedgeArr.push(wedgeArr[i]+angArr[i+1]);
                                    
                    }
                                
                    wedgeArr.reverse(); // flip th order of the wedges for the animation
                                
                    var totalangs = 0;
                    for(var i = 0; i < numOfAngles; i++){
                        totalangs += angArr[i];
						 
                    }
                    var centerx = 150, centery = 108, radius = 100;
				
                    archtype.path().attr({"fill": "#ffffff", "stroke-width": 0, "stroke-opacity": 0, arc: [centerx, centery, 0, 0, radius+5]});
				
                    for (i=0;i<wedgeArr.length; i++){
                                    
                        var OldValue = angArr[angArr.length - 1 - i];
                                        
                        var OldMin = angArr.min();
                        var OldMax = angArr.max();
                        var NewMax = 1;
                        var NewMin = .5;
                                        
                        var brightness = (((OldValue - OldMin) * (NewMax - NewMin)) / (OldMax - OldMin)) + NewMin;
                                    
                                    
                        var my_arc = archtype.path().attr({"fill": "hsb(.04, 1, "+brightness+")",
                            "stroke": "#eee", "stroke-width": 3,"stroke-linejoin" : "round","stroke-linecap" : "round",  
                            arc: [centerx, centery, 0, totalangs, radius]});
                                                                        
                        my_arc.animate({arc: [centerx, centery, wedgeArr[i], totalangs, radius]}, 1000, "easysin");
					
                                       
                        my_arc.data = angArr[angArr.length - 1 - i];
                        my_arc.hover(function (e) {
                            //alert(this.data);
                                            
                            $("#wedgevalue").html(this.data)
                            .css({"background-color":"white"});
                        });
                    }
				
                };
                        
                drawPie();
                $("input").live("keyup", drawPie);
                
                $("#add").live("click", function(){
                     
                var tabIndex = parseInt($(".valu").last().attr("tabindex"));
                tabIndex++;
                    $("<button class='delete'></button><input type='text' value='0'  class='valu' tabindex='"+tabIndex+"' /><br/>").insertBefore("#add");
                    drawPie();
                })
                $(".delete").live("click", function(){
                    
                    $(this).next().detach(); // the field
                    $(this).next().detach(); // the br
                    $(this).detach(); // itself
                    drawPie();
                });
  		
            });

        </script>


    </head>

    <body>
        
        <div class="conatiner">
            <h2>Custom Pie Chart Using the Raphael.js library <br/>
                [<em>not the Raphael charts library which is not as customizable</em>]</h2>
            <p>Values are user generated, but can just as easily be database or API driven.<br/>
                Color intensity corresponds to the size of the wedge</p>
            <p>Edit/Insert values:</p>
            <div class="values">

                <button class="delete"></button><input type="text" value="4" class="valu" tabindex="1"/><br/>
                <button class="delete"></button><input type="text" value="1" class="valu" tabindex="2"/><br/>
                <button class="delete"></button><input type="text" value="2" class="valu" tabindex="3"/><br/>
                <button class="delete"></button><input type="text" value="3" class="valu" tabindex="4"/><br/>
                <button id="add"></button>
            </div>

            <div id="canvas"></div>


            <div id="wedgevalue"></div>
        </div>
<?php

require_once ("sandbox-footer.php");
?>
