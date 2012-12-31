$(document).bind("mobileinit", function(){
                $.mobile.defaultPageTransition = 'flip';
            });
            $(document).on("pageinit", function(e) {
                console.log("the current page is loading");
                   
            });
            $(document).delegate("#page_03", "pagebeforeshow", function(e) {
                console.log("page three is loading ");
                
                   
            });
            $(document).delegate("#page_02", "pagebeforeshow", function(e) {
                console.log("page two is loading ");
                
                   
                // start google fonts
                   
                var fonts = $(".fonts");
                var path = "https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&callback=?";
        
                var apiUrl = [];
                apiUrl.push('//fonts.googleapis.com/css?family=');
        
                $.getJSON(path,  function(data){
                    var fontfam = data.items;
                    //for (var i = 0; i < fontfam.length; i++){
                    for (var i = 0; i < 20; i++){
                        var t = fontfam[i];
 
           
                        apiUrl.push(t.family.replace(/ /g, '+'));
                        apiUrl.push('|');
          


                        $("<option id='"+t.family+"'>"+t.family+"<\/option>").appendTo(".fonts"); 
            
                        $(".display").css({"font-family":fontfam[0].family});
            
                    }
                    var url = apiUrl.join('');
            
                    $("head").append("<link rel='stylesheet' type='text/css' href='"+url+"'>");
          
                });
       
       
      
           
                $("select").change(function(){
                    var font = $("option:selected").attr("id");
                    $(".display").css({"font-family":font});
                });
       
                // end fonts
                   
            });
            $(document).delegate("#page_01", "pagebeforeshow", function(e) {
                console.log("page one is loading ");
               
            });