<?php
$title = "CSS3 - Card Flip Example";
require_once ("sandbox-header.php");
?>
		<style>
                    .wrapper{
                        max-width:750px !important;
                    }
		.panel {
			float: left;
			width: 300px;
			height: 200px;
			margin: 20px;
			position: relative;
			font-size: .8em;
                        
			
			-webkit-perspective: 600;
		}
		/* -- make sure to declare a default for every property that you want animated -- */
		/* -- general styles, including Y axis rotation -- */
		.panel .front {
			float: none;
			position: absolute;
			top: 0;
			left: 0;
			z-index: 900;
			width: inherit;
			height: inherit;
			border: 1px solid #fff;
			background: url(images/dot.jpg) #fefefe;
			text-align: center;
                        padding:15px;
                        

			box-shadow: 0 1px 7px rgba(0,0,0,0.5);
			-moz-box-shadow: 0 1px 7px rgba(0,0,0,0.5);
			-webkit-box-shadow: 0 1px 7px rgba(0,0,0,0.5);
			
			-webkit-transform: rotateY(0deg);
			-webkit-transform-style: preserve-3d;
			-webkit-backface-visibility: hidden;

			/* -- transition is the magic sauce for animation -- */
			transition: all .4s ease-in-out;
			-moz-transition: all .4s ease-in-out;
			-webkit-transition: all .4s ease-in-out;
                        
                        cursor:pointer;
		}
		.panel.flip .front {
			z-index: 900;
			border-color: #eee;

			-webkit-transform: rotateY(180deg);
			
			box-shadow: 0 15px 50px rgba(0,0,0,0.2);
			-moz-box-shadow: 0 15px 50px rgba(0,0,0,0.2);
			-webkit-box-shadow: 0 15px 50px rgba(0,0,0,0.2);
                        
                       
		}
                
                .front:hover{
                     background: url(images/dot-over.jpg) #ffffff;
                     
                }
		
		.panel .back {
			float: none;
			position: absolute;
			top: 0;
			left: 0;
			z-index: 800;
			width: inherit;
			height: inherit;
                        line-height:30px;
                        text-align: center;
			border: 1px solid #ccc;
			background: #888;
			text-shadow: -1px  -1px 1px rgba(0,0,0,0.6), 1px  1px 1px rgba(255,255,255,0.5); 
                        color:#444;
                        font-weight:normal;
                        padding:15px;
			
			-webkit-transform: rotateY(-180deg);
			-webkit-transform-style: preserve-3d;
			-webkit-backface-visibility: hidden;

			/* -- transition is the magic sauce for animation -- */
			transition: all .4s ease-in-out;
			-moz-transition: all .4s ease-in-out;
			-webkit-transition: all .4s ease-in-out;
		}
		
		.panel.flip .back {
			z-index: 1000;
			
			-webkit-transform: rotateY(0deg);
			box-shadow: 0 15px 50px rgba(0,0,0,0.2);
			-moz-box-shadow: 0 15px 50px rgba(0,0,0,0.2);
			-webkit-box-shadow: 0 15px 50px rgba(0,0,0,0.2);
		}
		
				
		/* -- cosmetics -- */
		.panel .pad {padding: 0 15px; }
		.panel.flip .action {display: none; }
                h2.scissors{

                    font-weight:normal;
                    font-size:40px;
                    border-bottom: 1px dashed #ccc;
                    line-height:0;
                    padding:0;
                    margin-top:100px;
                }
                .heart{
                    font-size:50px;
                }
                .scull{
                    font-family:"Menlo";
                    font-size:100px;
                }
                .angular{
                    -webkit-transform: rotateZ(-35deg);
                }
				
	</style>
	<script type="text/javascript">
		$(function(){
			
			// set up hover panels
         // although this can be done without JavaScript, we've attached these events
         // because it causes the hover to be triggered when the element is tapped on a touch device
         $('.hover').hover(function(){
         	$(this).addClass('flip');
         },function(){
         	$(this).removeClass('flip');
         });
         
         /*
         // set up click/tap panels
         $('.click').toggle(function(){
         	$(this).addClass('flip');
         },function(){
         	$(this).removeClass('flip');
         });
         */
         
        
         $('.panel').bind('click', function(){
         	$(this).addClass('flip');
            $('.panel').not(this).removeClass('flip');
         });
         
         
         $('.back').bind('mouseleave click', function(e){
            e.stopPropagation();
            $(this).parent('.panel').removeClass('flip');
         }); 
        
         $('.panelLink').click(function(e){
            e.stopPropagation();
         });
			
	});
	</script>


	<div class="click panel">
		<div class="front">
			<h2></h2>
		</div>
		<div class="back">
			<div class="pad">
                            <h2 class="scull">☠</h2>
			</div>
		</div>
	</div>
    <div class="click panel">
		<div class="front">
			<h2></h2>
		</div>
		<div class="back">
			<div class="pad">
				<h2 class="scissors angular">✂</h2>
			</div>
		</div>
	</div>
    <div class="click panel">
		<div class="front">
			<h2></h2>
		</div>
		<div class="back">
			<div class="pad">
				<h2 class="scull">☠</h2>
			</div>
		</div>
	</div>
    <div class="click panel">
		<div class="front">
			<h2></h2>
		</div>
		<div class="back">
			<div class="pad">
                            
				<h2 class="scull">☠</h2>
                                
			</div>
		</div>
	</div>
<?php

require_once ("sandbox-footer.php");
?>