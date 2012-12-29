<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script>
$(function(){
       var product = $(".product"); 
       var FQ1 = $(".FullQuantity1");
       var FQP1 = $(".FullQuantityPrice1");
       var BQ1 = $(".BuyQuantity1");
       var UP1 = $(".UnitPrice1");
       var A1 = $(".Amount1");
       var addToCart_chbx = $("input[name='Add2Cart']");
       
       
       product.each(function(){
           var that = $(this);
           var BQ1_val = that.find(BQ1).val(); // quantity
           
           that.find(BQ1).change(function(){
               
               
           });
           
           
           
       });
       
});
</script>
    <body>
        <table>
            <tr>
                <td class="product">
                    <input type="hidden" class="FullQuantity1" value="100" />
                    <input type="hidden" class="FullQuantityPrice1" value=".50" />
                    <input type="text" class="BuyQuantity1" value="100" />
                    <input type="hidden" class="UnitPrice1" value=".50" />
                    <input type="hidden" class="Amount1" value="50" />
                    <input type="checkbox" name="Add2Cart" value="on" > 
                </td>
            </tr>
             <tr>
                <td class="product">
                    <input type="hidden" class="FullQuantity1" value="200" />
                    <input type="hidden" class="FullQuantityPrice1" value=".60" />
                    <input type="text" class="BuyQuantity1" value="200" />
                    <input type="hidden" class="UnitPrice1" value=".60" />
                    <input type="hidden" class="Amount1" value="60" />
                    <input type="checkbox" name="Add2Cart" value="on" > 
                </td>
            </tr>
             <tr>
                <td class="product">
                    <input type="hidden" class="FullQuantity1" value="300" />
                    <input type="hidden" class="FullQuantityPrice1" value=".70" />
                    <input type="text" class="BuyQuantity1" value="300" />
                    <input type="hidden" class="UnitPrice1" value=".70" />
                    <input type="hidden" class="Amount1" value="70" />
                    <input type="checkbox" name="Add2Cart" value="on" > 
                </td>
            </tr>
        </table>
    </body>
</html>
