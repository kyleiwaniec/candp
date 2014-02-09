(function($) {
        function memoize( fn ) {  
            return function () {  
                var args = Array.prototype.slice.call(arguments),  
                    hash = "",  
                    i = args.length;  
                currentArg = null;  
                while (i--) {  
                    currentArg = args[i];  
                    hash += (currentArg === Object(currentArg)) ?  
                    JSON.stringify(currentArg) : currentArg;  
                    fn.memoize || (fn.memoize = {});  
                }  
                return (hash in fn.memoize) ? fn.memoize[hash] :  
                fn.memoize[hash] = fn.apply(this, args);  
            };  
        }
            
        
        
	$.FractalTree = function(opts) {
                var inc = 0;
                var inter;
		var canvas, ctx,
		cfg = $.extend(true, {
			initX: 400,
			initY: 400,
			max_sub_branch: 5,
			max_sub_angle: 1*Math.PI/2,
			max_size: 5,
			branch_length: 65,
			color: "#fff"
		}, opts);
		
              
                var fibTest = memoize(_makeBranch); // this does didly squat
		function init() {
                        
			if(cfg.canvas !== undefined) {
				canvas = cfg.canvas.get(0);
				ctx = canvas.getContext("2d");	
                                ctx.clearRect(0, 0, canvas.width, canvas.height);
				ctx.strokeStyle = cfg.color;
                                fibTest(cfg.initX, cfg.initY, cfg.branch_length, -Math.PI/2, cfg.max_size);
                                
                               
                    }
		}
                
		
                        
                        
		/* start:private */
		function _makeBranch(start_x, start_y, length, angle, size) {
                    
                  
                                
			if (size > 0) {
				ctx.lineWidth = size;
				ctx.beginPath();
				ctx.moveTo(start_x, start_y);
				
				var end_x = start_x + length * Math.cos(angle);
				var end_y = start_y + length * Math.sin(angle);
				ctx.lineTo(end_x, end_y);
                                ctx.lineCap = "round";
				ctx.stroke();
				
				var sub_branch = Math.random(cfg.max_sub_branch - 1) + 2;
                                var branch_length_dimin = .5 + Math.random();
				
				
                                
                                inter = setInterval(function(){
				//for(var i=0; i < sub_branch; i++) {
                                if(inc > 5000){
                                    clearInterval(inter);
                                }else{
                                    
                                    var newLength = length * branch_length_dimin;
					var newAngle = angle + Math.random() * cfg.max_sub_angle - cfg.max_sub_angle / 2;
					var newSize = size/2;
					_makeBranch (end_x, end_y, newLength, newAngle, newSize);
                                        inc++;
                                        //console.log(inc);
                                //}
                                    }
				}, 100);
                                
                                ctx.closePath();
                                
                         }

		}

		/* end:private*/
		init();
	};
	
})(jQuery);


