<?php // RAY_html5.php
error_reporting(E_ALL);
$y = $x;
// CREATE VARIABLES FOR OUR HTML
$xyz = 'Hello World. ';


// CREATE OUR WEB PAGE IN HTML5 FORMAT
$htm = <<<HTML5
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="utf-8" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<title>HTML5 Page in UTF-8 Encoding</title>
</head>
<body>
<p>$xyz</p>
</body>
</html>
HTML5;

// RENDER THE WEB PAGE
echo $htm;