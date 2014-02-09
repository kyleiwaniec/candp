
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>Prepare Questions and Answers</title>
   <link rel="stylesheet" type="text/css" href="http://helios.hud.ac.uk/u0867587/testing/QandATableStyle.css">
        <link rel="stylesheet" type="text/css" href="http://helios.hud.ac.uk/u0867587/testing/jquery/ui-lightness/jquery-ui-1.8.16.custom.css"/>
		<script type="text/javascript" src="http://helios.hud.ac.uk/u0867587/testing/jquery/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="http://helios.hud.ac.uk/u0867587/testing/jquery/jquery-ui-1.8.16.custom.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="http://helios.hud.ac.uk/u0867587/testing/jquery/ui-lightness/jquery-ui-1.8.14.custom.css"/>
		<link rel="stylesheet" type="text/css" href="http://helios.hud.ac.uk/u0867587/testing/jquery/ui-lightness/jquery-ui-timepicker-addon.css"/>
		<script type="text/javascript" src="http://helios.hud.ac.uk/u0867587/testing/jquery/jquery-ui-timepicker-addon.js"></script>

<script type="text/javascript">

$(document).ready(function()

{

        initClick = 0;
        

    $(document).on('click','.showGrid', function(e) {
	    
        $(".gridBtns").removeClass("gridBtnsOn");
        
        var value = $(this)
            .siblings('input[name=gridValues]').val();
        
        $("#btn" + value.replace(/\s/g, '')).addClass("gridBtnsOn");
        
        $('.optionTypeTbl').fadeToggle('slow');
        $(this).parent().append($('.optionTypeTbl'));
        $('.optionTypeTbl').css({
	        
            left: $(this).position().left,
            top: $(this).position().top + 20
            
        });
        
        e.stopPropagation();
        
    });



  $( document ).click( function() {
	  
        $( '.optionTypeTbl' ).fadeOut( 'slow' );
        // fadeOut already hides it for you.
        
    });

    $('.optionTypeTbl input').on('click',function() {
	    
        $( ".gridBtns" ).removeClass( "gridBtnsOn" );
        $( this ).addClass( "gridBtnsOn" );
        
        console.log( $( this ).closest( 'td' ) );
        
        $( this ).closest( '.optionTypeTbl' ).siblings('input[name=gridValues]').val( $( this ).val( ) );
        $( this ).closest( '.optionTypeTbl' ).siblings('span[name=gridValues]').val( $( this ).val( ) );
        $( '.optionTypeTbl' ).hide( );
    });



     	var prevButton;
	
     $('.gridBtns').on('click', function()

    {

        var clickedNumber = this.value;
        
        $(this).closest('.option').siblings('.numberAnswer').find('.answertxt').show();
		$(this).closest('.option').siblings('.numberAnswer').find('.string').hide();
		$(this).closest('.option').siblings('.answer').find('.btnsAll').show();
		$(this).closest('.option').siblings('.answer').find('.btnsRemove').show();
		

        
         $(this).closest('.option').siblings('.answer').find('.answers').each(function(index) {
            if (!isNaN(clickedNumber) && index < clickedNumber) {
                $(this).show();
                $(this).closest('.option').siblings('.numberAnswer').find('.string').hide();
            $(this).closest('.option').siblings('.answer').find('.btnsAll').show();
			$(this).closest('.option').siblings('.answer').find('.btnsRemove').show();
                
                if (prevButton === 'True or False' || prevButton === 'Yes or No') {
         // show as blank
         $(this).closest('.option').siblings('.numberAnswer').find('.answertxt').val('').show();
      } else {
         // show but don't change the value
         $(this).closest('.option').siblings('.numberAnswer').find('.answertxt').show();
      }      
      
            } else {

                $(this).hide();
                $(this).removeClass('answerBtnsOn');
                $(this).addClass('answerBtnsOff');

            }

        });
        
        prevButton = clickedNumber;

        getButtons();
		 
    });

});


