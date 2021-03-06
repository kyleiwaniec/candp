(function($) {
	//var undefined;

	$.FractalTree = function(opts) {
		var canvas, ctx,
		cfg = $.extend(true, {
			initX: 400,
			initY: 400,
			max_sub_branch: 5,
			max_sub_angle: 3*Math.PI/4,
			max_size: 5,
			branch_length: 75,
			color: "#fff"
		}, opts);
		
                var inter;
                var paramsArr = [];
                var inc = 0;
                
		function init() {
			if(cfg.canvas !== undefined) {
				canvas = cfg.canvas.get(0);
				ctx = canvas.getContext("2d");	
				ctx.strokeStyle = cfg.color;	
                                ctx.lineCap = "round";

				_makeBranch(cfg.initX, cfg.initY, cfg.branch_length, -Math.PI/2, cfg.max_size);
                                
                    }
		}
		
		/* start:private */
		function _makeBranch(start_x, start_y, length, angle, size) {
                    
                   // alert(length);
			if (size > 0) {
				ctx.lineWidth = size;
				ctx.beginPath();
				ctx.moveTo(start_x, start_y);
				
				var end_x = start_x + length * Math.cos(angle);
				var end_y = start_y + length * Math.sin(angle);
				ctx.lineTo(end_x, end_y);
				ctx.stroke();
                                
				
				var sub_branch = Math.random(cfg.max_sub_branch - 1) + 2;
				var branch_length_dimin = .5 + Math.random()/2;
				
                                
                                paramsArr.push(end_y);
                                paramsArr.push(end_x);
                                paramsArr.push(size);
                                paramsArr.push(angle);
                                paramsArr.push(branch_length_dimin);
                                paramsArr.push(length);
				
                                
				ctx.closePath();
                                inc++;
                                //return sub_branch;
			}
		}
                
                inter = setInterval(function(){
               // for(var i=0; i < sub_branch; i++) {
                    
                                        var length = paramsArr.pop();
                                        var branch_length_dimin = paramsArr.pop();
                                        var angle = paramsArr.pop();
                                        var size = paramsArr.pop();
                                        var end_x = paramsArr.pop();
                                        var end_y = paramsArr.pop();

                                         console.log(inc); 
                                        
					var newLength = length * branch_length_dimin;
					var newAngle = angle + Math.random() * cfg.max_sub_angle - cfg.max_sub_angle / 2;
					var newSize = size/1.5;
					_makeBranch (end_x, end_y, newLength, newAngle, newSize);
                                        
					if(inc >= 30){
                                            clearInterval(inter);
                                            return;
                                        }
				//}
                }, 50);
                
                
                
                
		/* end:private*/
		
		init();
	};
	
})(jQuery);
