<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>web portfolio - graphic design and technology services - copy &amp; paste generation</title>

<meta name="description" content="web portfolio - graphic design and technology services">
<meta name="author" content="Kyle Hamilton">
  
 <!-- Mobile -->
 <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0;" /> 
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
    <link rel="apple-touch-startup-image" href="/startup.png">
    
    
    <link rel="stylesheet" href="css/scrollable.css"/>
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

<div id="webPortfolioContent">
<div id="portfolioMenu">
    <span class="portMenuItem currPortMenuItem">&raquo; websites &laquo;</span>
    <span class="portMenuItem"><a href="corpid-portfolio.php">Corp Id</a></span>
    <!-- Our Print pages are coming soon. Please check back often.
    <span class="portMenuItem">Print</span>
    
    <span class="portMenuItem">Other</span> -->
</div>
    <style>
        .webItem.one, .webItem.one .scroll, .webItem.one .pics div{height:495px;}
    </style>
    <div class="webItem one">
                <div class="scroll">

                    <div class="pics">
                        <div style='background-image:url(/images/portfolio/cnp-mobile.png)'></div>
                        <div style='background-image:url(/images/portfolio/nj-mobile.png)'></div>
                        <div style='background-image:url(/images/portfolio/keeneip-mobile.png)'></div>
                    </div>
                    </div>
                    <div class="arrows">
                        <a class="back browse left"></a>
                        <a class="forward browse right"></a>
                    </div>
                    <div class="info">
                        <span class="link">Mobile Works in Progress<br/><br/>

                        <span class="title">This section of the portfolio is under development. Please check back for updates.</span><br/>	
                        <span class="descrip"></span><br/><br/>

                        <span class="title">Technology:</span><br/>
                        <span class="descrip">HTML5, CSS3, JavaScript/Ajax</span><br/><br/>

                        <span class="title">Design:</span><br/>
                        <span class="descrip"></span><br/><br/>
                    </div>
                
    </div>
            <div class="webItem">
        
        <div class="scroll">
            <div class="pics">
c
                <?php    

                    $filenames = glob("images/portfolio/500/dba*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://downtownbordentown.com">Downtown Bordentown Association</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Association</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML5, CSS3, JS & jQuery, PHP/MySQL (custom CMS)</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website, Logo</span><br/><br/>
        </div>
        
    </div><!-- web item -->
    <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/rtr*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://www.roberttherealtor.com">RobertTheRealtor.com</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Real Estate</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">XHTML, CSS, JS, AJAX, <br/>PHP/MySQL Database and Admin UI, <br/>And a Wordpress blog</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Logo, Website, Brochures, Ads, Promotional items</span><br/><br/>
        </div>
        
    </div><!-- web item -->
     <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/rwt*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://www.realwalkthru.com">REALWalkthru.com</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Real Estate, Photography</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">XHTML, CSS, JS</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Logo, Website</span><br/><br/>
        </div>
        
    </div><!-- web item -->
     <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/ql*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://www.6QuietLane.com">6QuietLane.com</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Real Estate</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">XHTML, CSS, JS, PHP, Flash</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website</span><br/><br/>
        </div>
        
    </div><!-- web item -->
    
    <div class="webItem"> <!-- 517 ward -->
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/al*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://517wardavenue.com/">517wardavenue.com</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Real Estate</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML, CSS, JS, PHP, Flash</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website</span><br/><br/>
        </div>
        
    </div><!-- web item -->
    <div class="webItem"> <!-- 517 ward -->
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/dr*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://19doreenroad.com/">19doreenroad.com</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Real Estate</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML, CSS, JS, PHP/MySQL (custom CMS), Flash, GoogleMaps Directions & Geocode APIs</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website</span><br/><br/>
        </div>
        
    </div><!-- web item -->
    <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/sprhe*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="https://square-peg-round-hole-emporium.com">sprhe.com</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">E-commerce, Art</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML5, CSS3, JS & jQuery, AJAX, PHP/MySQL, Opencart, Facebook Graph API</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website, Logo</span><br/><br/>
        </div>
        
    </div><!-- web item -->
    <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/cm*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://www.conduitmedia.tv">ConduitMedia.tv</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Art</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML5, CSS3, JS & jQuery, PHP</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website</span><br/><br/>
        </div>
        
    </div><!-- web item -->
    
    <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/ft*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://www.FlashTribe.net">FlashTribe.net</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Social Network</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML5, CSS3, JS & jQuery</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Logo, Website, Mobile App</span><br/><br/>
        </div>
        
    </div><!-- web item -->
    
     <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/kh*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://www.kozahamilton.com">KozaHamilton.com</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Art</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML, CSS, JS</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website, Art</span><br/><br/>
        </div>
        
    </div><!-- web item -->
         
    
       <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/cr*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://www.SplendidlyImperfect.com">SplendidlyImperfect.com</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Art</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML5, CSS3, JS & jQuery</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Logo, Website</span><br/><br/>
        </div>
        
    </div><!-- web item -->
    <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/pg*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://www.PeterGarfield.net">PeterGarfield.net</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Art</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">XHTML, CSS, JS</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website, Print Catalogues</span><br/><br/>
        </div>
        
    </div><!-- web item -->
    
    <div class="webItem">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/tfls*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link"><a href="http://www.TheFatLadySings.net">TheFatLadySings.net</a><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Music</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">XHTML, CSS, JS</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website</span><br/><br/>
        </div>
        
    </div><!-- web item -->

   
    <h2 class="deve">Currently in Development:</h2>
    
    
    
            <div class="webItem dev">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/pk*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link">Keene IP Law<img src="images/construction_stripes.png" title="Under Construction" alt="Under Construction"/><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Law</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML5, CSS3, JS & jQuery, PHP/MySQL (custom CMS)</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website, Logo</span><br/><br/>
        </div>
        
    </div><!-- web item -->
                <div class="webItem dev">
        
        <div class="scroll">
            <div class="pics">

                <?php    

                    $filenames = glob("images/portfolio/500/uli*");
              // glob("images/*");
              // glob("../*");
                    foreach($filenames as $file){

                       echo "<div style='background-image:url($file)'></div>";
                    }
                ?>

            </div>
        </div>
        <div class="arrows">
            <a class="back browse left"></a>
            <a class="forward browse right"></a>
        </div>
        <div class="info">
            <span class="link">UnitedLightInc.org<img src="images/construction_stripes.png" title="Under Construction" alt="Under Construction"/><br/><br/>

            <span class="title">Category:</span><br/>	
            <span class="descrip">Non-Profit</span><br/><br/>

            <span class="title">Technology:</span><br/>
            <span class="descrip">HTML5, CSS3, JS & jQuery, Custom WordPress theme</span><br/><br/>

            <span class="title">Design:</span><br/>
            <span class="descrip">Website, Logo</span><br/><br/>
        </div>
        
    </div><!-- web item -->
                  

    

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