function numberKeyUp(input) {
	
	 if($.trim($(input).val()) == '') return;
	
    var context = $(input).parents('#optionAndAnswer');
    if (context.length == 0) {
        context = $(input).parents('tr');
    }
    
    var max = context.find('.maxRow').val();
    input.value = Math.min(+input.value, +max);
};

function getButtons()
{
    var i;
    if (initClick == 0) {
        for (i = 65; i <= 90; i++) { // iterate over character codes for A to Z
            $("#answer" + String.fromCharCode(i)).removeClass("answerBtnsOn").addClass("answerBtnsOff");
        
        }

        initClick = 1;
    }
    // code above makes sure all buttons start off with class answerBtnsOff, (so all button are white).
}

      
function insertQuestion(form) {   
	
    var context = $('#optionAndAnswer');
    var currenttotal = context.find('.answerBtnsOn').length;        
                
    
    var $tbody = $("<tbody></tbody>");
    var $tr = $("<tr class='optionAndAnswer'></tr>");
    var $td = $("<td />");
    var $answer = $("<table class='answer'></table>");
    ;
    var $questionType = '';
    
    
var $this, i=0, $row, $cell;
$('#optionAndAnswer .answers').each(function() {
    $this = $(this);
    if(i%7 == 0) {
        $row = $('<tr />').appendTo($answer);
        $cell = $('<td />').appendTo($row);
    }
    var $newBtn = $("<input class='answerBtnsRow answers' type='button' style='display:%s;' onclick='btnclick(this);' />".replace('%s',$this.is(':visible')?'inline-block':'none')).attr('name', $this.attr('name')).attr('value', $this.val()).attr('class', $this.attr('class'));
    
    
    $newBtn.appendTo($cell);
    
    
    i++;
});

    $tbody.append($tr);	
    $tr.append($td);
    $td.append($answer);
    $('#qandatbl').append($tbody);
       
}


function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }  


</script>

</head>

<body>

<form id="enter" action="http://helios.hud.ac.uk/u0867587/testing/Testpage.php" method="post" onsubmit="return validateForm(this);" >
<div id="detailsBlock">

<table id="optionAndAnswer" class="optionAndAnswer">
<tr>
      <th colspan="2">
        Option and Answer
    </th>
</tr>
<tr class="option">
<td>Option Type:</td>
<td>
<div class="box">
    <input type="text" name="gridValues" class="gridTxt maxRow" readonly="readonly" />
    <span href="#" class="showGrid">[Open Grid]</span>
</div>


<table class="optionTypeTbl">
<tr>

    <tr><td><input type="button" value="3" id="btn3" name="btn3Name" class="gridBtns gridBtnsOff"><input type="button" value="4" id="btn4" name="btn4Name" class="gridBtns gridBtnsOff"><input type="button" value="5" id="btn5" name="btn5Name" class="gridBtns gridBtnsOff"><input type="button" value="6" id="btn6" name="btn6Name" class="gridBtns gridBtnsOff"><input type="button" value="7" id="btn7" name="btn7Name" class="gridBtns gridBtnsOff"><input type="button" value="8" id="btn8" name="btn8Name" class="gridBtns gridBtnsOff"><input type="button" value="9" id="btn9" name="btn9Name" class="gridBtns gridBtnsOff"></td></tr><tr><td><input type="button" value="10" id="btn10" name="btn10Name" class="gridBtns gridBtnsOff"><input type="button" value="11" id="btn11" name="btn11Name" class="gridBtns gridBtnsOff"><input type="button" value="12" id="btn12" name="btn12Name" class="gridBtns gridBtnsOff"><input type="button" value="13" id="btn13" name="btn13Name" class="gridBtns gridBtnsOff"><input type="button" value="14" id="btn14" name="btn14Name" class="gridBtns gridBtnsOff"><input type="button" value="15" id="btn15" name="btn15Name" class="gridBtns gridBtnsOff"><input type="button" value="16" id="btn16" name="btn16Name" class="gridBtns gridBtnsOff"></td></tr><tr><td><input type="button" value="17" id="btn17" name="btn17Name" class="gridBtns gridBtnsOff"><input type="button" value="18" id="btn18" name="btn18Name" class="gridBtns gridBtnsOff"><input type="button" value="19" id="btn19" name="btn19Name" class="gridBtns gridBtnsOff"><input type="button" value="20" id="btn20" name="btn20Name" class="gridBtns gridBtnsOff"><input type="button" value="21" id="btn21" name="btn21Name" class="gridBtns gridBtnsOff"><input type="button" value="22" id="btn22" name="btn22Name" class="gridBtns gridBtnsOff"><input type="button" value="23" id="btn23" name="btn23Name" class="gridBtns gridBtnsOff"></td></tr><tr><td><input type="button" value="24" id="btn24" name="btn24Name" class="gridBtns gridBtnsOff"><input type="button" value="25" id="btn25" name="btn25Name" class="gridBtns gridBtnsOff"><input type="button" value="26" id="btn26" name="btn26Name" class="gridBtns gridBtnsOff">
        </tr> 
        </table>
        
        </td>
