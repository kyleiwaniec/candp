<!DOCTYPE html>
<html>
    <head>
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

    </head>


<body>
<table align="center">
 <td nowrap="nowrap" align="right"><div align="left">File Ref</div></td>
      <td><select name="file_Ref" id="file_ref">
      
      <option value="<?php echo $row_Recordset1['file_ref']?>"><?php echo $row_Recordset1['file_ref']?></option>
          </select>
      
<?php    

echo "<script>
                \$(function(){
                
                \$('#file_ref').change(function(){
                    var fileRef = \$('#file_ref option:selected').val();
                    //alert(fileRef); // just checking to make sure the selected value is being written
                    location.href = '?file_Ref='+fileRef;
                    });


                });
              </script>";
        
$file_ref = $_GET["file_Ref"];

$table = "<table cellpadding=3 cellspacing=0 border=1>
<tr><th>Date</th><th>Time</th><th>Description</th></tr>";
mysql_select_db($database_hartwell, $hartwell);
$sql = "SELECT * FROM `attendance` WHERE `file_ref` = '$file_ref' ORDER BY `id` DESC";
//$result = mysql_query($sql)or doe(mysql_error());
$result = mysql_query($sql)or die(mysql_error());
while($row = mysql_fetch_array($result, MYSQL_ASSOC()))

        

{
$date = $row['date'];
$time = $row['time'];
$description = $row['description'];
$table .= "<tr><td>$date</td><td>$time</td><td>$description</td></tr>";
}
$table .= "</table>";
echo $table;

?>
</body>
</html>