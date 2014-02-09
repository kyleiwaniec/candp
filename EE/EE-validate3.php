

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Referral Manager - Claimant Form</title>
<link rel="stylesheet" type="text/css" href="http://lombardiassoc.myclient-review.com/css/style.css" media="screen" />
<link type="text/css" href="http://lombardiassoc.myclient-review.com/css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
<script src="http://lombardiassoc.myclient-review.com/js/jquery-1.6.2.min.js"></script>

<script src="http://lombardiassoc.myclient-review.com/js/jquery.metadata.js"></script>
<script src="http://lombardiassoc.myclient-review.com/js/jquery.mini.validator.js"></script>
<script src="http://lombardiassoc.myclient-review.com/js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="http://lombardiassoc.myclient-review.com/js/jquery.masked.mini.js"></script>
<style type="text/css">
div.error{
     font-size: 10px;
     width: 100%;
     text-align: center;
     display: inline;
     position: fixed;
     z-index: 1;
     padding: 2px;
     background-color: #fcd6cf;
     border: 1px solid #bb1124;
     display: none;
 }
</style>
</head>
<body>
<div id="main">
<script>
	function clear_form_elements(ele) {
			$(ele).find(':input').each(function() {
				switch(this.type) {
					case 'password':
					case 'select-multiple':
					case 'select-one':
					case 'text':
					case 'textarea':
						$(this).val('');
						break;
					case 'checkbox':
					case 'radio':
						this.checked = false;
				}
			});
		}
	$(document).ready(function(){	
	
		var eContainer = $('div.eContainer');
			
		$("#referralForm").validate({
			errorElement: "div",
			errorPlacement: function(error, element) {
				error.insertBefore($("#referralForm"));
			},
			meta: "validate"
		 });
			 

		$('.navigation').click(function(e){
			e.preventDefault();
			$('#id :input').attr("disabled", false);
			$.ajax({
                url: 'getClaimant.php?action='+this.id+'&cid='+$('#id').val(),
                dataType: 'json',
                type: 'post',
                data: $('#form1').serialize(),
                error: function() {
                    return true;
                },
                success: function(data) {
                    if( data )
                    {
						$.each(data, function(index,array) {
							$('#'+index).val(array);
						});
                    }
                }
            });
		});
		$( "#dialog-confirm" ).hide();
		$("#Save").hide();
		$(".EditControls").hide();
		$("#formControlDiv :input").attr("disabled", true);
		$( ".datepicker" ).datepicker();
		$(".socialSecurity").mask("999-99-9999");
		$(".zip").mask("99999");
		$("#Edit").click(function(){
			$("#formControlDiv :input").attr("disabled", false);
			$("#action").val('Edit');
			$(".noEditControls").hide();
			$(".EditControls").show();
			$("#Save").show();
		});
		$("#New").click(function(){
			$("#formControlDiv :input").attr("disabled", false);
			$("#action").val('New');
			$(".noEditControls").hide();
			$(".EditControls").show();
			$("#Save").show();
			clear_form_elements("#referralForm")
		});
		$("#Cancel").click(function(){
			$( "#dialog-confirm" ).dialog({
				resizable: false,
				height:140,
				modal: true,
				buttons: {
					"Yes": function() {
					$("#formControlDiv :input").attr("disabled", true);
					$(".noEditControls").show();
					$(".EditControls").hide();
					$("#Save").hide();
						$( this ).dialog( "close" );
					},
					"No": function() {
						$( this ).dialog( "close" );
					}
				}
			});
		});
	});
