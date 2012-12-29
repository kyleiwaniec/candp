<?php

// set these variables accordingly
// if these are not set correctly, your project will not function properly

// database stuff

$host = "localhost";

$user = "kylehami_kyle";

$password = "Iwaniec123";

$databaseName = "kylehami_ach";
  
  
  
  

/////////////////////////////////////////////////////////////
// functions
////////////////////////////////////////////////////////////
 
 $link;
  

function connect(){
	global $host;
	global $user;
	global $password;
	global $link;
	global $databaseName;
	 
  

  $link = mysql_connect ($host, $user, $password) or die ('I cannot connect to the database because: ' . mysql_error());

  mysql_select_db ($databaseName, $link); 
}

function disconnect(){
	global $link;
    mysql_close($link);
}

function sql($query, $rowFunction, $noResults = "There are no results."){
  $result = mysql_query($query) or die(mysql_error());
  $rows = mysql_num_rows($result);
  if ($rows > 0){
    while($data = mysql_fetch_assoc($result)){
      $rowFunction($data);
    }
  }else{
    echo $noResults;
  }
}

function removeSlashes($data){
// remove all slashes from every value in the array
   foreach($data as $key => $value){
     $data[$key] = stripslashes($value);
   }
}

?>