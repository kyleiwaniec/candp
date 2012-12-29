<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8"/>
<style>
    
    
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script>
$(function(){
   
$.ajaxSetup({
    error: function(jqXHR, settings, exception) {
        alert('error!');
      var url = 'error.php?status='+jqXHR.status+'&object='+jqXHR+'&error='+jqXHR.responseText+'&expmessage='+exception.message+'&url='+settings.url;
      $.ajax({async: true, type:'POST',url: url, dataType: 'json'});
//      if (jqXHR.status === 0) {
//          final_message(ERROR_MSG + '0'); // Not connected. Please verify network is connected.
//      } else if (jqXHR.status == 404) {
//          final_message(ERROR_MSG + '404'); // Requested page not found. [404]
//      } else if (jqXHR.status == 500) {
//          final_message(ERROR_MSG + '500'); // Internal Server Error [500].
//      } else if (exception === 'parsererror') {
//          final_message(ERROR_MSG + '1'); // Requested JSON parse failed.
//      } else if (exception === 'timeout') {
//          final_message(ERROR_MSG + '2'); // Time out error.
//      } else if (exception === 'abort') {
//          final_message(ERROR_MSG + '3'); // Ajax request aborted.
//      } else {
//          final_message(ERROR_MSG + '99'); // Uncaught Error
//      }
    }



});
 
// $.ajaxSetup({
//        error: function(jqXHR, exception) {
//            if (jqXHR.status === 0) {
//                alert('Not connected.\n Verify Network.');
//            } else if (jqXHR.status == 404) {
//                alert('Requested page not found. [404]');
//            } else if (jqXHR.status == 500) {
//                alert('Internal Server Error [500].');
//            } else if (exception === 'parsererror') {
//                alert('Requested JSON parse failed.');
//            } else if (exception === 'timeout') {
//                alert('Time out error.');
//            } else if (exception === 'abort') {
//                alert('Ajax request aborted.');
//            } else {
//                alert('Uncaught Error.\n' + jqXHR.responseText);
//            }
//        }
//    });
 
 
   $('form').submit(function(e){
    
    e.preventDefault();
    $("body").load("hithere.php");
//    $.ajax({
//        async: true, 
//        type:'POST',
//        url: 'hithere.php', 
//        //dataType: 'json',
//        error:function (xhr, ajaxOptions, thrownError){
//           alert(xhr.status);
//           alert(thrownError);
//
//           if (xhr.status === 0) {
//            alert("Not connected. Please verify network is connected."); 
//            }
//        }
//});
    
   });
});
</script>
<body>

 
    <form method="post">
        
        <input type="text"/>
        <input type="submit"/>
    </form>
    
<?php
$status     = 99;
if(isset($_GET['status'])) {
  $status     = $_GET['status'];
}

$object = '';
if(isset($_GET['object'])) {
  $object     = json_encode($_GET['object']);
}

$url = '';
if(isset($_GET['url'])) {
  $url     = $_GET['url'];
}

$expmessage = 'No Exception Message';
if(isset($_GET['expmessage'])) {
  $expmessage = $_GET['expmessage'];
}  

$error      = 'No Error Text';
if(isset($_GET['error'])) {
  $error      = htmlentities($_GET['error']);
}

$msg = "Timestamp:".date("m-d-Y H:i:s")."\n\rErrorInfo: ".$status."\nObject:".$object."\nException Message:".$expmessage."\nError:".$error."\nURL:".$url;

$fp = fopen('/var/tmp/ajax_error.txt', 'a');
fwrite($fp, $msg);
fclose($fp);

$headers = 'From: My System <noreply@myserver.com>' . "\r\n";
mail("kyleih@optonline.net", "Ajax Error", $msg, $headers);
?>
</body>
</html>
