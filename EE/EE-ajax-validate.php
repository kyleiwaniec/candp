<?php
<?php require_once('../Connections/conn_cmyuk.php'); ?>
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
}

?>

<div id="printer_quote">

<form action="" method="POST" name="QuoteForm" id="QuoteForm" class="QuoteForm">
  
<input name="printer_id" type="hidden" id="printer_id" value="<?php echo $row_rs_printer_select['id']; ?>" />

<h1>Get your <?php echo $row_rs_printer_select['name']; ?> Quote Online now!</h1>

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

<p>If you have any other questions call us on <strong>+44 (0) 118 989 2929</strong> or email <strong><script language="JavaScript" type="text/javascript">
<!-- Begin
document.write('<a href=\"mailto:info'+ '@' + 'cmyuk.com\">');
document.write('info'+ '@' +'cmyuk.com</a>');
// End -->
    </script></strong>.</p>
 
 </div>
 
  <?php mysql_free_result($rs_printer_select); ?>
 
</div>
?>

<!DOCTYPE html> 
<html> 
    <head> 
        <title>Page 02</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" rel="stylesheet"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js" type="text/javascript"></script>  
        <script>
            $.ajax({
                url: 'quote_script.php',
                success: function(data) {
                    $('#Selected_Printer_Quote').html(data);
                    $(".QuoteForm").validate({
				
                        // Rules
                        rules: {
                            first_name: "required",
                            last_name: "required",
                            company: "required",
                            address1: "required",
                            town_city: "required",
                            post_code: "required",
                            email: {
                                required: true,
                                email: true
                            }
                        },
		
                        // Messages
                        messages: {
                            first_name: "Enter your firstname",
                            last_name: "Enter your lastname",
                            company: "Enter your Company",
                            address1: "Enter your Address Line 1",
                            town_city: "Enter your Town / City",
                            post_code: "Enter your Post Code",
                            email: "Invalid email address"
                        },
		
                        errorElement: "span",
	
                        submitHandler: function() { 
                            $(".QuoteForm").slideUp();
                            $("#Quote_Success").slideDown();
                            $("body").scrollTop(0);
                        }
   	
                    });
                }
            });
        </script>
    </head> 
    <body> 
        <div data-role="page" id="page_02">
            <div data-role="header">
                <h1>Page 02</h1>
            </div>
            <div data-role="content">	
                <p>Hello world Page 02</p>
                <a href="/index.php">Go Back</a>		
            </div>
        </div>
    </body>
</html>