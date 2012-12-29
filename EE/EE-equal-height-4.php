<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

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
            
            #homepage2col h2 a{background-color: #A7192F; padding:3px 0; color:white; text-decoration:none; font:normal 18px/20px Helvetica; text-transform:uppercase;}    
            #homepage2col .titleText{padding:3px 0 3px 6px; margin:2px 0; display:inline-block;}
        </style>



    </head>

    <body>
        <section id="homepage2col">
            <section>
                <h2><a title="Recipe Search" href="#">one two threedom four five six</a></h2>
            </section>
            
        </section>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">     
function equalHeight(group) {
        var tallest = 0;
        group.each(function() {
                var thisHeight = $(this).height();
                if(thisHeight > tallest) {
                        tallest = thisHeight;
                }
        });
        group.height(tallest);
}
        $(document).ready(function(){
               // you can use any class here that you want to, I used .column in this example 
                equalHeight($(".column"));
                equalHeight($(".column2"));
        });  // end docready
</script> 
      

    </body>
</html>