</tr>
<tr class="numberAnswer">
<td>Number of Answers:</td>
<td>
<span class="na string" >Only 1 Answer</span>
<input type="text" name="numberAnswer" class="numberAnswerTxt answertxt" onkeyup="numberKeyUp(this)" onkeypress="return isNumberKey(event)" onChange="getButtons()" >
</td>
</tr>
<tr class="answer">
<td>Answer</td>
<td>


<table>
	<tr>

<tr><td><input type="button" onclick="btnclick(this);" value="A" id="answerA" name="answerAName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="B" id="answerB" name="answerBName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="C" id="answerC" name="answerCName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="D" id="answerD" name="answerDName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="E" id="answerE" name="answerEName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="F" id="answerF" name="answerFName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="G" id="answerG" name="answerGName" class="answerBtns answers answerBtnsOff" style="display: inline;"></td></tr><tr><td><input type="button" onclick="btnclick(this);" value="H" id="answerH" name="answerHName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="I" id="answerI" name="answerIName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="J" id="answerJ" name="answerJName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="K" id="answerK" name="answerKName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="L" id="answerL" name="answerLName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="M" id="answerM" name="answerMName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="N" id="answerN" name="answerNName" class="answerBtns answers answerBtnsOff" style="display: inline;"></td></tr><tr><td><input type="button" onclick="btnclick(this);" value="O" id="answerO" name="answerOName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="P" id="answerP" name="answerPName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="Q" id="answerQ" name="answerQName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="R" id="answerR" name="answerRName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="S" id="answerS" name="answerSName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="T" id="answerT" name="answerTName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="U" id="answerU" name="answerUName" class="answerBtns answers answerBtnsOff" style="display: inline;"></td></tr><tr><td><input type="button" onclick="btnclick(this);" value="V" id="answerV" name="answerVName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="W" id="answerW" name="answerWName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="X" id="answerX" name="answerXName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="Y" id="answerY" name="answerYName" class="answerBtns answers answerBtnsOff" style="display: inline;"><input type="button" onclick="btnclick(this);" value="Z" id="answerZ" name="answerZName" class="answerBtns answers answerBtnsOff" style="display: inline;">	</tr>
</table>
</td>
</tr>
</table>

<table id="questionBtn" align="center">
<tr>
<th>
<input id="addQuestionBtn" name="addQuestion" type="button" value="Add Question" onClick="insertQuestion(this.form)" />
</th>
</tr>
</table>

</div>
<hr/>

<div id="details">
<table id="qandatbl" border="1">
<thead>
<tr>
    <th class="answer">Answer</th>
</tr>
</thead>
</table>
</div>

</form> 

<script type="text/javascript">

var inp = document.getElementsByTagName('input');
for (var i = inp.length-1; i>=0; i--) {
if ('text'===inp[i].type) inp[i].value = "";
}


var area = document.getElementsByTagName('textarea');
for (var i = area.length-1; i>=0; i--) {
if ('questionText'===area[i].name) area[i].value = "";
}
</script>

        
</body>
</html>
