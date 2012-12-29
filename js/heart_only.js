
      
      // author: Kyle Hamilton for cnpgen.com - enjoy on your own site, but please attribute.
      
      
      
      if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){ //test for MSIE x.x;
         
         var ieversion=new Number(RegExp.$1) // capture x.x portion and store as a number
         
         if (ieversion<9){
          
            // prevent error message in IE < 9
             
        
            }else{  // start ie9
      
             heartthrob();
                 }; 
         }
         else{ // start all other browsers
         
            heartthrob();
         }; // end  browser detect
      
      
      
      
      
      
      function heartthrob(){
          
      
      
      
      
      var TWO_PI = Math.PI * 2;
      var canvas = document.getElementById("canvas");
      var c = canvas.getContext("2d");
      var throb = 1;
      var osc = 0;
	  
      setInterval(function(){
        
      c.fillStyle = "white";
      c.fillRect(0, 0, canvas.width, canvas.height);
      
      
      
      
     
       
		
		// Heart
		function Heart(){
        c.save();
        c.translate(40,40);
        c.scale(throb,throb);
        
        throb = 1 + .1 * Math.cos(osc);
        osc+= 0.25;
        
        c.beginPath();
        
        c.moveTo(0, 25);
        c.bezierCurveTo(0, 25, -28.0, 11, -28.0, -7.5);  
        c.bezierCurveTo(-28, -29.7, -5, -27.8, 0.0, -18.0);
        c.bezierCurveTo(5.0, -27.8, 28, -29.7, 28, -7.5);
        c.bezierCurveTo(28, 11, 0.0, 25, 0.0, 25);
        c.closePath();
        c.fillStyle = "#ee2d5b";
        c.fill();
        c.restore();
		}
		
		Heart();
		
       
      }, 30);
      
      };
      