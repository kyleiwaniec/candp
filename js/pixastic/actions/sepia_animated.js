/*
 * Pixastic Lib - Sepia filter - v0.1.0
 * Copyright (c) 2008 Jacob Seidelin, jseidelin@nihilogic.dk, http://blog.nihilogic.dk/
 * License: [http://www.pixastic.com/lib/license.txt]
 */

Pixastic.Actions.sepia = {

	process : function(params) {
		
		if (Pixastic.Client.hasCanvasImageData()) {
			var data = Pixastic.prepareData(params);
			var rect = params.options.rect;
			var w = rect.width;
			var h = rect.height;
			var w4 = w*4;
			var y = h;
			do {
				var offsetY = (y-1)*w4;
				var x = w;
				do {
					var offset = offsetY + (x-1)*4;

					
                    var d = data[offset] * 0.299 + data[offset+1] * 0.587 + data[offset+2] * 0.114;
                    
                    var r = (d + 60);
                    var g = (d + 70);
                    var b = (d + 90);
                   
                   
                   /*   var loop = setInterval(animateIn, 30);
          
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
          } */
                   
                   
                   

					if (r < 0) r = 0; if (r > 255) r = 255;
					if (g < 0) g = 0; if (g > 255) g = 255;
					if (b < 0) b = 0; if (b > 255) b = 255;

					data[offset] = r;
					data[offset+1] = g;
					data[offset+2] = b;

				} while (--x);
			} while (--y);
			return true;
		}
	},
	checkSupport : function() {
		return Pixastic.Client.hasCanvasImageData();
	}
}


       