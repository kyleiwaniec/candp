<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Demo</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  
});

</script>
</head>
<body>

    	        <div style="display: block; background: blue; width: 90px; height: 80px; position: absolute; z-index:99" class="project_rollover_caption" id="projectName15"></div>
                <a id="p15" href="#" style="display: block; background: red; width: 100px; height: 100px;"></a>
            
                <script type="text/javascript">
                    
                    var blue = $("#projectName15");
                    var red = $("#p15");
                    
                    blue.hide();
                    
                    $("#projectName15, #p15").mouseenter(function(e) {
                      e.stopPropagation();
                      blue.html('<div>Hello World</div>').show();
                    });
                    
                    red.mouseleave(function(e) {
                      e.stopPropagation();
                      blue.html('').hide();
                     
                     //alert('You are no longer hovering over the red or blue box.');
                    });
                    
                    

                    
                </script>

</body>
</html>