</script>
<div id="dialog-confirm" title="Discard Changes?">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Changes are about to be lost, these will not be recoverable. Are you sure?</p>
</div>
<div align="center">
<table border="0" width="85%">
<tr>
<td width="13%">
<h1> Referral Manager</h1>
</td>
<td width="12%">
<b>Case Manager:</b><input type='text' id="caseManager" value="Unassigned" disabled='disabled'>
</td>
<td width="12%">
<b>Sales Person:</b> <input type='text' id="salesPerson" value="Unassigned" disabled='disabled'>
</td>
<td align="right">
<div class="noEditControls">
<a href="main.php" id="Main" class="myButton">Main</a>
<a href="#" id="First" class="myButton navigation">First</a>
<a href="#" id="Prev" class="myButton navigation">Prev</a>
<a href="#" id="Next" class="myButton navigation">Next</a>
<a href="#" id="Last" class="myButton navigation">Last</a>
<a href="#" id="New" class="myButton">New</a>
<a href="#" id="Edit" class="myButton">Edit</a>
</div>
<div class="EditControls">
<a href="#" id="Cancel" class="myButton">Cancel</a>
</div>
</td>
</tr>
</table>
</div>
<div id="formControlDiv">
<form method="POST" action="#" id="referralForm" class="register">
	<input type="hidden" name="id" id="id" >
	<input type="hidden" name="action" id="action" >
	<table border="0" width="100%">
		<tr>
			<td colspan="3" width="33%" valign="top" >Claimant Name:<br>
			<input type="text" name="claimantName" id="claimantName" size="64" placeholder="Enter Claimant Name" class="{validate:{required:true, minlength:3}}" /></td>
			<td width="33%" colspan="2" valign="top">Referral Type:<br>
			<select size="1" name="referralType" id="referralType" class="{validate:{required:true}}">
			<option></option>
			<option value="1">Crisis</option>
			<option value="2">Field Case Management</option>
			<option value="3">Legal Nurse Consulting</option>
			<option value="4">MCP</option>
			<option value="5">Medicare Set Aside</option>
			<option value="6">TCM</option>
			<option value="7">Vocational</option>
			</select></td>
			<td width="17%" colspan="2" valign="top">Referral Date:<br>
			<div class="demo"><input type="text" name="referralDate"  id="referralDate" size="20" class="datepicker" class="{validate:{required:true, date:true}}" ></div></td>
			<td width="16%" colspan="2" valign="top">Status:<br>
			<select size="1" name="status" id="status">
			<option value="Open" selected>Open</option>
			<option value="Closed">Closed</option>
			</select></td>
		</tr>
		<tr>
			<td colspan="3" valign="top">Claimant Address:<br>
			<input type="text" name="claimantAddress" id="claimantAddress" size="64" placeholder="Enter Claimant Address" class="{validate:{required:true, minlength:3}}" ></td>
			<td colspan="2" valign="top">Claimant Phone:<br>
			<input type="text" name="claimantPhone" id="claimantPhone" size="20" placeholder="Enter Claimant Phone" class="{validate:{required:true, phoneUS:true}}" /></td>
			<td colspan="4" valign="top">Social Security #:<br>
			<input type="text" name="socialSecurity" id="socialSecurity" size="20" placeholder="###-##-####" class="socialSecurity {validate:{required:true,minlength:11}}" /></td>
		</tr>
		<tr>
			<td valign="top">Claimant City:<br>
			<input type="text" name="claimantCity" id="claimantCity" size="30" class="{validate:{required:true, minlength:3}}" /></td>
			<td valign="top">State:<br>
			<select width="2" name="claimantState" id="claimantState"class="{validate:{required:true}}" />
	<option value=""></option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AZ">AZ</option>
	<option value="AR">AR</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DE">DE</option>
	<option value="DC">DC</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="IA">IA</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="ME">ME</option>
	<option value="MD">MD</option>
	<option value="MA">MA</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MS">MS</option>
	<option value="MO">MO</option>
	<option value="MT">MT</option>
	<option value="NE">NE</option>
	<option value="NV">NV</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>
	<option value="NY">NY</option>
	<option value="NC">NC</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WV">WV</option>
	<option value="WI">WI</option>
	<option value="WY">WY</option>
</select></td>
			<td valign="top">Zip:<br>
			<input type="text" name="claimantZip" id="claimantZip" size="5" class="zip" /></td>
			<td colspan="2" valign="top">Alternate Phone:<br>
			<input type="text" name="claimantAltPhone" id="claimantAltPhone" size="20" class="{validate:{phoneUS:true}}"></td>
			<td colspan="4" valign="top">DOB:<br>
			<div class="demo"><input type="text" name="dob" id="dob" size="20" class="datepicker"></div></td>
		</tr>
		<tr>
			<td colspan="3" valign="top">Referral Address:<br>
			<input type="text" name="referralAddress" id="referralAddress" size="64"></td>
			<td valign="top">Benefit State:<br>
			<select width="2" name="benefitState" id="benefitState"" />
	<option value=""></option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AZ">AZ</option>
	<option value="AR">AR</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DE">DE</option>
	<option value="DC">DC</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="IA">IA</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="ME">ME</option>
	<option value="MD">MD</option>
	<option value="MA">MA</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MS">MS</option>
	<option value="MO">MO</option>
	<option value="MT">MT</option>
	<option value="NE">NE</option>
	<option value="NV">NV</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>
	<option value="NY">NY</option>
	<option value="NC">NC</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WV">WV</option>
	<option value="WI">WI</option>
	<option value="WY">WY</option>
