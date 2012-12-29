$(function(){
    
    var boat = $("#boat");
    
    boatfloat(boat);
    
});


      function boatfloat(elem){
          
      
      
      
      
      var TWO_PI = Math.PI * 2;
    
      var throb = 1;
      var osc = 0;
	  
      setInterval(function(){
        
     
	function Heart(){
       
        elem.css({"width":throb,"height":throb});
        //c.scale(throb,throb);
        
        throb = 1 + .1 * Math.cos(osc);
        osc+= 0.25;
        
        
	}
		
	boatfloat();
		
       
      }, 30);
      
      };
      