<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title></title>
    <style>
        .newtwit{
            height:200px;
            background-color:greenyellow;
        }
    </style>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="jquery-editInPlace/lib/jquery.editinplace.js"></script>

  </head>
  <body>
      <?php
$savingText="saving....";
$selectOptions="no:no";
        echo '<h3>Value:<span id="yesOrNo">'.$yesOrNo.'</span></h3>';
        echo '<script type="text/javascript">
                    $(document).ready(function(){
                        $("#yesOrNo").editInPlace({


                url: "packages.php",
                params: "a=renamepackage&pid=1",

                            saving_text: "'.$savingText.'",
                            field_type: "select",
                            select_options: "'.$selectOptions.'"
                        });
                    });
                </script>';
?>
  </body>
</html>