</select></td>
			<td valign="top">Gender:<br>
			<select size="1" name="gender" id="gender" class="{validate:{required:true}}">
			<option selected value=""></option>
			<option value="1">Male</option>
			<option value="2">Female</option>
			</select></td>
			<td colspan="4" valign="top">DOI:<br>
			<div class="demo"><input type="text" name="doi" id="doi" size="20" class="datepicker" class="{validate:{required:true}}"></div></td>
		</tr>
		<tr>
			<td valign="top">Referral City:<br>
			<input type="text" name="referralCity" id="referralCity" size="30"></td>
			<td valign="top">State:<br>
			<select width="2" name="referralState" id="referralState"" />
	<option value=""></option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AZ">AZ</option>
	<option value="AR">AR</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DE">DE</option>
	<option value="DC">DC</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="IA">IA</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="ME">ME</option>
	<option value="MD">MD</option>
	<option value="MA">MA</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MS">MS</option>
	<option value="MO">MO</option>
	<option value="MT">MT</option>
	<option value="NE">NE</option>
	<option value="NV">NV</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>
	<option value="NY">NY</option>
	<option value="NC">NC</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WV">WV</option>
	<option value="WI">WI</option>
	<option value="WY">WY</option>
</select></td>
			<td valign="top">Zip:<br>
			<input type="text" name="referralZip" id="referralZip" size="5" class="zip"></td>
			<td valign="top">Claim #:<br>
			<input type="text" name="claimNumber" id="claimNumber" size="20"></td>
			<td valign="top">Adjuster Email:<br>
			<input type="email" name="adjusterEmail" id="adjusterEmail" size="20"></td>
			<td colspan="4" valign="top">Employer:<br>
			<input type="text" name="employerName" id="employerName" size="20"></td>
		</tr>
		<tr>
			<td colspan="3" valign="top">Physician's Address:<br>
			<input type="text" name="doctorAddress" id="doctorAddress" size="64"></td>
			<td colspan="2" valign="top">Physician's Phone:<br>
			<input type="text" name="doctorPhone" id="doctorPhone" size="20" class="{validate:{phoneUS:true}}"></td>
			<td colspan="4" valign="top">Employer Contact:<br>
			<input type="text" name="employerContact" id="employerContact" size="20"></td>
		</tr>
		<tr>
			<td valign="top">Physician's City:<br>
			<input type="text" name="doctorCity" id="doctorCity" size="30"></td>
			<td valign="top">State:<br>
			<select width="2" name="doctorState" id="doctorState"" />
	<option value=""></option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AZ">AZ</option>
	<option value="AR">AR</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DE">DE</option>
	<option value="DC">DC</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="IA">IA</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="ME">ME</option>
	<option value="MD">MD</option>
	<option value="MA">MA</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MS">MS</option>
	<option value="MO">MO</option>
	<option value="MT">MT</option>
	<option value="NE">NE</option>
	<option value="NV">NV</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>
	<option value="NY">NY</option>
	<option value="NC">NC</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WV">WV</option>
	<option value="WI">WI</option>
	<option value="WY">WY</option>
