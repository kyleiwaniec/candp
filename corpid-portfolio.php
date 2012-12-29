<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>corp id portfolio - graphic design and technology services - copy &amp; paste generation</title>

        <meta name="description" content="web portfolio - graphic design and technology services">
        <meta name="author" content="Kyle Hamilton">

        <!-- Mobile -->
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0;" /> 
        <meta name="apple-mobile-web-app-capable" content="yes" /> 
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
        <link rel="apple-touch-startup-image" href="/startup.png">


        <link rel="stylesheet" href="css/styles2.css"/>

        




    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>
        <div class="apple_overlay" id="overlay">

            <!-- the external content is loaded inside this tag -->
            <div class="contentWrap"></div>

        </div>
        <div id="wrapper">

            <?PHP
            include_once("includes/sidebar.html");
            ?>

            <div id="corpidPortfolioContent">
                <div id="portfolioMenu">
                    <span class="portMenuItem"><a href="web-portfolio.php">websites</a></span>
                    <span class="portMenuItem currPortMenuItem">&raquo; Corp Id &laquo;</a></span>
                    <!-- Our Print pages are coming soon. Please check back often.
                    <span class="portMenuItem">Print</span>
                    
                    <span class="portMenuItem">Other</span> -->
                </div>
                
                <?php    

                    $filenames = glob("images/portfolio/*logo.jpg");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div class='corpidItem'>
                             <div style='background-image:url($file)'></div>
                            </div><!-- corpid item -->";
                    }
                ?>


            </div><!-- .portfolioContent -->
        </div><!-- #wrapper -->
        <!-- overlayed element -->

        <!-- <div class="button" id="more">more</div> -->
        <!--<script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>-->
        <script src="js/jquery.tools.min.js"></script> 
        <script src="js/jquery-ui-1.8.13.custom.min.js"></script> 
        <script src="js/jquery.imageLoader.min.js"></script>
        <script src="js/getimages.js"></script>
        <script src="js/portfolio.js"></script> 
        
    </body>
</html>
