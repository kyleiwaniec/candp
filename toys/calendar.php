<?php
$title = "CSS3 - Card Flip Example";
require_once ("sandbox-header.php");
?>
<style>
    .wrapper{
        max-width: 970px;
    }
    iframe{
        border:1px dashed #ccc;
        margin-top:20px;
    }
</style>	
<h2>AJAX Calendar Application</h2>
<p>Shown here in an iframe to demonstrate database integration. <br/>
    <em>The calendar application comes with a CMS including recurring events.</em></p>
<iframe src="http://downtownbordentown.com/calendar-for-cnp.php" width="970" height="720" frameborder="0" scrolling="no"></iframe>
<?php

require_once ("sandbox-footer.php");
?>