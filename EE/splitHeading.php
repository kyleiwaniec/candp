<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="utf-8" />
   <title></title>
   <script src="http://code.jquery.com/jquery-latest.min.js"></script>
   <script>
    $(function(){

      var lineWidth = 15;
      var words = "one two three four five six seven eight nine ten eleven"
      words = words.split(" ");

      var line = "";
      var preLine = "";
      var lines = "";

      for (var i = 0; i < words.length; i++){
       preLine += words[i] + " ";
        if (preLine.length <= lineWidth){
         line += words[i] + " ";
        }else{
          lines += "<span>" + line + "<span><br/>";
          line = preLine = words[i] + " "
        }
      }
      lines += "<span>" + line + "<span><br/>";
      line = preLine = words[i] + " "

      $("body").append(lines);



    });
   </script>
 </head>
 <body>

 </body>
</html>
