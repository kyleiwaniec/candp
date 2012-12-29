<?php

$stylesheet = "mobile-toprail-5.css";
$title = "Mobile Menu Moore Machine";
require_once ("sandbox-header.php");
?>


<style>
    .wrapper{
      max-width:1400px !important;
    }
    .content{
        width:320px;
        margin:0 auto;
    }
    .content ul, .content li{
        margin:0;
        padding:0;
        list-style: none;
    }
    .content li{
        padding:10px;
        border-bottom: 1px dotted #333;
    }
</style>
<script type="text/javascript">
    $(function(){
	
       
    });
</script>
<div class="content">
<h1>A few JAVA samples</h1>
<p>Here's a small sampling of Java programs I wrote. These HTML files were generated with my very own ParserMachine :)</p>
<ul>
<?php
   

                    $filenames = glob("java/*.html");
              
                    foreach($filenames as $file){

                       echo "<li><a href=$file>$file</a></li>";
                    }
               
?>
</ul>
</div>
<?php

require_once ("sandbox-footer.php");
?>