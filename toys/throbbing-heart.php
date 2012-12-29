<?php
$next = "glossy-buttons-tut.php";
$prev = "/toys/";
$title = "HTML5 Throbbing Heart";
require_once ("sandbox-header.php");
?>

    <script>
        $(function(){
            var w = $(window).width();
            var h = $(window).height();
            var canvas = $("canvas");
            
            var ch = canvas.height();
            
            canvas.css({"margin-top":h/2 - ch/2});
            
        });
    </script>
 
    <canvas id="canvas" width="250">
    <em> (You can't see this really awesome animation, because your browser doesn't support &lt;canvas&gt;.<br />
        For a better internet experience go <a href="http://www.google.com/chrome">download google chrome</a>)</em>
      
    </canvas>
<script src="/js/heart.js"></script>
<?php

require_once ("sandbox-footer.php");
?>