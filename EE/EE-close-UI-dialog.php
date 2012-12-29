<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>Animate on hover - copy &amp; paste generation</title>

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    		<![endif]--> 

        <meta name="description" content="jQuery rollover animation effect, including image preloading php script.">
        <meta name="author" content="Kyle Hamilton">

       
        <link rel="stylesheet" href="css/styles2.css"/> <!-- you dont need this -->

        <style>
            
            #message{
                position:absolute;
                        width:300px;
                        height:300px;
                         top:100px;
                         left:100px;
            }

        </style>



    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>

        <div id="wrapper">

            
            <form id="ideaUpdate">
                <input type="text"></input>
                <button class="submit">submit</button>
            </form>
            <div id="ideaDisplay"></div>
            
     </div><!-- #wrapper -->


        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <!--<script src="js/jquery-ui-1.8.13.custom.min.js"></script> 
         <script src="js/jquery.tools.min.js"></script> 
        <script src="js/jquery.imageLoader.min.js"></script>
        <script src="EE/getimages.js"></script>-->
       
       
        <script>
            $(function(){
                $(".submit").click(function(e) {
                e.preventDefault();    
                var dataString =  $('form#ideaUpdate').serialize();                        
                //alert (dataString);return false;
                        
               //$.ajax({
              //  type: "POST",
              //  url: "/ideaCenter/ideaUpdate.asp",
              //  data: dataString,
               // success: function() {
                           $('#ideaDisplay').html("<div id='message'></div>");
                           $('#message').html("<img id='checkmark' src='/images/check.png' /><h3>Status Updated! </h3><br/><div class='close'>close the box</div>")
                           .hide()
                           .fadeIn(500, function() {
                                        $('#message').append("").delay(2000).fadeOut('fast');                  
                                });
                       
               // }
                 
             //   }); 
   // return false;
        });
        
        $('#message, .close').live("click", function(){
           $(this).detach();
            
        });
            });
        </script>
       
    </body>
</html>
