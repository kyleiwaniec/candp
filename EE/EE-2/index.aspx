<%@ Page Language="C#" AutoEventWireup="true" CodeFile="index.aspx.cs" Inherits="index" %>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head runat="server">
    <meta charset="utf-8" />

    <!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/i/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title></title>
    <meta name="description" content="" />

    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="css/main.css" />

    <!-- All JavaScript at the bottom, except this Modernizr build. Modernizr enables HTML5 elements & feature detects for optimal performance. Create your own custom Modernizr build: www.modernizr.com/download/ -->
    <script src="js/libs/modernizr-2.5.3.min.js"></script>
    
</head>
<body>
    <form id="form1" runat="server">
        <div id="page">
            <header>
                <img src="img/Logo.png" class="logo" />
                <nav>
                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#">GALLERIES</a></li>
                        <li><a href="#">PRICES</a></li>
                        <li><a href="#">CONTACTS</a></li>
                    </ul>
                </nav>
            </header>

            <section class="flexslider">
                <ul class="slides">
	    	        <li><img src="img/1.jpg" /></li>
                    <li><img src="img/2.jpg" /></li>
                    <li><img src="img/3.jpg" /></li>
                    <li><img src="img/5.jpg" /></li>
                    <li><img src="img/6.jpg" /></li>
                    <li><img src="img/7.jpg" /></li>
                    <li><img src="img/8.jpg" /></li>
                    <li><img src="img/9.jpg" /></li>
	            </ul>
            </section>

            <footer>
            </footer>

        <script src="js/libs/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="js/libs/jquery.flexslider-min.js"></script>

        <!-- scripts concatenated and minified via build script -->
        <script src="js/plugins.js"></script>
        <script src="js/script.js"></script>
        <!-- end scripts -->

        <!-- Begin FlexSlider script -->
        <script type="text/javascript">
            $(window).load(function () {
                $('.flexslider').flexslider();
            });
	    </script>
        <!-- end FlexSlider script -->

        <!-- Begin Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID. mathiasbynens.be/notes/async-analytics-snippet -->
        <script>
            var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
            (function (d, t) {
                var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
                g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g, s)
            }(document, 'script'));
        </script>
        <!-- End Asynchronous Google Analytics snippet -->

        </div>
    </form>
</body>
</html>
