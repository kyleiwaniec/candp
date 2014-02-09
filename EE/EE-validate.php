<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8"/>

    <body>
        <form id="Shipping" method="post" action="?">
            <table>
                <tr>
                    <td></td>
                    <td>U.S. Mail</td>
                    <td>E-Mail</td>
                </tr>
                <tr>
                    <td>Product 1 </td>
                    <td><input type="radio" name="Product1" id="Product1_yes" value="y" class="Deliver" /></td>
                    <td><input type="radio" name="Product1" id="Product1_no" value="no" /></td>
                </tr>
                <tr>
                    <td>Product 2 </td>
                    <td><input type="radio" name="Product2" id="Product2_yes" value="y" class="Deliver" /></td>
                    <td><input type="radio" name="Product2" id="Product2_no" value="no" /></td>
                </tr>
                <tr>
                    <td>Product 2 </td>
                    <td><input type="radio" name="Product3" id="Product2_yes" value="y" class="Deliver" /></td>
                    <td><input type="radio" name="Product3" id="Product2_no" value="no" /></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="Consent_div" class="Consent"> 
                            I agree blah blah, blah
                            <input id="Delivery_Agree" name="Delivery_Agree" value="Y" type="checkbox" />
                            <span class="agree">I agree to e-delivery terms and conditions.</span>
                        </div></td>
                </tr>
            </table>
        </form>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script src="http://www.candpgeneration.com/js/jquery.validate.js"></script>
        <script>
            //$.metadata.setType("attr", "validate");
            $(function() {  
              $("#Consent_div").hide();
               
                
              $('input').change(function() {
                  //alert("hi");
                 if ($('.Deliver').is(':checked')){
                     $("#Consent_div").show();                   
                } else {
                     $("#Consent_div").hide();
                    }
                     
                });
                  
               
                $("#Shipping").validate({                                                 
                    rules: {
                        Product1: "required",
                        Product2: "required",
                        Product3: "required",
                        Delivery_Agree: {
                            required: {
                                        depends: function(element) {
                                                   return $(".Deliver:checked")
                                        }
                                      }
                                    }
                                }
                });
            });
        </script>
    </body>
</html>

rules: {
     contact: {
       required: {
         depends: function(element) {
           return $("#contactform_email:checked")
         }
       }
     }
   }