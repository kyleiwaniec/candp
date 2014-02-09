<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<style>
#menu-template {
        width: 900px;
        height: 141px;
        float: left;
        background: url("../images/bg2-2.gif") no-repeat;
}
#menu-template #horizontal_navi {
        width: 896px;
        height: 50px;
        float: left;
        position: relative;
        margin-top: 50px;
/*      background: #c8c1b9 url("../images/navi_bg.gif") no-repeat top left;*/
        padding:0 2px;
}
#menu-template #horizontal_navi ul {
        list-style: none;
        margin: 0;
        padding: 0;
}
#menu-template #horizontal_navi li {
        float: left;
        text-align: center;
        vertical-align: middle;
}
#menu-template #horizontal_navi li a{
        color: #895b3c;
        font:14px Times;
        text-decoration: none;
        display: block;
        border-left: 3px solid #ffbfbe;
        margin: 0;
}
#menu-template #horizontal_navi li a.but_hnavi {
        width: 98px;
        height: 40px;
        padding-top: 10px;
}
#menu-template #horizontal_navi li a.but_hnavi2 {
        width: 98px;
        height: 35px;
        padding-top: 15px;
}
#menu-template #horizontal_navi li a:hover.but_hnavi, 
#menu-template #horizontal_navi li a:hover.but_hnavi2, 
#menu-template #horizontal_navi li a.current {
        /*background-color: #9b978e;*/
        background: #ffffff url("../images/hover.gif") no-repeat;
        color: #ffffff;
}
</style>



<script>
$(function() {

jQuery.validator.addMethod("alpha", function(value, element) {
return this.optional(element) || value == value.match(/^[a-zA-Z]+$/);
},"Only Characters Allowed.");
        
$('#Registration').validate({
        rules: {
                FirstName: {required:true, alpha:true},
                LastName: {required:true},
                Email: {required:true, email:true},
                AcceptTerms: {
                        required:true
                        
            
                
        },      
        messages: {
            FirstName: "Please enter your First Name",
            LastName: "Please enter your Last Name",
            Email: "Please enter a valid Email address",
            AcceptTerms: "Please accept our service Terms &amp; Conditions"
                },
        errorPlacement: function(label, element) {
                        if (element.is("#your-input-field")) {
                            label.appendTo("#your-div");
                            
                            }
                        else if (element.is("input, textarea")){
                            // defualt placement
                            label.insertAfter(element); // or whatever you want here...
                        } 
                        }
                
              }
        });
        
        
                        var boxone = document.getElementById("roundbox50r");
                        var height_bo = boxone.clientHeight;
                        
                        var boxtwo = document.getElementById("roundbox50l");
                        var height_bt = boxtwo.clientHeight;
                        
                        if (boxone && boxtwo){
                        
                            if ( height_bo > height_bt ) 
                            {
                                    boxtwo.style.height = height_bo+'px';
                            } 
                            else if ( height_bt > height_bo ) 
                            {
                                    boxone.style.height = height_bt+'px';
                            }
                        }
        
        // split string into array(arr0)
        // measure item 0 of new array(arr0) against number of characters
        // if less than num of chars, add next item to array(Set1) from array(arr0) and remove it from array(arr0)
        // join array(Set1) and measure new string against num of chars.
        // if more than num of chars, remove item and store it in new array(arr1)
        // wrap array(Set1) in span.
        
        // measure item 0 in array(arr1) against number of characters
        // if less than num of chars, add next item from array(arr0)
        // ---------------- //
        
        // splice(0, 13)
        // 
        
        });
</script>