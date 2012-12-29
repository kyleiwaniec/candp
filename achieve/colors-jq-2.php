<?php require_once 'quickmysql.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Colors</title>
        <meta charset="UTF-8">
        <meta content="width=device-width,initial-scale=1.0" name="viewport"/> 
        <meta name="description" content="Graphic design and web development">
        <meta name="author" content="Kyle Hamilton">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>
            $(function(){
                var container = $('#container'), color_li = $('.color');
                
                container.on('mouseenter', '.color', function(){
                    var that = $(this), color = that.text();
                    that.css({"background-color":color});
                });
                container.on('mouseleave', '.color', function(){
                    $(this).css({'background-color':'white'});
                });
                color_li.one('click', function(){
                    var id = $(this).text();
                    getColors(id);
                    checkTotal();
                 });
                 
                $('#total').on('click', function(){
                    $(this).next().html(format(votesTot.sum().toString()));
                    runningTotal = votesTot.sum();
                    checkTotal();
                });
                
                function checkTotal(){
                	if(runningTotal != votesTot.sum()){
                    	$('.totalNum').addClass('error');
                    	}else{
                    	$('.totalNum').removeClass('error');
                	}
                }
                var dataObj = {}, votesTot = [], runningTotal = 0;
            
                var getColors = (function(id){
                    
                    function writeToDOM(){
                        var numVotes = 0;
                        for(var i = 0; i < dataObj.length; i++){
                            if(dataObj[i][id]){
                                var voteCount = dataObj[i][id];
                                numVotes += parseInt(voteCount);
                            }
                        }
                        
                        $(".color:contains("+id+")").next().text(format(numVotes.toString()));
                        votesTot.push(numVotes);
                    }
                    if(!isEmpty(dataObj)){
                        writeToDOM();                
                    }else{
                        $.ajax({
                            url: 'getColors.php',
                            dataType: 'json',
                            beforeSend: function(){},
                                
                            error: function(jqXHR, exception) {
                                if (jqXHR.status === 0) {
                                    console.log('Not connect.\n Verify Network.');
                                } else if (jqXHR.status == 404) {
                                    console.log('Requested page not found. [404]');
                                } else if (jqXHR.status == 500) {
                                    console.log('Internal Server Error [500].');
                                } else if (exception === 'parsererror') {
                                    console.log('Requested JSON parse failed.');
                                } else if (exception === 'timeout') {
                                    console.log('Time out error.');
                                } else if (exception === 'abort') {
                                    console.log('Ajax request aborted.');
                                } else {
                                    console.log('Uncaught Error.\n' + jqXHR.responseText);
                                }
                            },
                                
                            success: function(data){
                                dataObj = data;
                                writeToDOM();
                            }
                        });
                    }
                 });
            });
            Array.prototype.sum = function(){
                for(var i=0,sum=0;i<this.length;sum+=this[i++]);
                return sum;
            }
            function format(string){   
                string = string.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                return string;
            }
            var isEmpty = function(obj){
                    var r = 0;
                    for (var p in obj)if(obj.hasOwnProperty( p ))r++;
                        if(r == 0)return true;
                    }    
        </script>
        <style>
            body{
                margin:20px 0 0 0;
                padding:0;
            }
            #container, #container li{
                list-style: none;
                font-family: helvetica;
                color:#363636;
                margin:0;
                padding:0;
            }
            #container{
                border: 2px solid #CCC;
                position: relative;
                overflow: hidden;
                width: 320px;
                margin:0 auto;
            }
            #container li{
                float:left;
                border:1px solid #ccc;
                padding:5px 10px;
                height:24px;
                line-height: 24px;
                width:138px;
                cursor:pointer;
            }
            .color, #total{  clear:left; 
        -webkit-transition: background-color 0.3s ease;
           -moz-transition: background-color 0.3s ease;
             -o-transition: background-color 0.3s ease;
            -ms-transition: background-color 0.3s ease;
                transition: background-color 0.3s ease;
            }
            #total, .totalNum{ font-weight: bold; }
            .color:hover, #total:hover{ text-decoration: underline; }
            #container .color.complement:hover{ color:white; }
            p{ text-align: center; }
            #container .totalNum.error{color:red;}
        </style>
    </head>
    <body>
        <ul id="container">
            
            <?php
            connect();
            $query = "SELECT *  FROM  `colors`";  
            $result = mysql_query($query) or die(mysql_error());
            $rows = mysql_num_rows($result);
            if ($rows > 0) {
                        while ($data = mysql_fetch_assoc($result)) {
                            $color = $data['color'];
                            echo '<li class="color">'.$color.'</li><li></li>';
                        }
                    }
            disconnect();
            ?>
            <li id="total">Total</li><li class="totalNum"></li>
        </ul>
        <p><a href="#" onclick="location.reload();" >Refresh</a></p>
    </body>
</html>


