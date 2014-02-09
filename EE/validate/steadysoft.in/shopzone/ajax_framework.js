// JavaScript Document
/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
function createObject() {
var request_type;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
request_type = new ActiveXObject("Microsoft.XMLHTTP");
}else{
request_type = new XMLHttpRequest();
}
return request_type;
}

var http = createObject();

var idElementN=0;
var rateN=0;
var nocache=0;
var outstar_check=0;

/* star "on" on mouse over */
function overstar(idElement,rate){
for(i=1; i<=5; i++){
if(i <= rate){
document.getElementById(idElement+'_'+i).style.backgroundPositionY = "20px";
} else {
document.getElementById(idElement+'_'+i).style.backgroundPositionY = "10px";
}
}
}
/* star "off" on mouse out */
function outstar(idElement,rate){
if(outstar_check == 0){
rate = rate;
} else {
rate = rateN;
}
for(i=1; i<=5; i++){
if(i<=rate){
document.getElementById(idElement+'_'+i).style.backgroundPositionY = "30px";
} else {
document.getElementById(idElement+'_'+i).style.backgroundPositionY = "10px";
}
}
}

yes_review =  function() {
	$(".yes_review").click(function(){
		var getID = this.id.replace("yes_review_","");
		var splitID = getID.split("_");
		var getreviewID = splitID[0];
		var getProductID = splitID[1];
		var data = 'reviewID='+getreviewID+'&productID='+getProductID;
		$.ajax({
			type:"POST",
			url:"handler.cfm?mode=reviewyes",
			cache:false,
			data:data,
			success:function(html) {
				if ($.trim(html) == 'You have already reviewed this Review') {
					jAlert("warning",html,"Already Reviewed");		
				}
				else {
					jAlert("success",html,"Thanks");
				}
				ColdFusion.navigate('loadreviews.cfm?productID='+getProductID,'loadreviews');
				}			
			})
	});	
}
no_review =  function() {
	$(".no_review").click(function(){
		var getID = this.id.replace("no_review_","");
		var splitID = getID.split("_");
		var getreviewID = splitID[0];
		var getProductID = splitID[1];
		var data = 'reviewID='+getreviewID+'&productID='+getProductID;;
		$.ajax({
			type:"POST",
			url:"handler.cfm?mode=reviewno",
			cache:false,
			data:data,
			success:function(html) {
				if ($.trim(html) == 'You have already reviewed this Review') {
					jAlert("warning",html,"Already Reviewed");
				}
				else {
					jAlert("success",html,"Thanks, But why...");	
				}
				ColdFusion.navigate('loadreviews.cfm?productID='+getProductID,'loadreviews');
				}			
			})
	});	
}

openReport = function() {
	$(".openReport").fancybox({
		'height'	: '90%',	
		'width'	 : '50%',
		'type'	  : 'iframe',
		'scrolling' : 'auto',
		'autoscale' : true,
		'transitionIn'  : 'elastic',
        'transitionOut' : 'elastic'
	});
}
