<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>copy &amp; paste generation</title>


<meta name="description" content="">
<meta name="author" content="">
  
    <!-- Mobile -->
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0;" /> 
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
    <link rel="apple-touch-startup-image" href="/startup.png">
    
    <?php
        $filename = 'test.css';
        
        // variables
        $backgroundColor = "orange";
        $paraColor = "#333";
        
        
        $contents = "
        body{
             color:$backgroundColor;
        }
        p{
            color:$paraColor;
        }
        ";
        
        
        // write to file
            if (!$handle = fopen($filename, 'w')) {
                echo "Cannot open file ($filename)";
                exit;
            }
            if (fwrite($handle, $contents) === FALSE) {
                echo "Cannot write to file ($filename)";
                exit;
            }

            fclose($handle);

            echo "<link href='$filename' rel='stylesheet'/>";
        ?>


</head>

<body>
    <p>something</p>
</body>
</html>



