<?php
session_start();

if (isset($_SERVER["PHP_SELF"]))
	$sThisScript = $_SERVER["PHP_SELF"];
elseif (isset($HTTP_SERVER_VARS["PHP_SELF"]))
	$sThisScript = $HTTP_SERVER_VARS["PHP_SELF"];
else
    die("No PHP_SELF defined");

$bCompare = false;
if (isset($_POST["compare"]))
    $bCompare = true;
elseif (isset($HTTP_POST_VARS["compare"]))
    $bCompare = true;

if ($bCompare)
{
    if (isset($_SESSION["VerifyImgString"]))
        $sVerifyImgString = $_SESSION["VerifyImgString"];
    elseif (isset($HTTP_SESSION_VARS["VerifyImgString"]))
        $sVerifyImgString = $HTTP_SESSION_VARS["VerifyImgString"];
	else
		die("No VerifyImgString found in session");
	if (isset($_POST["verify_input"]))
		$sInput = $_POST["verify_input"];
	elseif (isset($HTTP_POST_VARS["verify_input"]))
		$sInput = $HTTP_POST_VARS["verify_input"];
	else
		die("No input found");
	if ($sVerifyImgString === $sInput)
		echo "<p>Your input was correct!</p>";
	else
		echo "<p>Your input did not match the image.</p>";
	echo "<p><a href=\"$sThisScript\">Try again</a>.</p>";
}
else
{

}
?>


