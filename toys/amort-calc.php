<?php
$title = "Raphael.js - Animated Pie Chart";
require_once ("sandbox-header.php");
?>
     
        <style>

.container{
	position:relative;
	overflow:hidden;
}
h2{
	font-weight:normal;
}
.pink{
	color:#ff0066;
	
}
#amorttable{
	display:block;
	margin:20px 0 0 0;
	clear:both;
}
#amorttable table{
	padding:0;
	
	width:520px;
	font-size:.8em;
	color:#333333;
	font-family:Arial, Helvetica, sans-serif;
}

#amorttable table td{
	width:17%;
	border:0px solid grey;
	padding:3px;
	text-align:center;
}
#graphcontainer{
	position:relative;
	float:left;
	background-color:#eeeeee;
	padding:5px;
/*	height:250px;
*/	border-radius:5px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	-o-border-radius:5px;
	/*border:1px solid #000;*/
}
#balance{
	background-image:url(balance.gif);
	background-repeat:no-repeat;
	float:left;
	width:21px;
	height:250px;
	display:block;
}
#yearsinterm{
	background-image:url(yearsinterm.gif);
	background-repeat:no-repeat;
	margin-left:140px;
	width:350px;
	height:20px;
	display:block;
	clear:left;
	
}
#graph{
	display:block;
	float:left;
        width:360px;
        overflow:hidden;
}
#getgraph{
	margin:18px 0;
	width:102px;
	padding:0;
	}
input[type="submit"]{
	background-color:#ff0066;
	padding:3px 7px;
	color:#ffcccc;
	border-radius:5px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	-o-border-radius:5px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:.9em;
	border:0;
	height:25px;
	cursor:pointer;
	}
input[type="submit"]:hover{
		color:#ffffff;
	}
input[type="text"]{
	font-family: Arial, Helvetica, sans-serif;
	font-size:.75em;
	color:	#ff0066;
	background-color:#eeeeee;
	border: 1px solid #cccccc;
	border-radius:5px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	-o-border-radius:5px;
	padding:5px;
	width:90px;
}
#showtable span{
	background-color:#ff0066;
	padding:5px 15px;
	color:#ffcccc;
	border-radius:5px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	-o-border-radius:5px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:.9em;
	border:0;
	height:25px;
	cursor:pointer;
	}
#theform{
	width:130px;
	float:left;
}
#theform div{
    margin-bottom:8px;
}

        </style>
      
        
        <script src="../js/raphael-1.5.2-min.js"></script>
        <script src="../js/graph.js"></script>

        <div class="conatiner">
           <!-- calculator -->
            <div id="CalcDiv">
                <div id="homeCalc" >

                    <h3 style="border-bottom:1px solid #cccccc;">Mortgage Amortization Calculator</h3>
                    <p><em>Based on the latest interest rate from Zillow's API</em></p>

                    <div class="formcontainer">
                        <form id="theform">
                            <div>
                                Loan Amount<br/>
                                <input type="text" id="amount" value="250,000" name="amount" onkeyup="onlynums(amount);"/>
                            </div>
                            <div>
                                Interest Rate<br/>
                                <input type="text" id="rate" value="4.5" name="rate" onkeyup="onlynums(rate);"/>
                            </div>
                            <div>
                                Years in Term<br/>
                                <input type="text" id="term" value="30" name="term" onkeyup="onlynums(term); "/>
                            </div>
                            <div>
                                <div class="iespace"></div><br/>
                                <input type="submit" id="getgraph" value="calculate" />
                            </div>
                        </form>
                        <div id="entiregraph" >
                            <div id="balance"></div>
                            <div id="graphcontainer">
                                <div id="graph"></div>
                            </div><!-- end graphcontainer -->
                            <div id="yearsinterm"></div>
                        </div>
                    </div><!-- end formcontainer -->
                    <div id="myresults"></div>
                    <div id="showtable"><span>show me the amortization table</span></div>
                    <div id="amorttable"></div>

     <!--   <span class="smaller">Note: This calculator is intended as a guide only. Always consult with a mortgage professional.</span><br />-->
                </div>
            </div>

            <!-- end calculator -->
        </div>
<?php

require_once ("sandbox-footer.php");
?>