</select></td>
			<td valign="top">Zip:<br>
			<input type="text" name="doctorZip" id="doctorZip" size="5" class="zip"></td>
			<td colspan="2" valign="top">Physician's Fax:<br>
			<input type="text" name="doctorFax" id="doctorFax" size="20"></td>
			<td colspan="4" valign="top">Employer Phone:<br>
			<input type="text" name="employerPhone" id="employerPhone" size="20" class="{validate:{phoneUS:true}}" /></td>
		</tr>
		<tr>
			<td colspan="3" valign="top">Attorney:<br>
			<input type="text" name="lawyerName" id="lawyerName" size="64"></td>
			<td colspan="2" valign="top">Attorney Phone:<br>
			<input type="text" name="lawyerPhone" id="lawyerPhone" size="20" class="{validate:{phoneUS:true}}"></td>
			<td colspan="4" valign="top">Employer Address:<br>
			<input type="text" name="employerAddress" id="employerAddress" size="20"></td>
		</tr>
		<tr>
			<td colspan="3" valign="top">Attorney's Address:<br>
			<input type="text" name="lawyerAddress" id="lawyerAddress" size="64"></td>
			<td colspan="2" valign="top">Attorney's Fax:<br>
			<input type="text" name="lawyerFax" id="lawyerFax" size="20"></td>
			<td valign="top">Employer's City:<br>
			<input type="text" name="employerCity" id="employerCity" size="20"></td>
			<td colspan="2" valign="top">State:<br>
			<select width="2" name="employerState" id="employerState"" />
	<option value=""></option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AZ">AZ</option>
	<option value="AR">AR</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DE">DE</option>
	<option value="DC">DC</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="IA">IA</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="ME">ME</option>
	<option value="MD">MD</option>
	<option value="MA">MA</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MS">MS</option>
	<option value="MO">MO</option>
	<option value="MT">MT</option>
	<option value="NE">NE</option>
	<option value="NV">NV</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>
	<option value="NY">NY</option>
	<option value="NC">NC</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WV">WV</option>
	<option value="WI">WI</option>
	<option value="WY">WY</option>
</select></td>
			<td valign="top">Zip:<br>
			<input type="text" name="employerZip" id="employerZip" size="5" class="zip"></td>					
		</tr>
		<tr>
			<td valign="top">Attorney's City:<br>
			<input type="text" name="lawyerCity" id="lawyerCity" size="30"></td>
			<td valign="top">State:<br>
			<select width="2" name="lawyerState" id="lawyerState"" />
	<option value=""></option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AZ">AZ</option>
	<option value="AR">AR</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DE">DE</option>
	<option value="DC">DC</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="IA">IA</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="ME">ME</option>
	<option value="MD">MD</option>
	<option value="MA">MA</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MS">MS</option>
	<option value="MO">MO</option>
	<option value="MT">MT</option>
	<option value="NE">NE</option>
	<option value="NV">NV</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>
	<option value="NY">NY</option>
	<option value="NC">NC</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WV">WV</option>
	<option value="WI">WI</option>
	<option value="WY">WY</option>
</select></td>
			<td valign="top">Zip:<br>
			<input type="text" name="lawyerZip" id="lawyerZip" size="5" class="zip"></td>
			<td colspan="2" valign="top">Weekly Indemnity:<br>
			<input type="text" name="weeklyIdemnity" id="weeklyIdemnity" size="20" placeholder="$0.00"  class="{validate:{required:true}}"></td>
			<td colspan="4" valign="top">Next Activity:<br>
			<div class="demo"><input type="text" name="stampActivity" id="stampActivity" size="20" class="datepicker" class="{validate:{required:true}}"></div></td>
		</tr>
		<tr>
			<td colspan="3" valign="top">Special Needs Requests</td>
			<td colspan="2" valign="top">&nbsp;</td>
			<td colspan="4" valign="top">&nbsp;</td>
		</tr>		
		<tr>
			<td colspan="9" valign="top">
			<textarea rows="7" name="specialNeeds" id="specialNeeds" cols="126"></textarea></td>
		</tr>		
	</table>
	<input  type="submit" class="submit" id="Save" value="Submit">
</form>
</div>
<br/>
<div align="center">
<table border="0" id="activity" width="80%">
<tr>
<td>
<h3>Activity Report</h3>
</td>
<td>
<a href="#" class="myButton">New Report</a>
</td>
</tr>
</table>
</div>
<form method="POST" action="#" class="register">
<table border="0" width="100%">
	<thead>
		<th >ID</th>
		<th >Date</th>
		<th>Description</th>
		<th >Download</th>
	</thead>
	<tr>
		<td width="32">1</td>
		<td width="105">1-1-2011</td>
		<td>Post operative review</td>
		<td width="93">
		<p align="center"><a target="_blank" href="http://google.com">Click</a></td>
	</tr>
</table>
</form></body>

</html>