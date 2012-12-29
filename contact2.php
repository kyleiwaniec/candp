<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>contact - graphic design and technology services - copy &amp; paste generation</title>



<meta name="description" content="">
<meta name="author" content="">
  
 <!-- Mobile -->
 <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0;" /> 
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
    <link rel="apple-touch-startup-image" href="/startup.png">
    
    
    <link rel="stylesheet" href="/css/overlay-apple.css"/>
    <link rel="stylesheet" href="/css/scrollable.css"/>
    <link rel="stylesheet" href="/css/styles2.css"/>
    

<style>
    label.error{display:block; padding-left: 7px; color:#ee3162; background-image: none;}
    .valid{
        
        background-image: url(http://www.candpgeneration.com/images/checked.png) !important;
        background-repeat: no-repeat;
        background-position: right top;
    }
    .error{background-image: url(../images/greypx.gif);}
    .nocheck{background-image: url(../images/greypx.gif) !important;}
    </style>


</head>

<body>
<?php include_once("analyticstracking.php") ?>

<div id="wrapper">

<?PHP
include_once("./includes/sidebar.html");
?>
<div id="innerContent">
<h1 class="listTitle"> Contact Us </h1>

<div><p>
We'd love to hear from you. <br />
Please fill in this form and we will get back to you within 24hours.
    </p>
</div>
<div>




<!-- DO NOT change ANY of the php sections -->
  <?php
$ipi = getenv("REMOTE_ADDR");
$httprefi = getenv ("HTTP_REFERER");
$httpagenti = getenv ("HTTP_USER_AGENT");
?>
    
  <input type="hidden" name="ip" value="<?php echo $ipi ?>" />
  <input type="hidden" name="httpref" value="<?php echo $httprefi ?>" />
  <input type="hidden" name="httpagent" value="<?php echo $httpagenti ?>" />

    <div id="form">
<form action="http://www.candpgeneration.com/formmail/formmail.php?<?php if (defined("SID")) echo SID; ?>" method="post" name="ContactForm" id="ContactForm">
    <input type="hidden" name="env_report" value="REMOTE_HOST,REMOTE_ADDR,HTTP_USER_AGENT,AUTH_TYPE,REMOTE_USER" />
    <input type="hidden" name="derive_fields" value="realname = FirstName + LastName, Date=%rfcdate%, arverify=imgverify"/>
    <input type="hidden" name="required" value="FirstName:First Name,LastName:Last Name,email:Email,phone:Phone Number,notes:Message" />
    <input type="hidden" name="subject" value="Contact From C&amp;P GEN" />
    <input type="hidden" name="mail_options" value="KeepLines" />
    <input type="hidden" name="bad_url" value="http://www.candpgeneration.com/fmbadhandler/fmbadhandler.php" /> 
    <input type="hidden" name="good_template" value="thankYou.php" />  
    <input type="hidden" name="bad_template" value="template.php" /> 
    <input type="hidden" name="this_form" value="http://www.candpgeneration.com/contact.php" /> 
    <input type="hidden" name="csvfile" value="formdata.csv" />
    <input type="hidden" name="csvcolumns" value="FirstName,LastName,email,phone,notes" />
 
  <p><a name="FormStart" id="FormStart"></a></p>
  <span class="hidden"><label for="FirstName" >First Name:</label><br /></span>
    <input type="text" name="FirstName" id="FirstName" placeholder="First Name" />
    <br /><br />
    <span class="hidden"><label for="LastName" >Last Name:</label><br /></span>
    <input type="text" name="LastName" id="LastName" placeholder="Last Name" />
    	<br /><br />
        <span class="hidden"><label for="email" >Email:</label><br /></span>
    <input type="text" id="email" name="email" placeholder="Email" />
    <br /> <br /> 
   <span class="hidden"><label for="phone" >Phone No. (Incl. Area Code):</label><br /></span>
    <input type="text" name="phone" id="phone" placeholder="Phone No. (Incl. Area Code)" />
   
    
<br /> <br />
<span class="hidden"><label for="notes" >Tell us about your project:</label><br /> </span>
  <textarea name="notes" placeholder="Tell us about your project" class="notesArea" id="notes"></textarea><br /> <br />
<div>
  <img src="http://www.candpgeneration.com/formmail/verifyimg.php?<?php echo SID; ?>" alt="Image verification" name="vimg" id="vimg" />&nbsp;&nbsp;&nbsp;<button onclick="NewVerifyImage(); return false;" class="smallButton">change image</button><br />
  <span class="hidden"><label for="imgverify" >Please enter above characters</label><br /></span> 
  <input type="text"  name="imgverify" id="imgverify" placeholder="please enter above characters" class="nocheck"/> <br /><br />
</div> 

  
  <input type="hidden" name="autorespond" value="HTMLTemplate=autorespond.php, Subject=Thank you for contacting C&amp;P Gen, FromAddr=infoduhameccandpgeneration.com" />

 

<input type="submit" value="send" class="glossy-button" />
</form>
</div><!-- end form -->


</div>
</div><!-- #innerContent -->
</div><!-- #wrapper -->


<script src="/js/jquery.tools.min.js"></script> 
<script src="/js/jquery-ui-1.8.13.custom.min.js"></script> 
<script src="/js/portfolio.js"></script> 
<script src="/js/jquery.placeholder-enhanced.js"></script>

<script src="/js/jquery.validate.js"></script>
<script>
	
       // function detectMobile(){
       // (typeof Touch !== "undefined") ? 'touchstart' : 'click';
        
           
        
      //  };
        
        
	$(function() {
            
                $(".hidden").css({"display":"none"}); // so that nojs gets labels
                
		var validator = $("#ContactForm").submit(function() {
			// tinyMCE used to sit here
		}).validate({
			rules: {
                                email: {
				required: true,
				email: true
                                },
				FirstName: "required",
                                LastName: "required",
                                phone: "required",
                                notes: "required",
                                imgverify: "required"
			},
                        messages: {
                            email: {
				required: "Please enter your email address."
                            },
                            FirstName: {
                                required: "Please enter your first name."
                            },
                            LastName: {
                                required: "Please enter your last name."
                            },
                            phone: {
                                required: "Please enter your phone number."
                            },
                            notes: {
                                required: "Please enter a message."
                            },
                            imgverify: {
                                required: "Please enter the image characters."
                            }
                        },
			errorPlacement: function(label, element) {
				// position error label after generated textarea
				if (element.is("textarea, input")) {
					label.insertAfter(element.next());
				}else{
                                    label.insertAfter(element);
                                }
                                
			}
		});
		validator.focusInvalid = function() {
			// put focus on tinymce on submit validation
			if( this.settings.focusInvalid ) {
				try {
					var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
					if (toFocus.is("textarea")) {
						toFocus.filter(":visible").focus();
					} else {
						toFocus.filter(":visible").focus();
					}
				} catch(e) {
					// ignore IE throwing errors when focusing hidden elements
				}
			}
		}
	})
</script> 
<script>
// <![CDATA[
var nReload = 5;

function NewVerifyImage()
{
    if (nReload <= 2)
        if (nReload <= 0)
        {
            alert("Sorry, too many reloads.");
            return;
        }
        else
            alert("Only " + nReload + " more reloads are allowed");
    nReload--;

        // This code now works in both IE and FireFox
    var         e_img;

    e_img = document.getElementById("vimg");
    if (e_img)
                // FireFox attempts to "optimize" by not reloading
                // the image if the URL value doesn't actually change.
                // So, we make it change by adding a different
                // count parameter for each reload.
        e_img.setAttribute("src",e_img.src+'?count='+nReload);
}
// ]]>
</script>
<script>
    
var ieButt =(function(){
    
    if(navigator.userAgent.search(/msie/i)!= -1) { 
        
        $("button, .glossy-button").each(function(){
            var buttonText = $(this).text();
            $(this).html("<span class='butleft'>"+buttonText+"</span><span class='butright'></span>");
            var wid = $(this).find(".butleft").innerWidth() + $(this).find(".butright").innerWidth();
            $(this).css({"background-image":"none", "border":"0", "padding":"0", "box-shadow":"none", "vertical-align": "middle", "width":wid});
        
        });
    }; 
    
})();    
    
</script>
</body>
</html>
