<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8"/>

<style>

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$(function(){
       /* show password field if vimeo video is entered */
        $('#videourl').change(function() {
            var match = $('#videourl').val().match(/vimeo/);
	    if (match) {
			// match
			$("#videopassword").fadeIn(1000);
		} else {
			// no match
			$("#videopassword").attr("value","");
			$("#videopassword").delay(600).fadeOut(1000);
		}
	}).trigger('change');
});
</script>
<body>
<input type="text" id="videourl" value="sde"/>
<input type="text" id="videopassword" value="password"/>

</body>
</html>