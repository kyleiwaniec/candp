$(function(){
	  
       
var raph = (function(){
            
        
        
    
    function getRate(){
          var path = 'http://www.zillow.com/webservice/GetRateSummary.htm?state=NJ&zws-id=X1-ZWz1bx39q1en0r_43hp8';
     
          $.get('/getfile.php', {u:path}, function(data){
            
            var xmlDoc = $.parseXML(data);
            var content = $(xmlDoc);
			//var content = $(data);
			
            content.find('today').each(function(){
            
                var curr = $(this);
                
                var thirty = curr.children('rate[loanType="thirtyYearFixed"]').text();
                var fifteen = curr.children('rate[loanType="fifteenYearFixed"]').text();
                var five = curr.children('rate[loanType="fiveOneARM"]').text();   
      
                $('#rate').val(thirty);
                $('#thirty').text(thirty);
                $('#fifteen').text(fifteen);
                $('#five').text(five);
                
                amortizgraph(thirty);
                
            });
         }); // end .get function
           
        } // getRate
       
        getRate();
        
        
        
	var width = 360;
	var height = 250;
	var r = new Raphael("graph",width,height);

	r.rect(60,0,width-60,height-15).attr({fill: '#ffffff', stroke: '#9cf', 'stroke': 'none'});

	var colors =['#ffffff','#fff799','#c4df9b','#a3d39c','#82ca9c','#7accc8','#6dcff6','#7da7d9','#bd8cbf']
	var graphLine = r.path().attr({stroke: '#333', 'stroke-width': .2});
	var graphPath = r.path().attr({stroke: '#ff0099', 'stroke-width': 5});

    function amortizgraph(thirty){
        
		
	$("#myresults").html("");
	$("#entiregraph").show();
		
	function addCommas(nStr)
		{
			nStr += '';
			x = nStr.split('.');
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x[0])) {
				x[0] = x[0].replace(rgx, '$1' + ',' + '$2');
			}
			return x[0] + x2;
		}
	

        var a = $("#amount").val().replace(',', '');

        var p = $('#rate').val();
        //var p = thirty;
           
        

        var y = $("#term").val();


        var n = y*12;
	var z = 8; 
	
	var graphheight = height-15;
	var horzlines = "M 0 0 ";
	var xaxis = (width-60)/z;
	var xaxisb = (width-72)/z;
	var numofbalances = 15;
	var numoflines = numofbalances-1;

	
	var yaxis = graphheight/numofbalances;
	var labeltext;
	var labelatext;
	var labelbg;
	var yearsLabelText = y/8 ;
	var amountDec = a/numofbalances;
	var amountRem = a;
	
	// draw the horizontal lines
	for (i=1; i<=numoflines; i++){
	horzlines += "M 55 " + yaxis*i + " l " + width +" " + (yaxis-yaxis) + "";
	};
	
	graphLine.attr({path: horzlines});
	
	
	// draw the years in term row
	for (i=0; i<=z; i++){
	   
	   labelbg += r.rect((xaxisb*i)+57, height-12, 25, 12).attr({fill: "#eeeeee", 'stroke': 'none'});
	   labeltext += r.text((xaxisb*i)+65, height-6, Math.round(yearsLabelText*i)).attr({fill:'#000000', font:'10px Arial', 'font-size':10,'text-anchor':'middle', 'stroke': 'none'});
	   
	   
	 };
	 
	 
	 // draw the balance column
	 
     for (j=0; j<=numofbalances; j++){
	   
	  labelbg += r.rect(0, ((yaxis*j)-5), 55, 20).attr({fill: "#eeeeee", 'stroke': 'none'});
	  
	  labelatext += r.text(55, ((yaxis*j)+5), "$" + addCommas(Math.round(amountRem*.001)/.001)).attr({fill:'#000000', font:'10px Arial', 'font-size':10,'text-anchor':'end', 'stroke': 'none'});
	   amountRem -= amountDec;
	   
	 };
	
	
    function getPayment(a,n,p) {
        /* Calculates the monthly payment from annual percentage
           rate, term of loan in months and loan amount. **/
        var acc=0;
        var base = 1 + p/1200;
        for (i=1;i<=n;i++) 
            { acc += Math.pow(base,-i); }
        return a/acc;
        
    }
 
    
   
    var scaleY = graphheight / a;
    var xOff = (width-60) / n;
    var path = "M 60 0 ";
	
    
    var payment = getPayment(a,n,p);
    var balance=a;
    var interest = 0.0;
    var principal=0.0;
    var totalprincipal=0.0;
    var totalinterest=0.0;
    
    var textToInsert = [];
	
    for (i=1;i<=n;i++) {
            interest = balance*p/1200;
            totalinterest += interest;
            principal = payment-interest;
            totalprincipal += principal;
            balance -= principal;
    
     	  	
			path += "L " + ((xOff * i)+60) + " " +  (graphheight - (balance * scaleY)) + " ";
	 
          if(i == 1 || i%12 == 0){
                            textToInsert[j++] = '<tr><td colspan="6">Year '+i/12+'</td></tr>';
                        }
         
			textToInsert[j++] = '<tr><td>';
			textToInsert[j++] = addCommas((Math.round(payment*100)/100).toFixed(2));
			textToInsert[j++] = '</td>' ;
			textToInsert[j++] = '<td>' ;
		   	textToInsert[j++] = addCommas((Math.round(principal*100)/100).toFixed(2));
			textToInsert[j++] = '</td>' ;
			textToInsert[j++] = '<td>' ;
			textToInsert[j++] = addCommas((Math.round(interest*100)/100).toFixed(2));
			textToInsert[j++] = '</td>' ;
			textToInsert[j++] = '<td>' ;
			textToInsert[j++] = addCommas((Math.round(i*payment*100)/100).toFixed(2));
			textToInsert[j++] = '</td>' ;
			textToInsert[j++] = '<td>' ;
			textToInsert[j++] = addCommas((Math.round(totalinterest*100)/100).toFixed(2));
			textToInsert[j++] = '</td>' ;
			textToInsert[j++] = '<td>' ;
	                textToInsert[j++] = addCommas((Math.round(balance*100)/100).toFixed(2));
			
			textToInsert[j++] = '</td> </tr>' ;
                        
                       
	
	}
	  
	graphPath.attr({path: path});
	
	var mypayment = addCommas((Math.round(payment*100)/100).toFixed(2));
	var mytotalpayment = addCommas((Math.round(i*payment*100)/100).toFixed(2));
	var mytotalinterest = addCommas((Math.round(totalinterest*100)/100).toFixed(2));
	
	
	$("#myresults").append("<p>My monthly payment is going to be <span class='pink'>$" + mypayment + "</span>.<br />I am going to pay a total amount of <span class='pink'>$" + mytotalpayment + "</span>.<br />I am going to pay <span class='pink'>$" + mytotalinterest + "</span> in interest.</p>");
	$("#amorttable").append("<table cellspacing='0' cellpadding='0' class='table'><tr><th>Payment</th><th>Principal</th><th>Interest</th><th>Total<br />Payments</th><th>Total<br />Interest</th><th>Balance<br />Remaining</th></tr>" + textToInsert.join('') + "</table>").css({"display": "none"});
        $("table tr:nth-child(even)").css({"background-color":"#eeeeee"});
	$("table tr:nth-child(even) td").css({"border-bottom" : "1px dotted #ff0099", "border-top" : "1px dotted #ff0099"});
	$("table th").css({"background-color":"#ffffff", "vertical-align" : "bottom", "color" : "#333333"});

};
       
        

$("#theform").submit(function(e){

    e.preventDefault(); 
	amortizgraph();
});
$("#showtable").click(function(){
		$("#amorttable").css({"display": "block"});
	});

})(); //end raph


});
