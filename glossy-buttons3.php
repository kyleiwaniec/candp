<!DOCTYPE HTML>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9 ]>   <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>Glossy Buttons - Easy Reusable CSS - copy &amp; paste generation</title>



        <meta name="description" content="Glossy Buttons CSS. Easy reusable code.">
        <meta name="author" content="Kyle Hamilton for C'n'P Gen">
        <link rel="stylesheet" href="css/styles2.css"/>


        <style>
            button, .glossy-button{
                font-family: helvetica, arial, sans-serif;
                font-size:14px;
                line-height:32px;
                height:30px;
                color:#fff;
                cursor:pointer;

                padding:0 10px;

                background-color: #010732;

                background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255, 255, 255, 0.6)), color-stop(0.49, rgba(255, 255, 255, 0.3)), color-stop(0.51, rgba(255, 255, 255, 0.0)), to(rgba(255, 255, 255, 0.2))); /* Chrome,Safari4+ */
                background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Chrome10+,Safari5.1+ */
                background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* FF3.6+ */
                background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Opera11.10+ */
                background-image: linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* W3C */

                -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.30);
                -moz-box-shadow:    1px 1px 3px rgba(0, 0, 0, 0.30);
                box-shadow:         1px 1px 3px rgba(0, 0, 0, 0.30);         

                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                -o-border-radius: 5px;
                border-radius: 5px;

                border: 0 !important;

                text-shadow:  rgba(255, 255, 255, 0.1) -1px 0, rgba(0, 0, 0, 0.3) 1px 1px;
                letter-spacing: 1px;
                text-transform: capitalize;

            -webkit-transition: background-color 0.3s ease;
            -moz-transition: background-color 0.3s ease;
            -o-transition: background-color 0.3s ease;
            -ms-transition: background-color 0.3s ease;
            transition: background-color 0.3s ease;

            }

            input.glossy-button{
                vertical-align: middle;
                line-height: normal !important;
                padding-bottom: 0;
            }
            
            .pinkish:hover{
                background-color: #Ff3366;
            }
            .lime:hover{
                background-color: #59b606;
            }
            .blue:hover{
                background-color: #027bbf;
            }
            .coffee:hover{
                background-color: #832f02;
            }
            .strawberry:hover{
                background-color: #f92020;
            }
            .dark:hover{
                background-color: #000000;
            }

            button:hover, .glossy-button:hover{
/*                background-color: #000000;*/
                border-color: #333333;
            }
            button:active, .glossy-button:active{
                background-color: #333333;
                border-color: #333333;
                color:#eeeeee;

            } 
            .ie button, .ie .glossy-button {
                background-image:url(images/butt-bg_slither.png);
                background-repeat: repeat-x;
                background-position:center center;
                line-height: 29px;
            }   
            
            .ie8 button, .ie8 .glossy-button{
                border:1px solid #ccc !important;
            }
        </style>


    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>

        <div id="wrapper">

            <?PHP
            include_once("includes/sidebar.html");
            ?>
            <div id="innerContent">

                <h2>We buttons like to be pushed. Click around!</h2>
                
                <p>buttons: &lt;button&gt;</p><p> <button class="pinkish">Pink</button>&nbsp;<button class="dark">midnight</button>&nbsp;<button class="lime">Lime</button>&nbsp;<button class="blue">blue</button>&nbsp;<button class="coffee">coffee</button>&nbsp;<button class="strawberry">strawberry</button></p>
                <p>links: &lt;a href="#"&gt;</p><p><a href="#" class="glossy-button pinkish">Pink</a> <a href="#" class="glossy-button dark">midnight</a> <a href="#" class="glossy-button lime">lime</a> <a href="#" class="glossy-button blue">blue</a> <a href="#" class="glossy-button coffee">coffee</a> <a href="#" class="glossy-button strawberry">strawberry</a> </p>
                <p>inputs: &lt;input&gt;</p><p><input type="submit" class="glossy-button lime" value="submit"> <input type="reset" class="glossy-button blue" value="reset"></p>

                <style>
                    .row{
                        border-bottom: 1px solid black;
                        height: 18px;
                    }
                    .row div{
                        float: left;
                        display: block;
                        background-color: white; /* whatever your page bg color */
                        height: 19px;
                </style>               
                <div class="row">
<div>Name &amp; Age:</div><div>&nbsp;</div>
</div>
<div class="row">
    <div>more information ....</div>
</div>

                
            </div><!-- #innerContent -->
        </div><!-- #wrapper -->


        <script src="js/jquery.tools.min.js"></script> 
        <script src="js/jquery-ui-1.8.13.custom.min.js"></script> 
        <script src="js/portfolio.js"></script> 
        
    </body>
</html>
