<?php

require_once 'quickmysql.php';

$color = $_POST["color"];

connect();

    $query = "SELECT *  FROM  `votes` WHERE color = '$color'";
    $result = mysql_query($query) or die(mysql_error());
    $rows = mysql_num_rows($result);
    
    if ($rows > 0) {

        while ($data = mysql_fetch_assoc($result)) {
            $voteCount += intval($data['voteCount']);
        }
    }else{
        $voteCount = 0;
        }
echo $voteCount;

disconnect();
