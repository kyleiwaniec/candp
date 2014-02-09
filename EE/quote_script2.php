<?php require_once('../Connections/conn_cmyuk.php'); ?>

<div id="printer_quote">
<form action="" method="POST" name="QuoteForm" id="QuoteForm" class="QuoteForm">


<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if(isset($_POST["printer_select"])){
      mysql_select_db($database_conn_cmyuk, $conn_cmyuk);
      $query_rs_printer_select = "SELECT * FROM printer WHERE id = ". $_POST["printerid"];
      $rs_printer_select = mysql_query($query_rs_printer_select, $conn_cmyuk) or die(mysql_error());
      $row_rs_printer_select = mysql_fetch_assoc($rs_printer_select);
      $totalRows_rs_printer_select = mysql_num_rows($rs_printer_select);
      
      $id = $row_rs_printer_select['id'];
      $name = $row_rs_printer_select['name'];
      
      echo "<input name='printer_id' type='hidden' id='printer_id' value='{$id}' />

            <h1>Get your {$name} Quote Online now!</h1>";


        }

?>


  


<p>Please enter you details below and we will send you a personalised quotation.</p>

      <p class="first_name"> 
   <label for="first_name">First Name <span>*</span></label>
   <input name="first_name" type="text" id="first_name" size="45"/>
   </p>
   
   <p class="last_name">
   <label for="last_name">Last Name <span>*</span></label>
   <input name="last_name" type="text" id="last_name" size="45" />
   </p>
   
   <p class="company">
   <label for="company">Company <span>*</span></label>
   <input name="company" type="text" id="company" size="45" />
   </p>
   
   <p class="address1">
   <label for="address1">Address Line 1 <span>*</span></label>
   <input name="address1" type="text" id="address1" size="45" />
   </p>
   
   <p class="address2">
   <label for="address2">Address Line 2</label>
   <input name="address2" type="text" id="address2" size="45" />
   </p>

      <p class="town_city">
      <label for="town_city">Town / City <span>*</span></label>
         <input name="town_city" type="text" id="town_city" size="45" />
    </p>

      <p class="county">
      <label for="county">County</label>
         <input name="county" type="text" id="county" size="45" />
    </p>
    
    <p class="post_code">
    <label for="post_code">Post Code <span>*</span></label>
         <input name="post_code" type="text" id="post_code" size="45" />
    </p>
    
    <p class="phone">
    <label for="phone">Phone</label>
         <input name="phone" type="text" id="phone" size="45" />
    </p>
    
    <p class="fax">
    <label for="fax">Fax</label>
         <input name="fax" type="text" id="fax" size="45" />
    </p>
    
    <p class="email">
    <label for="email">Email <span>*</span></label>
         <input name="email" type="text" id="email" size="45" />
    </p>

      <input type="submit" name="Quote" id="Quote" value="Send me a Quote" class="Big_Button"/>
 
 </form>
 
 <div id="Quote_Success">
 
 <h1>Quotation Request Sent</h1>
 
 <p>Dear <strong>xxxxx</strong></p>

<p>Thank you for your quotation request for the <strong>xxxx</strong> Printer.</p>
 
<p>You quotation request has been sent for approval. We will email you a personalised quote shortly.<br />
  <br />
  Kind Regards<br />
  <br />
  <strong>CMYUK</strong></p>

<p class="moreinfo">If you have any other questions call us on <strong>+44 (0) 118 989 2929</strong> or email 
                <script language="JavaScript" type="text/javascript">
                    $(".moreinfo").append('<strong><a href=\"mailto:info'+ '@' + 'cmyuk.com\">info'+ '@' +'cmyuk.com</a></strong>.');
                    
                </script>
            
</p>
 
 </div>
 
  <?php mysql_free_result($rs_printer_select); ?>
 
</div>