(function($) {
        CanvasRenderingContext2D.prototype.clear = 
            CanvasRenderingContext2D.prototype.clear || function (preserveTransform) {
                if (preserveTransform) {
                this.save();
                this.setTransform(1, 0, 0, 1, 0, 0);
                }

                this.clearRect(0, 0, this.canvas.width, this.canvas.height);

                if (preserveTransform) {
                this.restore();
                }           
            };
        
        var inter;
        var inc;
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
		
             
                
		function init() {
                        inc = 0, inter;
			if(cfg.canvas !== undefined) {
				canvas = cfg.canvas.get(0);
				ctx = canvas.getContext("2d");
				ctx.strokeStyle = cfg.color;		
				_makeBranch(cfg.initX, cfg.initY, cfg.branch_length, -Math.PI/2, cfg.max_size);
                                
                               
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
                                if(inc > 10000){
                                    clearInterval(inter);
                                }else{
                                    
                                    var newLength = length * branch_length_dimin;
					var newAngle = angle + Math.random() * cfg.max_sub_angle - cfg.max_sub_angle / 2;
					var newSize = size/2;
					_makeBranch (end_x, end_y, newLength, newAngle, newSize);
                                        inc++;
                                        // console.log(inc);
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


