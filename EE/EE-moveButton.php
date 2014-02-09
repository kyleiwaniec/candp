<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8"/>
<title>Move the button</title>
<?php
/*
 
isMobile.php
A PHP script to detect mobile phones.
v1.1 :: 23 September 2008
 
Check out my blog
 
http://www.richardshepherd.com
 
Or subscribe to my RSS feed
 
http://feeds.feedburner.com/RichardShepherd
 
*/
 
function isMobile() {
 
// Check the server headers to see if they're mobile friendly
if(isset($_SERVER["HTTP_X_WAP_PROFILE"])) {
return true;
}
 
// If the http_accept header supports wap then it's a mobile too
if(preg_match("/wap.|.wap/i",$_SERVER["HTTP_ACCEPT"])) {
return true;
}
 
// Still no luck? Let's have a look at the user agent on the browser. If it contains
// any of the following, it's probably a mobile device. Kappow!
if(isset($_SERVER["HTTP_USER_AGENT"])){
$user_agents = array("iphone", "midp", "j2me", "avantg", "docomo", "novarra", "palmos", "palmsource", "240x320", "opwv", "chtml", "pda", "windows ce", "mmp/", "blackberry", "mib/", "symbian", "wireless", "nokia", "hand", "mobi", "phone", "cdm", "up.b", "audio", "SIE-", "SEC-", "samsung", "HTC", "mot-", "mitsu", "sagem", "sony", "alcatel", "lg", "erics", "vx", "NEC", "philips", "mmm", "xx", "panasonic", "sharp", "wap", "sch", "rover", "pocket", "benq", "java", "pt", "pg", "vox", "amoi", "bird", "compal", "kg", "voda", "sany", "kdd", "dbt", "sendo", "sgh", "gradi", "jb", "dddi", "moto");
foreach($user_agents as $user_string){
if(preg_match("/" . $user_string . "/i",$_SERVER["HTTP_USER_AGENT"])) {
return true;
}
}
} else {
 
// Let's NOT return "mobile" if it's an iPhone, because the iPhone can render normal pages quite well.
//if(preg_match("/iphone/i",$_SERVER["HTTP_USER_AGENT"])) {
//return false;
//}
 
// None of the above? Then it's probably not a mobile device.
return false;
}
}
 
// Here's our code to which calls the above function
if (isMobile()) {
// if the function returned true, it's a mobile.
echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
      <script>
        $(function(){
        var gb = $('.green_btn');
            $('.green_btn').detach();
            $('.detail').append(gb); 
        });
        </script>"; 
 
// header('Location: http://www.yoursite.mobi/'); // let's redirect the page to the mobile site
 
} else {
// if not, we're in a standard browser and our page
// can proceed as normally formatted for the web!
 echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
      <script>
        $(function(){
        alert('this is not a mobile!');
        });
        </script>\n";

}
?>
<style>

</style>

<body>
<div class="detail">
    <div class="left"> 
        <span class="time"><strong>9am - 10am</strong> EST</span> 
        <span class="location"><strong>Chemistry</strong></span> 
        <span class="year">Year level: <strong>6-9</strong></span> 
        <a href="#" class="green_btn"><span>Get Started</span></a> 
    </div>
    <div class="mid">
    <h3> Session Name lorem dolor sit amet consectetur adipiscing. </h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing erna lacinia mauris, vitae posuere odio dolor in eros. <a href="#">Read More...</a></p>
    </div>

</div>

</body>
</html>