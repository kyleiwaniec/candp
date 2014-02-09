<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8"/>
    <style>


    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
    <script>
        $(function(){
            var path = "http://services.odata.org/OData/OData.svc/Categories()";
          
          
          $.get("getfile.php", {u:path}, function(data){
            
            var xmlDoc = $.parseXML(data);
            var content = $(xmlDoc);
            
            content.find("entry").each(function(){
              var curr = $(this);
              var title = curr.children("title").text();
              
              var entryItem = $("<div/>", {
                className : "entryItem"
              }).appendTo("#items");
                
                $(entryItem).append("<p>"+title+"</p>");
             
      
                }); // end find each function
      
      
            }); // end .get function
      
     
        });
    </script>
    <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
    <body>
        <div id="items"></div>

    </body>
</html>
