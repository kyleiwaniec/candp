<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8"/>
<style>
    
    
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script>
$(function(){
    
// Loop through each td that contains the date and update.
$('#report-results-table tbody tr td.interval').each(function(){
        var ReformatDate = $(this).html();
        ReformatDate = ReformatDate.split("-");
        $(this).html("<span class='report-result-date'>"+ ReformatDate[2] + "/" + ReformatDate[1]+
                     "</span> <span class='report-result-year'>" + ReformatDate[0] + "</span>");
       
});
   
   $.ajaxSetup({
    error: function(jqXHR, settings, exception) {
      var url = AJAX_ERROR_LOG_URL + '?status='+jqXHR.status+'&object='+jqXHR+'&error='+jqXHR.responseText+'&expmessage='+exception.message+'&url='+settings.url;
      $.ajax({async: true, type:'POST',url: url, dataType: 'json'});
      if (jqXHR.status === 0) {
          final_message(ERROR_MSG + '0'); // Not connected. Please verify network is connected.
      } else if (jqXHR.status == 404) {
          final_message(ERROR_MSG + '404'); // Requested page not found. [404]
      } else if (jqXHR.status == 500) {
          final_message(ERROR_MSG + '500'); // Internal Server Error [500].
      } else if (exception === 'parsererror') {
          final_message(ERROR_MSG + '1'); // Requested JSON parse failed.
      } else if (exception === 'timeout') {
          final_message(ERROR_MSG + '2'); // Time out error.
      } else if (exception === 'abort') {
          final_message(ERROR_MSG + '3'); // Ajax request aborted.
      } else {
          final_message(ERROR_MSG + '99'); // Uncaught Error
      }
    }
  });
   $('form').submit(function(){
    $.ajax({
        
    });
   });
});
</script>
<body>

    <table id="report-results-table">
        <tbody>
        <tr>
            <td class="interval">2012-01-21</td>
        </tr>
        </tbody>
    </table>
    <form>
        
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
