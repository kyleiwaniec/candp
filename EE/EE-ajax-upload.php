
<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8"/>
    <style>


    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="jquery.ajaxfileupload-test.js"></script>
    <script>
    $(function(){
        
        var ub = $("#uploadbutt");
        
      $('#file').ajaxfileupload({
      
      'action': 'upload.php'
     
    });  
        
    
//$("form").submit(function(e){
// e.preventDefault();
//   $('input[type="file"]').ajaxfileupload({
//      'action': 'upload.php',
//      'onComplete': function(response) {
//          
//        console.log('custom handler for file:');
//        alert(JSON.stringify(response));
//      },
//      'onStart': function() {
//        // if(weWantedTo) return false; // cancels upload
//      },
//      'onCancel': function() {
//        console.log('no file selected');
//      }
//    });
// 

//});
});
    </script>
    <body>
<div class='files' >
		<h2>Attached Files</h2>
	<?php 
		
		$filesResult = mysql_query("SELECT * FROM fileupload, users WHERE fileupload.UserId = users.id AND fileupload.ProjectId = '$id' ");
		
		if( mysql_num_rows( $filesResult ) == 0 ){
			echo "No Files Attached Yet";
		}
		else {
			
			while( $file = mysql_fetch_assoc( $filesResult ) ){
				?>
				<div class='file' >
					<div class='file-description' >Uploaded by <span class='file-user'><?php echo trim($file["fname"]." ".$file["lname"]); ?></span> on <span class='file-date'><?php echo date("D jS, F Y",strtotime($file["CreateDate"])); ?></span> </div>
					<div class='file-link' ><a href='<?php echo $file["path"]; ?>' title='Uploaded by <?php echo htmlspecialchars(trim($file["fname"]." ".$file["lname"]))." on ".date("D jS, F Y",strtotime($file["CreateDate"])); ?>' ><?php echo basename($file["path"]); ?></a></div>
				</div>
				
				<?
			}
		}
	?>
			<br/>
                        <p>Only jpgs under 1mb allowed. ___</p>
			<form method='post' action='' enctype='multipart/form-data'>
				<input type='file' name='file' id='file' />
				
                                <input type="submit" id="uploadbutt" value="upload"/>
				<?php if($error) echo "<div class='file-error' >$error</div>"; ?>
				
			</form>
</div>	
            </body>
</html>