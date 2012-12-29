<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8"/>

<style>
    #main-office{
        background-color:red;
        
    }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script>
$(function(){
        $('select').change(function(){
            $('#main-office').attr('selected', 'selected');
        });
});
</script>
<body>
<select>
<optgroup label="offices">
<option>office 1</option>
<option selected id="main-office">office main</option>
<option>office 2</option>
</optgroup>
</select>

</body>
</html>