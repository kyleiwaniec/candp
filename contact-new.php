<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>contact - graphic design and technology services - copy &amp; paste generation</title>



        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Mobile -->
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0;" /> 
        <meta name="apple-mobile-web-app-capable" content="yes" /> 
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
        <link rel="apple-touch-startup-image" href="/startup.png">


        <link rel="stylesheet" href="/css/overlay-apple.css"/>
        <link rel="stylesheet" href="/css/scrollable.css"/>
        <link rel="stylesheet" href="/css/styles2.css"/>


        <style>
            label.error{display:block; padding-left: 7px; color:#ee3162; background-image: none;}
            .valid{

                background-image: url(http://www.candpgeneration.com/images/checked.png) !important;
                background-repeat: no-repeat;
                background-position: right top;
            }
            .error{background-image: url(../images/greypx.gif);}
            .nocheck{background-image: url(../images/greypx.gif) !important;}
        </style>


    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>

        <div id="wrapper">

            <?PHP
            include_once("./includes/sidebar.html");
            ?>
            <div id="innerContent">
                <h1 class="listTitle"> Contact Us </h1>

                
                <div>
                <div id="form">
                        <form id="contact">    
                            <div><p>
                                    We'd love to hear from you. <br />
                                    Please fill in this form and we will get back to you within 24hours.
                                </p>
                            </div>
                            <span class="hidden"><label for="FirstName" >First Name:</label><br /></span>
                            <input type="text" name="FirstName" id="FirstName" placeholder="First Name" class="required"/>
                            <br /><br />
                            <span class="hidden"><label for="LastName" >Last Name:</label><br /></span>
                            <input type="text" name="LastName" id="LastName" placeholder="Last Name"  class="required"/>
                            <br /><br />
                            <span class="hidden"><label for="email" >Email:</label><br /></span>
                            <input type="text" id="email" name="email" placeholder="Email"  class="required"/>
                            <br /> <br /> 
                            <span class="hidden"><label for="phone" >Phone No. (Incl. Area Code):</label><br /></span>
                            <input type="text" name="phone" id="phone" placeholder="Phone No. (Incl. Area Code)"  class="required"/>


                            <br /> <br />
                            <span class="hidden"><label for="notes" >Tell us about your project:</label><br /> </span>
                            <textarea name="notes" placeholder="Tell us about your project" class="notesArea required" id="notes"></textarea><br /> <br />

                            <input type="submit" value="send" class="glossy-button" />
                        </form>
                    </div><!-- end form -->
                    <div id="thanks">
                         <h1>
Thank You <span style="text-transform:capitalize;">$FirstName </span>
</h1>
    <div>
<p>Your form was successfully submitted.<br />
  We will get back to you within 24hours. </p>
<canvas id="canvas" width="300">
    <em> (You can't see this really cute animation, because your browser doesn't support &lt;canvas&gt;.<br />
        For a better internet experience go <a href="http://www.google.com/chrome">download google chrome</a>)</em>
      
    </canvas>
<script src="/js/heart_only.js"></script>
    </div>
                    </div>

                </div>
            </div><!-- #innerContent -->
        </div><!-- #wrapper -->


        <script src="/js/jquery.tools.min.js"></script> 
        <script src="/js/jquery-ui-1.8.13.custom.min.js"></script> 
        <script src="/js/portfolio.js"></script> 
        <script src="/js/jquery.placeholder-enhanced.js"></script>

        <script src="/js/jquery.validate.js"></script>
        <script>
	
            // function detectMobile(){
            // (typeof Touch !== "undefined") ? 'touchstart' : 'click';
        
           
        
            //  };
        
        
            $(function() {
            
                $(".hidden").css({"display":"none"}); // so that nojs gets labels
                
                
                
          var contact = $("#contact");
          contact.validate({
              
          
          messages: {
                        email: "Please enter your email address.",
                        FirstName: "Please enter your first name.",
                        LastName: "Please enter your last name.",
                        phone: "Please enter your phone number.",
                        notes: "Please enter a message."
          },
          submitHandler : function(){
            $.post("includes/send_regular.php",{
              first_name : $("#FirstName").val(),
              last_name : $("#LastName").val(),
              email : $("#email").val(),
              phone : $("#phone").val(),
              notes : $("#notes").val()
            }, function(d){
              contact.fadeOut();
              $("#thanks").fadeIn();
            });
          },
          errorPlacement: function(label, element) {
                        // position error label after generated textarea
                        if (element.is("textarea, input")) {
                            label.insertAfter(element.next());
                        }else{
                            label.insertAfter(element);
                        }
                                
                    }
        });
                
            });
        </script> 
        
        <script>
    
            var ieButt =(function(){
    
                if(navigator.userAgent.search(/msie/i)!= -1) { 
        
                    $("button, .glossy-button").each(function(){
                        var buttonText = $(this).text();
                        $(this).html("<span class='butleft'>"+buttonText+"</span><span class='butright'></span>");
                        var wid = $(this).find(".butleft").innerWidth() + $(this).find(".butright").innerWidth();
                        $(this).css({"background-image":"none", "border":"0", "padding":"0", "box-shadow":"none", "vertical-align": "middle", "width":wid});
        
                    });
                }; 
    
            })();    
    
        </script>
    </body>
</html>
