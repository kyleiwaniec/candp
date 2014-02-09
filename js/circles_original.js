$(function(){
        
       
        var size = "100%";
        
        var paper = new Raphael("circles", size, size);
        
        var rect = paper.rect(0, 0, paper.width, paper.height)
                        .attr({fill : "", stroke : 0});
        
       
      
	  
	 
	   
       setInterval(function(){
		   
		   
		   var  Xpos = 100 * Math.random() * 30;
		   var Ypos = 100 * Math.random() * 20;
		      
           addCircle(Xpos, Ypos);
			
			
          }, 50);
       
	   
	 	document.onmousemove = function(e){
				var Xpos = 0;
				var Ypos = 0;
				if (!e) var e = window.event;
				if (e.pageX || e.pageY) 	{
					Xpos = e.pageX;
					Ypos = e.pageY;
				}
				else if (e.clientX || e.clientY) 	{
					Xpos = e.clientX + document.body.scrollLeft
						+ document.documentElement.scrollLeft;
					Ypos = e.clientY + document.body.scrollTop
						+ document.documentElement.scrollTop;
				}
				
					
			 addCircle(Xpos, Ypos);
	   };
	   
	   // click event
	  $(document).bind("mousedown", function(e){
          
		  		var Xpos = e.pageX;
				var Ypos = e.pageY;
		 
		  if (e.type == "mousedown"){
			  
			var i=0;
			for (i=1;i<=50;i++){
				
				var offsetX = e.pageX + Math.random() * 50;
				var offsetY = e.pageY + Math.random() * 50;
				
				Xpos =  offsetX;
				Ypos =  offsetY;
				
            	addCircle(Xpos, Ypos);
			  }
          }
		  
        });
	   
	   
	   // end click event
	   
        function addCircle(x, y){
          var c = paper.circle(x, y, 10)
                       .attr({
                         fill:"rgb(255,50,100)", 
                         opacity: .5,
                         stroke:"rgba(255,255,255,0)",
                         'stroke-width': 0
                       });
                    
          var scale = 1;
          var targetScale = 2 + Math.random() * 2;
          var vel = 0;
          var iterations = 30;
          var time = 0;
          var deathDelay = 10;
          
          var loop = setInterval(animateIn, 30);
          
          function animateIn(){
						  
            vel = (vel - (scale - targetScale) * 0.9) / 1.6;
            scale += vel;
            
            c.attr("scale", scale);
            time++;
            if (time > iterations){
              clearInterval(loop); 
              setTimeout(function(){
                loop = setInterval(animtateOut, 30);
              }, deathDelay);
            }
          }
          
          function animtateOut(){
            scale += (0 - scale) / 2;
            c.attr("scale", scale);
            if (scale < 0.1){
              clearInterval(loop);
              c.remove(); 
            }
          }
       }
});