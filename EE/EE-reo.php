<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  $(".TextBox").hover(function(){
    $(this).toggleClass('TextBoxSelected');
  },function(){
    $(this).toggleClass('TextBoxSelected');
  }).change(function(){
     calculate();
     
  });
  
var digits = function(digits){
      $(digits).keyup( 
         function() {
           $(this).val( $(this).val().replace(/[A-Za-z$-,\s+]/g, ""));
           //$(this).val( $(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
           
         });
    };
    
digits('.TextBox'); 
  
});

function calculate() {
  
  
  var property_SPrice        = parseFloat($('#property_SPrice').val());

  //var price                  = parseFloat($('#price').val());
  var price                  = property_SPrice;

  var REO_sale_percentage    = parseFloat($('#REO_sale_percentage').val());
  var REO_sale_dollars       = parseFloat($('#REO_sale_dollars').val());
  var REO_sale_bonus_dollars = parseFloat($('#REO_sale_bonus_dollars').val());
  var REO_sale_fixed_dollars = parseFloat($('#REO_sale_fixed_dollars').val());
  var REO_sale_total_dollars = parseFloat($('#REO_sale_total_dollars').val());
  

  var REO_list_percentage    = parseFloat($('#REO_list_percentage').val());
  var REO_list_dollars       = parseFloat($('#REO_list_dollars').val());
  var REO_list_bonus_dollars = parseFloat($('#REO_list_bonus_dollars').val());
  var REO_list_fixed_dollars = parseFloat($('#REO_list_fixed_dollars').val());
  var REO_list_total_dollars = parseFloat($('#REO_list_total_dollars').val());
  
  var gr_comm_percentage     = parseFloat($('#gr_comm_percentage').val());
  var gr_comm_dollars        = parseFloat($('#gr_comm_dollars').val());
  var gr_bonus_dollars       = parseFloat($('#gr_bonus_dollars').val());
  var gr_fixed_dollars       = parseFloat($('#gr_fixed_dollars').val());
  var gr_total_dollars       = parseFloat($('#gr_total_dollars').val()); 
  
  var OB_percentage          = parseFloat($('#OB_percentage').val());
  var OB_dollars             = parseFloat($('#OB_dollars').val());
  var OB_fixed_dollars       = parseFloat($('#OB_fixed_dollars').val());
  var OB_bonus_dollars       = parseFloat($('#OB_bonus_dollars').val());
  var OB_total_dollars	     = parseFloat($('#OB_total_dollars').val());



  $('#price').val(property_SPrice + 0);
  
  
  $('#gr_comm_percentage').val(REO_list_percentage + REO_sale_percentage + OB_percentage);
  
  $('#gr_comm_dollars').val(REO_list_dollars + REO_sale_dollars + OB_dollars);
  $('#REO_list_dollars').val(REO_list_percentage/100*price);
  
  //	if(REO_sale_percentage != 0){
            $('#REO_sale_dollars').val(REO_sale_percentage/100*price);
 	//}else{
       //     $('#REO_sale_dollars').val(REO_sale_dollars);
    //    }
        
  $('#gr_fixed_dollars').val(REO_list_fixed_dollars + REO_sale_fixed_dollars + OB_fixed_dollars);
  $('#gr_bonus_dollars').val(REO_list_bonus_dollars + REO_sale_bonus_dollars + OB_bonus_dollars);
  $('#gr_total_dollars').val(REO_sale_total_dollars + REO_list_total_dollars + OB_total_dollars);
  $('#REO_sale_total_dollars').val(REO_sale_dollars + REO_sale_fixed_dollars + REO_sale_bonus_dollars);
  $('#REO_list_total_dollars').val(REO_list_dollars + REO_list_fixed_dollars + REO_list_bonus_dollars);
  $('#OB_dollars').val(OB_percentage/100*price);
  $('#OB_total_dollars').val(OB_dollars +OB_fixed_dollars + OB_bonus_dollars);
  
}

//$('#REO_sale_dollars').change(function(){
//    calculate();
//    
//});
//
//$('#REO_sale_percentage').change(function(){
//    calculate();
//});



</script>

    <body>
        <div class="fields">
        <span>property_SPrice: <input type="text" id="property_SPrice" class="TextBox" value="0"></span><br>
        <span>price: <input type="text" id="price" class="TextBox" value="0"></span><br>
        <span>REO_sale_percentage: <input type="text" id="REO_sale_percentage" class="TextBox" value="0"></span><br>
        <span>REO_sale_dollars: <input type="text" id="REO_sale_dollars" class="TextBox" value="0"></span><br>
        <span>REO_sale_bonus_dollars: <input type="text" id="REO_sale_bonus_dollars" class="TextBox" value="0"></span><br>
        <span>REO_sale_fixed_dollars: <input type="text" id="REO_sale_fixed_dollars" class="TextBox" value="0"></span><br>
        <span>REO_sale_total_dollars: <input type="text" id="REO_sale_total_dollars" class="TextBox" value="0"></span><br>

        <span>REO_list_percentage: <input type="text" id="REO_list_percentage" class="TextBox" value="0"></span><br>
        <span>REO_list_dollars: <input type="text" id="REO_list_dollars" class="TextBox" value="0"></span><br>
        <span>REO_list_bonus_dollars: <input type="text" id="REO_list_bonus_dollars" class="TextBox" value="0"></span><br>
        <span>REO_list_fixed_dollars: <input type="text" id="REO_list_fixed_dollars" class="TextBox" value="0"></span><br>
        <span>REO_list_total_dollars: <input type="text" id="REO_list_total_dollars" class="TextBox" value="0"></span><br>
        
        <span>gr_comm_percentage: <input type="text" id="gr_comm_percentage" class="TextBox" value="0"></span><br>
        <span>gr_comm_dollars: <input type="text" id="gr_comm_dollars" class="TextBox" value="0"></span><br>
        <span>gr_bonus_dollars: <input type="text" id="gr_bonus_dollars" class="TextBox" value="0"></span><br>
        <span>gr_fixed_dollars: <input type="text" id="gr_fixed_dollars" class="TextBox" value="0"></span><br>
        <span>gr_total_dollars: <input type="text" id="gr_total_dollars" class="TextBox" value="0"></span><br>
        
        <span>OB_percentage: <input type="text" id="OB_percentage" class="TextBox" value="0"></span><br>
        <span>OB_dollars: <input type="text" id="OB_dollars" class="TextBox" value="0"></span><br>
        <span>OB_fixed_dollars: <input type="text" id="OB_fixed_dollars" class="TextBox" value="0"></span><br>
        <span>OB_bonus_dollars: <input type="text" id="OB_bonus_dollars" class="TextBox" value="0"></span><br>
        <span>OB_total_dollars: <input type="text" id="OB_total_dollars" class="TextBox" value="0"></span><br>
        
        </div>

    </body>
</html>
