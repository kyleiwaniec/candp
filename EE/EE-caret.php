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
            #content{margin-top:50px;} /* you dont need this */
            .product{position:relative; display:block; background-color: lightgray; padding:10px; width:250px; height:250px;} /* you need this. adjust size/padding etc.. as desired */
            .still, .thumb{position:absolute; width:250px; height:250px; } /* you need this. adjust size/padding etc.. as desired */
            


        </style>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script> 

 

    </head>

    <body> 
        <?php include_once("analyticstracking.php") ?>
        
        <div id="wrapper">


            <div id="content">
                <div class="product"> 
                    <input type="text" class="labelField" value=""></input>
                    <input type="text" class="labelField" value="Hello there" ></input>
                    <input type="text" class="labelField" value=""></input>
                    <input type="text" class="labelField" value=""></input>
                    
                </div>
                hi there
                <div class="product"> 
                    <input type="text" class="labelField" value=""></input>
                    <input type="text" class="labelField" value=""></input>
                    <input type="text" class="labelField" value=""></input>
                    <input type="text" class="labelField" value=""></input>
                    
                </div>
                
                
            </div><!-- content -->
        </div><!-- #wrapper -->


        
       <!-- <script src="js/jquery.imageLoader.min.js"></script>
        <script src="EE/getimages.js"></script> -->
       
       
        <script>
            $(function(){
                
          
             function bindLabelField() {
    $('.labelField').each(function(index) {
        $(this).bind('focus', function() {
            $(this).caretTo(0,0);
        });

    });
bindLabelField();
}
              });

(function ($) {
    // Behind the scenes method deals with browser
    // idiosyncrasies and such
    $.caretTo = function (el, index) {
        if (el.createTextRange) {
            var range = el.createTextRange();
            range.move("character", index);
            range.select();
        } else if (el.selectionStart != null) {
            el.focus();
            el.setSelectionRange(index, index);
        }
    };

    // The following methods are queued under fx for more
    // flexibility when combining with $.fn.delay() and
    // jQuery effects.

    // Set caret to a particular index
    $.fn.caretTo = function (index, offset) {
        return this.queue(function (next) {
            if (isNaN(index)) {
                var i = $(this).val().indexOf(index);

                if (offset === true) {
                    i += index.length;
                } else if (offset) {
                    i += offset;
                }

                $.caretTo(this, i);
            } else {
                $.caretTo(this, index);
            }

            next();
        });
    };

    // Set caret to beginning of an element
    $.fn.caretToStart = function () {
        return this.caretTo(0);
    };

    // Set caret to the end of an element
    $.fn.caretToEnd = function () {
        return this.queue(function (next) {
            $.caretTo(this, $(this).val().length);
            next();
        });
    };
}(jQuery));
           
        </script>
    </body>
</html>
