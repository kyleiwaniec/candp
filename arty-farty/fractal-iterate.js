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
            
        var inc = 0;
        var inter;
        var end = false;
        
	$.FractalTree = function(opts) {
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
		
              
                var fibTest = memoize(_makeBranch);
                
                var argArr1 = [cfg.initX];
                var argArr2 = [cfg.initY];
                var argArr3 = [cfg.branch_length];
                var argArr4 = [-Math.PI/2];
                var argArr5 = [cfg.max_size];
                
		function init() {
                        
			if(cfg.canvas !== undefined) {
				canvas = cfg.canvas.get(0);
				ctx = canvas.getContext("2d");	
				ctx.strokeStyle = cfg.color;
                                
                                 
                                inter = setInterval(function(){
				//for(var i=0; i < sub_branch; i++) {
                                
                                if(inc > 50){
                                    clearInterval(inter);
                                }else{
                                    for (var i = 0; i < argArr1.length; i++){
                                    fibTest(argArr1[i], argArr2[i], argArr3[i], argArr4[i], argArr5[i]);
                                    argArr1.shift();
                                    argArr2.shift();
                                    argArr3.shift();
                                    argArr4.shift();
                                    argArr5.shift();
                                //}
 inc++;
                                    console.log(inc);
                                    console.log(argArr4.length);
                                    }
                                   
                                    
                                }
				},500);
                               
                    }
		}
                
		
                        
                        
		/* start:private */
		function _makeBranch(start_x, start_y, length, angle, size) {
                    
                        
			//if (size > 0) {
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
				
				
                               
                                   
                                    argArr1.push(end_x);
                                    argArr2.push(end_y);
                                   
                                        var newLength = length * branch_length_dimin;
                                        argArr3.push(newLength);
                                       
					var newAngle = angle + Math.random() * cfg.max_sub_angle - cfg.max_sub_angle / 2;
                                        argArr4.push(newAngle);
                                        
					var newSize = size;
                                        argArr5.push(newSize);
                                        
					//_makeBranch (end_x, end_y, newLength, newAngle, newSize);
                                        //inc++;
                                        //console.log(inc);
                                 
                               
                                ctx.closePath();
                                
                         }

		//}

		/* end:private*/
		init();
	};
	
})(jQuery);


