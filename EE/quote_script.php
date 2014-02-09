<?php require_once('quickmysql.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
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

connect();



if (isset($_POST["printer_select"])) {

    //mysql_select_db($database_conn_cmyuk, $conn_cmyuk);
//    $query_rs_printer_select = "SELECT * FROM test . printer WHERE id = " . $theid;
//    $rs_printer_select = mysql_query($query_rs_printer_select) or die(mysql_error());
//    $row_rs_printer_select = mysql_fetch_assoc($rs_printer_select);
//    $totalRows_rs_printer_select = mysql_num_rows($rs_printer_select);

    $theid = $_POST["printerid"];
    $printers = mysql_query("SELECT * FROM `test`.`printer` WHERE `id` = $theid");

    $rows = mysql_num_rows($printers);


    if ($rows > 0) {
        // show data
        while ($data = mysql_fetch_assoc($printers)) {
            $id = $data['id'];
            $name = $data['name'];
        }
        echo "<div id='printer_quote'>

                <form action='' method='POST' name='QuoteForm' id='QuoteForm' class='QuoteForm'>

                <input name='printer_id' type='hidden' id='printer_id' value='
                        {$name}' />

                <h1>Get your {$name} Quote Online now!</h1>

                <p>Please enter you details below and we will send you a personalised quotation.</p>

                <p class='first_name'>
                    <label for='first_name'>First Name <span>*</span></label>
                    <input name='first_name' type='text' id='first_name' size='45'/>
                </p>

                <p class='last_name'>
                    <label for='last_name'>Last Name <span>*</span></label>
                    <input name='last_name' type='text' id='last_name' size='45' />
                </p>




                <input type='submit' name='Quote' id='Quote' value='Send me a Quote' class='Big_Button'/>

            </form>

            <div id='Quote_Success'>

                <h1>Quotation Request Sent</h1>

                <p>Dear <strong>xxxxx</strong></p>

                <p>Thank you for your quotation request for the <strong>xxxx</strong> Printer.</p>

                <p>You quotation request has been sent for approval. We will email you a personalised quote shortly.<br />
                    <br />
                    Kind Regards<br />
                    <br />
                    <strong>CMYUK</strong></p>

                <p class='moreinfo'>If you have any other questions call us on <strong>+44 (0) 118 989 2929</strong> or email 


            </p>
            </div>";
    }
}







mysql_free_result($rs_printer_select);
disconnect();
?>
</div>
