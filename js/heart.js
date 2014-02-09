
      
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
      
      c.lineWidth = 8;
      c.lineCap = "round";
      c.lineJoin = "round";
      c.strokeStyle = "black";
      
      
      
     
        // I 
		function I(){
		c.save();
        c.beginPath();
        c.moveTo(20, 20);
        c.lineTo(40, 20);
        c.moveTo(30, 20);
        c.lineTo(30, 60);
        c.moveTo(20, 60);
        c.lineTo(40, 60);
        c.stroke();
		c.restore();
		}
		
		I();
		
		// Heart
		function Heart(){
        c.save();
        c.translate(80,40);
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
		
        // N
        function N(){
          c.save();
          c.beginPath();
          c.moveTo(120, 20);
          c.lineTo(136, 20);
          c.lineTo(156, 60);
          c.lineTo(160, 60);
          c.lineTo(160, 20);
          c.moveTo(130, 20);
          c.lineTo(130, 60);
          c.moveTo(120, 60);
          c.lineTo(140, 60);
          c.moveTo(150, 20);
          c.lineTo(170, 20);
          c.stroke();
          c.restore();
        }
        
        N();
        
        function Y(){
          c.save();
          c.beginPath();
          c.moveTo(180, 20);
          c.lineTo(200, 20);
          c.moveTo(210, 20);
          c.lineTo(230, 20);
          c.moveTo(190, 20);
          c.lineTo(205, 45);
          c.moveTo(220, 20);
          c.lineTo(205, 45);
          c.moveTo(205, 45);
          c.lineTo(205, 60);
          c.moveTo(195, 60);
          c.lineTo(215, 60);
          c.stroke();
          c.restore();
        }
        
        Y();
      }, 30);
      
      };
      