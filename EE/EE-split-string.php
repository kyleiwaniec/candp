<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>Split String - copy &amp; paste generation</title>
        <meta name="description" content="Javascript to split up s string into lines, and apply styles.">
        <meta name="author" content="Kyle Hamilton">




        <style>
            #homepage2col h2{width:300px; display:block;}
            
            #homepage2col h2 a{background-color: #A7192F; padding:3px 0; color:white; text-decoration:none; font:normal 18px/30px Helvetica; text-transform:uppercase;}    
/*            #homepage2col .titleText{display:inline-block;}*/
            .titleText{padding:3px 0 3px 6px; margin:2px 0;}
        </style>



    </head>

    <body>
        <section id="homepage2col">
            <section>
                <h2><a title="Recipe Search" href="#">one two three four five six seven eight nine ten eleven</a></h2>
            </section>
            
        </section>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script>     
$(function(){

      var lineWidth = 13;
      
      var selector = $("#homepage2col h2 a");
      
      
      var words = selector.text();
      words = words.split(" ");

      var line = "";
      var preLine = "";
      var lines = "";

      for (var i = 0; i < words.length; i++){
       preLine += words[i] + " ";
        if (preLine.length <= lineWidth){
         line += words[i] + " ";
        }else{
          lines += "<span class='titleText'>" + line + "<span><br/>";
          line = preLine = words[i] + " "
        }
      }
      lines += "<span class='titleText'>" + line + "<span><br/>";
      line = preLine = words[i] + " "

      $("#homepage2col h2 a").html(lines);



    });
        </script>

    </body>
</html>

